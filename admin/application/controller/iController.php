<?php

class iController {

	protected $currentUser = null;
	protected $currentWeiboUser = null;

	public function dispatch($action)
    {
    	//prt($action);
    	if($action != 'loginAction'){
    		if(!isset($_SESSION['user'])){
				header('Location:login.html');
			}
    	}	
		//prt($action);
    	
		
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



}
