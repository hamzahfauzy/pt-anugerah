<?php $this->load('partial.header') ?>

<div class="content-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<br>
			</div>
			<div class="col-sm-12 col-md-7">
				<!-- main content section -->
				<div class="product-gallery">
					<div class="product-gallery-main">
						<img src="<?= base_url() ?>/<?= $produk->gallery()[0]->file_url ?>" width="100%">
					</div>

					<div class="product-gallery-item-wrapper">
						<?php foreach($produk->gallery as $gallery): ?>
						<div class="product-gallery-item" data-img-src="<?= base_url() ?>/<?= $gallery->file_url ?>">
							<img src="<?= base_url() ?>/<?= $gallery->file_url ?>" width="100%" height="100%">
						</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>

			<div class="col-sm-12 col-md-5">
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

				<div class="buy-form">
					<form class="form-inline my-2 my-lg-0" action="<?= base_url() ?>/beli/<?= $produk->id ?>">
						<input class="form-control mr-sm-2" type="number" value="1" name="jumlah">
						<button class="btn btn-danger my-2 my-sm-0" type="submit"><i class="fa fa-shopping-cart"></i> Beli</button>
					</form>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<hr>

				<div class="comment-wrapper">
					<h2>Ulasan Pembeli</h2>

					<?php foreach($produk->ulasans() as $ulasan){ ?>
					<div class="comment-container">
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-12 col-md-1">
									<img src="<?= asset('assets/placeholder-profile.png') ?>" width="100%">
								</div>
								<div class="col-sm-12 col-md-11">
									<b><?= ucwords($ulasan->user()->nama) ?></b> - 
									<span class="fa fa-star <?= $ulasan->rating >= 1 ? 'checked' : '' ?>"></span>
									<span class="fa fa-star <?= $ulasan->rating >= 2 ? 'checked' : '' ?>"></span>
									<span class="fa fa-star <?= $ulasan->rating >= 3 ? 'checked' : '' ?>"></span>
									<span class="fa fa-star <?= $ulasan->rating >= 4 ? 'checked' : '' ?>"></span>
									<span class="fa fa-star <?= $ulasan->rating == 5 ? 'checked' : '' ?>"></span>
									<br>
									<p><?= $ulasan->deskripsi ?></p>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load('partial.footer') ?>
<script type="text/javascript">
$(".product-gallery-item").click(function(){
	var imgSrc = $(this).data('img-src')
	$(".product-gallery-main img").attr('src',imgSrc)
})
</script>