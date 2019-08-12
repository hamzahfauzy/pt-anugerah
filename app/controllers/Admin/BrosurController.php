<?php
namespace app\controllers\Admin;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\Brosur;

class BrosurController extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->model = new Brosur;
	}

	public function index()
	{
		return $this->view->render('admin.brosur.index')->with('model',$this->model->get());
	}

	function upload(Request $request)
	{
		$file = $_FILES['file'];
		$file_url = "uploads/".$file['name'];
		copy($file['tmp_name'],$file_url);
		$this->model->save([
			'file_url' => $file_url,
		]);
		$this->redirect()->url("/admin/brosur");
		return;
	}

	function delete($id)
	{
		$gallery = $this->model->find($id);
		$this->model->delete($id);
		$this->redirect()->url("/admin/brosur");
		return;
	}

}
