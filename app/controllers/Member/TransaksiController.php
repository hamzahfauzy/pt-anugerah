<?php
namespace app\controllers\Member;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;

use app\Transaksi;
use app\Ulasan;

class TransaksiController extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->model = new Transaksi;
	}

	function index()
	{
		return $this->view->render('member.transaksi.index')->with('models',$this->model->where('user_id',Session::get('id'))->get());
	}

	function show(Transaksi $id)
	{
		return $this->view->render('member.transaksi.show')->with('model',$id);
	}

	function update(Request $request)
	{
		$file = $_FILES['file'];
		$file_url = "uploads/".$file['name'];
		copy($file['tmp_name'],$file_url);
		$transaksi = Transaksi::find($request->id);
		$transaksi->save([
			'bukti_url' => $file_url,
			'down_payment' => $request->down_payment
		]);
		$this->redirect()->url("/member/transaksi");
		return;
	}

	function cancel(Transaksi $id)
	{
		$id->save([
			'status' => 0
		]);

		$this->redirect()->url("/member/transaksi");
	}

	function ulasan(Request $request)
	{
		$transaksi = Transaksi::find($request->id);
		$ulasan = new Ulasan;
		$ulasan_id = $ulasan->save([
			'produk_id' => $transaksi->produk_id,
			'user_id'   => Session::get('id'),
			'deskripsi' => $request->ulasan,
			'rating'    => $request->rating
		]);

		$transaksi->save([
			'ulasan_id' => $ulasan_id
		]);

		$this->redirect()->url("/member/transaksi");
		return;
	}

}
