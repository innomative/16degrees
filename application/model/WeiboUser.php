<?php

class WeiboUser {
	protected $pictureSmall = '';
	protected $pictureBig = '';
	protected $userName = '';
	protected $userID = 0;
    protected $mobile = '';
	public 	$weiboUserID = 0;
	protected $token='';

	public function __construct($userID='') {

		if(!$userID) {
			$this->recognizeUser();
		}
		else {
			$this->setUserID($userID);
		}
	}

	public function isLoggedIn() {
		if(getWeiboToken()) {
			return true;
		}
		return false;
	}

	public function loginUser() {
		$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
		$code = getQuery('code');
		if(isset($code)) {
			$keys = array();
			$keys['code'] = $code;
			$keys['redirect_uri'] = WB_CALLBACK_URL;
			try {
				$tokenData = $o->getAccessToken( 'code', $keys ) ;
			} catch (OAuthException $e) {
			}
		}
		if ($tokenData) {
			$token = $tokenData['access_token'];
			$userData = $this->loadData($token);
			$data['uid'] = $this->userID;
			$data['nick'] = $this->userName;
			$data['pictureBig'] = $this->pictureBig;
			$data['pictureSmall'] = $this->pictureSmall;
			$data['access_token'] = $token;
            $data['mobile'] = $this->mobile;
			setMyCookie('weiboAuthToken',$data);
			//setcookie( 'weibojs_'.$o->client_id, http_build_query($tokenData));
			return true;
		} else {
			?>
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UGG</title>
</head>

<body>
<script type="text/javascript">
	window.close();
</script>
</body>
</html>
            <?php
		}
	}

	public function followCoke() {
		$c = new SaeTClientV2( WB_AKEY , WB_SKEY , getWeiboToken());
		$answer = $c->follow_by_id(FOLLOWID);
	}

	public function getFriendID($myUsername,$name) {
		$token = getWeiboToken();
		if(!$token) { throw new InvalidArgumentException('no token'); }
		$c = new SaeTClientV2( WB_AKEY , WB_SKEY ,$token);
		$array = $c->is_followed_by_name($myUsername,urldecode($name));
		if($array['target']['followed_by'] OR $array['target']['following']) {
			return  $array['source']['id'];
		}
		return false;
	}

	public function recognizeUser() {
		if(!$this->isLoggedIn()) { return false; }
		$data = getCookie('weiboAuthToken');
		if($data['uid']) {
			$this->setUserName($data['nick']);
			$this->setUserID($data['uid']);
			$this->setPictureSmall($data['pictureSmall']);
			$this->setPictureBig($data['pictureBig']);
            $this->setMobile($data['mobile']);
		}
		else if(getWeiboToken()){
			$this->loadData(getWeiboToken());
		}
	}

	public function loadData($token='') {
		$userData = $this->getUserDataFromAPI($this->userID,$token);
		$this->setWeiboUserID($userData['id']);
		$this->setUserName($userData['screen_name']);

		$this->setPictureSmall($userData['profile_image_url']);
		$this->setPictureBig($userData['avatar_large']);
		$this->token = $token;

		$this->saveToDB();

        $res = DB::execute("SELECT `mobile` FROM `ugg_user` WHERE `id` = '".ms($this->userID)."'");
        if ($res) {
            $this->setMobile($res['mobile']);
        }
	}

	public function getUserDataFromAPI($uid = 0,$token='') {
		if(!$token) { $token = getWeiboToken();}
		if(!$token) { throw new InvalidArgumentException('no token'); }
		$c = new SaeTClientV2( WB_AKEY , WB_SKEY ,$token);
		if(!$uid) {
			$userID = $c->get_uid();
			$uid = $userID['uid'];
		}

		return $c->show_user_by_id($uid);//根据ID获取用户等基本信息
	}

