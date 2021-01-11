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

    <?php if (count($cart_d) > 0) { ?>
        <div class="row">
            <div class="col-md-12">
                <div class="cart-info">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="image" colspan="2">Produk</th>
                                <!-- <th>Product</th> -->
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th class="total">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cart_d as $cd) : ?>
                                <tr>
                                    <?php foreach ($gambar as $g) : ?>
                                        <?php if ($g['id_barang'] == $cd['id_barang']) : ?>
                                            <td class="image"><img alt="IMAGE" src="<?= $g['link_gambar']; ?>"></td>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <td class="name"><a href="product.html"><?= $cd['nama_barang']; ?></a></td>
                                    <td><?= $cd['harga_barang']; ?></td>
                                    <td class="quantity">
                                        <form style="display: inline;" action="<?= base_url(); ?>/front/update_cart" method="post">

                                            <input type="hidden" name="id_cart" value="<?= $cd['id_cart']; ?>">
                                            <input type="hidden" name="id_barang" value="<?= $cd['id_barang']; ?>">
                                            <input style="width: 50px;" name="jumlah" type="number" size="1" value="<?= $cd['sub_jumlah']; ?>" name="quantity" min="1" oninput="this.value =!!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : 1">
                                        </form>
                                        <!-- <input type="image" title="Update" alt="Update" src="<?= base_url(); ?>/front-assets/img/update.png"> -->
                                        <a href="<?= base_url(); ?>/front/hapus_cart/<?= $cd['id_cart']; ?>/<?= $cd['id_barang']; ?>"><img src="<?= base_url(); ?>/front-assets/img/remove.png" alt=""></a>

                                    </td>
                                    <td class="total"><?= $cd['sub_total']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-4 col-sm-offset-8">
                <div class="cart-totals">
                    <table class="table">
                        <tr>
                            <th>Sub Total</th>
                            <td><?= $cart['total']; ?></td>
                        </tr>
                        <tr>
                            <th>Biaya Pengiriman</th>
                            <td>Gratis</td>
                        </tr>
                        <tr>
                            <th><span>Total</span></th>
                            <td><?= $cart['total']; ?></td>
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
    <?php } else { ?>
        <div class="box padding text-center">
            <h3>KERANJANG ANDA MASIH KOSONG</h3>
        </div>

    <?php } ?>


</div>

<?= $this->endSection(); ?>