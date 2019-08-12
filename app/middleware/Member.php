<?php
namespace app\middleware;
use vendor\zframework\Middleware;
use vendor\zframework\Session;

class Member extends Middleware
{
	
	function __construct()
	{
		$condition = isset(Session::user()->id) && Session::user()->level == "user";
		$redirect = "/login";
		parent::__construct($condition,$redirect);
	}
}
