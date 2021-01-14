<?php
$_SESSION['logged-in'] = true;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Phicos Tanam | <?php echo $title;?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>/back-assets/images/logo/favicon.png">
    <!-- page css -->
    <link href="<?= base_url() ?>/back-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/back-assets/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- Core css -->
    <link href="<?= base_url() ?>/back-assets/css/app.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/back-assets/css/toastr.css" rel="stylesheet">
</head>

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            <div class="header">
                <div class="logo logo-dark">
                    <a href="<?= base_url() ?>/admin">
                        <img src="<?= base_url() ?>/back-assets/images/logo/logo.png" alt="Logo">
                        <img class="logo-fold" src="<?= base_url() ?>/back-assets/images/logo/logo-fold.png" alt="Logo">
                    </a>
                </div>
                <div class="logo logo-white">
                    <a href="<?= base_url() ?>/admin">
                        <img src="<?= base_url() ?>/back-assets/images/logo/logo-white.png" alt="Logo">
                        <img class="logo-fold" src="<?= base_url() ?>/back-assets/images/logo/logo-fold-white.png" alt="Logo">
                    </a>
                </div>
                <div class="nav-wrap">
                    <ul class="nav-left">
                        <li class="desktop-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                        <li class="mobile-toggle">
                            <a href="javascript:void(0);">
                                <i class="anticon"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <?php
                        $session = session();
                        $this->database = \Config\Database::connect();
                        $suname = $session->get('username');
                        $profile = $this->database->query("SELECT * FROM admin WHERE username = '$suname'")->getRowArray();
                        $ava = $profile['nama'];
                        $id = $profile['id_admin'];
                        ?>
                        <li class="dropdown dropdown-animated scale-left">
                            <div class="pointer" data-toggle="dropdown">
                                <div class="avatar avatar-text bg-primary">
                                    <span><?php echo $ava[0];?></span>
                                </div>
                            </div>
                            <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                                <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                                    <div class="d-flex m-r-50">
                                        <div class="avatar avatar-text bg-primary">
                                            <span><?php echo $ava[0];?></span>
                                        </div>
                                        <div class="m-l-10">
                                            <p class="m-b-0 text-dark font-weight-semibold"><?php echo $profile['nama']; ?></p>
                                            <p class="m-b-0 opacity-07">Administrator</p>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo base_url(); ?>/Admin/account?id=<?php echo $id;?>" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                            <span class="m-l-10">Edit Profile</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                                <a href="<?php echo base_url(); ?>/Admin/logout" class="dropdown-item d-block p-h-15 p-v-10">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                            <span class="m-l-10">Logout</span>
                                        </div>
                                        <i class="anticon font-size-10 anticon-right"></i>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">
                                <i class="fas fa-cog"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Header END -->