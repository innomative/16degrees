<?php
class ViewTemplate {

	private $data = NULL;
	private $template = '';

	public function __construct($template="",$data="") {

		$this->setTemplate($template);
		$this->setData($data);

	}

	public function setData($data) {
		$this->data = $data;
	}

	public function setTemplate($template) {
		$this->template = $template;
	}

	public function show($plat='browser') {
		//pr(BASE_DIR);
		$view_path = BASE_DIR.'/view/'.$plat;
		/*$detect = new Mobile_Detect();
		if(($detect->isMobile() || $_GET['testMobile']) AND !$detect->isTablet()) {
			$view_path = BASE_DIR.'/view/mobile';
		}
		else {
			$view_path = BASE_DIR.'/view/browser';
		}
		*/

		$data = $this->data;
		//pr($view_path);exit;
		include($view_path.'/global/head.php');
		include($view_path.'/global/top.php');
		include($view_path.'/global/side.php');
		//remove . for security reasons
		include($view_path.'/'.str_replace(".","",$this->template).'.php');
		include($view_path.'/global/footer.php');
	}
}
?>
