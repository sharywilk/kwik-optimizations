<?php

define('APPLICATION_ROOT', dirname(__FILE__));

error_reporting(E_ALL & E_STRICT);
ini_set('error_log', APPLICATION_ROOT . '/logs/error.php.log');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('log_errors', 1);

require_once(APPLICATION_ROOT . '/lib/autoloaders/kwikautoloader.php');
spl_autoload_register('kwikautoloader');


/**
 * tests begin;
 */

$testRunner = new TestRunner();
$testRunner->setOutputFormatter(new OutputFormatterConsole());
$testRunner->runInIterations(4);
