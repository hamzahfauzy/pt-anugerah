<?php
namespace app;
use vendor\zframework\Model;

class Kategori extends Model
{
	static $table = "kategori";
	static $fields = ["id","nama"];

	function produks()
	{
		return $this->hasMany(Produk::class,['kategori_id'=>'id']);
	}

}
