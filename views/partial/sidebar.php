<?php 
use vendor\zframework\Session; 
use app\Kategori; 
$kategori = Kategori::get();
if(Session::get('id') && Session::user()->level == 'admin'){
?>
				<!-- sidebar section -->
				<ul class="list-group">
					<li class="list-group-item active">Administrator Menu</li>
					<li class="list-group-item">
						<a href="<?= base_url() ?>/admin/member">
							Member
						</a>
					</li>
					<li class="list-group-item">
						<a href="<?= base_url() ?>/admin/kategori">
							Kategori
						</a>
					</li>
					<li class="list-group-item">
						<a href="<?= base_url() ?>/admin/produk">
							Produk
						</a>
					</li>
					<li class="list-group-item">
						<a href="<?= base_url() ?>/admin/transaksi">
							Transaksi
						</a>
					</li>
					<li class="list-group-item">
						<a href="<?= base_url() ?>/admin/hadiah">
							Hadiah
						</a>
					</li>
					<li class="list-group-item">
						<a href="<?= base_url() ?>/admin/brosur">
							Brosur
						</a>
					</li>
					<li class="list-group-item">
						<a href="<?= base_url() ?>/admin/kritik">
							Kritik dan Saran
						</a>
					</li>
					<li class="list-group-item" style="background: #000">
						&nbsp;
					</li>
				</ul>

				<hr>
<?php }elseif(Session::get('id') && Session::user()->level == 'user'){ ?>

				<ul class="list-group">
					<li class="list-group-item active">Member Menu</li>
					<li class="list-group-item">
						<a href="<?=base_url()?>/member/transaksi">
							Transaksi
						</a>
					</li>
					<!-- <li class="list-group-item">
						<a href="#">
							Pembayaran
						</a>
					</li> -->
					<li class="list-group-item">
						<a href="<?= base_url() ?>/member/kritik">
							Kritik dan Saran
						</a>
					</li>
					<!-- <li class="list-group-item">
						<a href="#">
							Profil
						</a>
					</li> -->
					<li class="list-group-item">
						<a href="<?= base_url() ?>/member/hadiah">
							Hadiah
						</a>
					</li>
					<li class="list-group-item" style="background: #000">
						&nbsp;
					</li>
				</ul>

				<hr>

<?php } ?>

				<ul class="list-group">
					<li class="list-group-item active">Semua Produk</li>
					<?php foreach($kategori as $value){ ?>
					<li class="list-group-item">
						<a href="<?=base_url()?>/?kategori=<?= $value->nama ?>">
							<?= $value->nama ?>
						</a>
					</li>
					<?php } ?>
					<li class="list-group-item" style="background: #000">
						&nbsp;
					</li>
				</ul>

				<hr>
				