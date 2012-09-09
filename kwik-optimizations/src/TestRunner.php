<?php

class TestRunner {
	public function setOutputFormatter() {
		/**
		 * @todo implement
		 */
	}

	/**
	 * @param $maxIterations
	 * @todo use outputFormatter instead of printing
	 */
	public function runInIterations($maxIterations) {
		echo '<pre>';

		for ($iteration = 1; $iteration <= $maxIterations; $iteration++) {
			KwikProfiler::getInstance()->reset();
			echo '<hr>';

			echo $this->getMemoryUsage();
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

			echo $this->getMemoryUsage();
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
