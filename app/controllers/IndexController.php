<?php
namespace app\controllers;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\User;
use app\Kategori;
use app\Produk;
use app\Brosur;
use app\Transaksi;

class IndexController extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->kategori = new Kategori;
	}

	function index()
	{
		$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : 0;
		$kategori = $kategori ? $this->kategori->where('nama',$kategori)->get() : $this->kategori->get();
		return $this->view->render('index')->with('kategori',$kategori);
	}

	function home()
	{
		$kategori = isset($_GET['kategori']) ? $_GET['kategori'] : 0;
		$kategori = $kategori ? $this->kategori->where('nama',$kategori)->get() : $this->kategori->get();
		return $this->view->render('index')->with('kategori',$kategori);
	}

	function detail(Produk $id)
	{
		return $this->view->render('detail')->with('produk',$id);
	}

	function brosur()
	{
		return $this->view->render('brosur')->with('brosur',Brosur::get());
	}

	function beli(Produk $id)
	{
		if(Session::user()->level == 'admin')
		{
			$this->redirect()->url('/home');
			return;
		}
		$jumlah = isset($_GET['jumlah']) ? $_GET['jumlah'] : 1;
		$transaksi = new Transaksi;
		$transaksi_id = $transaksi->save([
			'produk_id' => $id->id,
			'user_id' => Session::get('id'),
			'jumlah' => $jumlah,
			'status' => 1,
			'bukti_url' => '',
			'down_payment' => 0,
			'ulasan_id' => 0,
		]);

		return $this->redirect()->url('/member/transaksi/show/'.$transaksi_id);
	}

}
