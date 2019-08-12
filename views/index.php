<?php $this->load('partial.header') ?>

<div class="content-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-3">
				<?php $this->load('partial.sidebar') ?>
			</div>

			<div class="col-sm-12 col-md-9">
				<!-- main content section -->
				<?php foreach($kategori as $value): ?>
				<div class="product-category">
					<h2 class="category-name"><?= $value->nama ?></h2>
					<div class="line"></div>

					<div class="container-fluid">
						<div class="row">
							<?php if(!$value->produks()) echo "Tidak ada produk"; ?>
							<?php foreach($value->produks as $produk): ?>
							<div class="col-sm-12 col-md-4">
								<div class="product-item">
									<div class="product-item-image">
										<?php if($produk->diskon()){ ?>
										<div class="ribbon">Diskon <?= $produk->diskon->jumlah ?>%</div>
										<?php } ?>
										<img src="<?= base_url() ?>/<?= $produk->gallery()[0]->file_url ?>" width="100%">
									</div>
									<div class="product-item-button">
										<div class="row clear-margin">
											<div class="col-sm-12 col-md-9 clear-padding">
												<a href="<?= base_url() ?>/beli/<?= $produk->id ?>" class="product-name-link"><?= $produk->nama ?></a>
											</div>

											<div class="col-sm-12 col-md-3 clear-padding">
												<a href="<?= base_url() ?>/detail/<?= $produk->id ?>" class="product-name-view"><i class="fa fa-eye"></i></a>
											</div>
										</div>
									</div>
								</div> 
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<?php endforeach; ?>

				
			</div>
		</div>
	</div>
</div>

<?php $this->load('partial.footer') ?>