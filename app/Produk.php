<?php
namespace app;
use vendor\zframework\Model;

class Produk extends Model
{
	static $table = "produk";
	static $fields = ["id","kategori_id","nama","deskripsi","harga","stok","created_at","updated_at"];

	public function diskon()
	{
		return $this->hasOne(Diskon::class,['produk_id'=>'id']);
	}

	public function promo()
	{
		return $this->hasOne(Promo::class,['produk_id'=>'id']);
	}

	public function gallery()
	{
		return $this->hasMany(ProdukGallery::class,['produk_id'=>'id']);
	}

	public function ulasans()
	{
		return $this->hasMany(Ulasan::class,['produk_id'=>'id']);
	}

}
