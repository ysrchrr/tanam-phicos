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
            <?php foreach ($pemesanan as $p) : ?>
                <div class="box padding">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <small>Status</small>
                                        <p style="font-weight: 800;"><?= $p['status_pemesanan']; ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <small>Total Belanja</small>
                                        <p style="font-weight: 800;color:green"><?= $p['total']; ?></p>
                                    </div>
                                </div>
                                <hr style="margin: 0;">
                                <?php foreach ($pemesanan_detail as $pd) : ?>
                                    <?php if ($p['id_pemesanan'] == $pd['id_pemesanan']) : ?>
                                        <div class="row">
                                            <div class="col-md-4 ">
                                                <small>Total Harga Produk</small>
                                                <p style="font-weight: 800;color:green"><?= $pd['total']; ?></p>
                                            </div>
                                            <div class="col-md-8 mt-1">
                                                <?php foreach ($gambar_pd as $g) : ?>
                                                    <?php if ($pd['id_barang'] == $g['id_barang']) : ?>
                                                        <img style="width: 100px;height: 100px;" src="<?= base_url() . '/gambar/' . $g['link_gambar']; ?>" alt="">
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                <label style="margin-top: 10px;color:black;"><?= $pd['nama_barang']; ?><p style="margin-bottom: 0;font-weight:500;color:green"><?= $pd['harga']; ?></p>
                                                    <label for="" style="font-weight: 500;"><?= $pd['jumlah_barang']; ?> Produk</label>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <hr>
                                <div class="row text-center">
                                    <div class="col-md-12"><a href="<?= base_url(); ?>/account/orders_detail/<?= $p['id_pemesanan']; ?>">
                                            Lihat Detail Pesanan
                                        </a></div>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>