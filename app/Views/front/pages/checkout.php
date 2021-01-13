<?= $this->extend('front/layout/home'); ?>
<?= $this->section('content'); ?>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li><a href="<?= base_url()?>/">Home</a> <span class="divider"></span></li>
                    <li><a href="<?= base_url()?>/cart">Shopping Cart</a> <span class="divider"></span></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <h2>Checkout</h2>
            <p class="well">Sudah Memiliki Akun? <a href="<?= base_url()?>/login">Silahkan login di sini</a></p>
        </div>
    </div>

    <div class="row box">
        <div class="col-md-6">
            <h3>Billing Address</h3>
            <form class="form-horizontal" role="form" method="post" action="<?= base_url(); ?>/front/checkout_save">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="input_user_id">ID Member<span class="required">*</span></label>
                    <div class="col-md-9">
                    
                        <input type="password" class="form-control" name="input_user_id" value="<?= $bio['id_member']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="input_nama">Nama Lengkap<span class="required">*</span></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="input_nama" placeholder="Nama Lengkap Member" value="<?= $bio['nama']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="input_perusahaan">Nama Perusahaan</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="input_perusahaan" placeholder="Perusahaan (Opsional)">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="input_alamat">Alamat<span class="required">*</span></label>
                    <div class="col-md-9">
                        <textarea name="input_alamat" class="form-control" id="input_alamat" rows="5"></textarea>
                        <script>
                            var x = "<?= $bio['alamat'];?>";
                            $('#input_alamat').val(x);
                        </script>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="input_provinsi">Nama Provinsi<span class="required">*</span></label>
                    <div class="col-md-8">
                        <select>
                            <option value=""> --- Pilih Salah Satu --- </option>
                            <?php foreach ($provinsi as $prov) : ?>
                                <option value="<?= $prov['id']; ?>" <?= ($bio['id_provinsi'] == $prov['id']) ? 'selected' : ''; ?>><?= $prov['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="input_kota">Nama Kota<span class="required">*</span></label>
                    <div class="col-md-8">
                        <select>
                            <option value=""> --- Pilih Salah Satu --- </option>
                            <?php foreach ($kota as $kota) : ?>
                                <option value="<?= $kota['id']; ?>" <?= ($bio['id_kabupaten'] == $kota['id']) ? 'selected' : ''; ?>><?= $kota['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="input_kecamatan">Nama Kecamatan<span class="required">*</span></label>
                    <div class="col-md-8">
                        <select>
                            <option value=""> --- Pilih Salah Satu --- </option>
                            <?php foreach ($kecamatan as $kec) : ?>
                                <option value="<?= $kec['id']; ?>" <?= ($bio['id_kecamatan'] == $kec['id']) ? 'selected' : ''; ?>><?= $kec['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="input_kodepos">Kode Pos<span class="required">*</span></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="input_kodepos" placeholder="Kode Pos" value="<?= $bio['kodepos']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="input_email">Alamat Email<span class="required">*</span></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="input_email" placeholder="Alamat Email" value="<?= $bio['email']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="input_phone">Nomor Telepon<span class="required">*</span></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="input_phone" placeholder="Nomor Telepon" value="<?= $bio['telp']; ?>">
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Place Order</button>
            </form>
            </div><div class="col-md-6">
            <div class="order-notes">
                <h3>Order Notes</h3>
                <textarea rows="3" cols="10" class="form-control" placeholder="Sertakan catatan pada pengirim."></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="your_order table-checkout">
                <h3>Your order</h3>
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th class="text-center">Qty</th>
                            <th>Totals</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($cart_d as $row) : ?>
                        <tr>
                            <td class="name"><?= $row['nama_barang']; ?>(<?= $row['nama_lain']; ?>)</td>
                            <td class="text-center"><?= $row['sub_jumlah']; ?></td>
                            <td><span><?= $row['sub_total'];?></span></td>
                        </tr>
                    <?php endforeach; ?>
                        <tr><td></td><td></td><td></td></tr>
                        <tr class="subtotal">
                            <td></td>
                            <td><b>Cart Subtotal</b></td>
                            <td><?= $cart['total']; ?></td>
                        </tr>
                        <tr class="subtotal">
                            <td></td>
                            <td><b>Shipping</b></td>
                            <td>Gratis</td>
                        </tr>
                        <tr class="subtotal">
                            <td></td>
                            <td><b>Order Total</b></td>
                            <td><?= $cart['total']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <p>
                    <button class="btn btn-primary" type="submit">Place Order</button>
                </p>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>