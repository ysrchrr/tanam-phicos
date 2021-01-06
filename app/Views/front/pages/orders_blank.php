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

            <div class="box padding text-center">
                <h3>Pesan dulu ya</h3>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>