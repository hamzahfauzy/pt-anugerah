<?php
namespace app;
use vendor\zframework\Model;

class Transaksi extends Model
{
	static $table = "transaksi";
	static $fields = ["id","produk_id","user_id","created_at","updated_at","status","jumlah","bukti_url","down_payment","ulasan_id"];

	public function user()
	{
		return $this->hasOne(User::class,['id'=>'user_id']);
	}

	public function pembayaran()
	{
		return $this->hasMany(Pembayaran::class,['transaksi_id'=>'id']);
	}

	public function produk()
	{
		return $this->hasOne(Produk::class,['id'=>'produk_id']);
	}

	public function ulasan()
	{
		return $this->hasOne(Ulasan::class,['id'=>'ulasan_id']);
	}

}
