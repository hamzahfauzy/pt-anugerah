<?php set_page("Produk"); $this->load("partial.header") ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

<div class="content-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-3">
				<?php $this->load('partial.sidebar') ?>
			</div>

			<div class="col-sm-12 col-md-9">
				<!-- main content section -->
				<h2>Produk</h2>
				<a href="<?= base_url() ?>/admin/produk/create" class="btn btn-danger"><i class="fa fa-plus"></i> Tambah</a>
				<p></p>

				<table class="table table-striped">
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Stok</th>
						<th>Gallery</th>
						<th></th>
					</tr>
					<?php if(empty($model)){ ?>
					<tr>
						<td colspan="3"><i>Tidak ada data</i></td>
					</tr>
					<?php } ?>

					<?php $no=1; foreach($model as $rs): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td>
							<?= $rs->nama ?><br>
							<b>Rp. <?= number_format($rs->harga) ?></b><br>
							<?php if($rs->diskon()): ?>
							<span>Diskon : <b><?=$rs->diskon->jumlah?>%</b></span><br>
							<a href="<?= base_url() ?>/admin/produk/hapus-diskon/<?=$rs->diskon->id?>">Hapus Diskon</a>
							<?php else: ?>
							<a href="javascript:void(0)" data-toggle="modal" data-target="#diskon-<?=$rs->id?>">Buat Diskon</a>
							<?php endif; ?>
						</td>
						<td>
							<?= $rs->stok ?>
						</td>
						<td>
							<a href="<?= base_url() ?>/admin/produk/show/<?=$rs->id?>/gallery" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
						</td>
						<td>
							<a href="<?= base_url() ?>/admin/produk/edit/<?=$rs->id?>" class="btn btn-sm btn-success"><i class="fa fa-pencil-alt"></i></a>
							<a href="<?= base_url() ?>/admin/produk/delete/<?=$rs->id?>" class="btn btn-sm btn-warning"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<!-- Modal -->
					<form method="post" action="<?=base_url()?>/admin/produk/diskon">
					<div class="modal fade" id="diskon-<?=$rs->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Buat Diskon</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        	<input type="hidden" name="id" value="<?= $rs->id ?>">
					        	<div class="form-group">
					        		<label>Jumlah (%)</label>
					        		<input type="tel" name="jumlah" class="form-control">
					        	</div>
					        	<p></p>
					      </div>
					      <div class="modal-footer">
					        <button class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					      </div>
					    </div>
					  </div>
					</div>
					</form>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- JS code -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<?php $this->load("partial.footer") ?>
