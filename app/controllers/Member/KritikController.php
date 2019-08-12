<?php
namespace app\controllers\Member;
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
		return $this->view->render('member.kritik.create');
	}

	function insert(Request $request)
	{
		$kritik = new Kritik;
		$kritik->user_id = Session::get('id');
		$kritik->deskripsi = $request->kritik;
		$kritik->save();
		$this->redirect()->url('/member/kritik?success=1');
		return;
	}

}
