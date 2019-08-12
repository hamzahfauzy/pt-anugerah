<?php
namespace app;
use vendor\zframework\Model;

class Pembayaran extends Model
{
	static $table = "pembayaran";
	static $fields = ["id","transaksi_id","status","file_bukti","jumlah","tipe","created_at","updated_at"];

	public function transaksi()
	{
		return $this->hasOne(Transaksi::class, ['id'=>'transaksi_id']);
	}

}
