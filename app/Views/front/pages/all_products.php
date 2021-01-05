<?= $this->extend('front/layout/home'); ?>
<?= $this->section('content'); ?>
<!-- Start Main Content -->
<div class="container">
    <div class="row">
        <div class="col-md-3 left-menu">
            <div class="sidebar">
                <ul>
                    <?php $i = 1;
                    foreach ($category as $row) : ?>
                        <li><a href="<?= base_url(); ?>/front/product/<?= $row['id_kategori']; ?>"><?= $row['nama_kategori']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="options">
                <h3>Pilih salah satu</h3>
                <select class="selectpicker" data-width="150px">
                    <option>EN</option>
                    <option>IT</option>
                    <option>FR</option>
                </select>
                <select class="selectpicker" data-width="150px">
                    <option>Euro</option>
                    <option>Pounds</option>
                    <option>US Dollars</option>
                </select>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumbs">
                        <ul class="breadcrumb">
                            <li><a href="<?= base_url() ?>/front">Home</a>
                                <span class="divider"></span>
                            </li>
                            <li><?= $name; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="cat_header">
                        <h2><?= $name; ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($product as $row) : ?>
                    <div class="col-md-4">
                        <div class="product">
                            <a href="<?= base_url(); ?>/front/product/<?= $row['id_kategori']; ?>/<?= $row['id_barang']; ?>">
                                <img src="<?= $row['link_gambar']; ?>" alt="<?= $row['nama_barang']; ?>">
                            </a>
                            <div class="name">
                                <a href="<?= base_url(); ?>/front/product/<?= $row['id_kategori']; ?>/<?= $row['id_barang']; ?>"><?= $row['nama_barang']; ?> (<?= $row['nama_lain']; ?>)</a>
                            </div>
                            <div class="price">
                                <p>Rp. <?= $row['harga_barang']; ?></p>
                                <p>Stock : <?= $row['stok_barang']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="pagination pull-right">
                    <li><a href="#">&laquo;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Main Content -->
<?= $this->endSection(); ?>