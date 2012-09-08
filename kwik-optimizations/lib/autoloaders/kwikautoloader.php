<?php

function kwikautoloader($class) {
	$filename = APPLICATION_ROOT . '/src/' . $class . '.php';
	if (file_exists($filename)) {
		include_once $filename;
		return true;
	}

	$filename = APPLICATION_ROOT . '/lib/' . $class . '.php';
	if (file_exists($filename)) {
		include_once $filename;
		return true;
	}

	$filename = APPLICATION_ROOT . '/lib/kwik-profiler/' . $class . '.php';
	if (file_exists($filename)) {
		include_once $filename;
		return true;
	}

	throw new Exception('Source file for class ' . $class . ' not found');
}
