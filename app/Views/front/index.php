<?= $this->extend('front/layout/template'); ?>
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
					foreach ($sub_kategori1->getresultarray() as $s) : ?>
						<li><a href="<?= base_url(); ?>/kategori/<?= $s['id_sub_kategori']; ?>"><?= $s['nama']; ?></a></li>
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
								<a href="#">
									<img src="<?= $row->link_gambar; ?>" alt="<?= $row->nama_barang; ?>">
								</a>
								<div class="name">
									<a href="#"><?= $row->nama_barang; ?> (<?= $row->nama_lain; ?>)</a>
								</div>
								<div class="price">
									<p>Rp. <?= $row->harga_barang; ?></p>
									<p>Stock : <?= $row->stok_barang; ?></p>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="tampil_halaman">

				</div>
				<div class="row">
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

	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function() {
			// load_dudi(1);
			tampildata(1);
			// halo();


			function tampildata(page) {
				var action = "tampildata";
				var kategori = ambilkelas('kategori');
				$.ajax({
					url: "<?= base_url(); ?>front/tampildata/" + page,
					method: "post",
					dataType: "json",
					data: {
						action: action,
						kategori: kategori,
					},

					success: function(data) {
						$('.tampil_tanaman').html(data.tampil_lowongan);
						$('.tampil_halaman').html(data.tampil_halaman);
						// $('.data_filter_halaman').html(data.halaman);
						// console.log();

					},
					error: function(xhr, ajaxOptions, thrownError) {
						console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
						// console.log(Error);
					}

				});
			}


			$('.ambildata').click(function() {
				tampildata(1);
				// load_dudi(1);
			});

			$('.caridata').click(function(e) {
				e.preventDefault();
				// alert("aaa");
				console.log("aa");
				// tampildata(1);
				// load_dudi(1);

			});

			// $(document).on("click", ".ambildata", function(e) {
			//     e.preventDefault();
			//     var page = $(this).data("ci-pagination-page");
			//     // tampildata(page);
			//     load_dudi(page);
			// });

			function ambilkelas(class_name) {
				var filter = [];
				$('.' + class_name + ':checked').each(function() {
					filter.push($(this).val());
				});

				return filter;
			}


			// $('#data_order').change(function() {
			//     tampildata(1);
			//     // load_dudi(1);

			// });


			$(document).on("click", ".pagination li a", function(e) {
				e.preventDefault();
				var page = $(this).data("ci-pagination-page");
				tampildata(page);
				// load_dudi(page);
			});
		});



		// $(document).ready(function() {
		//     // data_lowongan();

		//     $('.klik').click(function() {
		//         alert('oke');


		//     });
		// })
	</script>
	<!-- End Main Content -->


	<?= $this->endSection(); ?>