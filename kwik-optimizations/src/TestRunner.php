<?php

class TestRunner {
	/**
	 * @var OutputFormatter
	 */
	protected $outputFormatter;

	public function setOutputFormatter(OutputFormatter $outputFormatter) {
		$this->outputFormatter = $outputFormatter;
	}

	public function getOutputFormatter() {
		return $this->outputFormatter;
	}

	/**
	 * @param $maxIterations
	 */
	public function runInIterations($maxIterations) {
		$this->outputFormatter->output('<pre>');

		for ($iteration = 1; $iteration <= $maxIterations; $iteration++) {
			KwikProfiler::getInstance()->reset();
			$this->outputFormatter->output('<hr>');

			$this->outputFormatter->output($this->getMemoryUsage());
			$starttime = microtime(true);

			$test = new TestClass();
			for ($i = 0; $i < pow(10, $iteration); $i++) {
				$test->testLoop100();
				$test->testLoop1000();
			}

			$this->outputFormatter->output("\ncurtime: ", (microtime(true) - $starttime), "s\n");
			$this->outputFormatter->output("\nProfiling Stack:\n");
			$stack = KwikProfiler::getInstance()->getProfilingStack();
			$this->outputFormatter->output(print_r($stack,true));
			$this->outputFormatter->output("\ncurtime: ", (microtime(true) - $starttime), "s\n");
			$this->outputFormatter->output("\nproject done\n");
			$this->outputFormatter->output($this->getMemoryUsage());
		}
	}

	protected function getMemoryUsage() {
		$usage = implode(
			'',
			array(
				"\n",
				memory_get_usage(),
				"\n",
				memory_get_peak_usage(),
				"\n"
			)
		);
		return $usage;
	}
}
