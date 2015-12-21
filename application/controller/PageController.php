<?php

class PageController extends IController {

		public function indexAction() {
			$data = array();	
			$this->_showTemplate(new ViewTemplate('home',$data));
		}
		public function showMoreProductAction(){
			
		}
		
}

