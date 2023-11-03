<?php
defined('BASEPATH') or exit('No direct script access allowed');


class BaseController extends CI_Controller
{

	protected $template = "app";

	public function __construct()
	{
		parent::__construct();
	}
	protected function render($filename = null, $data = [])
	{

		$template = $this->load->view("templates/" . $this->template, $data, true);
		$content = $this->load->view($filename, $data, true);
		$output = str_replace(["{CONTENT}", '@stack(\'scripts\')'], [$this->removeStack('scripts', $content), $this->my_loader->stack('scripts')], $template);
		exit($output);
		
	}


	public function stack($content, $name)
	{
		$pattern = "/@push\(\'$name\'\)(.*?)@endpush/s";
		preg_match($pattern, $content, $pushes);
		$inner = $pushes[1];
		return $inner;
	}

	private function removeStack( $name, $content)
	{
		$pattern = "/@push^\(\'$name\'\)(.*?)@endpush/s";
		return preg_replace($pattern,'', $content);
	}

	
}
