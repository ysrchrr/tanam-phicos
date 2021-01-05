<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url()?>/front-assets/img/logo.png">
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>/front-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>/front-assets/css/bootstrap-select.css">
	<link rel='stylesheet' type='text/css' href='<?= base_url()?>/front-assets/css/font-awesome.min.css'/>
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>/front-assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:200,300,400,600,700' rel='stylesheet' type='text/css'/>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:200,300,400,600,700' rel='stylesheet' type='text/css'/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
					<img src="<?= base_url()?>/front-assets/img/logo.png" alt="Sapphire">Sapphire
				</a>
			  </div>
                 <div class="navbar-collapse collapse navbar-right">
					<ul class="nav navbar-nav">
                      <li><a href="<?= base_url('/front') ?>">Home</a></li>
                      <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li class="dropdown-header">sliders</li>
                          <li><a href="nivo-slider.html">Nivo slider</a></li>
                          <li><a href="flexslider.html" class="ajax_right">Flexslider</a></li>
                          <li><a href="index.html" class="ajax_right">Camera</a></li>
						  <li class="divider"></li>
                          <li class="dropdown-header">ecommerce</li>
                          <li><a href="category.html">Category page</a></li>
                          <li><a href="category_menu.html">Category page left menu</a></li>
                          <li><a href="product.html" class="ajax_right">Product page</a></li>
                          <li><a href="cart.html" class="ajax_right">Cart</a></li>
                          <li><a href="checkout.html" class="ajax_right">Checkout</a></li>
						  <li class="divider"></li>
						  <li class="dropdown-submenu">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">Blog</a>
							  <ul class="dropdown-menu">                          
								  <li><a href="blog.html" class="ajax_right">Blog</a></li>
								  <li><a href="blog-post.html" class="ajax_right">Blog post</a></li>
							  </ul>
							 </li>
                        </ul>
                      </li>
                      <li class="active"><a href="<?= base_url('/front/product/') ?>">Our Products</a></li>
                      <li><a href="contact.html" class="ajax_right">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-right cart">
                      <li class="dropdown">
					<a href="cart.html" class="dropdown-toggle" data-toggle="dropdown"><span>5</span></a>
					<div class="cart-info dropdown-menu">
						<table class="table">
							<thead>
							</thead>
							<tbody>
								<tr>
									<td class="image"><img alt="IMAGE" class="img-responsive" src="<?= base_url()?>/front-assets/products/dress33.jpg"></td>
									<td class="name"><a href="project.html">Black Dress</a></td>
									<td class="quantity">x&nbsp;3</td>
									<td class="total">$130.00</td>
									<td class="remove"><img src="<?= base_url()?>/front-assets/image/remove-small.png" alt="Remove" title="Remove"></td>											
								</tr>
								<tr>
									<td class="image"><img alt="IMAGE" class="img-responsive" src="<?= base_url()?>/front-assets/products/dress11.jpg"></td>
									<td class="name"><a href="project.html">Blue Dress</a></td>
									<td class="quantity">x&nbsp;3</td>
									<td class="total">$230.00</td>
									<td class="remove"><img src="<?= base_url()?>/front-assets/image/remove-small.png" alt="Remove" title="Remove"></td>											
								</tr>
							</tbody>									
						</table>
						<div class="cart-total">
						  <table>
							 <tbody>
								<tr>
								  <td><b>Sub-Total:</b></td>
								  <td>$400.00</td>
								</tr>
								<tr>
								  <td><b>Total:</b></td>
								  <td>$400.00</td>
								</tr>
							</tbody>
						  </table>
						  <div class="checkout"><a href="cart.html" class="ajax_right">View Cart</a> | <a href="checkout.html" class="ajax_right">Checkout</a></div>
						</div>
					</div> 
			      </li>
			     </ul>

                    <form action="" class="navbar-form navbar-search navbar-right" method="get" role="search" autocomplete="off">
		      			<div class="input-group"> 
							<input type="text" name="search" placeholder="Search" class="search-query col-lg-6"><button type="submit" class="btn btn-default icon-search"></button> 
						</div>
                    </form>
                  </div>
			</nav>		
	</div>
