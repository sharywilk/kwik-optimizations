<?php

define('APPLICATION_ROOT', dirname(__FILE));

error_reporting(E_ALL & E_STRICT);
ini_set('error_log', APPLICATION_ROOT . '/logs/error.php.log');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('log_errors', 1);

require_once(APPLICATION_ROOT . '/lib/autoloaders/kwikautoloader.php');
spl_autoload_register('kwikautoloader');


// tests begin;
echo '<pre>';


for ($iteration = 1; $iteration <= 4; $iteration++) {
	KwikProfiler::getInstance()->reset();
	echo '<hr>';
	echo "\n";
	echo memory_get_usage();
	echo "\n";
	echo memory_get_peak_usage();
	echo "\n";
	$starttime = microtime(true);

	$test = new TestClass();
	for ($i = 0; $i < pow(10, $iteration); $i++) {
		$test->testLoop100();
		$test->testLoop1000();
	}

	echo "\ncurtime: ", (microtime(true) - $starttime), "s\n";
	echo "\nProfiling Stack:\n";
	$stack = KwikProfiler::getInstance()->getProfilingStack();
	print_r($stack);
	echo "\ncurtime: ", (microtime(true) - $starttime), "s\n";
	echo "\nproject done\n";

	echo "\n";
	echo memory_get_usage();
	echo "\n";
	echo memory_get_peak_usage();
	echo "\n";
}


// tests end;
