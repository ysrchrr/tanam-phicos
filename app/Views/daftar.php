<?= $this->extend('front/layout/home'); ?>
<?= $this->section('content'); ?>
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

    <div class="row">

        <div class="col-md-12">
            <?php if (session()->getflashdata('pesan')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getflashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <form class="loginbox form-horizontal" action="<?= base_url(); ?>/login/proses_daftar" method="post">
                <?= csrf_field(); ?>
                <div class=" form-group">
                    <label class="control-label col-md-4" for="inputEmail">Email<span class="required">*</span></label>
                    <div class="col-md-8">
                        <input type="text" id="inputEmail" class="form-control" value="<?= old('email') ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="inputUsername">Username<span class="required">*</span></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="username" placeholder="username" value="<?= old('username') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-4" for="inputPassword">Password<span class="required">*</span></label>
                    <div class="col-md-8">
                        <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Daftar</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>

<?= $this->endSection(); ?>