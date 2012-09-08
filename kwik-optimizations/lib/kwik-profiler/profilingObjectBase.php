<?php

class profilingObjectBase {
	public $methodName;
	public $message;

	public function __construct($methodName, $message = null) {
		$this->methodName = $methodName;
		$this->message = $message;
	}
}

