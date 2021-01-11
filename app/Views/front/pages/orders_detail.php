<?= $this->extend('front/layout/home'); ?>
<?= $this->section('content'); ?>

<div class="row" id="printableArea">
    <div class="container">
        <div class="col-md-12">
            <div class="box padding">
                <p class="text-center" style="font-weight: 600;">Detail Pesanan</p>
                <div class="row">
                    <div class="col-md-4">
                        <label for="pesanan">Nomor Pesanan</label>
                        <p>#<?= $bio['id_pemesanan']; ?></p>
                    </div>
                    <div class="col-md-4">
                        <label for="pesanan">Tanggal Pembelian</label>
                        <p><?= $bio['tgl_pesan']; ?></p>
                    </div>
                    <div class="col-md-4">
                        <label for="pesanan">Status</label>
                        <p><?= $bio['status_pemesanan']; ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <label>Daftar Produk</label>
                    </div>
                </div>

                <?php foreach ($pemesanan_detail as $pd) : ?>

                    <div class="row">
                        <div class="col-md-4 ">
                            <small>Total Harga Produk</small>
                            <p style="font-weight: 800;color:green"><?= $pd['total']; ?></p>
                        </div>
                        <div class="col-md-8 mt-1">
                            <?php foreach ($gambar_pd as $g) : ?>
                                <?php if ($pd['id_barang'] == $g['id_barang']) : ?>
                                    <img style="width: 100px;height: 100px;" src="<?= $g['link_gambar']; ?>" alt="">
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <label style="margin-top: 10px;color:black;"><?= $pd['nama_barang']; ?><p style="margin-bottom: 0;font-weight:500;color:green"><?= $pd['harga']; ?></p>
                                <label for="" style="font-weight: 500;"><?= $pd['jumlah_barang']; ?> Produk</label>
                            </label>
                        </div>
                    </div>

                <?php endforeach; ?>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <label>Pengiriman</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="jenis-pengiriman">Jenis Pengiriman</div>
                        <div class="no-resi"><?= $bio['resi']; ?></div>
                        <br>
                        <div>Dikirim kepada <?= $bio['nama']; ?></div>
                        <div><?= $bio['alamat']; ?></div>
                        <div><?= $kecamatan['nama']; ?>,<?= $kabupaten['nama']; ?></div>
                        <div><?= $provinsi['nama']; ?></div>
                        <div>Telp: <?= $bio['telp']; ?></div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <label>Pembayaran</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" style="color:grey;">
                        <p>Total Harga</p>
                    </div>
                    <div class="col-md-6" style="border-left: thin solid #bababa;font-weight:600;">
                        <p><?= $bio['total']; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" style="color:grey;">
                        <p>Biaya Pengiriman</p>
                    </div>
                    <div class="col-md-6" style="border-left: thin solid #bababa;font-weight:600;">
                        <p>GRATIS</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" style="color:grey;">
                        <p>Metode Pembayaran</p>
                    </div>
                    <div class="col-md-6" style="border-left: thin solid #bababa;font-weight:600;">
                        <p>Transfer Bank</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="container ">
        <div class="col-md-12 ">
            <div class="box padding text-center">
                <button onclick="printDiv('printableArea')" class="btn btn-success">Cetak Invoice</button>
            </div>
        </div>
    </div>
</div>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
<?= $this->endSection(); ?>