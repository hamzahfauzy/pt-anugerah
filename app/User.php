<?php
namespace app;
use vendor\zframework\Model;

class User extends Model
{
	static $table = "users";
	static $fields = ["id","nama","alamat","jenis_kelamin","email","password","level"];

	public function transaksi()
	{
		return $this->hasMany(Transaksi::class, ['user_id'=>'id']);
	}

	public function successTransactions()
	{
		$model = Transaksi::where('user_id',$this->id)->where('status',2)->get();
		return $model;
	}

	public function usedTransaction()
	{
		$model = PenukaranHadiah::where('customer_id',$this->id)->get();
		$usedTransaction = 0;
		foreach($model as $data)
			$usedTransaction += $data->jumlah_penukaran;
		return $usedTransaction;
	}

	public function recommendation()
	{
		$jumlah_transaksi = count($this->successTransactions()) - $this->usedTransaction();
		$hadiah = Hadiah::where('jumlah_transaksi','<=',$jumlah_transaksi)->get();
		return $hadiah;
	}

}
