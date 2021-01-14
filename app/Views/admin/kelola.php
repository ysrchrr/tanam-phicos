<!-- Page Container START -->
<div class="page-container">
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title"><?php echo $title;?></h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="<?= base_url()?>/Admin/kelola" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Admin Panel</a>
                    <!-- <a class="breadcrumb-item" href="#">Tables</a> -->
                    <span class="breadcrumb-item active"><?php echo $title;?></span>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <a href="<?php echo base_url();?>/Admin/newproduct" class="btn btn-primary btn-tone m-r-5 float-right"><i class="fa fa-plus"></i> Tambahkan produk baru</a>
                <h4>Daftar Tanaman</h4>
                <div class="m-t-25">
                    <table id="data-table" class="table table-hover e-commerce-table">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Nama Lain</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
                    <form id="form-edit">
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
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
        function convertToRupiah(angka){
            var rupiah = '';		
            var angkarev = angka.toString().split('').reverse().join('');
            for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
            return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
        }
        function showTableBarang(){
            $.ajax({
                type  : 'GET',
                url   : '<?= base_url()?>/Admin/tampilkanBarang',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].nama_barang+'</td>'+
                                '<td>'+data[i].nama_lain+'</td>'+
                                '<td>'+convertToRupiah(data[i].harga_barang)+'</td>'+
                                '<td>'+data[i].stok_barang+'</td>'+
                                '<td align="center"><button type="button" class="btn btn-primary btn-tone btn-sm edit_data" idb="'+data[i].id_barang+'"><i class="fas fa-edit"></i></button></td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                    $('#data-table').DataTable({
                        "order": [],
                        "language" : {
                            "emptyTable" : "Belum ada data:(",
                            "zeroRecords" : "Tidak ada yang cocok dengan database kami"
                        }
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
                // complete: function(){
                //     loading.hide();
                // }
            });
        }
        $(document).ready(function(){
            showTableBarang();
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
                        showTableBarang();
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
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
                return false;
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
                        showTableBarang();
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
                $('#data-table').DataTable().destroy();
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
                        showTableBarang();
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