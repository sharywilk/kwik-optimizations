<?php

class TestClass {
	public function __construct() {

	}

	public function testLoop100() {
		KwikProfiler::getInstance()->profileIn(new profilingObjectBase(__METHOD__));
		$this->testLoop(100);
		KwikProfiler::getInstance()->profileOut(new profilingObjectBase(__METHOD__));
	}

	public function testLoop1000() {
		KwikProfiler::getInstance()->profileIn(new profilingObjectBase(__METHOD__));
		$this->testLoop(1000);
		KwikProfiler::getInstance()->profileOut(new profilingObjectBase(__METHOD__));
	}

	protected function testLoop($iterations) {
		KwikProfiler::getInstance()->profileIn(new profilingObjectBase(__METHOD__));
		$counter = 0;
		for ($i = 1; $i < $iterations; $i++) {
			$counter++;
		}
		KwikProfiler::getInstance()->profileOut(new profilingObjectBase(__METHOD__));
	}
}
