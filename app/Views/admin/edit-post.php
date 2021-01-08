<!-- Page Container START -->
<div class="page-container">
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title"><?php echo $title;?></h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="<?= base_url()?>/Admin/kelola" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Admin Panel</a>
                    <a class="breadcrumb-item" href="<?= base_url()?>/Admin/blog">Kelola Blog</a>
                    <span class="breadcrumb-item active"><?php echo $title;?></span>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <a href="<?= base_url()?>/Admin/blog"><i class="anticon anticon-arrow-left"></i></a>
                        <div class="m-t-25">
                            <form enctype="multipart/form-data" id="edit-post">
                            <?php
                            foreach($id_blog->getResult() as $d){
                            ?>
                                <div class="form-group">
                                    <label>Judul Postingan</label>
                                    <input type="hidden" id="id_blog_e" name="id_blog_e" value="<?php echo $d->id_blog; ?>">
                                    <input type="text" class="form-control" id="judul_blog_e" name="judul_blog_e" placeholder="The Quick Brown Fox Jumps Over The Lazy Dog" value="<?php echo $d->judul_blog; ?>">
                                </div>
                                <div id="editor">
                                    <?php echo $d->isi_blog; ?>
                                </div>
                                <textarea name="isi" id="isi" style="display:none;"></textarea>
                                    <label>Gambar</label>
                                <div class="form-group">
                                    <?php
                                    if($d->gambar_blog == ""){
                                        ?>
                                        <input type="file" class="form-control-file" id="gambar_blog"       name="gambar_blog" accept="image/*">
                                    <?php } else {?>
                                        <img src="<?php echo base_url(). '/gambar-blog/' . $d->gambar_blog; ?>" alt="<?php echo $d->judul_blog; ?>" style="width: 300px; max-height: 100%; max-width: 100%;" id="thumbnail">
                                        <a href="<?= base_url()?>/Admin/delimg?id_blog=<?php echo $d->id_blog; ?>" class="badge badge-pill badge-magenta">Hapus Gambar</a>
                                    <?php } ?>
                                </div>
                                <button type="button" class="btn btn-danger m-r-5 mt-2 float-right" id="btn-chapus">
                                <i class="anticon anticon-minus-circle"></i> Hapus postingan
                                </button>
                                <button type="submit" class="btn btn-success m-r-5 mt-2" id="btn-update">
                                <i class="anticon anticon-check"></i> Simpan Perubahan
                                </button>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal hapus -->
    <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusLabel">Hapus data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="hidden" id="id_blog_e" value="<?php echo $d->id_blog; ?>">
                <div class="modal-body">
                    Hapus <strong><?php echo $d->judul_blog; ?> </strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-danger" id="btn-hapus">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
    <!-- Content Wrapper END -->
    <script src="<?= base_url() ?>/back-assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url() ?>/back-assets/vendors/quill/quill.min.js"></script>
    <script type="text/javascript">
    var quill = new Quill('#editor', {
        theme: 'snow'
    });
    $(document).ready(function(){
        var input = $("#judul_blog_e");
        var len = input.val().length;
        input[0].focus();
        input[0].setSelectionRange(len, len);
        $('#deleteGambar').on('click', function(){
            $('#thumbnail').hide();
            $('#gambar_blog').show();
            $('#deleteGambar').hide();
            // $('#tampung').html('sdsd');
            // var t = $('#tampung').html();
            // alert(t);
        });
        $('#edit-post').submit(function(){
            var quillText = quill.root.innerHTML.trim();
            $('#isi').val(quillText);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Admin/updateBlog') ?>",
                dataType: "JSON",
                data: new FormData(this),  
                contentType: false,  
                cache: false,  
                processData:false,
                success: function(data) {
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
                },
                complete: function(){
                    window.location.replace("<?= base_url()?>/admin/blog");
                }
            });
            return false;
        });

        $('#btn-chapus').on('click', function(){
            $('#modalHapus').modal('show');
        });

        $('#btn-hapus').on('click', function(){
            var kode = $('#id_blog_e').val();
            // alert(kode);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Admin/deleteBlog') ?>",
                dataType: "JSON",
                data: {
                    kode: kode
                },
                success: function(data) {
                    window.location.replace("<?= base_url()?>/admin/blog");
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                },
                complete: function(){
                    window.location.replace("<?= base_url()?>/admin/blog?act=del");
                }
            });
            return false;
        });
    })
    </script>