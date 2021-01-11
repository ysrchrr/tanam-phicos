<?= $this->extend('front/layout/home'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a> <span class="divider"></span></li>
                    <li class="active">Shopping Cart</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2>Shopping Cart</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="cart-info">
                <?php if (count($cart_d)) : ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="image">Image</th>
                                <th>Product</th>
                                <th>Model</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th class="total">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="image"><img alt="IMAGE" src="products/dress33.jpg"></td>
                                <td class="name"><a href="product.html">Black Dress</a></td>
                                <td>Product 14</td>
                                <td>$130.00</td>
                                <td class="quantity">
                                    <input type="text" size="1" value="1" name="quantity">
                                    <input type="image" title="Update" alt="Update" src="img/update.png">
                                    <input type="image" title="Remove" alt="Remove" src="img/remove.png">
                                </td>
                                <td class="total">$130.00</td>
                            </tr>
                            <tr>
                                <td class="image"><img alt="IMAGE" src="products/dress11.jpg"></td>
                                <td class="name"><a href="product.html">Blue Dress</a></td>
                                <td>Product 17</td>
                                <td>$230.00</td>
                                <td class="quantity">
                                    <input type="text" size="1" value="1" name="quantity">
                                    <input type="image" title="Update" alt="Update" src="img/update.png">
                                    <input type="image" title="Remove" alt="Remove" src="img/remove.png">
                                </td>
                                <td class="total">$230.00</td>
                            </tr>
                        </tbody>
                    </table>

                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-4 col-sm-offset-8">
            <div class="cart-totals">
                <table class="table">
                    <tr>
                        <th>Cart Subtotal</th>
                        <td>$360.00</td>
                    </tr>
                    <tr>
                        <th>Shipping</th>
                        <td>Free Shipping</td>
                    </tr>
                    <tr>
                        <th><span>Order Total</span></th>
                        <td>$360.00</td>
                    </tr>
                </table>
                <p>
                    <a class="btn btn-primary" href="checkout.html">
                        Proceed to Checkout
                    </a>
                </p>
            </div>

        </div>

    </div>


</div>

<?= $this->endSection(); ?>