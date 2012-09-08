<?php

class TestClass {
    public function __construct() {
	
    }
    
    public function testLoop100() {
	//echo 'loop100',"\n";
	KwikProfiler::getInstance()->profileIn(new profilingObjectBase(__METHOD__));
	$this->testLoop(100);
	KwikProfiler::getInstance()->profileOut(new profilingObjectBase(__METHOD__));
	//echo "\n",'loop100 end',"\n";
    }
    
    public function testLoop1000() {
	//echo 'loop1000',"\n";
	KwikProfiler::getInstance()->profileIn(new profilingObjectBase(__METHOD__));
	$this->testLoop(1000);
	KwikProfiler::getInstance()->profileOut(new profilingObjectBase(__METHOD__));
	//echo "\n",'loop1000 end',"\n";
    }
    
    protected function testLoop($iterations) {
	KwikProfiler::getInstance()->profileIn(new profilingObjectBase(__METHOD__));
	$counter = 0;
	for($i=1;$i<$iterations;$i++) {
	    $counter++;
	    //echo '*';
	}
	KwikProfiler::getInstance()->profileOut(new profilingObjectBase(__METHOD__));
    }
}
