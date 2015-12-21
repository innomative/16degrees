<?php

class IObject {

	public $itype = 'IObject';

	public function toArray ($iteration=-1) {
		if ($iteration == 0) {
			return $this;
		}
		return array();
	}

	public function toString () {
		return '';
	}

}
