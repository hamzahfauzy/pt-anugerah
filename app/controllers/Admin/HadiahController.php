<?php
namespace app\controllers\Admin;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\Hadiah;

class HadiahController extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->model = new Hadiah;
	}

	public function index()
	{
		return $this->view->render('admin.hadiah.index')->with('model',$this->model->get());
	}

	function insert(Request $request)
	{
		$file = $_FILES['file'];
		$file_url = "uploads/".$file['name'];
		copy($file['tmp_name'],$file_url);
		$this->model->save([
			'nama' => $request->nama,
			'jumlah_transaksi' => $request->jumlah_transaksi,
			'gambar' => $file_url,
		]);
		$this->redirect()->url("/admin/hadiah");
		return;
	}

	function delete($id)
	{
		$gallery = $this->model->find($id);
		$this->model->delete($id);
		$this->redirect()->url("/admin/hadiah");
		return;
	}

}