<!-- End Header -->
    <div class="container">
		    <ul class="breadcrumb prod">
			    <li><a href="<?= base_url('/front')?>">Home</a>
                <span class="divider"></span></li>
			    <li><a href="<?= base_url()?>/front/product/<?= $id_category; ?>"><?=$category;?></a>
                <span class="divider"></span></li>
				<li class="active"><?= $name; ?></li>
		    </ul>

		<div class="row product-info">
		    <div class="col-md-6">
				<div class="image">
                    <a class="cloud-zoom" rel="adjustX: 0, adjustY:0" id='zoom1' href="<?= $link_img; ?>" title="<?= $name; ?>">
                        <img src="<?= $link_img; ?>" title="<?= $name; ?>" alt="<?= $name; ?>" id="image"/>
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
				<h1><?=$name;?> (<?=$other_name;?>)</h1>
				    <div class="line"></div>
						<ul>
							<li><span>Brand:</span> <a href="#">Shop Online</a></li>
							<li><span>Product Code:</span> Product 001</li>
							<li><span>Availability: </span>In Stock</li>
						</ul>
					<div class="price">
						Price <span class="strike">$150.00</span> <strong>$125.00</strong>
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
						<option>Red</option>
						<option>Blue</option>
						<option>Green</option>
					</select>
					<select class="selectpicker" data-width="150px">
						<option>180 cm</option>
						<option>160 cm</option>
						<option>140 cm</option>
					</select>
					<div class="line"></div>
					<form class="form-inline">
						<button class="btn btn-primary" style="margin-right: 20px;" type="button">Add to Cart</button>
						<label>Quantity:</label> <input type="text" placeholder="1" class="col-md-1">
					</form>

					<div class="tabs" id="tabs">
						<ul class="nav nav-tabs" id="myTab">
							<li class="tab-li active"><a href="#tabs-1">Description</a></li>
							<li class="tab-li"><a href="#tabs-2">Specification</a></li>
							<li class="tab-li"><a href="#tabs-3">Reviews</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tabs-1">When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then </div>
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
							<div class="tab-pane" id="tabs-3">
								<p>There are no reviews yet, would you like to <a href="#review_btn">submit yours?</a></p>
								<h3>Be the first to review “Blue Dress” </h3>
							<form>
								<fieldset>
									<label>Name<span class="required">*</span></label>
									<input type="text" placeholder="Name">
									<label>Email<span class="required">*</span></label>
									<input type="text" placeholder="Email">		
									<label class="rating">Rating</label>
									<img alt="rating" src="image/stars-5.png">								
								</fieldset>
							</form>
								<label>Your Review<span class="required">*</span></label>
								<textarea rows="3"></textarea>
							<p id="review_btn">
								<button class="btn btn-default" type="button">Submit Review</button>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<h3 class="related">Related products</h3>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-3">
					<div class="product">
						<div class="product_sale">Sale</div>
						<a href="product.html"><img alt="dress1home" src="products/dress1home.jpg"></a>
						<div class="name">
							<a href="#">Elegant Dress</a>
						</div>
						<div class="price">
							<p>$200.00</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer black">
		<div class="container">
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
		        
		        <!-- div class="col-md-3 twitter">
					<div class="row">
						<h3>Follow us</h3>
						<script type="text/javascript" src="js/twitterFetcher_v9_min.js"></script>
						<ul id="twitter_update_list"><li class="col-md-2">Twitter feed loading</li></ul>			
						<script>twitterFetcher.fetch('256524641194098690', 'twitter_update_list', 2, true, true, false);</script> 
					</div>				
				</div-->	
				<div class="col-md-3">
				</div>
				
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
</div>

<script type="text/javascript" src="<?=base_url()?>/front-assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>/front-assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>/front-assets/js/cloud-zoom.1.0.3.js"></script>
<script type="text/javascript" src="<?=base_url()?>/front-assets/js/sapphire.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
  $(".nav-tabs a").click(function(e){
	e.preventDefault()
    $(this).tab('show');
  });
});
</script>
<script>
	$.fn.CloudZoom.defaults = {
		zoomWidth:"auto",
		zoomHeight:"auto",
		position:"inside",
		adjustX:0,
		adjustY:0,
		adjustY:"",
		tintOpacity:0.5,
		lensOpacity:0.5,
		titleOpacity:0.5,
		smoothMove:3,
		showTitle:false};
</script>
</body>
</html>
