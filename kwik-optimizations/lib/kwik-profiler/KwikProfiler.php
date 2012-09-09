<?php

class KwikProfiler implements ProfilerBase {

	protected $inStack;
	protected $outStack;
	protected $profilingStack;
	private static $instance;

	private function __construct() {

	}

	/**
	 * @return KwikProfiler
	 */
	public static function getInstance() {
		if (!self::$instance) {
			self::$instance = new self();
			self::$instance->profilingStack = array(
				'stack' => array(),
			);
		}
		return self::$instance;
	}

	public function reset() {
		$this->profilingStack = array(
			'stack' => array(),
		);
	}

	public function profileIn(profilingObjectBase $obj) {
		if (empty($this->inStack [$obj->methodName])) {
			$this->inStack[$obj->methodName] = array(
				microtime(true)
			);
		} else {
			$this->inStack [$obj->methodName] [] = microtime(true);
		}
	}

	public function profileOut(profilingObjectBase $obj) {
		if (!empty($this->inStack [$obj->methodName])) {
			$lastIn = array_pop($this->inStack [$obj->methodName]);
			$profilingTime = microtime(true) - $lastIn;

			if (empty($this->profilingStack['stack'][$obj->methodName])) {
				$this->profilingStack['stack'][$obj->methodName] = array(
					'calls' => 0,
					'time' => 0
				);
			}

			$this->profilingStack['stack'][$obj->methodName]['calls']++;
			$this->profilingStack['stack'][$obj->methodName]['time'] += $profilingTime;
		} else {
			throw new ProfilerException('ProfileOut called for ' . $obj->methodName . ' without preceeding ProfileIn');
		}
	}

	public function getProfilingStack() {
		return $this->profilingStack;
	}

	public function getProfilingSummary() {
		return $this->profilingStack;
	}

}
