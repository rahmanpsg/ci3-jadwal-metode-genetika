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
              <li class="breadcrumb-item active" aria-current="page">Pengampu</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">TABEL DATA PENGAMPU</h6>
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
                        <th data-field="id_mk" data-visible="false">id_mk</th>
                        <th data-field="id_dosen" data-visible="false">id_dosen</th>
                        <th data-field="tahun_akademik" class="font-14 text-center">Tahun Akademik</th>
                        <th data-field="matakuliah" class="font-14">Matakuliah</th>
                        <th data-field="dosen" class="font-14">Dosen</th>
                        <th data-field="kelas" data-formatter="kelasFormatter" class="font-14">Kelas</th>
                        <th data-field="aksi" data-formatter="aksiFormatter" data-events="window.aksiEvents" class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        foreach ($data as $key => $value) {
                          echo "<tr>
                                  <td></td>
                                  <td>$value[id]</td>
                                  <td>$value[id_mk]</td>
                                  <td>$value[id_dosen]</td>
                                  <td>$value[tahun_akademik]</td>
                                  <td>$value[matakuliah]</td>
                                  <td>$value[dosen]</td>
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
                  <h5 class="modal-title" id="myModalLabel">Form Tambah Pengampu</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formPengampu">
                    <input type="hidden" name="id">
                    <input type="hidden" name="kelas">
                    <input type="hidden" id="defaultKelas">
                    <div class="form-group row">
                      <label for="inputTahunAkademik" class="col-sm-3 col-form-label">Tahun Akademik</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputTahunAkademik" name="tahun_akademik">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputMatakuliah" class="col-sm-3 col-form-label">Matakuliah</label>
                      <div class="col-sm-9">
                        <select class="selectpicker show-tick form-control" data-style="btn-outline-secondary" data-live-search="true" id="inputMatakuliah" name="id_mk" data-bv-notempty="true" data-bv-notempty-message="Matakuliah belum dipilih" multiple data-max-options="1" title=" - Pilih Matakuliah -">
                          <?php 
                          $cek='';
                            foreach ($data_mk as $key => $value) {
                              if ($value['programstudi'] !== $cek) {
                                if ($cek != '') {
                                  echo "</optgroup>";
                                }
                                echo "<optgroup label='$value[programstudi]'>";
                              }
                              echo "<option value='$value[id]' data-subtext='Semester $value[semester]'>$value[nama]</option>";
                              
                              $cek = $value['programstudi'];
                            }
                            echo "</optgroup>";
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputDosen" class="col-sm-3 col-form-label">Dosen</label>
                      <div class="col-sm-9">
                        <select class="selectpicker form-control" data-style="btn-outline-secondary" data-live-search="true" id="inputDosen" name="id_dosen" data-bv-notempty="true" data-bv-notempty-message="Dosen belum dipilih" multiple data-max-options="1" title=" - Pilih Dosen -">
                          <?php 
                            foreach ($data_dosen as $key => $value) {
                              echo "<option value='$value[id]' data-subtext='$value[title]' title='$value[nama], $value[title]'>$value[nama]</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputKelas" class="col-sm-3 col-form-label">Kelas</label>
                      <div class="col-sm-9">
                        <select class="selectpicker form-control" data-style="btn-outline-secondary" id="inputKelas" name="id_kelas" title="Pilih matakuliah terlebih dahulu" multiple>
                          
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
      <script src="<?php echo base_url('assets/vendor/bootstrap-select/js/bootstrap-select.js'); ?>"></script>
      <script src="<?php echo base_url('assets/vendor/bootstrap-select/js/defaults-id_ID.min.js'); ?>"></script>

      <script type="text/javascript">
        var dataPengampu = <?php echo json_encode($data); ?>;

        $(document).ready(function(){
          $('#formPengampu').bootstrapValidator({
                message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'fas fa-exclamation-circle',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: ':disabled',
            fields: {
                    tahun_akademik: {
                      message: 'Tahun Akademik tidak valid',
                        validators: {
                            notEmpty: {
                                message: 'Tahun Akademik tidak boleh kosong'
                            },
                            regexp: {
                                regexp: /^([0-9][0-9][0-9][0-9])-([0-9][0-9][0-9][0-9])$/,
                                message: 'Tahun Akademik tidak valid. Contoh: 2019-2020'
                            }
                        }
                    },
                    id_kelas: {
                      message: 'Kelas sudah ada',
                        validators: {
                          notEmpty: {
                                message: 'Kelas belum dipilih'
                            },
                            callback: {
                              callback: function(value, validator, $fields){
                                if($('input[name=kelas]').val() == "") {
                                    return true;
                                }else{

                                  var dataKelas = [];

                                  $.each(JSON.parse($('input[name=kelas]').val()),function(key,val){
                                    dataKelas.push(val[1]);
                                  })

                                if($('#defaultKelas').val() !=  ''){
                                  var dataDefaultKelas = [];

                                  $.each(JSON.parse($('#defaultKelas').val()),function(key,val){
                                    dataDefaultKelas.push(val[1]);
                                  })

                                  for (var i = 0; i < dataPengampu.length; i++) {
                                      var cekKelas = JSON.parse(dataPengampu[i].kelas);
                                      var kelas = [];
                                      $.each(cekKelas,function(key,val){
                                        kelas.push(val[1]);
                                      })
                                    for (var j = 0; j < dataKelas.length; j++) {
                                      if (dataPengampu[i].id_mk == $('select[name=id_mk]').val() && dataPengampu[i].tahun_akademik == $('input[name=tahun_akademik]').val() && jQuery.inArray(dataKelas[j], kelas) >= 0 && jQuery.inArray(dataKelas[j], dataDefaultKelas) < 0) {
                                          return{
                                                return: false,
                                                message: 'Kelas ' + dataKelas[j] + ' untuk matakuliah dan tahun akademik ini sudah ada'
                                            }
                                      }
                                    }
                                  }
                                  
                                }else{
                                    for (var i = 0; i < dataPengampu.length; i++) {
                                      var cekKelas = JSON.parse(dataPengampu[i].kelas);
                                      var kelas = [];
                                      $.each(cekKelas,function(key,val){
                                        kelas.push(val[1]);
                                      })

                                      for (var j = 0; j < dataKelas.length; j++) {
                                        if (dataPengampu[i].id_mk == $('select[name=id_mk]').val() && dataPengampu[i].tahun_akademik == $('input[name=tahun_akademik]').val() && jQuery.inArray(dataKelas[j], kelas) >= 0) {
                                              return{
                                              return: false,
                                              message: 'Kelas ' + dataKelas[j] + ' untuk matakuliah dan tahun akademik ini sudah ada'
                                          }
                                        }

                                      }
                                    }
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
        $('#formPengampu').submit(function() {
            return false;
        });

        $('select[name=id_mk]').change(function (e) {
            var id_mk = e.target.value;
            jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/pengampu",
                    dataType: 'JSON',
                    data: {manajemen:'getKelas',data:id_mk},
                    beforeSend: function ( xhr ) {
                       $('select[name=id_kelas]').empty()
                          .selectpicker({
                            title: 'Memproses..'
                            })
                          .selectpicker('refresh');
                    },
                    success: function(res) {
                          $('select[name=id_kelas]').empty()
                              .selectpicker({
                                title: 'Data kelas tidak ditemukan'
                                })
                              .selectpicker('refresh');

                          var kelas;
                          $.each(res, function( index, value ) {
                            kelas = JSON.parse(value.nama);
                            for (var i = 0; i < kelas.length; i++) {
                              $('select[name=id_kelas]').append('<option value="'+ value.id +'" data-subtext="'+ value.jenis +'" title="'+kelas[i]+'">' + getRomawi(parseInt(value.semester)) + ' ' + kelas[i] + '</option>')
                              .selectpicker({
                                title: '- Pilih Kelas -'
                              })
                              .selectpicker('refresh');
                            }
                          });
                        }
                });
        });

        $('select[name=id_kelas]').change(function (e) {
          if ($(this).find("option:selected").length > 0) {
            var selected = $(this).find("option:selected");
            var array = [];
            for (var i = 0; i < selected.length; i++) {
              array.push(new Array($(this).find("option:selected")[i].value, $(this).find("option:selected")[i].title));
            }
            $('input[name=kelas]').val(JSON.stringify(array));
          }else{
            $('input[name=kelas]').val('');
          }
        })

        function setModalTambah(){
            $('#formPengampu').bootstrapValidator('resetForm', true);
            $('#formPengampu').trigger("reset");

            $(".selectpicker").val('default');
            $('select[name=id_kelas]').empty()
                                      .selectpicker({title: 'Pilih matakuliah terlebih dahulu'});
            $(".selectpicker").selectpicker("refresh");

            $('#tambahModal').modal();
            $('#myModalLabel').html("Form Tambah Pengampu");

            $('#submitBtn').html('<span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Simpan</span>');
        }

        function tambah_mk(){
            $('#formPengampu').submit();
            $('#formPengampu').bootstrapValidator('updateStatus', 'id_kelas', 'VALIDATING')
                      .bootstrapValidator('validateField', 'id_kelas');

            var data = $('#formPengampu').serializeArray();

            data = jQuery.grep(data, function(value) {
              return value['name'] != 'id' && value['name'] != 'id_kelas';
            });

            var hasErr = $('#formPengampu').find(".has-error").length;

            if (hasErr == 0) {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/manajemen",
                    dataType: 'JSON',
                    data: {manajemen:'tambah',form:'pengampu',data:data},
                    success: function(res) {
                            if(res){
                                Swal.fire(
                                      'Berhasil!',
                                      'Data pengampu berhasil ditambahkan',
                                      'success'
                                    )
                                    setTimeout(function(){location.reload(); },500);
                            }
                        }
                });
            }
        }

        function update_mk(){
            $('#formPengampu').submit();
            var data = $('#formPengampu').serializeArray();
            var id = $('input[name=id]').val();

            data = jQuery.grep(data, function(value) {
              return value['name'] != 'id' && value['name'] != 'id_kelas';
            });

            var hasErr = $('#formPengampu').find(".has-error").length;

            if (hasErr == 0) {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/manajemen",
                    dataType: 'JSON',
                    data: {manajemen:'update',form:'pengampu',id:id,data:data},
                    success: function(res) {
                            if(res){
                                Swal.fire(
                                      'Berhasil!',
                                      'Data pengampu berhasil diubah',
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

        function kelasFormatter(val){
            var kelas = JSON.parse(val);
            var res = [];
            $.each(kelas,function(key,value){
              res.push(value[1]);
            })

            return res.join(', ');
        }

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
                $('#formPengampu').bootstrapValidator('resetForm', true);
                $('#formPengampu').trigger("reset");

                $('#tambahModal').modal();
                $('#myModalLabel').html("Form Ubah Pengampu");

                $('input[name=id]').val(row.id);
                $('select[name=id_mk]').val(row.id_mk);
                $('select[name=id_dosen]').val(row.id_dosen);
                //////////////////////////////////////////////////////////////
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/pengampu",
                    dataType: 'JSON',
                    data: {manajemen:'getKelas',data:row.id_mk},
                    beforeSend: function ( xhr ) {
                       $('select[name=id_kelas]').empty()
                          .selectpicker({
                            title: 'Memproses..'
                            })
                          .selectpicker('refresh');
                    },
                    success: function(res) {
                          $('select[name=id_kelas]').empty()
                              .selectpicker({
                                title: 'Data kelas tidak ditemukan'
                                })
                              .selectpicker('refresh');

                          var dataKelas = [];

                          // $.each(JSON.parse(row.kelas),function(key,val){
                          //   dataKelas.push(val[1]);
                          // })
                          // console.log(dataKelas);

                          var kelas;
                          var selected = [];
                          $.each(res, function( index, value ) {

                            kelas = JSON.parse(value.nama);
                            for (var i = 0; i < kelas.length; i++) {
                              $.each(JSON.parse(row.kelas),function(key,val){
                                if(val[1] == kelas[i]){
                                  selected[kelas[i]] = "selected";
                                }
                              })
                              
                              $('select[name=id_kelas]').append('<option value="'+ value.id +'" data-subtext="'+ value.jenis +'" title="'+kelas[i]+'"'+selected[kelas[i]]+'>' + getRomawi(parseInt(value.semester)) + ' ' + kelas[i] + '</option>')
                              .selectpicker({
                                title: '- Pilih Kelas -'
                              })
                              .selectpicker('refresh');
                            }
                          });
                        }
                });
                //////////////////////////////////////////////////////////////////////////
                $('input[name=kelas]').val(row.kelas);
                $('#defaultKelas').val(row.kelas);
                $('input[name=tahun_akademik]').val(row.tahun_akademik);
                $(".selectpicker").selectpicker("refresh");

                $('#submitBtn').html('<span class="icon text-white-50"><i class="fas fa-edit"></i></span><span class="text">Update</span>');
            },
            'click .hapus': function (e, value, row, index) {
                swal.fire({
                    title: "Warning",
                    text: "Anda yakin untuk menghapus data ini?",
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
                            data: {manajemen:"hapus",form:'pengampu',id:row.id},
                            success: function(res){
                                if (res === true) {
                                    Swal.fire(
                                      'Berhasil!',
                                      'Data pengampu berhasil dihapus',
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

        function getRomawi($angka){
                switch ($angka){
                    case 1: 
                        return "I";
                        break;
                    case 2:
                        return "II";
                        break;
                    case 3:
                        return "III";
                        break;
                    case 4:
                        return "IV";
                        break;
                    case 5:
                        return "V";
                        break;
                    case 6:
                        return "VI";
                        break;
                    case 7:
                        return "VII";
                        break;
                    case 8:
                        return "VIII";
                        break;
                    case 9:
                        return "IX";
                        break;
                    case 10:
                        return "X";
                        break;
                    case 11:
                        return "XI";
                        break;
                    case 12:
                        return "XII";
                        break;
                }
}
      </script>
</body>

</html>