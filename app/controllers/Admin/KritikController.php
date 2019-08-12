<?php
namespace app\controllers\Admin;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;

use app\Kritik;

class KritikController extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$model = Kritik::get();
		return $this->view->render('admin.kritik.index')->with('model',$model);
	}

}
