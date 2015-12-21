<?php
class User {
	
	
	protected $userID = NULL;
	protected $name;
	protected $email;
	protected $pwd;
	
	public function __construct($user=null) {
		if(is_array($user)){
			$this->userID = $user['id'];
			$this->name = $user['name'];
			$this->email = $user['email'];
			$this->pwd = $user['password'];
		}	
		
	}
	
	public function isLoggedIn() {
		return !empty($_SESSION['user']) && $_SESSION['user'] == $this;
	}
	
	public function authenticate ($password) {
		//$auth = DB::execute("SELECT `id` FROM `ds_user` WHERE id='".ms($this->userID)."' AND password='".ms($password)."'");
		if ($this->pwd == $password) {
			$_SESSION['user'] = $this;
			unset($_SESSION['msg']);
			return true;
		}else{
			$_SESSION['msg'] = "密码错误";
			return false;
		}
	}
	
	public function logout () {
		unset($_SESSION['user']);
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