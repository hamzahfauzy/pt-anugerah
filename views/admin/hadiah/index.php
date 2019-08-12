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
				<a href="javascript:void(0)" class="btn btn-danger btn-show-form"><i class="fa fa-upload"></i> Tambah Hadiah</a>
				<p></p>
				<form style="display: none;" class="form-upload" method="post" action="<?= base_url() ?>/admin/hadiah/insert" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" class="form-control">
					</div>
					<div class="form-group">
						<label>Jumlah Transaksi</label>
						<input type="text" name="jumlah_transaksi" class="form-control">
					</div>
					<div class="form-group">						
						<label>File</label>
						<input type="file" name="file" class="form-control">
					</div>
					
					<button class="btn btn-secondary">Simpan</button>
				</form>
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
										<a href="<?= base_url() ?>/admin/hadiah/delete/<?=$gallery->id?>" class="product-name-view"><i class="fa fa-trash"></i> Delete</a>
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