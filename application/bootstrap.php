<?php
error_reporting(0);

define('BASE_DIR',dirname(__FILE__));

require(BASE_DIR.'/config/config.inc.php');

//include controllers
//include extended classes first
require_once(BASE_DIR.'/controller/iController.php');

$files1 = glob(BASE_DIR.'/controller/*.php');
//include models
$files2 = glob(BASE_DIR.'/model/*.php');
//include libs
$files3 = glob(BASE_DIR.'/libs/*.php');

$files = array_merge($files3,$files2,$files1);
foreach($files as $file) {
	 if(strpos($file,'/functions.php') === false) {
	 	require_once($file);
	 }
}

/*default controller and action*/
		if(empty($_GET['ctrl'])) {
			$_GET['ctrl'] = 'page';
		}

		if(empty($_GET['action'])) {
			$_GET['action'] = 'index';
		}

class InnomativeMVC {

	function run() {
       	DB::connect();
		//determin controller
		switch($_GET['ctrl']) {
			case 'page': $ctrl = new PageController();
			break;
			case 'response': $ctrl = new ResponseController();
			break;
			case 'report': $ctrl = new ReportController();
			break;
			case 'dp' : $ctrl = new DianPingController();
			break;
			default: $ctrl = new PageController();
		}
		return $ctrl->dispatch($_GET['action']."Action");
		DB::close();
	}

}



?>
