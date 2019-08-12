<?php
namespace app\controllers\Admin;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;

use app\Transaksi;

class TransaksiController extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->model = new Transaksi;
	}

	function index()
	{
		return $this->view->render('admin.transaksi.index')->with('models',$this->model->get());
	}

	function show(Transaksi $id)
	{
		return $this->view->render('admin.transaksi.show')->with('model',$id);
	}

	function terima(Transaksi $id)
	{
		$id->save([
			'status' => 2
		]);

		$this->redirect()->url("/admin/transaksi");
	}

	function tolak(Transaksi $id)
	{
		$id->save([
			'status' => 0
		]);

		$this->redirect()->url("/admin/transaksi");
	}

}
