<?php

class iController {

	protected $currentUser = null;
	protected $currentWeiboUser = null;

	public function dispatch($action)
    {
    	if (!empty($_GET['wid']) AND !empty($_GET['hash'])) {
    		if (isset($_GET['hash']) && !$this->validateUser($_GET['wid'], $_GET['hash'])) {
    			$result = new ResultObj(false, '', 'Invalid User Hash:'.$_GET['hash']);
    			echo $result->toJson();
    			exit;
    		}
    		//get hash and compare with $_GET['hahs']
    		//if(OK)
    		setMyCookie('ugg_wid1',$_GET['wid'],(time()+86400));
    	} else if (!empty($_GET['wid'])) {
			$wid = getCookie('ugg_wid1');			 			
			if(!empty($wid) AND $wid != $_GET['wid']) {	
			//echo $wid;exit;
				//return $this->authAction();
			}
		}
		
		/*//check login status
		$user = $this->getCurrentUser();
		if(!$user->isLoggedIn()) {
			$data['success'] = false;
			$data['error_code'] = 101;
			$data['message'] = "请登入";
			echo json_encode($data);
			return false;
		}*/
        return $this->{$action}();
    }

    private function validateUser ($wid, $hash) {
    	$result = DB::execute("SELECT * FROM `ugg_user` WHERE `wid` = '".ms($wid)."' AND `hash` = '".ms($hash)."'");
    	return (BOOL) $result;
    }

	public function getCurrentUser($wid='') {
		//caching
		if (empty($wid)) {
			if (!empty($_GET['wid'])) {
				$wid = $_GET['wid'];
			}
		}
		if($this->currentUser === NULL) {
			$this->currentUser = new UggUser($wid);
		}
		return $this->currentUser;
	}

	public function getCurrentWeiboUser() {
		//caching
		if($this->currentWeiboUser === NULL) {
			$this->currentWeiboUser = new WeiboUser();
			$this->currentUser = $this->currentWeiboUser;
		}
		return $this->currentWeiboUser;
	}

	public function getPost($index) {
		return $_POST[$index];
	}

	public function getQuery($index) {
		return $_GET[$index];
	}
	public function _showTemplate (ViewTemplate $tpl) {
		$tpl->show();
		exit;
	}


}
