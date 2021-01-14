<!-- Page Container START -->
<div class="page-container">
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title"><?php echo $title;?></h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="<?= base_url()?>/Admin/kelola" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Admin Panel</a>
                    <a class="breadcrumb-item" href="<?= base_url()?>/Admin/kelola">Kelola Produk</a>
                    <span class="breadcrumb-item active"><?php echo $title;?></span>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                    <a href="<?= base_url()?>/Admin/kelola"><i class="anticon anticon-arrow-left"></i></a>
                        <div class="m-t-25">
                        <?php if (session('msg')) : ?>
                            <div class="alert alert-success">
                                <div class="d-flex justify-content-start">
                                    <span class="alert-icon m-r-20 font-size-30">
                                        <i class="anticon anticon-check-circle"></i>
                                    </span>
                                    <div>
                                        <h5 class="alert-heading">Berhasil</h5>
                                        <p><?= session('msg') ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>    
                            <!-- <form id="form-tambah" enctype="multipart/form-data" method="post"> -->
                            <form method="post" action="<?php echo base_url('Admin/addProduct');?>" enctype="multipart/form-data" id="form-add-product">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Nama Barang</label>
                                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Nama Lain</label>
                                        <input type="text" class="form-control" name="nama_lain" id="nama_lain" placeholder="Nama Lain">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Jenis Tanaman</label>
                                        <select name="id_kategori" class="form-control">
                                            <option>Silakan pilih salah satu</option>
                                            <?php
                                            foreach($kategori as $row){
                                            ?>
                                            <option value="<?php echo $row['id_kategori'];?>"><?php echo $row['nama_kategori'];?></option>
                                            <?php } ?>
                                        </select>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Harga</label>
                                        <input type="text" class="form-control" name="harga_barang" placeholder="10000" maxlength="13" onkeypress="return isNumber(event)" id="harga_barang" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Stok</label>
                                        <input type="text" class="form-control" name="stok_barang" maxlength="5" placeholder="0-9999" onkeypress="return isNumber(event)" id="stok_barang" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" placeholder="Tuliskan deksripsi produk..."></textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <label>Gambar</label>
                                    <input type="file" name='images[]' multiple="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-tone m-r-5"><i class="fas fa-plus"></i> Simpan Produk</button>
                                </div> 
                                <!-- <div class="form-group">
                                    <div class="file-loading">
                                        <input id="file-1" type="file" name="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
                                    </div>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- delete modal end -->
    <!-- Content Wrapper END -->
    <script src="<?= base_url() ?>/back-assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url() ?>/back-assets/vendors/quill/quill.min.js"></script>
    <script type="text/javascript">
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
    $(document).ready(function(){
        $('#form-add-product').validate({
            ignore: ':hidden:not(:checkbox)',
            errorElement: 'label',
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            rules: {
                nama_barang: {
                    required: true,
                    minlength: 3
                },
                harga_barang: {
                    required: true,
                    minlength: 1
                },
                stok_barang: {
                    required: true,
                    minlength: 1
                }
            }
        });
    });
    </script>