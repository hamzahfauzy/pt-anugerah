<?php $this->load("partial.header") ?>
<div class="content-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-5 m-auto">
				<!-- main content section -->
				<br>
				<div class="login-container">
					<form method="post" action="<?= base_url() ?>/login">
						<center>
							<img src="assets/favicon.png" width="100px">
						</center>
						<p></p>
						<h2 align="center">Login Form</h2>
						<p></p>
						<div class="form-group">
							<label>Email</label>
							<input type="text" name="email" class="form-control" placeholder="Email" required="">
						</div>

						<div class="form-group">
							<label>Kata Sandi</label>
							<input type="password" name="password" class="form-control" placeholder="Kata Sandi" required="">
						</div>

						<div class="form-group">
							<button class="btn btn-danger btn-block"><i class="fa fa-sign-in-alt"></i> Login</button>
							<p></p>
							<center>
								Belum punya akun ? <a href="<?= base_url() ?>/register">Daftar</a>
							</center>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load("partial.footer") ?>
