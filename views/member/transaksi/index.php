<?php $this->load('partial.header') ?>
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
				<h2>Transaksi</h2>

				<table class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Produk</th>
							<th>Jumlah</th>
							<th>Down Payment</th>
							<th>Bukti</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php if(empty($models)){ ?>
						<tr>
							<td colspan="6"><i>Tidak ada transaksi!</i></td>
						</tr>
						<?php } $no=1; foreach($models as $model){ ?>
						<tr>
							<td><?= $no++ ?></td>
							<td>
								<a href="<?=base_url()?>/detail/<?=$model->produk()->id?>"><?= $model->produk()->nama ?></a><br>
								<?php if($model->status == 1 && empty($model->bukti_url)){ ?>
									<span class="badge badge-warning">Bukti Transaksi Belum dikirim</span>
								<?php }elseif($model->status == 1 && $model->bukti_url){ ?>
									<span class="badge badge-warning">Bukti Transaksi Sudah Dikirim</span>
								<?php }elseif($model->status == 2){ ?>
									<span class="badge badge-success">Transaksi diterima</span>
								<?php }elseif($model->status == 0){ ?>
									<span class="badge badge-danger">Transaksi ditolak</span>
								<?php } ?>
							</td>
							<td><?= $model->jumlah ?></td>
							<td>Rp. <?= number_format($model->down_payment) ?></td>
							<td>
								<?php if($model->bukti_url){ ?>
								<a href="<?=base_url()?>/<?= $model->bukti_url ?>" class="btn btn-success">Bukti</a>
								<?php }else{ ?>
								Bukti belum dikirim
								<?php } ?>
							</td>
							<td>
								<?php if($model->status == 2 && empty($model->ulasan_id)){ ?>
									<a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#ulasan-<?=$model->id?>">Ulasan</a>
								<?php } ?>
								<?php if(!$model->bukti_url && $model->status != 0){ ?>
									<a href="<?= base_url() ?>/member/transaksi/cancel/<?= $model->id ?>" class="btn btn-danger"><i class="fa fa-times"></i></a>
								<?php } ?>
								<a href="<?= base_url() ?>/member/transaksi/show/<?= $model->id ?>" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
							</td>
						</tr>
						<!-- Modal -->
						<form method="post" action="<?=base_url()?>/member/transaksi/ulasan">
						<div class="modal fade" id="ulasan-<?=$model->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Ulasan</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <input type="hidden" name="id" value="<?= $model->id ?>">
						        <div class="form-group">
						        	<label>Rating (1-5)</label>
						        	<input type="number" name="rating" class="form-control" min="1" max="5" required="" placeholder="Rating 1-5">
						       	</div>
						       	<div class="form-group">
						        	<label>Ulasan</label>
						        	<textarea name="ulasan" class="form-control" required="" placeholder="deskripsi ulasan"></textarea>
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
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- JS code -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<?php $this->load('partial.footer') ?>