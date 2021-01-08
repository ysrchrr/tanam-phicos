<!-- Page Container START -->
<div class="page-container">
    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title"><?php echo $title;?></h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="<?= base_url()?>/Admin/kelola" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Admin Panel</a>
                    <a class="breadcrumb-item" href="#">Kelola Blog</a>
                    <span class="breadcrumb-item active"><?php echo $title;?></span>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Tulis Postingan</h4>
                        <div class="m-t-25">
                            <form>
                                <div class="form-group">
                                    <label>Judul Postingan</label>
                                    <input type="text" class="form-control" id="judul_blog" placeholder="The Quick Brown Fox Jumps Over The Lazy Dog" autofocus>
                                </div>
                                <div id="editor">
                                    <p>Hello World!</p>
                                    <p>Some initial <strong>bold</strong> text</p>
                                    <p><br></p>
                                </div>
                                <button type="button" class="btn btn-primary m-r-5 mt-2 float-right" id="btn-save">
                                    <i class="anticon anticon-notification"></i> Tulis postingan
                                </button>
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
    var quill = new Quill('#editor', {
        theme: 'snow'
    });
    $(document).ready(function(){
        $('#btn-save').on('click', function(){
            var judul = $('#judul_blog').val();
            var quillText = quill.root.innerHTML.trim();
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; 
            var yyyy = today.getFullYear();
            if(dd<10) 
            {
                dd='0'+dd;
            } 
            if(mm<10) 
            {
                mm='0'+mm;
            }
            today = yyyy+'-'+mm+'-'+dd;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Admin/newBlog') ?>",
                dataType: "JSON",
                data: {
                    judul: judul,
                    isi: quillText,
                    tanggal: today
                },
                success: function(data) {
                    $('[id="judul_blog"]').val("");
                    Command: toastr["success"](" Post telah di-publish", "Berhasil")
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
    })
    </script>