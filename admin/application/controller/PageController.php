<?php

class PageController extends IController {

		public function indexAction() {
			$data = array();
			
			$data['wine_list'] = $this->getAllProduct();
			$_SESSION['page_index'] = 'index';
			$page = new viewTemplate('wine', $data);
			$page -> show();
		}
		public function wine_typeAction(){
			$_SESSION['page_index'] = 'wine_type';
			$page = new viewTemplate('wine_type', $data);
			$page -> show();
		}
		public function loginAction(){
			$login_name = $_POST['username'];
			$password = $_POST['password'];
			
			if(trim($login_name)){
				$sql = "select * from user where `username` = '".ms($login_name)."'";
				$user = DB::execute($sql);
				if($user['id']){
					$login_user = new User($user);
					if($login_user->authenticate($password)){
						header('Location:index.php');
					}else{
						header('Location:login.php');
					}
					//$this->indexAction();
				}else{
					$_SESSION['msg'] = "未知用户";
					header('Location:login.php');
				}
			}
		}
		public function logoutAction(){
			unset($_SESSION['user']);
			session_unset();
			session_destroy();
			header('Location:index.php');
		}
		
		public function getAllProduct(){
			$sql = "Select * from `product`";
			$result = DB::fetchAll($sql);
			//pr($result);
			return $result;
		}
		
}

