<?php $this->load('partial.header') ?>

<div class="content-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-3">
				<?php $this->load('partial.sidebar') ?>
			</div>

			<div class="col-sm-12 col-md-9">
				<!-- main content section -->
				<h2>Kritik dan Saran</h2>
				<?php if(isset($_GET['success'])){ ?>
				<div class="alert alert-success">
					<span>Kritik dan saran berhasil di kirim.</span>
				</div>
				<?php } ?>
				<form method="post" action="<?= base_url() ?>/member/kritik/insert">
					<div class="form-group">
						<label>Kriti dan Saran</label>
						<textarea name="kritik" class="form-control" required=""></textarea>
					</div>
					<button class="btn btn-danger"><i class="fa fa-save"></i> Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $this->load('partial.footer') ?>