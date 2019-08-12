<?php
namespace app\controllers\Admin;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\Produk;
use app\ProdukGallery;
use app\Kategori;
use app\Diskon;

class ProdukController extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->model = new Produk;
		$this->kategori = new Kategori;
	}

	function index()
	{
		$model = $this->model->get();
		return $this->view->render("admin.produk.index")->with('model',$model);
	}

	function create()
	{
		$error = isset($_GET['error']) ? $_GET['error'] : false;
		$data['kategori'] = $this->kategori->get();
		$data['error'] = $error;
		return $this->view->render('admin.produk.create')->with($data);
	}

	function edit(Produk $id)
	{
		$error = isset($_GET['error']) ? $_GET['error'] : false;
		$data["error"] = $error;
		$data["model"] = $id;
		$data['kategori'] = $this->kategori->get();
		return $this->view->render('admin.produk.edit')->with($data);
	}

	function insert(Request $request)
	{
		$model = $this->model->where('nama',$request->nama)->first();
		if(!empty($model))
		{
			$this->redirect()->url("/admin/produk/create?error=exists");
			return;
		}

		$param = (array) $request;
		$model = new Produk;
		$model->save($param);

		$this->redirect()->url('/admin/produk');
		return;
	}

	function update(Request $request)
	{
		$model = $this->model->where("nama",$request->nama)->first();
		if(!empty($model) && $model->id != $request->id)
		{
			$this->redirect()->url("/admin/produk/edit/".$request->id."?error=exists");
			return;
		}

		$model = $this->model->where("id",$request->id)->first();
		$param = (array) $request;
		if($model->save($param))
			$this->redirect()->url("/admin/produk");
		return;
	}

	function delete($id)
	{
		Produk::delete($id);
		$this->redirect()->url("/admin/produk");
		return;
	}

	function gallery(Produk $id)
	{
		return $this->view->render('admin.produk.gallery')->with('produk',$id);
	}

	function upload(Request $request)
	{
		$file = $_FILES['file'];
		$file_url = "uploads/".$file['name'];
		copy($file['tmp_name'],$file_url);
		$gallery = new ProdukGallery;
		$gallery->save([
			'produk_id' => $request->id,
			'file_url' => $file_url,
		]);
		$this->redirect()->url("/admin/produk/show/".$request->id."/gallery");
		return;
	}

	function deleteGallery($id)
	{
		$gallery = ProdukGallery::find($id);
		ProdukGallery::delete($id);
		$this->redirect()->url("/admin/produk/show/".$gallery->produk_id."/gallery");
		return;
	}

	function diskon(Request $request)
	{
		$diskon = new Diskon;
		$diskon->save([
			'produk_id' => $request->id,
			'jumlah' => $request->jumlah,
		]);
		$this->redirect()->url('/admin/produk');
	}

	function hapusDiskon($id)
	{
		$diskon = Diskon::find($id);
		Diskon::delete($id);
		$this->redirect()->url("/admin/produk");
		return;
	}

}
