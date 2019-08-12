<?php use vendor\zframework\Session; ?>
<!DOCTYPE html>
<html>
<head>
	<title>PT. ANUGERAH KARYA ABIWARA 1 - DEALER RESMI HONDA</title>
	<link rel="shortcut icon" href="<?= asset('assets/favicon.png') ?>">
	<!-- Font awesome css load -->
	<link rel="stylesheet" href="<?= asset('font-awesome/css/fontawesome.css') ?>">
	<link rel="stylesheet" href="<?= asset('font-awesome/css/brands.css') ?>">
	<link rel="stylesheet" href="<?= asset('font-awesome/css/solid.css') ?>">
	<link rel="stylesheet" href="<?= asset('bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= asset('css/style.css') ?>">
</head>
<body>
<div class="top-header-section">
	<div class="container">
		<div class="float-left">
			<a href="index.html">
				<img src="<?= asset('assets/img_logo_honda.png') ?>" class="logo1">
			</a>
		</div>
		<div class="float-right">
			<a href="index.html">
				<img src="<?= asset('assets/img_logo_ahm.png') ?>" class="logo2">
			</a>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="middle-navbar">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="<?= base_url() ?>"><i class="fa fa-home"></i> <?= Session::get('id') ? ucwords(Session::user()->nama) : '' ?></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url() ?>/brosur">Brosur <span class="sr-only">(current)</span></a>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link" href="#">Promo</a>
					</li> -->
					<li class="nav-item">
						<a class="nav-link" href="#">Diskon</a>
					</li>
					<?php if(!Session::get('id')){ ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url() ?>/login"><i class="fa fa-sign-in-alt"></i> Log In</a>
					</li>
					<?php }else{ ?>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url() ?>/logout"><i class="fa fa-sign-out-alt"></i> Log Out</a>
					</li>
					<?php } ?>
				</ul>

				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div>
		</div>
	</nav>
</div>

<div class="banner-section">
	<div class="banner-img-container">
		<img src="<?= asset('assets/banner.jpg') ?>" width="100%">
	</div>
</div>

<?php if(Session::get('id')){ ?>
<div class="container">
	<br>
	<?php if(!empty(Session::user()->recommendation())){ ?>
	<div class="alert alert-success" role="alert">
		Selamat! anda berhak mendapatkan hadiah dari kami. untuk melihat daftar hadiah yang bisa anda miliki silahkan klik <a href="<?= base_url() ?>/member/hadiah/rekomendasi">disini</a>.
	</div>
	<?php } ?>
</div>
<?php } ?>