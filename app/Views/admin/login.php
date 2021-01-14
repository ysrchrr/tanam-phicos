<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Phicos Tanam | <?php echo $title;?></title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>/back-assets/images/logo/favicon.png">
    <!-- page css -->
    <!-- Core css -->
    <link href="<?= base_url() ?>/back-assets/css/app.min.css" rel="stylesheet">
</head>
<body>
    <div class="app">
        <div class="container-fluid">
            <div class="d-flex full-height p-v-15 flex-column justify-content-between">
                <div class="d-none d-md-flex p-h-40">
                    <img src="<?= base_url() ?>/back-assets/images/logo/logo.png" alt="">
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="m-t-20">Sign In</h2>
                                    <p class="m-b-30">Enter your credential to get access</p>
                                    <form action="<?php echo base_url();?>/Admin/aksi_login" method="post">
                                        <div class="form-group">
                                            <label class="font-weight-semibold">Username:</label>
                                            <div class="input-affix">
                                                <i class="prefix-icon anticon anticon-user"></i>
                                                <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold">Password:</label>
                                            <a class="float-right font-size-13 text-muted" href="#">Forget Password?</a>
                                            <div class="input-affix m-b-10">
                                                <i class="prefix-icon anticon anticon-lock"></i>
                                                <input type="password" class="form-control" name="password" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <button class="btn btn-primary btn-block" type="submit">Sign In</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="offset-md-1 col-md-6 d-none d-md-block">
                            <img class="img-fluid" src="<?= base_url() ?>/back-assets/images/others/login-2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-flex  p-h-40 justify-content-between">
                    <span class="">© 2019 ThemeNate</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Core Vendors JS -->
    <script src="<?= base_url() ?>/back-assets/js/vendors.min.js"></script>
    <!-- page js -->
    <!-- Core JS -->
    <script src="<?= base_url() ?>/back-assets/js/app.min.js"></script>
</body>
</html>