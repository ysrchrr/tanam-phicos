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