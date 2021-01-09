<?= $this->extend('front/layout/home'); ?>
<?= $this->section('content'); ?>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li><a href="<?= base_url()?>/">Home</a> <span class="divider"></span></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <h2>Checkout</h2>
            <p class="well">Sudah Memiliki Akun? <a href="<?= base_url()?>/login">Klik Disini untuk login</a></p>
        </div>
    </div>

    <div class="row box">
        <div class="col-md-6">
            <h3>Billing Address</h3>
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="input_user_id">ID Member<span class="required">*</span></label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="input_user_id" placeholder="ID010010">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="input_nama">Nama Lengkap<span class="required">*</span></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="input_nama" placeholder="Nama Lengkap Member">
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
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="input_kecamatan">Nama Kecamatan<span class="required">*</span></label>
                    <div class="col-md-8">
                        <select>
                            <option value=""> --- Pilih Salah Satu --- </option>
                            <option value="1">Afghanistan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="input_kota">Nama Kota<span class="required">*</span></label>
                    <div class="col-md-8">
                        <select>
                            <option value=""> --- Pilih Salah Satu --- </option>
                            <option value="1">Afghanistan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="input_provinsi">Nama Provinsi<span class="required">*</span></label>
                    <div class="col-md-8">
                        <select>
                            <option value=""> --- Pilih Salah Satu --- </option>
                            <option value="1">Afghanistan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="input_kodepos">Kode Pos<span class="required">*</span></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="input_kodepos" placeholder="Kode Pos">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="input_email">Alamat Email<span class="required">*</span></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Alamat Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="input_phone">Nomor Telepon<span class="required">*</span></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Nomor Telepon">
                    </div>
                </div>
            </form>

        </div>
        <div class="col-md-6">


            <div class="shiptobilling clearfix">
                <h3>Shipping Address</h3>
                <label class="checkbox">
                    <input type="checkbox" value="" onclick="jQuery('.shipping-address').toggle()">Ship to billing address?
                </label>
            </div>
            <div class="shipping-address">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="input_">Nama Depan<span class="required">*</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="input_">Nama Belakang<span class="required">*</span></label>
                        <div class="col-md-9">
                            <input type="password" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="input_">Company Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Company (optional)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="input_">Address<span class="required">*</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="input_">Address 2</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="input_" placeholder="Address (optional)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="input_">Town/City<span class="required">*</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Town/City">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="input_">Postcode<span class="required">*</span></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Postcode">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label" for="input_">Country<span class="required">*</span></label>
                        <div class="col-md-9">
                            <select>
                                <option value=""> --- Please Select --- </option>
                                <option value="1">Afghanistan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="input_">County</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="County">
                        </div>
                    </div>
                </form>
            </div>
            <div class="order-notes">
                <p>Order Notes</p>
                <textarea rows="3" cols="10" class="form-control" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="your_order">
                <h3>Your order</h3>
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Totals</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Blue Dress</td>
                            <td>2</td>
                            <td><span>$360.00</span></td>
                        </tr>
                        <tr class="subtotal">
                            <td></td>
                            <td><b>Cart Subtotal</b></td>
                            <td>$360.00</td>
                        </tr>
                        <tr class="subtotal">
                            <td></td>
                            <td><b>Shipping</b></td>
                            <td>Free Shipping</td>
                        </tr>
                        <tr class="subtotal">
                            <td></td>
                            <td><b>Order Total</b></td>
                            <td>$360.00</td>
                        </tr>
                    </tbody>
                </table>
                <label class="radio" onclick="jQuery('.transfer').toggle()">
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                    Direct Bank Transfer
                </label>
                <div class="transfer">
                    <p> Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order wont be shipped until the funds have cleared in our account.</p>
                </div>
                <label class="radio" onclick="jQuery('.cheque').toggle()">
                    <input type="radio" name="optionsRadios" value="option1" checked>
                    Cheque Payment
                </label>
                <div class="cheque">
                    <p> Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                </div>
                <label class="radio" onclick="jQuery('.paypal').toggle()">
                    <input type="radio" name="optionsRadios" value="option1" checked>
                    PayPal <img alt="american" src="image/paypal1.png">
                </label>
                <div class="paypal">
                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account</p>
                </div>
                <p>
                    <button class="btn btn-primary" type="submit">Place Order</button>
                </p>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>