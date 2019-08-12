<?php
namespace app;
use vendor\zframework\Model;

class Hadiah extends Model
{
	static $table = "hadiah";
	static $fields = ["id","nama","jumlah_transaksi","gambar"];

}
