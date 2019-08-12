<?php
namespace app\controllers\Admin;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\User;

class MemberController extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->members = User::where('level','user')->get();
	}

	function index()
	{
		return $this->view->render('admin.member.index')->with('members',$this->members);
	}

	function show(User $id)
	{

	}

	function delete($id)
	{
		User::delete($id);
		$this->redirect()->url('/admin/member');
		return;
	}

}
