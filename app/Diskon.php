<?php
namespace app;
use vendor\zframework\Model;

class Diskon extends Model
{
	static $table = "diskon";
	static $fields = ["id","produk_id","jumlah","created_at","updated_at","expired_at"];

}
