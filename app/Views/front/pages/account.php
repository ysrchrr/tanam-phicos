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
                    <li class="list-group-item"><a style="font-weight: 600;" href="<?= base_url(); ?>/account">Profil</a></li>
                    <li class="list-group-item"><a href="<?= base_url(); ?>/account/address">Alamat</a></li>
                    <li class="list-group-item"><a href="<?= base_url(); ?>/account/orders">Pesanan</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <?php if (session()->getflashdata('pesan')) : ?>
                <div class="alert alert-danger" role="alert"><?= session()->getflashdata('pesan'); ?></div>
            <?php endif; ?>
            <div class="box padding">
                <form action="<?= base_url(); ?>/account/akun_update" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" value="<?= $bio['id_member']; ?>" name="id">
                    <input type="hidden" name="password_old" value="<?= $bio['password']; ?>">
                    <input type="hidden" name="username" value="<?= $bio['username']; ?>">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" value="<?= $bio['nama']; ?>" class="form-control" id="nama" aria-describedby="nama" placeholder="Masukkan Namamu">
                    </div>
                    <div class="form-group">
                        <label for="Email">Alamat Email</label>
                        <input type="text" name="email" value="<?= $bio['email']; ?>" class="form-control" id="Email" aria-describedby="email" placeholder="Masukkan Email">
                    </div>
                    <div class="form-group">
                        <label for="Telp">Telp</label>
                        <input type="text" name="telp" class="form-control" value="<?= $bio['telp']; ?>" id="Telp" aria-describedby="telp" placeholder="telp">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" value="<?= $bio['tgl_lahir']; ?>" id="tgl_lahir" aria-describedby="tgl_lahir" placeholder="tgl_lahir">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="tumbal" value="<?= $bio['username']; ?>" id="username" aria-describedby="Username" placeholder="Username" readonly>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" value="abcde" id="password" placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>