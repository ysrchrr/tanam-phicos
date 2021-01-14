<?= $this->extend('front/layout/home'); ?>
<?= $this->section('content'); ?>
<!-- Start Main Content -->
<div class="container">
	<div class="row">
		<div class="col-md-12 slideshow">
			<div id="slideshow0">
				<div class="camera_wrap camera_emboss camera_white_skin">
					<img src="<?= base_url() ?>/front-assets/image/sub.jpg" alt="Banner 1" />
					<div data-thumb="<?= base_url() ?>/front-assets/img/slideshow/buy-plants-succlents.jpg" data-src="<?= base_url() ?>/front-assets/img/slideshow/slide01.jpg">
					</div>
					<div data-thumb="<?= base_url() ?>/front-assets/img/slideshow/slide02.jpg" data-src="<?= base_url() ?>/front-assets/img/slideshow/slide02.jpg">
					</div>
					<div data-thumb="<?= base_url() ?>/front-assets/img/slideshow/slide03.png" data-src="<?= base_url() ?>/front-assets/img/slideshow/slide03.png" data-link="#">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 left-menu">
			<div class="sidebar">
				<ul>
					<?php $i = 1;
					foreach ($category->getresultarray() as $row) : ?>
						<li><a href="<?= base_url(); ?>/product/<?= $row['slug_kategori']; ?>"><?= $row['nama_kategori']; ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="options">
				<h3>Pilih salah satu</h3>
				<select class="selectpicker" data-width="150px">
					<option>EN</option>
					<option>IT</option>
					<option>FR</option>
				</select>
				<select class="selectpicker" data-width="150px">
					<option>Euro</option>
					<option>Pounds</option>
					<option>US Dollars</option>
				</select>
			</div>
		</div>
		<div class="col-md-9">
			<div class="row">
				<div class="tampil_tanaman">
					<?php foreach ($product as $row) : ?>
						<div class="col-md-4">
							<div class="product">
								<a href="<?= base_url(); ?>/product/<?= $row['slug_kategori']; ?>/<?= $row['slug_barang']; ?>">
									<img src="<?= base_url() . '/front-assets/img/plant/' . $row['link_gambar']; ?>" alt="<?= $row['nama_barang']; ?>">
								</a>
								<div class="name">
									<a href="<?= base_url(); ?>/product/<?= $row['slug_kategori']; ?>/<?= $row['slug_barang']; ?>"><?= $row['nama_barang']; ?> (<?= $row['nama_lain']; ?>)</a>
								</div>
								<div class="price">
									<p>Rp. <?= $row['harga_barang']; ?></p>
									<p>Stock : <?= $row['stok_barang']; ?></p>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="pull-right">
						<?= $pager->links() ?>
					</div>
				</div>
				<div class="col-md-12">
					<div class="newsletter clearfix">
						<h3>Newsletter</h3>
						<div>
							<input type="text" name="email" class="email">
							<input type="submit" value="Subscribe" class="btn btn-primary">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Main Content -->
<?= $this->endSection(); ?>