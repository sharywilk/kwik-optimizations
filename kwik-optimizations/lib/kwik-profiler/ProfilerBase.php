<?php

interface ProfilerBase {
    public function profileIn(profilingObjectBase $obj);
    public function profileOut(profilingObjectBase $obj);
	public function reset();
}
