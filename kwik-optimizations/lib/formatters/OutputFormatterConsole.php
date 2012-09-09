<?php

class OutputFormatterConsole implements OutputFormatter {
	public function output($outputString) {
		echo $outputString;
	}
}
