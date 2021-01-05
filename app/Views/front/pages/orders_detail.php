<?= $this->extend('front/layout/home'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <div class="container">
        <div class="col-md-12">
            <div class="box padding">
                <p class="text-center" style="font-weight: 600;">Detail Pesanan</p>
                <div class="row">
                    <div class="col-md-4">
                        <label for="pesanan">Nomor Pesanan</label>
                        <p>#001</p>
                    </div>
                    <div class="col-md-4">
                        <label for="pesanan">Tanggal Pembelian</label>
                        <p>31 Desember 2020, 23:59</p>
                    </div>
                    <div class="col-md-4">
                        <label for="pesanan">Status</label>
                        <p>Pesanan Selesai</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <label>Daftar Produk</label>
                    </div>
                </div>
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
                <div class="row">
                    <div class="col-md-12">
                        <label>Pengiriman</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="jenis-pengiriman">Jenis Pengiriman</div>
                        <div class="no-resi">No Resi</div>
                        <br>
                        <div>Dikirim kepada Royoyo</div>
                        <div>Solo rt 02 rw 00</div>
                        <div>Kecamatan,kabupaten</div>
                        <div>Provinsi</div>
                        <div>Telp: </div>
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
                        <p>Total Ongkos Kirim</p>
                        <p>Total Bayar</p>
                        <p>Metode Pembayaran</p>
                    </div>
                    <div class="col-md-6" style="border-left: thin solid #bababa;font-weight:600;">
                        <p>Rp. 150.000</p>
                        <p>Rp. 50.000</p>
                        <p style="color:green;">Rp. 200.000</p>
                        <p>Transfer Bank</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-success">Cetak Invoice</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>