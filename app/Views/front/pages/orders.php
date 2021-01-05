<?= $this->extend('front/layout/home'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="container">
        <div class="col-md-12 mb-2">
            <h3>
                Pengaturan Akun
            </h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="container">
        <div class="col-md-4">
            <div class="card" style="width: 100%;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="<?= base_url(); ?>/account">Profil</a></li>
                    <li class="list-group-item"><a href="<?= base_url(); ?>/account/address">Alamat</a></li>
                    <li class="list-group-item"><a style="font-weight: 600;" href="<?= base_url(); ?>/account/orders">Pesanan</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box padding">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <small>Status</small>
                                    <p style="font-weight: 800;">Pesanan Selesai</p>
                                </div>
                                <div class="col-md-6">
                                    <small>Total Belanja</small>
                                    <p style="font-weight: 800;color:green">Rp. 150.000</p>
                                </div>
                            </div>
                            <hr style="margin: 0;">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <small>Total Harga Produk</small>
                                    <p style="font-weight: 800;color:green">Rp. 100.000</p>
                                </div>
                                <div class="col-md-8 mt-1">
                                    <img style="width: 100px;height: 100px;" src="https://www.thegardenstore.sg/image/cache/catalog/products/Plant/Aloe%20vera%20Small-460x460.png" alt="">
                                    <label style="margin-top: 10px;color:black;">Aglaonema Hybrid White<p style="margin-bottom: 0;font-weight:500;color:green">Rp. 100.000</p>
                                        <label for="" style="font-weight: 500;">1 Produk</label>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="row text-center">
                                <div class="col-md-12"><a href="<?= base_url(); ?>/account/orders_detail">
                                        Lihat Detail Pesanan
                                    </a></div>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>