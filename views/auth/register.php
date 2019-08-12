<?php $this->load("partial.header") ?>
<div class="content-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-5 m-auto">
				<!-- main content section -->
				<br>
				<div class="login-container">
					<form method="post" action="<?= base_url() ?>/register">
						<center>
							<img src="assets/favicon.png" width="100px">
						</center>
						<p></p>
						<h2 align="center">Daftar Form</h2>
						<p></p>
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input type="text" name="nama" class="form-control" required="" placeholder="Nama Pengguna">
						</div>

						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" required="" name="alamat" placeholder="alamat"></textarea>
						</div>

						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select class="form-control" required="" name="jenis_kelamin">
								<option value="">-Pilih-</option>
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" required="" placeholder="Nama Pengguna">
						</div>

						<div class="form-group">
							<label>Kata Sandi</label>
							<input type="password" name="password" class="form-control" required="" placeholder="Kata Sandi">
						</div>

						<div class="form-group">
							<button class="btn btn-danger btn-block"><i class="fa fa-sign-in-alt"></i> Login</button>
							<p></p>
							<center>
								Sudah punya akun ? <a href="<?= base_url() ?>/login">Login</a>
							</center>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load("partial.footer") ?>
