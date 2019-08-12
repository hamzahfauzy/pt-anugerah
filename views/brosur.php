<?php $this->load('partial.header') ?>

<div class="content-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php foreach ($brosur as $key => $value) {
					echo "<img src='".$value->file_url."' width='100%'><br>";
				} 
				?>
			</div>
		</div>
	</div>
</div>

<?php $this->load('partial.footer') ?>