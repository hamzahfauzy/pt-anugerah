<?php $this->load('partial.header') ?>

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
						<?php $no=1; foreach($models as $model){ ?>
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
								<?php if($model->status == 1 && $model->bukti_url){ ?>
									<a href="<?=base_url()?>/admin/transaksi/terima/<?= $model->id?>" class="btn btn-primary">Terima</a>
									<a href="<?=base_url()?>/admin/transaksi/tolak/<?= $model->id?>" class="btn btn-danger">Tolak</a>
								<?php } ?>
								<a href="<?= base_url() ?>/admin/transaksi/show/<?= $model->id ?>" class="btn btn-secondary"><i class="fa fa-eye"></i></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php $this->load('partial.footer') ?>