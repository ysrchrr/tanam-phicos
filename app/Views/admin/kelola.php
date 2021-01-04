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
                        <tbody">
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
                                    <a href="<?php echo base_url('product/edit/'.$data['id_barang']); ?>" class="btn btn-primary btn-tone btn-sm"><i class="fas fa-edit"></i></a>
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
            })
        });
    </script>