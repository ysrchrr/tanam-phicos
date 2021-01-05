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
                    <li class="list-group-item"><a style="font-weight: 600;" href="<?= base_url(); ?>/account/address">Alamat</a></li>
                    <li class="list-group-item"><a href="<?= base_url(); ?>/account/orders">Pesanan</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box padding">
                <form>
                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <input type="text" class="form-control" value="<?= $bio['alamat']; ?>" id="Alamat" aria-describedby="Alamat" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label for="province">Provinsi</label>
                        <select class="provinsi" name="provinsi" style="width: 100%;">
                            <?php foreach ($provinsi as $p) : ?>
                                <option value="<?= $p['id']; ?>" <?= ($bio['id_provinsi'] == $p['id']) ? 'selected' : ''; ?>><?= $p['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="City">Kota</label>
                        <select class="kota" name="kota" style="width: 100%;">
                            <?php foreach ($kota as $p) : ?>
                                <option value="<?= $p['id']; ?>" <?= ($bio['id_kabupaten'] == $p['id']) ? 'selected' : ''; ?>><?= $p['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="district">Kecamatan</label>
                        <select class="kecamatan" name="kecamatan" style="width: 100%;">
                            <?php foreach ($kecamatan as $p) : ?>
                                <option value="<?= $p['id']; ?>" <?= ($bio['id_kecamatan'] == $p['id']) ? 'selected' : ''; ?>><?= $p['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>