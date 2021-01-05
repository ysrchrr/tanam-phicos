<!-- Page Container START -->
<div class="page-container">
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Data Table</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Tables</a>
                    <span class="breadcrumb-item active">Data Table</span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary btn-tone m-r-5 float-right" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus"></i> Tambahkan produk baru
                </button>
                <h4>Daftar Tanaman</h4>
                <div class="m-t-25">
                    <table id="data-table" class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Nama Lain</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                        <?php 
                        function rupiah($angka){
                            $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                            return $hasil_rupiah;
                        }
                        foreach($barang as $key => $data) { ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $data['nama_barang']; ?></td>
                            <td><?php echo $data['nama_lain']; ?></td>
                            <td><?php echo rupiah($data['harga_barang']); ?></td>
                            <td><?php echo $data['stok_barang']; ?></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-tone btn-sm edit_data"  idb="<?php echo $data['id_barang']?>"><i class="fas fa-edit"></i></button>
                                    <a href="<?php echo base_url('product/delete/'.$data['id_barang']); ?>" class="btn btn-danger btn-tone btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk <?php echo $data['nama_barang']; ?> ini?')"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- add modal start -->
    <div class="modal fade" id="exampleModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambahkan produk baru</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-tambah">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nama Lain</label>
                                <input type="text" class="form-control" name="nama_lain" placeholder="Nama Lain">
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
                                <input type="text" class="form-control" name="harga_barang" placeholder="10000" maxlength="13">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Stok</label>
                                <input type="text" class="form-control" name="stok_barang" maxlength="5" placeholder="0-9999">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" placeholder="Tuliskan deksripsi produk..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan produk</button>
                </div>
            </div>
        </div>
    </div>
    <!-- add modal end -->
    <!-- modal edit -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit product</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-tambah">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nama Barang</label>
                                <input type="hidden" class="form-control" id="id_barang_e" placeholder="Nama Barang">
                                <input type="text" class="form-control" id="nama_barang_e" placeholder="Nama Barang">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nama Lain</label>
                                <input type="text" class="form-control" id="nama_lain_e" placeholder="Nama Lain">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Jenis Tanaman</label>
                                <select id="id_kategori_e" class="form-control">
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
                                <input type="text" class="form-control" id="harga_barang_e" placeholder="10000" maxlength="13">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Stok</label>
                                <input type="text" class="form-control" id="stok_barang_e" maxlength="5" placeholder="0-9999">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" id="deskripsi_e" placeholder="Tuliskan deksripsi produk..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="btn-chapus">Hapus data</button>
                    <button type="submit" class="btn btn-primary" id="btn-update">Simpan perubahan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal edit -->
    <!-- delete modal -->
    <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel">Hapus data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_d" id="id_d">
                    Apa km yakin mau hapus data?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ngga jadi</button>
                    <button type="button" class="btn btn-danger" id="btn-hapus">Iyaa hapus</button>
                </div>
            </div>
        </div>
    </div>
    <!-- delete modal end -->
    <!-- Content Wrapper END -->
    <script src="<?= base_url() ?>/back-assets/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#data-table').DataTable();
            var save_method = 'add'; //for save method string
            var table;
            function save(){
                var url;
                if(save_method == 'add'){
                    url = "<?php echo site_url('Admin/book_add')?>";
                } else {
                    url = "<?php echo site_url('public/index.php/book/book_update')?>";
                }

                // ajax adding data to database
                $.ajax({
                    url : url,
                    type: "POST",
                    data: $('#form').serialize(),
                    dataType: "JSON",
                    success: function(data)
                    {
                    //if success close modal and reload ajax table
                    $('#modal_form').modal('hide');
                    location.reload();// for reload a page
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error adding / update data');
                    }
                });
            }
            $('#btn-simpan').on('click', function(){
                $('#data-table').DataTable().destroy();
                $.ajax({
                    url: "<?php echo site_url('Admin/book_add')?>",
                    type: "POST",
                    data: $('#form-tambah').serialize(),
                    dataType: "JSON",
                    success: function(data){
                        //if success close modal and reload ajax table
                        $('#exampleModal').modal('hide');
                        $('#data-table').DataTable();
                        Command: toastr["success"]("Data telah disimpan", "Berhasil")
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        $('#data-table').DataTable();
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            });
            $('#show_data').on('click', '.edit_data', function() {
                // alert('hii');
                var id = $(this).attr('idb');
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url('Admin/detailBarang') ?>",
                    dataType: "JSON",
                    data: {
                        id_barang: id
                    },
                    success: function(data) {
                        $.each(data, function(id_barang, nama_barang, nama_lain, harga_barang, stok_barang, deskripsi) {
                            $('#editModal').modal('show');
                            $('[id="id_barang_e"]').val(data.id_barang);
                            $('[id="nama_barang_e"]').val(data.nama_barang);
                            $('[id="nama_lain_e"]').val(data.nama_lain);
                            $('[id="harga_barang_e"]').val(data.harga_barang);
                            $('[id="deskripsi_e"]').val(data.deskripsi);
                            $('[id="stok_barang_e"]').val(data.stok_barang);
                        });
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
                return false;
            });
            $('#btn-update').on('click', function(){
                $('#data-table').DataTable().destroy();
                var id_barang = $('#id_barang_e').val();
                var id_kategori = $('#id_kategori_e').val();
                var nama_barang = $('#nama_barang_e').val();
                var nama_lain = $('#nama_lain_e').val();
                var harga_barang = $('#harga_barang_e').val();
                var stok_barang = $('#stok_barang_e').val();
                var deskripsi = $('#deskripsi_e').val();
                // alert(id_barang + ' | ' +id_kategori + ' | ' + nama_barang + ' | ' + nama_lain + ' | ' + harga_barang + ' | ' + stok_barang + ' | ' + deskripsi);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Admin/updateBarang') ?>",
                    dataType: "JSON",
                    data: {
                        id_barang:id_barang,
                        id_kategori:id_kategori,
                        nama_barang:nama_barang,
                        nama_lain:nama_lain,
                        harga_barang:harga_barang,
                        stok_barang:stok_barang,
                        deskripsi:deskripsi
                    },
                    success: function(data) {
                        $('[id="id_barang_e"]').val("");
                        $('[id="id_kategori_e"]').val("");
                        $('[id="nama_barang_e"]').val("");
                        $('[id="nama_lain_e"]').val("");
                        $('[id="harga_barang_e"]').val("");
                        $('[id="stok_barang_e"]').val("");
                        $('[id="deskripsi_e"]').val("");
                        $('#editModal').modal('hide');
                        Command: toastr["success"]("Data berhasil di-update", "Berhasil")
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
                return false;
            });
            $('#btn-chapus').on('click', function(){
                var id = $('#id_barang_e').val();
                $('#editModal').modal('hide');
                $('#modalHapus').modal('show');
                $('[name="id_d"]').val(id);
            });
            $('#btn-hapus').on('click', function(){
                $('#dataTable').DataTable().destroy();
                var kode = $('#id_d').val();
                // alert(kode);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Admin/deleteRecord') ?>",
                    dataType: "JSON",
                    data: {
                        kode: kode
                    },
                    success: function(data) {
                        $('#modalHapus').modal('hide');
                        //datatable disini
                        Command: toastr["success"]("Data berhasil dihapus", "Berhasil")
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
                return false;
            });
        });
    </script>