	public function saveToDB() {
		if($this->weiboUserID) {

			//check existance
			$statement = "SELECT count(`wid`) AS `num`,`id` FROM `ugg_user` WHERE `wid` = '".ms($this->weiboUserID)."'";
			$result = DB::execute($statement);
			if($result['num']>0) {
				$wUpdate = '';
				$statement = "UPDATE `ugg_user` SET `nickname` = '".ms($this->userName)."',`avatar` = '".ms($this->pictureBig)."' ".$wUpdate.",`token` = '".ms($this->token)."',`token_time`='".time()."' WHERE `wid` = '".ms($this->weiboUserID)."'";
				$this->setUserID($result['id']);
				DB::query($statement);
			}
			else {
				$statement = "INSERT INTO `ugg_user` (`wid`,`nickname`,`avatar`,`platform`,`create_time`,`full_info`,`token`,`token_time`) VALUES ('".ms($this->weiboUserID)."','".ms($this->userName)."','".ms($this->pictureBig)."','1','".time()."','".serialize($this)."','".ms($this->token)."','".time()."')";
				DB::query($statement);
				$this->setUserID(DB::lastInsertID());
			}
		}
	}

	public function share($text,$image,$pid) {

		$month = intval($month);

		$text = str_replace('http://www.uggaustralia.cn/thisisugg',"http://www.uggaustralia.cn/thisisugg?fromWeiboShare=1&toID=".$pid,$text);
		//$text .= "";
		//$realPath = dirname(__FILE__);	//$realPath = str_replace('application2/model','',$realPath);
		//$image = preg_replace('/^http:\/\/ugg\.innomative-staging.com\/(mobile\/)?/gi',"",$image);
		//$image = 'http://ugg.innomative-staging.com/mobile/'.$image;
		$c = new SaeTClientV2( WB_AKEY , WB_SKEY , getWeiboToken());
		$ret = $c->upload($text,MY_DOMAIN.$image);	//发送微博
		if (isset($ret['error_code']) && $ret['error_code'] > 0 ) {
			$data['success'] = false;
			$data['error_code'] = '103';
			$data['message'] = "<p>发送失败，错误：{$ret['error_code']}:{$ret['error']}</p>";
		} else {
			$data['success'] = true;
			$data['message'] = $this->weiboID;
			$this->weiboID = $ret['id'];

			$data['data'] = $checkResult['data'];
		}
		$this->loadData(getWeiboToken());
		$statement = "INSERT INTO `ugg_weibo_share` (`weibo_userid`,`share_text`,`share_img`,`time`) VALUES ('".ms($this->getUserID())."','".ms($text)."','".ms($imageShare)."','".time()."')";
		DB::query($statement);

		//$statement = "INSERT INTO `ugg_vote` (`uid`,`pid`,`create_time`) VALUES ('".ms($this->getUserID())."','".ms($pid)."','".time()."')";
		//DB::query($statement);

		//$lastID = DB::getLastID();
		//DB::query("INSERT INTO `vans_lb_share` (`month`, `photo`, `weibo_share_id`, `time`) VALUES ($month, ".intval($image).", $lastID, ".time().")");
		return $data;
	}

	public function setPictureSmall($path) {
		$this->pictureSmall = $path;
	}

	public function setPictureBig($path) {
		$this->pictureBig = $path;
	}

	public function setUserName($userName) {
		$this->userName = $userName;
	}

	public function getUserName() {
		return $this->userName;
	}

	public function getPictureSmall() {
		return $this->pictureSmall;
	}

	public function getPictureBig() {
		return $this->pictureBig;
	}
	public function getID() {
		return $this->userID;
	}
	public function getUid() {
		return $this->userID;
	}
	public function getUserID() {
		return $this->userID;
	}


	public function setUserID($userID) {
		$this->userID = $userID;
	}

	public function setWeiboUserID($userID) {
		$this->weiboUserID = $userID;
	}

    public function setMobile($mobile){
        $this->mobile = $mobile;
    }

    public function getMobile(){
        return $this->mobile;
    }

	public function toArray() {
		$data = array();
		$data['uid'] = $this->userID;
		$data['nick'] = $this->userName;
		$data['pictureBig'] = $this->pictureBig;
		$data['pictureSmall'] = $this->pictureSmall;
		return $data;
	}

}

?>
