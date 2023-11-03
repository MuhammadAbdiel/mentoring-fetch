<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('is_active')) {
	function is_active($route, $activeClass= 'active')
	{
		$CI = &get_instance();
        $current_uri = $CI->uri->uri_string();
        
        if ($current_uri === $route) {
            return $activeClass;
        } else {
            return '';
        }
	}
}
if (!function_exists('dd')) {
	function dd($context)
	{
		echo '<pre>';
        var_dump($context);
        echo '</pre>';
        die();
	}
}
?>
