<!doctype html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?= base_url() ?>/front-assets/img/logo.png">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/front-assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/front-assets/css/bootstrap-select.css">
	<link rel='stylesheet' type='text/css' href='<?= base_url(); ?>/front-assets/css/font-awesome.min.css' />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/front-assets/css/camera.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/front-assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:200,300,400,600,700' rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:200,300,400,600,700' rel='stylesheet' type='text/css' />
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<title><?= $title; ?></title>
</head>

<body>
	<div class="page-container">
		<!-- Start Header -->
		<div class="header">
			<nav class="navbar container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="<?= base_url('/front') ?>" class="navbar-brand">
						<img src="<?= base_url() ?>/front-assets/img/logo.png" alt="Sapphire">Sapphire
					</a>
				</div>
				<div class="navbar-collapse collapse navbar-right">
					<ul class="nav navbar-nav">
						<li class="active"><a href="<?= base_url('/front') ?>">Shop</a></li>
						<li class=""><a href="<?= base_url('/blog') ?>">Blog</a></li>
						<li><a href="<?= base_url('/front/product/') ?>">Our Products</a></li>
						<li><a href="contact.html" class="ajax_right">Consultation</a></li>
						<?php if (session()->get('login')) { ?>
							<li class="dropdown">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#">Profile <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="<?= base_url(); ?>/account">Account</a></li>
									<li><a href="<?= base_url(); ?>/account/logout" class="ajax_right">Logout</a></li>
								</ul>
							</li>
						<?php } else { ?>
							<li><a href="<?= base_url(); ?>/login" class="ajax_right">Login</a></li>
						<?php } ?>
					</ul>

					<ul class="nav navbar-right cart">
						<li class="dropdown">
							<?php if (count($cart_d) > 0) { ?>
								<a href="<?= base_url(); ?>/front/cart" class="dropdown-toggle" data-toggle="dropdown"><span><?= count($cart_d); ?></span></a>
								<div class="cart-info dropdown-menu text-center">
									<table class="table">
										<thead>
											<tr>
												<td></td>
												<td>Nama</td>
												<td>Jumlah</td>
												<td>Harga</td>
											<tr>
										</thead>
										<tbody>
											<?php foreach ($cart_d as $cd) : ?>
												<tr>
													<?php foreach ($gambar as $g) : ?>
														<?php if ($g['id_barang'] == $cd['id_barang']) : ?>
															<td class="image"><img alt="IMAGE" class="img-responsive" src="<?= $g['link_gambar']; ?>"></td>
														<?php endif; ?>
													<?php endforeach; ?>
													<td class="name"><a href="project.html"><?= $cd['nama_barang']; ?></a></td>
													<td class="quantity"><?= $cd['sub_jumlah']; ?></td>
													<td class="total"><?= $cd['sub_total']; ?></td>
													<td class="remove"><img src="<?= base_url() ?>/front-assets/image/remove-small.png" alt="Remove" title="Remove"></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
									<div class="cart-total">
										<table>
											<tbody>
												<tr>
													<td><b>Total:</b></td>
													<td>Rp. <?= $cart['total']; ?></td>
												</tr>
											</tbody>
										</table>
										<div class="checkout"><a href="<?= base_url(); ?>/front/view_cart" class="ajax_right">View Cart</a> | <a href="<?= base_url(); ?>/front/checkout" class="ajax_right">Checkout</a></div>

									</div>

								</div>
							<?php } else { ?>
								<a href="<?= base_url(); ?>/front/cart" class="dropdown-toggle" data-toggle="dropdown"><span>0</span></a>
								<div class="cart-info dropdown-menu text-center">
									<h3> Keranjang masih kosong</h3>
								</div>
							<?php } ?>
						</li>
					</ul>

					<form action="<?= base_url(); ?>/cari" class="navbar-form navbar-search navbar-right" method="get" role="search" autocomplete="off">
						<div class="input-group">
							<input type="text" name="search" placeholder="Search" class="search-query col-lg-6"><button type="submit" class="btn btn-default icon-search"></button>
						</div>
					</form>
				</div>
			</nav>
		</div>
		<!-- End Header -->

		<!-- Start Main Content -->
		<?= $this->renderSection('content'); ?>
		<!-- End Main Content -->


		<!-- Start Footer -->
		<div class="footer black">
			<div class="container">
				<!-- <div class="arrow"><a href="#" class="caret">To Top</a></div> -->
				<div class="row">
					<div class="col-md-3">
						<div>
							<h3>Information</h3>
							<ul>
								<li><a href="about.html">About Us</a></li>
								<li><a href="#">Delivery Information</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Terms & Conditions</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3">
						<div>
							<h3>Customer Service</h3>
							<ul>
								<li><a href="contact.html" class="ajax_right">Contact Us</a></li>
								<li><a href="#">Returns</a></li>
								<li><a href="#">Site Map</a></li>
								<li><a href="#">Shipping</a></li>
							</ul>
						</div>
					</div>
					<!-- <div class="col-md-3 twitter">
					<div class="row">
						<h3>Follow us</h3>
						<script type="text/javascript" src="js/twitterFetcher_v9_min.js"></script>
						<ul id="twitter_update_list"><li class="col-md-2">Twitter feed loading</li></ul>
						<script>twitterFetcher.fetch('256524641194098690', 'twitter_update_list', 2, true, true, false);</script> 
					</div>				
				</div> -->
					<div class="col-md-3"></div>
					<div class="col-md-3 social">
						<div class="copy">Copyright &copy; nicole_89</div>
						<ul class="social-network">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
							<li><a href="#"><i class="fa fa-rss"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer -->
	</div>

	<script type="text/javascript" src="<?= base_url(); ?>/front-assets/js/jquery-1.10.2.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.provinsi').select2();
			$('.kota').select2();
			$('.kecamatan').select2();
		});
	</script>

	<script type="text/javascript" src="<?= base_url(); ?>/front-assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>/front-assets/js/bootstrap-select.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>/front-assets/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>/front-assets/js/camera.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>/front-assets/js/sapphire.js"></script>
	<script>
		$(document).ready(function() {
			jQuery('#slideshow0 > div').camera({
				alignment: "center",
				autoAdvance: true,
				mobileAutoAdvance: true,
				barDirection: "leftToRight",
				barPosition: "bottom",
				cols: 6,
				easing: "easeInOutExpo",
				mobileEasing: "easeInOutExpo",
				fx: "random",
				mobileFx: "random",
				gridDifference: 250,
				height: "auto",
				hover: true,
				loader: "pie",
				loaderColor: "#eeeeee",
				loaderBgColor: "#222222",
				loaderOpacity: 0.3,
				loaderPadding: 2,
				loaderStroke: 7,
				minHeight: "200px",
				navigation: true,
				navigationHover: true,
				mobileNavHover: true,
				opacityOnGrid: false,
				overlayer: true,
				pagination: true,
				pauseOnClick: true,
				playPause: true,
				pieDiameter: 38,
				piePosition: "rightTop",
				portrait: false,
				rows: 4,
				slicedCols: 12,
				slicedRows: 8,
				slideOn: "random",
				thumbnails: false,
				time: 7000,
				transPeriod: 1500,
				imagePath: '../image/'
			});
		});
	</script>
</body>

</html>