<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?php echo base_url('assets/img/logo/logo.png'); ?>" rel="icon">
  <title>Jadwal Kuliah Fakultas Teknik</title>
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');  ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/ruang-admin.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/bootstrap-table/bootstrap-table.min.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap-validator/css/bootstrapValidator.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/sweetalert2/sweetalert2.css');?>">
</head>

<body id="page-top">
  <?php $this->load->view('admin/header'); ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item" aria-current="page">Master Data</li>
              <!-- <li class="breadcrumb-item" aria-current="page">Dosen</li> -->
              <li class="breadcrumb-item active" aria-current="page">Data Dosen</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">TABEL DATA DOSEN</h6>
                </div>
                <div class="card-body">
                <div class="table-responsive p-3">
                  <button class="btn btn-primary btn-icon-split" onclick="setModalTambah();">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data</span>
                  </button>
                  <table class="table align-items-center table-flush" id="table" data-toggle="table" data-click-to-select="true"  data-pagination="true" data-search="true">
                    <thead class="bg-primary text-white text-center">
                      <tr>
                        <th data-field="no" data-formatter="indexFormatter" class="font-14 text-center">#</th>
                        <th data-field="id" data-visible="false">id</th>
                        <th data-field="nbm" class="font-14">NBM</th>
                        <th data-field="nama" class="font-14">Nama</th>
                        <th data-field="title" class="font-14">Title</th>
                        <th data-field="alamat" class="font-14">Alamat</th>
                        <th data-field="notelp" class="font-14">No Telpon</th>
                        <th data-field="aksi" data-formatter="aksiFormatter" data-events="window.aksiEvents" class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        foreach ($data as $key => $value) {
                          echo "<tr>
                                  <td></td>
                                  <td>$value[id]</td>
                                  <td>$value[nbm]</td>
                                  <td>$value[nama]</td>
                                  <td>$value[title]</td>
                                  <td>$value[alamat]</td>
                                  <td>$value[notelp]</td>
                                  <td></td>
                                </tr>";
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
                </div>
              </div>
            </div>

            <!-- Modal -->
          <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="myModalLabel">Form Tambah Dosen</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formDosen">
                    <input type="hidden" name="id">
                    <div class="form-group row">
                      <label for="inputNbm" class="col-sm-3 col-form-label">NBM</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputNbm" name="nbm" placeholder="NBM">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputNama" class="col-sm-3 col-form-label">Nama</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Nama Dosen" data-bv-notempty="true" data-bv-notempty-message="Nama Dosen tidak boleh kosong">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputNama" class="col-sm-3 col-form-label">Title</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputNama" name="title" placeholder="Title Dosen" data-bv-notempty="true" data-bv-notempty-message="Title Dosen tidak boleh kosong">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputAlamat" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" id="inputAlamat" name="alamat" placeholder="Alamat"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputNotelp" class="col-sm-3 col-form-label">No Telpon</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="inputNotelp" name="notelp" placeholder="No Telpon">
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary btn-icon-split" id="submitBtn">
                    <span class="icon text-white-50">
                      <i class="fas fa-save"></i>
                    </span>
                    <span class="text">Simpan</span>
                  </button>
                </div>
              </div>
            </div>
          </div>

          </div>
          <!--Row-->
        </div>
        <!---Container Fluid-->
      </div>
      <?php $this->load->view('admin/footer'); ?>
      <script src="<?php echo base_url('assets/vendor/bootstrap-table/bootstrap-table.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/vendor/bootstrap-table/bootstrap-table-id-ID.js'); ?>"></script>
      <script src="<?php echo base_url('assets/vendor/bootstrap-validator/js/bootstrapValidator.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/vendor/sweetalert2/sweetalert2.all.min.js'); ?>"></script>

      <script type="text/javascript">
        $(document).ready(function(){
          $('#formDosen').bootstrapValidator({
                message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'fas fa-exclamation-circle',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: ':disabled'
          })
        })
        $('#formDosen').submit(function() {
            return false;
        });

        function setModalTambah(){
            $('#formDosen').bootstrapValidator('resetForm', true);
            $('#formDosen').trigger("reset");

            $('#tambahModal').modal();
            $('#myModalLabel').html("Form Tambah Dosen");

            $('#submitBtn').html('<span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Simpan</span>');
        }

        function tambah_mk(){
            $('#formDosen').submit();
            var data = $('#formDosen').serializeArray();

            data = jQuery.grep(data, function(value) {
              return value['name'] != 'id';
            });

            var hasErr = $('#formDosen').find(".has-error").length;

            if (hasErr == 0) {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/manajemen",
                    dataType: 'JSON',
                    data: {manajemen:'tambah',form:'dosen',data:data},
                    success: function(res) {
                            if(res){
                                Swal.fire(
                                      'Berhasil!',
                                      'Dosen berhasil ditambahkan',
                                      'success'
                                    )
                                    setTimeout(function(){location.reload(); },500);
                            }
                        }
                });
            }
        }

        function update_mk(){
            $('#formDosen').submit();
            var data = $('#formDosen').serializeArray();
            var id = $('input[name=id]').val();

            data = jQuery.grep(data, function(value) {
              return value['name'] != 'id';
            });

            var hasErr = $('#formDosen').find(".has-error").length;

            if (hasErr == 0) {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/manajemen",
                    dataType: 'JSON',
                    data: {manajemen:'update',form:'dosen',id:id,data:data},
                    success: function(res) {
                            if(res){
                                Swal.fire(
                                      'Berhasil!',
                                      'Dosen berhasil diubah',
                                      'success'
                                    )
                                    setTimeout(function(){location.reload(); },500);
                            }
                        }
                });
            }
        }
        
        $("#submitBtn").click(function (){
              var ButtonText = $.trim($(this).text());
              if (ButtonText == "Simpan") {
                tambah_mk();
              }else 
              if(ButtonText == "Update"){
                update_mk();
              }
         })

        function aksiFormatter(val){
            return ["<button data-toggle='tooltip' title='Ubah' class='ubah btn btn-info btn-sm'>",
                    "<i class='fas fa-pencil-alt'></i>",
                    "</button>",
                    "<button data-toggle='tooltip' title='Hapus' class='hapus btn btn-danger btn-sm'>",
                    "<i class='fas fa-trash'></i>",
                    "</button>"].join(' ');
        }

        window.aksiEvents = {
            'click .ubah': function (e, value, row, index) {
                $('#formDosen').bootstrapValidator('resetForm', true);
                $('#formDosen').trigger("reset");

                $('#tambahModal').modal();
                $('#myModalLabel').html("Form Ubah Dosen");

                $('input[name=id]').val(row.id);
                $('input[name=nbm]').val(row.nbm);
                $('input[name=nama]').val(row.nama);
                $('input[name=title]').val(row.title);
                $('textarea[name=alamat]').val(row.alamat);
                $('input[name=notelp]').val(row.notelp);

                $('#submitBtn').html('<span class="icon text-white-50"><i class="fas fa-edit"></i></span><span class="text">Update</span>');
            },
            'click .hapus': function (e, value, row, index) {
                swal.fire({
                    title: "Warning",
                    text: "Anda yakin untuk menghapus "+row.nama+" ?",
                    icon: 'warning',
                    showCancelButton: true,
                    showCloseButton: false,
                    cancelButtonColor: '#001473',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Batal'
                }).then(function(res){
                    if(res.value){
                        jQuery.ajax({
                            type: "POST",
                            url: "<?php echo base_url() ?>"+"admin/manajemen",
                            dataType: "JSON",
                            data: {manajemen:"hapus",form:'dosen',id:row.id},
                            success: function(res){
                                if (res === true) {
                                    Swal.fire(
                                      'Berhasil!',
                                      'Dosen berhasil dihapus',
                                      'success'
                                    )
                                    setTimeout(function(){location.reload(); },500);
                                }
                            }
                        });
                    }
                });
            }
        }

        function indexFormatter(val,row,index){
            return index+1;
        }
      </script>
</body>

</html>