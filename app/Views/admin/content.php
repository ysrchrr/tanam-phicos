<!-- Page Container START -->
<div class="page-container">
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="row">
            <?php
            foreach ($summary as $r) {
            ?>
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-icon avatar-lg avatar-blue">
                                    <i class="anticon anticon-dollar"></i>
                                </div>
                                <div class="m-l-15">
                                    <h2 class="m-b-0"><?php echo $r->totalProduk; ?></h2>
                                    <p class="m-b-0 text-muted">Produk</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                    <i class="anticon anticon-line-chart"></i>
                                </div>
                                <div class="m-l-15">
                                    <h2 class="m-b-0"><?php echo $r->totalKategori; ?></h2>
                                    <p class="m-b-0 text-muted">Jenis Produk</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-icon avatar-lg avatar-gold">
                                    <i class="anticon anticon-profile"></i>
                                </div>
                                <div class="m-l-15">
                                    <h2 class="m-b-0"><?php echo $r->totalPesanan; ?></h2>Terjual</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avatar avatar-icon avatar-lg avatar-purple">
                                    <i class="anticon anticon-user"></i>
                                </div>
                                <div class="m-l-15">
                                    <h2 class="m-b-0"><?php echo $r->totalMember; ?></h2>
                                    <p class="m-b-0 text-muted">Member</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Terlaris</h5>
                    </div>
                    <div class="m-t-30">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Barang</th>
                                        <th>Total Terjual</th>
                                        <th style="max-width: 70px">Stock Left</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($terlaris as $l) : ?>
                                        <tr>
                                            <td>
                                                <div class="media align-items-center">
                                                    <div class="avatar avatar-image rounded">
                                                        <img src="<?= $l['link']; ?>" alt="">
                                                    </div>
                                                    <div class="m-l-10">
                                                        <span><?= $l['nama']; ?></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?= $l['total']; ?></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress progress-sm w-100 m-b-0">
                                                        <div class="progress-bar bg-<?= ($l['stok'] > 50) ? 'success' : 'danger'; ?>" style="width: <?= $l['stok']; ?>%"></div>
                                                    </div>
                                                    <div class="m-l-10">
                                                        <?= $l['stok']; ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Terjual hari ini</h5>
                    </div>
                    <div class="m-t-30">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Barang</th>
                                        <th>Total terjual</th>
                                        <th style="max-width: 70px">Stock Left</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($terjual as $j) : ?>
                                        <tr>
                                            <td>
                                                <div class="media align-items-center">
                                                    <div class="avatar avatar-image rounded">
                                                        <img src="<?= $j['link']; ?>" alt="">
                                                    </div>
                                                    <div class="m-l-10">
                                                        <span><?= $j['nama']; ?></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?= $j['total']; ?></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress progress-sm w-100 m-b-0">
                                                        <div class="progress-bar bg-<?= ($j['stok'] > 50) ? 'success' : 'danger'; ?>" style="width: <?= $j['stok']; ?>%"></div>
                                                    </div>
                                                    <div class="m-l-10">
                                                        <?= $j['stok']; ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?= chat('test'); ?>
        </div>
    </div>
    </div>
    <!-- Content Wrapper END -->
</div>
<!-- Page Container END -->

<!-- Search Start-->
<div class="modal modal-left fade search" id="search-drawer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-between align-items-center">
                <h5 class="modal-title">Search</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body scrollable">
                <div class="input-affix">
                    <i class="prefix-icon anticon anticon-search"></i>
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <div class="m-t-30">
                    <h5 class="m-b-20">Files</h5>
                    <div class="d-flex m-b-30">
                        <div class="avatar avatar-cyan avatar-icon">
                            <i class="anticon anticon-file-excel"></i>
                        </div>
                        <div class="m-l-15">
                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Quater Report.exl</a>
                            <p class="m-b-0 text-muted font-size-13">by Finance</p>
                        </div>
                    </div>
                    <div class="d-flex m-b-30">
                        <div class="avatar avatar-blue avatar-icon">
                            <i class="anticon anticon-file-word"></i>
                        </div>
                        <div class="m-l-15">
                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Documentaion.docx</a>
                            <p class="m-b-0 text-muted font-size-13">by Developers</p>
                        </div>
                    </div>
                    <div class="d-flex m-b-30">
                        <div class="avatar avatar-purple avatar-icon">
                            <i class="anticon anticon-file-text"></i>
                        </div>
                        <div class="m-l-15">
                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Recipe.txt</a>
                            <p class="m-b-0 text-muted font-size-13">by The Chef</p>
                        </div>
                    </div>
                    <div class="d-flex m-b-30">
                        <div class="avatar avatar-red avatar-icon">
                            <i class="anticon anticon-file-pdf"></i>
                        </div>
                        <div class="m-l-15">
                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Project Requirement.pdf</a>
                            <p class="m-b-0 text-muted font-size-13">by Project Manager</p>
                        </div>
                    </div>
                </div>
                <div class="m-t-30">
                    <h5 class="m-b-20">Members</h5>
                    <div class="d-flex m-b-30">
                        <div class="avatar avatar-image">
                            <img src="<?= base_url() ?>/back-assets/images/avatars/thumb-1.jpg" alt="">
                        </div>
                        <div class="m-l-15">
                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Erin Gonzales</a>
                            <p class="m-b-0 text-muted font-size-13">UI/UX Designer</p>
                        </div>
                    </div>
                    <div class="d-flex m-b-30">
                        <div class="avatar avatar-image">
                            <img src="assets/images/avatars/thumb-2.jpg" alt="">
                        </div>
                        <div class="m-l-15">
                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Darryl Day</a>
                            <p class="m-b-0 text-muted font-size-13">Software Engineer</p>
                        </div>
                    </div>
                    <div class="d-flex m-b-30">
                        <div class="avatar avatar-image">
                            <img src="assets/images/avatars/thumb-3.jpg" alt="">
                        </div>
                        <div class="m-l-15">
                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">Marshall Nichols</a>
                            <p class="m-b-0 text-muted font-size-13">Data Analyst</p>
                        </div>
                    </div>
                </div>
                <div class="m-t-30">
                    <h5 class="m-b-20">News</h5>
                    <div class="d-flex m-b-30">
                        <div class="avatar avatar-image">
                            <img src="assets/images/others/img-1.jpg" alt="">
                        </div>
                        <div class="m-l-15">
                            <a href="javascript:void(0);" class="text-dark m-b-0 font-weight-semibold">5 Best Handwriting Fonts</a>
                            <p class="m-b-0 text-muted font-size-13">
                                <i class="anticon anticon-clock-circle"></i>
                                <span class="m-l-5">25 Nov 2018</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search End-->

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