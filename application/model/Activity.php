<?php

class Activity {

	public function getReplyMsg ($from, $to, $time) {
		return new XMLTextMessage($from, $to, $time, '请点击下方的菜单查看需要的内容');
	}

	public function getWelcomeMsg ($from, $to, $time) {
		return new XMLTextMessage($from, $to, $time, '欢迎加入Vans Club！');
	}

	public function getCustomerServiceMsg ($to) {

	}

	public function getMenuContent () {

	}

	public function getEventString () {
		return '';
	}

}
