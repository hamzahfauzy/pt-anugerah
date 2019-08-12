<?php
namespace app\controllers\Member;
use vendor\zframework\Controller;
use vendor\zframework\Session;
use vendor\zframework\util\Request;
use app\Hadiah;
use app\PenukaranHadiah;

class HadiahController extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->model = new PenukaranHadiah;
	}

	public function index()
	{
		return $this->view->render('member.hadiah.index')->with('model',$this->model->where('customer_id',Session::get('id'))->get());
	}

	public function rekomendasi()
	{
		$jumlah_transaksi = count(Session::user()->successTransactions()) - Session::user()->usedTransaction();
		$hadiah = Hadiah::where('jumlah_transaksi','<=',$jumlah_transaksi)->get();
		return $this->view->render('member.hadiah.rekomendasi')->with('model',$hadiah);
	}

	function simpan(Request $request)
	{
		$hadiah = Hadiah::find($request->hadiah);
		$this->model->save([
			'customer_id' => Session::get('id'),
			'hadiah_id' => $request->hadiah,
			'jumlah_penukaran' => $hadiah->jumlah_transaksi,
		]);
		$this->redirect()->url("/member/hadiah");
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
