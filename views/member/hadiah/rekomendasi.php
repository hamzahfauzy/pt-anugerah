<?php set_page("Hadiah"); $this->load("partial.header") ?>
<div class="content-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-3">
				<?php $this->load('partial.sidebar') ?>
			</div>

			<div class="col-sm-12 col-md-9">
				<!-- main content section -->
				<h2>Hadiah</h2>
				
				<p></p>
				<!-- main content section -->
				<div class="product-category">

					<div class="container-fluid">
						<div class="row">
							<?php foreach($model as $gallery){ ?>
							<div class="col-sm-12 col-md-4">
								<div class="product-item">
									<b><?= $gallery->nama ?></b>
									<div class="product-item-image">
										<a href="<?=base_url()?>/<?=$gallery->gambar?>">
										<img src="<?=base_url()?>/<?=$gallery->gambar?>" width="100%">
										</a>
									</div>
									<div class="product-item-button">
										<form method="post" action="<?= base_url() ?>/member/hadiah/simpan">
											<input type="hidden" name="hadiah" value="<?=$gallery->id?>">
											<button class="btn btn-success btn-block"><i class="fa fa-save"></i> Pilih Hadiah Ini</button>
										</form>
									</div>
								</div> 
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load("partial.footer") ?>
<script type="text/javascript">
$('.btn-show-form').click(function(){
	$('.form-upload').show()
})
</script>