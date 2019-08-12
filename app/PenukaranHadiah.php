<?php
namespace app;
use vendor\zframework\Model;

class PenukaranHadiah extends Model
{
	static $table = "penukaran_hadiah";
	static $fields = ["id","hadiah_id","customer_id","jumlah_penukaran"];

	public function hadiah()
	{
		return $this->hasOne(Hadiah::class,['id' => 'hadiah_id']);
	}

}
