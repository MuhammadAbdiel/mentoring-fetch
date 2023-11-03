<?php

class MY_Loader extends CI_Loader
{

	public function __construct()
	{
		parent::__construct();
	}

	public function push($name, $content)
	{
		$this->_ci_cached_vars['pushes'][$name][] = $content;
	}

	public function stack($name)
	{
		$pushes = isset($this->_ci_cached_vars['pushes'][$name]) ? $this->_ci_cached_vars['pushes'][$name] : [];
		return implode("\n", $pushes);
	}
}
