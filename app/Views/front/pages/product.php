<?= $this->extend('front/layout/home'); ?>
<?= $this->section('content'); ?>
<div class="container">
	<ul class="breadcrumb prod">
		<li><a href="<?= base_url('/') ?>">Home</a>
			<span class="divider"></span>
		</li>
		<li><a href="<?= base_url() ?>/product/<?= $slug_category; ?>"><?= $category; ?></a>
			<span class="divider"></span>
		</li>
		<li class="active"><?= $name; ?></li>
	</ul>

	<div class="row product-info">
		<input type="hidden" value="<?= $id; ?>" id="id_barang">
		<div class="col-md-6">
			<div class="image">
				<a class="cloud-zoom" rel="adjustX: 0, adjustY:0" id='zoom1' href="<?= $link_img; ?>" title="<?= $name; ?>">
					<img src="<?= $link_img; ?>" title="<?= $name; ?>" alt="<?= $name; ?>" id="image" />
				</a>
			</div>
			<!-- <div class="image-additional">
					<a title="Dress" rel="useZoom: 'zoom1', smallImage: 'products/dress1home.jpg'" class="cloud-zoom-gallery" href="products/dress1home.jpg"><img alt="Dress" title="Dress" src="products/dress1home.jpg"></a>
					<a title="Dress" rel="useZoom: 'zoom1', smallImage: 'products/dress5home.jpg'" class="cloud-zoom-gallery" href="products/dress5home.jpg"><img alt="Dress" title="Dress" src="products/dress5home.jpg"></a>
					<a title="Dress" rel="useZoom: 'zoom1', smallImage: 'products/dress6home.jpg'" class="cloud-zoom-gallery" href="products/dress6home.jpg"><img alt="Dress" title="Dress" src="products/dress6home.jpg"></a>
					<a title="Dress" rel="useZoom: 'zoom1', smallImage: 'products/dress4home.jpg'" class="cloud-zoom-gallery" href="products/dress4home.jpg"><img alt="Dress" title="Dress" src="products/dress4home.jpg"></a>
				</div> -->
		</div>
		<div class="col-md-6">
			<h1><?= $name; ?> (<?= $other_name; ?>)</h1>
			<div class="line"></div>
			<ul>
				<li><span>Jenis Tanaman:</span> <a href="#"><?= $category; ?></a></li>
				<!-- <li><span>Product Code:</span> Product 001</li> -->
				<li><span>Ketersediaan: </span>Tersedia</li>
			</ul>
			<div class="price">
				Harga : &nbsp;
				<!-- <span class="strike">$150.00</span>  -->
				<strong>Rp. <?= $price; ?></strong>
			</div>
			<!--
						<span class="price-tax">Ex Tax: $400.00</span>
						    <div class="control-group">
							<label class="control-label">Color<span class="required">*</span></label>
					            <div class="controls">
									<select>
										<option>Please Select...</option>
										<option>Blue</option>
										<option>Red</option>
										<option>Black</option>
									</select>
								</div>
							</div>
						    <div class="control-group">
									<label class="control-label">Size<span class="required">*</span></label>
					            <div class="controls">
									<select>
										<option>Please Select...</option>
										<option>XXS</option>
										<option>XS</option>
										<option>S</option>
									</select>
								</div>
							</div> -->

			<select class="selectpicker" data-width="150px">
				<option readonly>Pilih Warna</option>
				<option>Red</option>
				<option>Blue</option>
				<option>Green</option>
			</select>

			<div class="line"></div>
			<!-- <form class="form-inline"> -->
			<button class="btn btn-primary" id="add-cart" style="margin-right: 20px;">Add to Cart</button>
			<label>Quantity:</label> <input type="text" id="jumlah_barang" placeholder="1" value="1" class="col-md-1">
			<!-- </form> -->

			<div class="tabs" id="tabs">
				<ul class="nav nav-tabs" id="myTab">
					<li class="tab-li active"><a href="#tabs-1">Description</a></li>
					<!-- <li class="tab-li"><a href="#tabs-2">Specification</a></li> -->
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tabs-1"><?= $description; ?></div>
					<div class="tab-pane" id="tabs-2">
						<table class="table specs">
							<tr>
								<th>Color</th>
								<th>Size</th>
								<th>Weight</th>
							</tr>
							<tr>
								<td>Blue</td>
								<td>XS</td>
								<td>1.00</td>
							</tr>
							<tr>
								<th>Composition</th>
								<th>Sleeve</th>
								<th>Care</th>
							</tr>
							<tr>
								<td>100% Cotton</td>
								<td> Long Sleeve</td>
								<td>IRON AT 110ºC MAX</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- front-assets/products/dress1home.jpg -->
	<h3 class="related">Related products</h3>
	<div class="row">
		<div class="col-md-12">
			<?php foreach ($related_product as $row) : ?>
				<div class="col-md-3">
					<div class="product">
						<div class="product_sale">Sale</div>
						<a href="<?= base_url(); ?>/product/<?= $row['slug_kategori']; ?>/<?= $row['slug_barang']; ?>"><img alt="<?= $row['nama_barang'] ?>" src="<?= $row['link_gambar'] ?>"></a>
						<div class="name">
							<a href="<?= base_url(); ?>/product/<?= $row['slug_kategori']; ?>/<?= $row['slug_barang']; ?>"><?= $row['nama_barang'] ?></a>
						</div>
						<div class="price">
							<p><?= $row['harga_barang'] ?></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
	$(document).ready(function() {
		// alert('aaa');
		$('#add-cart').click(function() {

			console.log(<?= session()->get('login') ?>)
			var login = '<?= session()->get('login') ?>';
			if (login != '') {
				// alert('aaa');
				tampilcart();
			} else {

				window.location = "<?= base_url(); ?>/daftar";
			}


		});



		function tampilcart() {
			var action = "ambildatabarang";
			var id_barang = $('#id_barang').val();
			var jumlah_barang = $('#jumlah_barang').val();
			$.ajax({
				url: "<?= base_url(); ?>/front/tambahcart",
				method: "post",
				dataType: "json",
				data: {
					action: action,
					id_barang: id_barang,
					jumlah_barang: jumlah_barang
				},

				success: function(data) {
					$('.inicart').html(data.sukses);
					// console.log(data.sukses);
					// $('#harga').html(data.barang.harga);
				},
				error: function(xhr, ajaxOptions, thrownError) {
					console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
				}

			});
		}

	});
</script>

<?= $this->endSection(); ?>