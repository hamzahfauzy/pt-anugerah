<?php
use vendor\zframework\Auth;
use vendor\zframework\Route;

Route::get("/","IndexController@index");

Auth::routes(); 

Route::get('/home','IndexController@home');
Route::get('/brosur','IndexController@brosur');
Route::get('/detail/{id}','IndexController@detail');
Route::middleware('Member')->get('/beli/{id}','IndexController@beli');

Route::middleware('Admin')->prefix('/admin')->namespaces('Admin')->group(function(){
	// admin root route
	Route::get('/','IndexController@index');

	// member route
	Route::get('/member','MemberController@index');
	Route::get('/member/show/{id}','MemberController@show');
	Route::get('/member/delete/{id}','MemberController@delete');

	// kategori route
	Route::get('/kategori','KategoriController@index');
	Route::get('/kategori/create','KategoriController@create');
	Route::get('/kategori/edit/{id}','KategoriController@edit');
	Route::post('/kategori/insert','KategoriController@insert');
	Route::post('/kategori/update','KategoriController@update');
	Route::get('/kategori/delete/{id}','KategoriController@delete');

	// produk route
	Route::get('/produk','ProdukController@index');
	Route::get('/produk/create','ProdukController@create');
	Route::get('/produk/edit/{id}','ProdukController@edit');
	Route::post('/produk/insert','ProdukController@insert');
	Route::post('/produk/update','ProdukController@update');
	Route::get('/produk/delete/{id}','ProdukController@delete');
	Route::get('/produk/show/{id}','ProdukController@show');
	Route::get('/produk/show/{id}/gallery','ProdukController@gallery');
	Route::post('/produk/gallery/upload','ProdukController@upload');
	Route::post('/produk/diskon','ProdukController@diskon');
	Route::get('/produk/hapus-diskon/{id}','ProdukController@hapusDiskon');
	Route::get('/produk/gallery/delete/{id}','ProdukController@deleteGallery');

	// transaksi route
	Route::get('/transaksi','TransaksiController@index');
	Route::get('/transaksi/terima/{id}','TransaksiController@terima');
	Route::get('/transaksi/tolak/{id}','TransaksiController@tolak');
	Route::get('/transaksi/show/{id}','TransaksiController@show');

	// pembayaran route
	Route::get('/pembayaran','PembayaranController@index');
	Route::get('/pembayaran/bukti','PembayaranController@bukti');
	Route::get('/pembayaran/konfirmasi/{id}','PembayaranController@konfirmasi');
	Route::get('/pembayaran/create','PembayaranController@create');
	Route::post('/pembayaran/insert','PembayaranController@insert');
	Route::get('/pembayaran/delete/{id}','PembayaranController@delete');

	// brosur route
	Route::get('/brosur','BrosurController@index');
	Route::post('/brosur/upload','BrosurController@upload');
	Route::get('/brosur/delete/{id}','BrosurController@delete');

	// brosur route
	Route::get('/hadiah','HadiahController@index');
	Route::get('/hadiah/create','HadiahController@create');
	Route::post('/hadiah/insert','HadiahController@insert');
	Route::get('/hadiah/delete/{id}','HadiahController@delete');

	// kritik route
	Route::get('/kritik','KritikController@index');
});

Route::middleware('Member')->prefix('/member')->namespaces('Member')->group(function(){

	// member root route
	Route::get('/','IndexController@index');

	// transaksi route
	Route::get('/transaksi','TransaksiController@index');
	Route::get('/transaksi/show/{id}','TransaksiController@show');
	Route::get('/transaksi/terima/{id}','TransaksiController@terima');
	Route::get('/transaksi/cancel/{id}','TransaksiController@cancel');
	Route::post('/transaksi/update','TransaksiController@update');
	Route::post('/transaksi/ulasan','TransaksiController@ulasan');

	// kritik route
	Route::get('/kritik','KritikController@index');
	Route::post('/kritik/insert','KritikController@insert');


	Route::get('/hadiah','HadiahController@index');
	Route::get('/hadiah/rekomendasi','HadiahController@rekomendasi');
	Route::post('/hadiah/simpan','HadiahController@simpan');

});