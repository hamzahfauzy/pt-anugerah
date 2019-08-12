<?php set_page("Produk"); $this->load("partial.header") ?>
<div class="content-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-3">
				<?php $this->load('partial.sidebar') ?>
			</div>

			<div class="col-sm-12 col-md-9">
				<!-- main content section -->
				<h2>Tambah Produk</h2>
				<?php if ($error) { ?>
				<div class="alert alert-danger" role="alert">
					Produk sudah ada.
				</div>						
				<?php } ?>

				<form method="post" action="<?= base_url() ?>/admin/produk/insert">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" name="nama" class="form-control" placeholder="Nama" required="">
						<span class="form-error nama">Nama tidak boleh kosong</span>
					</div>
					<div class="form-group">
						<label for="kategori_id">Kategori</label>
						<select class="form-control" name="kategori_id" required="">
							<option value="">Pilih Kategori</option>
							<?php foreach ($kategori as $key => $value): ?>
								<option value="<?= $value->id ?>"><?=$value->nama?></option>
							<?php endforeach ?>
						</select>
						<span class="form-error kategori_id">Kategori tidak boleh kosong</span>
					</div>

					<div class="form-group">
						<label for="deskripsi">Deskripsi</label>
						<textarea name="deskripsi" class="form-control" placeholder="Deskripsi" required=""></textarea>
						<span class="form-error deskripsi">Deskripsi tidak boleh kosong</span>
					</div>

					<div class="form-group">
						<label for="harga">Harga</label>
						<input type="tel" name="harga" class="form-control" placeholder="Harga" required="">
						<span class="form-error harga">Harga tidak boleh kosong</span>
					</div>

					<div class="form-group">
						<label for="stok">Stok</label>
						<input type="tel" name="stok" class="form-control" placeholder="Stok" required="">
						<span class="form-error stok">Harga tidak boleh kosong</span>
					</div>
					<button class="btn btn-danger"><i class="fa fa-save"></i> Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $this->load("partial.footer") ?>
