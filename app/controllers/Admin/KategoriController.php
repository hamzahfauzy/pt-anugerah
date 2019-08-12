<?php
namespace app\controllers\Admin;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\Kategori;

class KategoriController extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->model = new Kategori;
	}

	function index()
	{
		$model = $this->model->get();
		return $this->view->render("admin.kategori.index")->with('model',$model);
	}

	function create()
	{
		$error = isset($_GET['error']) ? $_GET['error'] : false;
		return $this->view->render('admin.kategori.create')->with('error',$error);
	}

	function edit(Kategori $id)
	{
		$error = isset($_GET['error']) ? $_GET['error'] : false;
		$data["error"] = $error;
		$data["model"] = $id;
		return $this->view->render('admin.kategori.edit')->with($data);
	}

	function insert(Request $request)
	{
		$model = $this->model->where('nama',$request->nama)->first();
		if(!empty($model))
		{
			$this->redirect()->url("/admin/kategori/create?error=exists");
			return;
		}

		$model = new Kategori;
		$model->nama = $request->nama;
		$model->save();

		$this->redirect()->url('/admin/kategori');
		return;
	}

	function update(Request $request)
	{
		$model = $this->model->where("nama",$request->nama)->first();
		if(!empty($model) && $model->id != $request->id)
		{
			$this->redirect()->url("/admin/kategori/edit/".$request->id."?error=exists");
			return;
		}

		$model = $this->model->where("id",$request->id)->first();
		$param = (array) $request;
		if($model->save($param))
			$this->redirect()->url("/admin/kategori");
		return;
	}

	function delete($id)
	{
		Kategori::delete($id);
		$this->redirect()->url("/admin/kategori");
		return;
	}

}
