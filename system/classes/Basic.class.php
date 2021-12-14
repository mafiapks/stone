<?php


/**
* 
*/
class Basic
{
	
	public $root;

	function __construct()
	{
		$dominio= $_SERVER['HTTP_HOST'];
		$this->root = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/";
		// $this->root = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	}


}