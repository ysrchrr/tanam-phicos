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
                <h4>Daftar Members</h4>
                <div class="m-t-25">
                    <table id="data-table" class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telp</th>
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
    <!-- modal edit -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Detail Member</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-tambah">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nama</label>
                                <input type="hidden" class="form-control" id="id_member_e">
                                <input type="text" class="form-control" id="nama_e" placeholder="Nama">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Username</label>
                                <input type="text" class="form-control" id="username_e" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control" id="email_e" placeholder="your@mail.com">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Telp</label>
                                <input type="text" class="form-control" id="telp_e">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" id="alamat_e" placeholder="Tuliskan alamat lengkap..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="btn-chapus">Hapus data</button>
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
        var loading = $('#loadingajax');
        function showTableMember(){
            $.ajax({
                type  : 'GET',
                url   : '<?= base_url()?>/Admin/tampilkanMember',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td>'+data[i].email+'</td>'+
                                '<td>'+data[i].telp+'</td>'+
                                '<td align="center"><button type="button" class="btn btn-primary btn-tone btn-sm edit_data" idb="'+data[i].id_member+'"><i class="far fa-eye"></i> Detail</button></td>'+
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
            showTableMember();
            $('#show_data').on('click', '.edit_data', function() {
                // alert('hii');
                var id = $(this).attr('idb');
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url('Admin/detailMembers') ?>",
                    dataType: "JSON",
                    data: {
                        id_member: id
                    },
                    success: function(data) {
                        $.each(data, function(id_member, nama, username, email, alamat) {
                            $('#editModal').modal('show');
                            $('[id="id_member_e"]').val(data.id_member);
                            $('[id="nama_e"]').val(data.nama);
                            $('[id="username_e"]').val(data.username);
                            $('[id="email_e"]').val(data.email);
                            $('[id="telp_e"]').val(data.telp);
                            $('[id="alamat_e"]').val(data.alamat);
                        });
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
                return false;
            });
            $('#btn-chapus').on('click', function(){
                var id = $('#id_member_e').val();
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
                    url: "<?php echo base_url('Admin/deleteMember') ?>",
                    dataType: "JSON",
                    data: {
                        kode: kode
                    },
                    success: function(data) {
                        $('#modalHapus').modal('hide');
                        showTableMember();
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