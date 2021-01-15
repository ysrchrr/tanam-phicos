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
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <?php
                        if(isset($_GET['act'])){
                        ?>
                        <div class="alert alert-success alert-dismissible fade show">
                            <div class="d-flex align-items-center justify-content-start">
                                <span class="alert-icon">
                                    <i class="anticon anticon-check-o"></i>
                                </span>
                                <span>Postingan telah dihapus</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <?php } ?>
                        <a class="btn btn-primary btn-tone m-r-5 float-right" href="<?= base_url()?>/Admin/newpost">
                            <i class="anticon anticon-bulb"></i> Tulis postingan
                        </a>
                        <h4>Daftar Blog</h4>
                        <div class="m-t-25">
                            <table id="data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Terakhir Diperbarui</th>
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
                    <form id="form-tambah">
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
        function convertDateDBtoIndo(string) {
            bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September' , 'Oktober', 'November', 'Desember'];
            tanggal = string.split("-")[2];
            bulan = string.split("-")[1];
            tahun = string.split("-")[0];
            return tanggal + " " + bulanIndo[Math.abs(bulan)] + " " + tahun;
        }
        function showTableBlog(){
            $.ajax({
                type  : 'GET',
                url   : '<?= base_url()?>/Admin/tampilkanBlog',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].judul_blog+'</td>'+
                                '<td>'+convertDateDBtoIndo(data[i].terakhir_diperbarui)+'</td>'+
                                '<td align="center"><a class="btn btn-primary btn-tone btn-sm" href="<?= base_url()?>/Admin/showpost?id_blog='+data[i].id_blog+'"><i class="far fa-eye"></i> Details</a></td>'+
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
            showTableBlog();
        });
    </script>