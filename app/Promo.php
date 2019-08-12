<?php
namespace app;
use vendor\zframework\Model;

class Promo extends Model
{
	static $table = "promo";
	static $fields = ["id","produk_id","harga","created_at","updated_at","expired_at"];

}
