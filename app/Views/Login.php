<?= $this->extend('front/layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Start Main Content -->
<div class="container">
    <!-- <div class="row">
        <div class="col-md-12">
            <div class="breadcrumbs">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a> <span class="divider"></span></li>
                    <li class="active">My Account</li>
                </ul>
            </div>
        </div>

    </div> -->

    <div class="row">
        <div class="col-md-12">
            <h2>My Account</h2>
        </div>
    </div>

    <div class="row ">
        <div class="col-md-12 mb-2">
            <form class="loginbox form-horizontal" action="<?= base_url(); ?>/login/auth" method="post">
                <p>Login</p>
                <div class="form-group">
                    <label class="control-label col-md-4" for="inputEmail">Username or email<span class="required">*</span></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="inputPassword">Password<span class="required">*</span></label>
                    <div class="col-md-8">
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Login</button>
                        <a href="forgot-password.html">Lost Password?</a>
                    </div>
                </div>
            </form>
        </div>


    </div>

</div>

<!-- End Main Content -->
<?= $this->endSection(); ?>