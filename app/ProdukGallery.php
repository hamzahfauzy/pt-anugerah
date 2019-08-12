<?php
namespace app;
use vendor\zframework\Model;

class ProdukGallery extends Model
{
	static $table = "produk_gallery";
	static $fields = ["id","produk_id","file_url"];

}
