<?php
namespace app;
use vendor\zframework\Model;

class Ulasan extends Model
{
	static $table = "ulasan";
	static $fields = ["id","user_id","produk_id","deskripsi","rating"];

	public function user()
	{
		return $this->hasOne(User::class,['id'=>'user_id']);
	}

}
