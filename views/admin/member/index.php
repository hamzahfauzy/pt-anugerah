<?php $this->load('partial.header') ?>

<div class="content-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-3">
				<?php $this->load('partial.sidebar') ?>
			</div>

			<div class="col-sm-12 col-md-9">
				<!-- main content section -->
				<h2>Member</h2>

				<table class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Email</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach($members as $member){ ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $member->nama ?></td>
							<td><?= $member->alamat ?></td>
							<td><?= $member->email ?></td>
							<td>
								<a href="<?= base_url() ?>/admin/member/delete/<?= $member->id ?>" class="text-warning"><i class="fa fa-trash"></i> Hapus</a>
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