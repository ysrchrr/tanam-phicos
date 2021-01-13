<!-- Page Container START -->
<div class="page-container">
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="container">
            <?php
            $id_admin = $_GET['id'];
            $session = session();
            $this->database = \Config\Database::connect();
            $suname = $session->get('username');
            $profile = $this->database->query("SELECT * FROM admin WHERE id_admin = '$id_admin'")->getRowArray();
            $nama = $profile['nama'];
            ?>
            <div class="tab-content m-t-15">
                <div class="tab-pane fade show active" id="tab-account" >
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Informasi Akun</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if(isset($_GET['change'])){
                                $status = $_GET['change'];
                                if($status == "profile"){
                                ?>
                                    <div class="alert alert-success">
                                        <div class="d-flex justify-content-start">
                                            <span class="alert-icon m-r-20 font-size-30">
                                                <i class="anticon anticon-check-circle"></i>
                                            </span>
                                            <div>
                                                <h5 class="alert-heading">Berhasil</h5>
                                                <p>Informasi akun telah diperbarui</p>
                                            </div>
                                        </div>
                                    </div>
                            <?php } }?>
                            <form id="update-profile" method="post" action="<?php base_url()?>/Admin/updateAccount">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-semibold">Nama lengkap:</label>
                                        <input type="hidden" class="form-control" id="id_admin" name="id_admin" value="<?php echo $profile['id_admin'];?>" required>
                                        <input type="text" class="form-control" id="nama_e" name="nama_e" placeholder="Nama lengkap kamu" value="<?php echo $nama;?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-semibold">Username:</label>
                                        <input type="text" class="form-control" id="username_e" name="username_e" placeholder="Username kamu" value="<?php echo $profile['username'];?>" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-semibold">Phone Number:</label>
                                        <input type="text" class="form-control" id="telp_e" name="telp_e" placeholder="081234567890" value="<?php echo $profile['telp'];?>" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="font-weight-semibold">Email:</label>
                                        <input type="text" class="form-control" id="email_e" placeholder="lorem@ip.sum" value="<?php echo $profile['email'];?>" name="email_e" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-tone m-r-5" id="btn-update-a"><i class="fas fa-save"></i> Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Ubah Password</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if(isset($_GET['change'])){
                                $status = $_GET['change'];
                                if($status == "password"){
                                ?>
                                    <div class="alert alert-success">
                                        <div class="d-flex justify-content-start">
                                            <span class="alert-icon m-r-20 font-size-30">
                                                <i class="anticon anticon-check-circle"></i>
                                            </span>
                                            <div>
                                                <h5 class="alert-heading">Berhasil</h5>
                                                <p>Kata sandi telah diperbarui</p>
                                            </div>
                                        </div>
                                    </div>
                            <?php } }?>
                            <form id="update-password" method="post" action="<?php base_url()?>/Admin/updatePassword">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <input type="hidden" class="form-control" id="id_admin" name="id_admin" value="<?php echo $profile['id_admin'];?>" required>
                                        <label class="font-weight-semibold">Password lama:</label>
                                        <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Password lama" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="font-weight-semibold">Password baru:</label>
                                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Password baru" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="font-weight-semibold">Confirm Password:</label>
                                        <input type="password" class="form-control" id="confirmPassword" name="CnewPassword" placeholder="Konfirmasi password baru" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button type="submit" class="btn btn-primary btn-tone m-r-5 m-t-30"><i class="fas fa-user-lock"></i> Ubah Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->
</div>
<!-- Page Container END -->

<!-- Quick View START -->
<div class="modal modal-right fade quick-view" id="quick-view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-between align-items-center">
                <h5 class="modal-title">Theme Config</h5>
            </div>
            <div class="modal-body scrollable">
                <div class="m-b-30">
                    <h5 class="m-b-0">Header Color</h5>
                    <p>Config header background color</p>
                    <div class="theme-configurator d-flex m-t-10">
                        <div class="radio">
                            <input id="header-default" name="header-theme" type="radio" checked value="default">
                            <label for="header-default"></label>
                        </div>
                        <div class="radio">
                            <input id="header-primary" name="header-theme" type="radio" value="primary">
                            <label for="header-primary"></label>
                        </div>
                        <div class="radio">
                            <input id="header-success" name="header-theme" type="radio" value="success">
                            <label for="header-success"></label>
                        </div>
                        <div class="radio">
                            <input id="header-secondary" name="header-theme" type="radio" value="secondary">
                            <label for="header-secondary"></label>
                        </div>
                        <div class="radio">
                            <input id="header-danger" name="header-theme" type="radio" value="danger">
                            <label for="header-danger"></label>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <h5 class="m-b-0">Side Nav Dark</h5>
                    <p>Change Side Nav to dark</p>
                    <div class="switch d-inline">
                        <input type="checkbox" name="side-nav-theme-toogle" id="side-nav-theme-toogle">
                        <label for="side-nav-theme-toogle"></label>
                    </div>
                </div>
                <hr>
                <div>
                    <h5 class="m-b-0">Folded Menu</h5>
                    <p>Toggle Folded Menu</p>
                    <div class="switch d-inline">
                        <input type="checkbox" name="side-nav-fold-toogle" id="side-nav-fold-toogle">
                        <label for="side-nav-fold-toogle"></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick View END -->
</div>
</div>
<script src="<?= base_url() ?>/back-assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var profile = $('#update-profile');
    var pass = $('#update-password');
    profile.validate({
        ignore: ':hidden:not(:checkbox)',
        errorElement: 'label',
        errorClass: 'is-invalid',
        validClass: 'is-valid',
        rules: {
            nama_e : {
                required: true
            },
            username_e : {
                required: true,
                minlength: 2
            },
            email_e : {
                required: true,
                email: true
            },
            telp_e : {
                required: true,
                minlength: 1
            }
        }
    });
    pass.validate({
        ignore: ':hidden:not(:checkbox)',
        errorElement: 'label',
        errorClass: 'is-invalid',
        validClass: 'is-valid',
        rules: {
            oldPassword : {
                required: true
            },
            newPassword : {
                required: true,
            },
            confirmPassword : {
                required: true,
                equalTo: '#newPassword'
            }
        }
    });
});
</script>