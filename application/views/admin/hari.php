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
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap-select/css/bootstrap-select.min.css');?>">
</head>

<body id="page-top">
  <?php $this->load->view('admin/header'); ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item" aria-current="page">Master Data</li>
              <li class="breadcrumb-item" aria-current="page">Waktu</li>
              <li class="breadcrumb-item active" aria-current="page">Hari</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">TABEL DATA HARI</h6>
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
                        <th data-field="id" class="font-14 text-center">ID</th>
                        <th data-field="nama" class="font-14">Hari</th>
                        <th data-field="kelas" class="font-14">Kelas</th>
                        <th data-field="aksi" data-formatter="aksiFormatter" data-events="window.aksiEvents" class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        foreach ($data as $key => $value) {
                          $id[] = $value['id'];
                          echo "<tr>
                                  <td>$value[id]</td>
                                  <td>$value[nama]</td>
                                  <td>$value[kelas]</td>
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
                  <h5 class="modal-title" id="myModalLabel">Form Tambah Hari</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formHari">
                    <input type="hidden" id="defaultID">
                    <div class="form-group row">
                      <label for="inputId" class="col-sm-3 col-form-label">ID</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputId" name="id" placeholder="ID" data-container="body" data-toggle="popover" title="Perhatikan ID yang anda input" data-placement="left" data-content="Urutan Hari ditentukan berdasarkan ID" maxlength="2" min="1">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputHari" class="col-sm-3 col-form-label">Hari</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputHari" name="nama" placeholder="Hari" data-bv-notempty="true" data-bv-notempty-message="Hari tidak boleh kosong">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputKelas" class="col-sm-3 col-form-label">Kelas</label>
                      <div class="col-sm-9">
                        <select class="selectpicker form-control" data-style="btn-outline-secondary" id="inputKelas" name="kelas" data-bv-notempty="true" data-bv-notempty-message="Kelas tidak boleh kosong" multiple>
                          <option>REGULER</option>
                          <option>NONREGULER</option>
                        </select>
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
      <script src="<?php echo base_url('assets/vendor/bootstrap-select/js/bootstrap-select.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/vendor/bootstrap-select/js/defaults-id_ID.min.js'); ?>"></script>

      <script type="text/javascript">
        var id = <?php echo json_encode($id); ?>;

        $(document).ready(function(){

          $('#formHari').bootstrapValidator({
                message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'fas fa-exclamation-circle',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: ':disabled',
            fields: {
                    id: {
                      message: 'ID tidak valid',
                        validators: {
                            notEmpty: {
                                message: 'ID tidak boleh kosong'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'ID tidak valid'
                            },
                            callback: {
                              callback: function(value, validator, $fields){
                                if (value == '') {
                                    return true;
                                  }

                                if (value == $('input[id=defaultID]').val()) {
                                  return true;
                                }else
                                if (jQuery.inArray(value,id) >= 0) {
                                  return{
                                    return: false,
                                    message: 'ID sudah digunakan'
                                  }
                                }
                                  return true;
                              }
                            }
                        }
                    }
                }
          })
        })

        $('#formHari').submit(function() {
            return false;
        });

        function setModalTambah(){
            $('#formHari').bootstrapValidator('resetForm', true);
            $('#formHari').trigger("reset");

            $('#tambahModal').modal();
            $('#myModalLabel').html("Form Tambah Hari");

            $('#inputKelas').selectpicker('val', '');

            $('#submitBtn').html('<span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Simpan</span>');
        }

        function tambah_mk(){
            $('#formHari').submit();
            var hasErr = $('#formHari').find(".has-error").length;

            if (hasErr == 0) {
              var data = $('#formHari').serializeArray();

              kelas = jQuery.grep(data, function(value) {
                return value['name'] == 'kelas';
              });

              if (kelas.length > 1) {
                kelas = {'name':'kelas','value':kelas[0].value+ ', ' + kelas[1].value};
              }else{
                kelas = {'name':'kelas','value':kelas[0].value};
              }

              data = jQuery.grep(data, function(value) {
                return value['name'] != 'kelas';
              });

              data.push(kelas);

                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/manajemen",
                    dataType: 'JSON',
                    data: {manajemen:'tambah',form:'hari',data:data},
                    success: function(res) {
                            if(res){
                                Swal.fire(
                                      'Berhasil!',
                                      'Hari berhasil ditambahkan',
                                      'success'
                                    )
                                    setTimeout(function(){location.reload(); },500);
                            }
                        }
                });
            }
        }

        function update_mk(){
            $('#formHari').submit();
            var id = $('input[id=defaultID]').val();

            var hasErr = $('#formHari').find(".has-error").length;

            if (hasErr == 0) {
              var data = $('#formHari').serializeArray();

              kelas = jQuery.grep(data, function(value) {
                return value['name'] == 'kelas';
              });

              if (kelas.length > 1) {
                kelas = {'name':'kelas','value':kelas[0].value+ ', ' + kelas[1].value};
              }else{
                kelas = {'name':'kelas','value':kelas[0].value};
              }

              data = jQuery.grep(data, function(value) {
                return value['name'] != 'kelas';
              });

              data.push(kelas);

                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/manajemen",
                    dataType: 'JSON',
                    data: {manajemen:'update',form:'hari',id:id,data:data},
                    success: function(res) {
                            if(res){
                                Swal.fire(
                                      'Berhasil!',
                                      'Hari berhasil diubah',
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
                $('#formHari').bootstrapValidator('resetForm', true);
                $('#formHari').trigger("reset");

                $('#tambahModal').modal();
                $('#myModalLabel').html("Form Ubah Hari");

                $('input[name=id]').val(row.id);
                $('input[name=nama]').val(row.nama);

                kelas = row.kelas.split(', ');
                $('#inputKelas').selectpicker('val', kelas);

                $('input[id=defaultID]').val(row.id);

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
                            data: {manajemen:"hapus",form:'hari',id:row.id},
                            success: function(res){
                                if (res === true) {
                                    Swal.fire(
                                      'Berhasil!',
                                      'Hari berhasil dihapus',
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
      </script>
</body>

</html>