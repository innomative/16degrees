<?php
class User {
	
	
	protected $userID = NULL;
	
	
	public function __construct($userID='') {
		$this->setUserID($userID);
	}
	
	public function isLoggedIn() {
		return !empty($_SESSION['userID']) && $_SESSION['userID'] == $this->userID;
	}
	
	public function authenticate ($password) {
		$auth = DB::execute("SELECT userID FROM users WHERE userID='".ms($this->userID)."' AND password='".ms($password)."'");
		if (count($auth) > 0) {
			$_SESSION['userID'] = $this->userID;
		}
	}
	
	public function logout () {
		unset($_SESSION['userID']);
		session_unset();
		session_destroy();
	}
	
	public function setUserID($userID) {
		$this->userID = $userID;	
	}
	
	public function getUserID () {
		return $this->userID;
	}
	
	public function __toString () {
		return $this->userID;
	}
	
}

?>