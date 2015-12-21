<?php

	function pwgenerator($number)
	{
		$zeichen = "abcdefghijklmnopqrstuvwyz";
		$zeichen .= "0123456789";
		$password = 'ABCDEFGHIJKLMNOPQRSTUVWYZ';
		//srand((double)microtime()*1000000);
		//Startwert für den Zufallsgenerator festlegen

		for($i = 0; $i < $number; $i++){
			$password .= substr($zeichen,(mt_rand()%(strlen ($zeichen))), 1);
		}

		return $password;
	}

	//取出数据库值，对其进行反编译
	//escape for output
	function he($string) {
		return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
	}
	//存入数据库前 对字段进行编译 以免注入
	function ms($string) {
		return addslashes(stripslashes($string));
	}

	function getWeiboToken() {
		$cookie = getCookie('weiboAuthToken');
		return $cookie['access_token'];
	}

	/**
	@param int expire seconds when the cookie should expire
	**/
	function setMyCookie($name,$data,$expire=0) {
		if($expire == 0) $expire = time()+24*7*3600;
		$cdata['content'] = serialize($data);
		$cdata['sign'] = md5($cdata['content'].COOKIE_SIGN);
		$content = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,COOKIE_PRIVATE_KEY,serialize($cdata),'ecb'));
		setcookie($name,$content,$expire,"/");
	}

	function setCookies($name,$data,$expire=0) {
		if($expire == 0) $expire = time()+24*7*3600;
		$cdata['content'] = serialize($data);
		$cdata['sign'] = md5($cdata['content'].COOKIE_SIGN);
		$content = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,COOKIE_PRIVATE_KEY,serialize($cdata),'ecb'));
		setcookie($name,$content,$expire,"/");
	}

	/*function setCookies($name,$data,$expire=0) {
		if($expire == 0) $expire = time()+24*7*3600;
		$cdata['content'] = serialize($data);
		$cdata['sign'] = md5($cdata['content'].COOKIE_SIGN);
		$content = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,COOKIE_PRIVATE_KEY,serialize($cdata),'ecb'));
		setcookie($name,$content,$expire,"/");
	}*/

	function getCookie($name) {
		if(!isset($_COOKIE[$name])){
			return false;
		}

	 	$cdata = unserialize(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,COOKIE_PRIVATE_KEY,base64_decode($_COOKIE[$name]),'ecb'));

		$newSign = md5($cdata['content'].COOKIE_SIGN);

		if($newSign==$cdata['sign'] OR empty($cdata['sign'])) {

			return unserialize($cdata['content']);
		}
		else {
			die('Cookie integrity violation');
		}
	}

	function getPost($index) {
		if (isset($_POST[$index])) {
			return $_POST[$index];
		} else {
			return false;
		}
	}

	function getQuery($index) {
		if (isset($_GET[$index])) {
			return $_GET[$index];
		} else {
			return false;
		}
	}
	function pr ($data) {
		echo '<pre style="color:#f00;">';
		print_r($data);
		echo '</pre>';
	}

	function prt ($data) {
		pr($data);
		exit;
	}

	function getCurrentUserID () {
		$data = getCookie('weiboAuthToken');
		$uid = 0;
		if (!empty($data) && !empty($data['uid'])) {
			$uid = $data['uid'];
		} else {
			$wid = getCookie('ugg_wid1');
			if (!empty($wid)) {
				$result = DB::execute("SELECT `id` FROM `ugg_user` WHERE `wid` = '".ms($wid)."'");
				if ($result) {
					$uid = $result['uid'];
				}
			}
		}
		return $uid;
	}

	function createThumb ($file, $width=118, $height=118, $postfix='thumb') {
		$imgk = new Imagick($file);
		if($postfix == 'pc_thumb') {
			$imgk->thumbnailImage($width, $height,true);
			$imgk->setImageCompression(Imagick::COMPRESSION_JPEG);
			// Set compression level (1 lowest quality, 100 highest quality)
			$imgk->setImageCompressionQuality(75);
			// Strip out unneeded meta data
			$imgk->stripImage();
			$name = preg_replace('/\.[^.]+$/', '', $file).'_'.$postfix.'.jpg';
			$imgk->writeImage($name);
			$imgk->destroy();
			return $name;
		}
		if ($imgk->cropThumbnailImage($width, $height)) {
			$name = preg_replace('/\.[^.]+$/', '', $file).'_'.$postfix.'.jpg';
			$imgk->writeImage($name);
			$imgk->destroy();
			return $name;
		} else {
			return false;
		}
	}

	function replace_unicode_escape_sequence($match) {
	    return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
	}

	function decodeUnicode ($str) {
		return preg_replace_callback('/u([0-9a-fA-F]{4})/i', 'replace_unicode_escape_sequence', $str);
	}

	function unicode_encode ($str) {
		return preg_replace("/\\\\u([a-f0-9]{4})/e", "iconv('UCS-4LE','UTF-8',pack('V', hexdec('U$1')))", $str);
	}

	function get_artist_by_stage($stage) {
		switch($stage) {
		  case 1: return 'Panda Mei'; break;
		  case 3: return '童云'; break;
		  case 2: return '王卯卯'; break;
		  case 4: return '彭斯'; break;
		  case 5: return '曹征'; break;
	  }
	}

	function getCurrentURL () {
		//prt()
		/*$getParam = "";
		$sep = "";
		if(count($_GET)) {
			foreach($_GET as $key=>$val) {
				$getParam .= $sep.$key.'='.$val;
				 $sep = "&";
			}
		}*/
		return ((isset($_SERVER['HTTPS']) && strcasecmp($_SERVER['HTTPS'], 'off')) ? 'https://' : 'http://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	}

	function getRemoteIP () {
		return $_SERVER['REMOTE_ADDR'];
	}
	function convertToJPG($tmp,$path,$fname){
		if (($img_info = getimagesize($tmp)) === FALSE){
  			die("Image not found or not an image");
		}
		$width = $img_info[0];
		$height = $img_info[1];
		switch ($img_info[2]) {
		  case IMAGETYPE_GIF  : $src = imagecreatefromgif($tmp);  break;
		  case IMAGETYPE_JPEG : $src = imagecreatefromjpeg($tmp); break;
		  case IMAGETYPE_PNG  : $src = imagecreatefrompng($tmp);  break;
		  default : die("Unknown filetype");
		}
		$img = imagecreatetruecolor($width, $height);
		imagecopyresampled($img, $src, 0, 0, 0, 0, $width, $height, $width, $height);
		imagejpeg($img,$path.$fname.'.jpg');
	}
	function getUserAgent () {
		return $_SERVER['HTTP_USER_AGENT'];
	}
    //发送短信
    function SendSMS($text,$url,$Receiver,$event=array())
    {
        $message = " ";
        switch($text)
        {
            case 'cancel':
			    $orga =	$event->getSponsor();
                $message="【UGG官方】".$orga['nickname']."取消了".date('m月d日',$event->createTime)."发起的约会，请等待TA的再次邀约。关注UGG官方微信，参与活动就有机会赢美国加州之旅。";
                break;
			case 'eventReminder':
				$orga =	$event->getSponsor();
				$message = "【UGG官方】约会提醒：明天就是你和".$orga['nickname']."温暖重逢的日子啦，不要忘记了。约会地点：".$event->getFullAddress();
				break;
			case 'eventReminderSponsor':
				$message = "【UGG官方】约会提醒：你发起的温暖约会就在明天啦，不要忘记了。约会地点：".$event->getFullAddress();
				break;
            case 'approve':
			 	$orga =	$event->getSponsor();
               $message="【UGG官方】".$orga['nickname']."已经确认了最终约会时间，记得在".$event->getPartyTime(true)."点，地点：".$event->getFullAddress()."，和TA温暖重逢哦！";
                break;
            case 'eventConfirmReminder':
				$message = "【UGG官方】约会将近，快到UGG官方微信确认最终约会时间，或点链接来确认：";
                break;
			case 'eventAfterReminder':
				$orga =	$event->getSponsor();
				$message = "【UGG官方】和".$orga['nickname']."在".date('Y年m月d日',$event->getPartyTime())."的温暖重逢一定留下许多精彩照片吧！到UGG官方微信上传照片或点击 <URL> 上传，赢取美国加州之旅！";
                break;
			case 'eventAfterReminderSponsor':
				$message = "【UGG官方】你们在".date('Y年m月d日',$event->getPartyTime())."的温暖重逢一定留下许多精彩照片吧！到UGG官方微信上传照片或点击 <URL> 上传，赢取美国加州之旅！";
                break;
			case 'couponCode':
				$message = "【UGG官方】您的优惠券串码：".$event."，该券仅限UGG官网使用，有效期截止至12/31，详情：http://t.cn/Rh41wRp *该券仅可使用一次，请妥善保管。";
                break;

        }

		if(!empty($url)) {
			$result = DB::execute("SELECT `token` FROM `ugg_user` WHERE `platform` = 1 ORDER BY `token_time` DESC");
			if($result['token']) {
				$apiUrl='https://api.weibo.com/2/short_url/shorten.json?source='.WB_AKEY.'&access_token='.$result['token'].'&url_long='.urlencode($url);
				$curlObj = curl_init();
				curl_setopt($curlObj, CURLOPT_URL, $apiUrl);
				curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($curlObj, CURLOPT_HEADER, 0);
				curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
				$response = curl_exec($curlObj);
				curl_close($curlObj);
				$json = json_decode($response);
				if(!stripos($message,'<URL>')) {
					$message = $message." ".$json->urls[0]->url_short;
				}
				else {
					$message = str_replace('<URL>',$json->urls[0]->url_short,$message);
				}
			}
		}

		$encodedContent = urlencode(iconv("utf-8", "gbk", $message));

		// url地址
		$URL = "http://221.179.180.158:9007/QxtSms/QxtFirewall";
		//$URL = "http://116.255.157.106:8882/jiekou.aspx?name=rsxx&pass=123456&phone=".trim($desMobiles)."&mess=".urlencode($content);

		// 消息参数
		$validTime = "";	// 应该大于SendTime，最好不要填写，国都默认消息有效期为SendTime+3。如果填写错误容易导致消息过有效期无法发送。
		$contentType = "8";	// 内容类型 15为短短信，8为长短信 ----- 国都服务端将会自动识别短信长短，所以发送时填写8即可。若填写15 长短信将无法发送。

		//$params = "name=rsxx&pass=123456&phone=".trim($desMobiles)."&mess=".urlencode($content);
		$params = "OperID=shxxkj&OperPass=xxkj123&ValidTime=".$validTime."&AppendID=0005&DesMobile=".trim($Receiver)."&Content=".$encodedContent."&ContentType=".$contentType;
		// send msg via post and return
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_URL, $URL);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		/*curl_setopt($ch, CURLOPT_HTTPHEADER, array (
			"Content-Type: application/x-www-form-urlencoded; charset=GBK"
		));*/
		curl_exec($ch);

		DB::query("INSERT INTO `ugg_sms_log` (`phone`, `message`, `type`, `time`) VALUES ('".ms($Receiver)."', '".ms($message)."', '".ms($text)."', '".time()."')");
	//	$xml = simplexml_load_string(curl_exec($ch));
		//echo $code = trim($xml->code);



    }

?>
