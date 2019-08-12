<?php
namespace app\middleware;
use vendor\zframework\Middleware;
use vendor\zframework\Session;

class Admin extends Middleware
{
	
	function __construct()
	{
		$condition = isset(Session::user()->id) && Session::user()->level == "admin";
		$redirect = "/";
		parent::__construct($condition,$redirect);
	}
}
