<?php 
$this->load('partial.header'); 
$produk = $model->produk();
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
							<h2 align="center">Selesaikan Pembayaran Down Payment</h2>
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

							<?php if($model->status == 1 && empty($model->bukti_url)){ ?>

							<div class="buy-form">
								<p>Selesaikan pembayaran down payment dengan melakukan transfer ke rekening <b>8445082362618445</b> a/n PT. Anugerah Karya Abiwara I</p>
								<form class="form-upload" method="post" action="<?= base_url() ?>/member/transaksi/update" enctype="multipart/form-data">
									<input type="hidden" name="id" value="<?= $model->id ?>">
									<div class="form-group">
										<label>Down Payment</label>
										<input type="tel" name="down_payment" class="form-control" placeholder="Down Payment" required="">
									</div>
									<div class="form-group">						
										<label>File</label>
										<input type="file" name="file" class="form-control" required="">
									</div>
									<button class="btn btn-danger"><i class="fa fa-save"></i> Update Transaksi</button>
								</form>
							</div>

							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<?php $this->load('partial.footer') ?>