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
                <div class="m-t-25">
                    <table id="data-table" class="table table-hover e-commerce-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customers</th>
                                <th>Total</th>
                                <th>Tanggal</th>
                                <th>Status</th>
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
                    <h5 class="modal-title" id="editModalLabel">Edit product</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-tambah">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nama Pemesan</label>
                                <input type="hidden" class="form-control" id="id_pemesanan_e" placeholder="Nama Barang">
                                <input type="text" class="form-control" id="nama_e" placeholder="Nama Barang" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tanggal pesan</label>
                                <input type="text" class="form-control" id="tgl_e" placeholder="YYYY-MM-DD" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Total</label>
                                <input type="text" class="form-control" id="total_e" placeholder="10000" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>No. Resi</label>
                                <input type="text" class="form-control" id="resi_e" placeholder="Masukkan No. Resi" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Status Pemesanan</label>
                            <select name="status_e" id="status_e" class="form-control">
                                    <option value="Belum dibayar">Belum dibayar</option>
                                    <option value="Sudah dibayar">Sudah dibayar</option>
                                    <option value="Packing">Packing</option>
                                    <option value="Dikirim">Dikirim</option>
                                    <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-update">Simpan perubahan</button>
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
        function convertToRupiah(angka){
            var rupiah = '';		
            var angkarev = angka.toString().split('').reverse().join('');
            for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
            return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
        }
        function convertDateDBtoIndo(string) {
            bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September' , 'Oktober', 'November', 'Desember'];
            tanggal = string.split("-")[2];
            bulan = string.split("-")[1];
            tahun = string.split("-")[0];
            return tanggal + " " + bulanIndo[Math.abs(bulan)] + " " + tahun;
        }
        function showTablePesanan(){
            $.ajax({
                type  : 'GET',
                url   : '<?= base_url()?>/Admin/tampilkanPesanan',
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        var status = data[i].status_pemesanan;
                        var badge = '';
                        if(status == "Belum dibayar"){
                            badge = '<span class="badge badge-pill badge-volcano">Belum dibayar</span>';
                        } else if(status == "Sudah dibayar"){
                            badge = '<span class="badge badge-pill badge-cyan">Sudah dibayar</span>';
                        } else if(status == "Packing"){
                            badge = '<span class="badge badge-pill badge-gold">Packing</span>';
                        } else if(status == "Dikirim"){
                            badge = '<span class="badge badge-pill badge-green">Dikirim</span>';
                        } else {
                            badge = '<span class="badge badge-pill badge-blue">Selesai</span>';
                        }
                        html += '<tr>'+
                                '<td> #'+data[i].id_pemesanan+'</td>'+
                                '<td>'+data[i].nama+'</td>'+
                                '<td>'+convertToRupiah(data[i].total)+'</td>'+
                                '<td>'+convertDateDBtoIndo(data[i].tgl_pesan)+'</td>'+
                                '<td>'+badge+'</td>'+
                                '<td align="center"><button type="button" class="btn btn-primary btn-tone btn-sm edit_data" idb="'+data[i].id_pemesanan+'"><i class="fas fa-edit"></i></button></td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                    $('#data-table').DataTable({
                        "order": [],
                        // dom: 'Bfrtip',
                        // buttons: [
                        //     'excel', 'pdf', 'print'
                        // ],
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
            showTablePesanan();
            $('#show_data').on('click', '.edit_data', function() {
                var id = $(this).attr('idb');
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url('Admin/detailPemesanan') ?>",
                    dataType: "JSON",
                    data: {
                        id_pemesanan: id
                    },
                    success: function(data) {
                        $.each(data, function(id_pemesanan, nama, resi, total, tgl_pesan, status_pemesanan) {
                            $('#editModal').modal('show');
                            $('[id="id_pemesanan_e"]').val(data.id_pemesanan);
                            $('[id="nama_e"]').val(data.nama);
                            $('[id="resi_e"]').val(data.resi);
                            $('[id="total_e"]').val(data.total);
                            $('[id="tgl_e"]').val(data.tgl_pesan);
                            $('[id="resi_e"]').val(data.resi);
                            $('[id="status_e"]').val(data.status_pemesanan);
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
                var id_pemesananan = $('#id_pemesanan_e').val();
                var status = $('#status_e').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Admin/updatePemesanan') ?>",
                    dataType: "JSON",
                    data: {
                        id_pemesanan:id_pemesananan,
                        status:status
                    },
                    success: function(data) {
                        $('[id="id_pemesanan_e"]').val("");
                        $('[id="status_e"]').val("");
                        $('#editModal').modal('hide');
                        showTablePesanan();
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
                var id = $('#id_pemesanan_e').val();
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
                    url: "<?php echo base_url('Admin/deletePemesanan') ?>",
                    dataType: "JSON",
                    data: {
                        kode: kode
                    },
                    success: function(data) {
                        $('#modalHapus').modal('hide');
                        showTablePesanan();
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