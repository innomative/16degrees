<?php

class ResultObj
{
	protected $success = false;
	protected $data = '';
	protected $message = '';

	/**
	*@param boolean $success
	*@param string or array $data
	*@param string message
	**/
	public function __construct($success,$data='',$message='') {
		/*TODO*/
		//Set local variables.
		$this->success = $success;
		$this->data = $data;
		$this->message = $message;
	}

    /**
     * format output array
     */
    public function toArray() {
		return array('success'=>$this->success,'data'=>$this->data,'result'=>'','message'=>$this->message);
    }
	
	public function toJson() {
		return json_encode($this->toArray());	
	}

	public function isSuccess() {
		return $this->success;
	}

	public function setSuccess($success) {
		$this->success = $success;
	}

	public function setData($data) {
		$this->data=$data;
	}

	public function setMessage($msg) {
		$this->message=$msg;
	}

	public function getData() {
		return $this->data;
	}

	public function getMessage() {
		return $this->message;
	}
}
?>
