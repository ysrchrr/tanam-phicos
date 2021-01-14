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
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                    <h5 class="text-center">Input Kategori Baru</h5>
                    <hr/>
                        <form id="form-tambah">
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input type="text" class="form-control" id="nama_kategori" placeholder="Masukkan nama kategori" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-tone m-r-5" id="btn-simpan"><i class="anticon anticon-plus"></i>Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Daftar Kategori</h4>
                        <div class="m-t-25">
                            <table id="data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data">
                                </tbody>
                            </table>
                        </div>
                        <div align="center">
                            <div id='loadingajax'>
                                <h1><i class="anticon anticon-loading"></i></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal edit -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-edit">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Nama Kategori</label>
                                <input type="hidden" class="form-control" id="id_kategori_e">
                                <input type="text" class="form-control" id="nama_kategori_e" placeholder="Nama Kategori">
                            </div>
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
    <script src="<?= base_url() ?>/back-assets/js/theme.js"></script>
    <script src="<?= base_url() ?>/back-assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>/back-assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        var loading = $('#loadingajax');
        function convertToRupiah(angka){
            var rupiah = '';		
            var angkarev = angka.toString().split('').reverse().join('');
            for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
            return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
        }
        function showTableKategori(){
            $.ajax({
                type  : 'GET',
                url   : '<?= base_url()?>/Admin/tampilkanKategori',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].nama_kategori+'</td>'+
                                '<td align="center"><button type="button" class="btn btn-primary btn-tone btn-sm edit_data" idb="'+data[i].id_kategori+'"><i class="fas fa-edit"></i></button></td>'+
                                // '<td align="center"> <button type="button" idx="'+data[i].id+'" class="btn btn-warning btn-sm edit_data"><i class="fas fa-edit"></i></button></td>'+
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
                },
                complete: function(){
                    loading.hide();
                }
            });
        }
        $(document).ready(function(){
            showTableKategori();
            $('#form-tambah').validate({
                ignore: ':hidden:not(:checkbox)',
                errorElement: 'label',
                errorClass: 'is-invalid',
                validClass: 'is-valid',
                rules:{
                    nama_kategori: {
                        required: true,
                        minlength: 3
                    }
                }
            });
            $('#btn-simpan').on('click', function(){
                $('#data-table').DataTable().destroy();
                var nama_kategori = $('#nama_kategori').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Admin/newKategori') ?>",
                    dataType: "JSON",
                    data: {
                        nama_kategori:nama_kategori
                    },
                    success: function(data) {
                        $('[id="nama_kategori"]').val("");
                        showTableKategori();
                        Command: toastr["success"](nama_kategori + " telah ditambahkan", "Berhasil")
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
                    url: "<?php echo base_url('Admin/detailKategori') ?>",
                    dataType: "JSON",
                    data: {
                        id_kategori: id
                    },
                    success: function(data) {
                        $.each(data, function(id_kategori, nama_kategori) {
                            $('#editModal').modal('show');
                            $('[id="id_kategori_e"]').val(data.id_kategori);
                            $('[id="nama_kategori_e"]').val(data.nama_kategori);
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
                var id_kategori = $('#id_kategori_e').val();
                var nama_kategori = $('#nama_kategori_e').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Admin/updateKategori') ?>",
                    dataType: "JSON",
                    data: {
                        id_kategori:id_kategori,
                        nama_kategori:nama_kategori
                    },
                    success: function(data) {
                        $('[id="id_kategori_e"]').val("");
                        $('[id="nama_kategori_e"]').val("");
                        $('#editModal').modal('hide');
                        showTableKategori();
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
                var id = $('#id_kategori_e').val();
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
                    url: "<?php echo base_url('Admin/deleteKategori') ?>",
                    dataType: "JSON",
                    data: {
                        kode: kode
                    },
                    success: function(data) {
                        $('#modalHapus').modal('hide');
                        showTableKategori();
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