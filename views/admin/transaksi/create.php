<?php set_page("Transaksi"); $this->load("partial.header") ?>
<div class="container">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-sm-12">
				<h2>Tambah Transaksi</h2>
			</div>
			<div class="col-sm-12">
				<form method="post" action="<?= base_url() ?>/admin/transaksi/insert">
					<div class="form-group">
						<label for="produk_id">Produk</label>
						<select class="form-control" name="produk_id" required="">
							<option value="">Pilih Produk</option>
							<?php foreach ($produk as $key => $value): ?>
								<option value="<?= $value->id ?>"><?=$value->nama?></option>
							<?php endforeach ?>
						</select>
						<span class="form-error produk_id">Produk tidak boleh kosong</span>
					</div>
					<div class="form-group">
						<label for="customer_id">Kustomer</label>
						<select class="form-control" name="customer_id" required="">
							<option value="">Pilih Kustomer</option>
							<?php foreach ($customers as $key => $value): ?>
								<option value="<?= $value->id ?>"><?=$value->nama?></option>
							<?php endforeach ?>
						</select>
						<span class="form-error customer_id">Kustomer tidak boleh kosong</span>
					</div>
					<div class="form-group">
						<label for="jumlah">Jumlah</label>
						<input type="text" name="jumlah" class="form-control" placeholder="Jumlah" required="">
						<span class="form-error jumlah">Jumlah tidak boleh kosong</span>
					</div>
					<button class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $this->load("partial.footer") ?>
