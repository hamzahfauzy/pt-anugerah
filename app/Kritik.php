<?php
namespace app;
use vendor\zframework\Model;

class Kritik extends Model
{
	static $table = "kritik";
	static $fields = ["id","user_id","deskripsi"];

	public function user()
	{
		return $this->hasOne(User::class,['id'=>'user_id']);
	}

}
