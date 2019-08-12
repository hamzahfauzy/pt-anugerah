<?php 
$this->load('partial.header'); 
$produk = $model->produk();
$member = $model->user();
?>

<div class="content-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-3">
				<?php $this->load('partial.sidebar') ?>
			</div>
			<div class="col-sm-12 col-md-9">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">
							<h2 align="center">Detail Customer</h2>
							<hr>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<b>Nama</b><br>
								<span><?= $member->nama ?></span>
							</div>

							<div class="form-group">
								<b>Alamat</b><br>
								<span><?= $member->alamat ?></span>
							</div>

							<div class="form-group">
								<b>Jenis Kelamin</b><br>
								<span><?= $member->jenis_kelamin ?></span>
							</div>

							<div class="form-group">
								<b>Email</b><br>
								<span><?= $member->email ?></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<h2 align="center">Detail Produk</h2>
							<hr>
						</div>
						<div class="col-sm-12 col-md-3">
							<img src="<?=base_url() ?>/<?= $produk->gallery()[0]->file_url ?>" width="100%">
						</div>
						<div class="col-sm-12 col-md-9">
							<div class="product-description">
								<h2 class="product-name"><?= $produk->nama ?></h2>
								<?php if($produk->diskon()): ?>
								<strike><h5>Rp. <?= number_format($produk->harga) ?></h5></strike>
								<h5 class="text-success">Rp. <?= number_format($produk->harga - ($produk->harga*$produk->diskon->jumlah/100)) ?> (Diskon: <?= $produk->diskon->jumlah?>%)</h5>
								<?php else: ?>
								<h5 class="text-success">Rp. <?= number_format($produk->harga) ?></h5>
								<?php endif; ?>
								<p class="product-text"><?= $produk->deskripsi ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<?php $this->load('partial.footer') ?>