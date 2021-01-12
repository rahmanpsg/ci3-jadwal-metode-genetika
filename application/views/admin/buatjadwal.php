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
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/gijgo/gijgo.css');?>">
  <link href="<?php echo base_url('assets/vendor/select2/select2.min.css') ?>" rel="stylesheet" />
  <style type="text/css">
    .form-control-placeholder {
  position: absolute;
  top: 0;
  padding: 7px 0 0 13px;
  transition: all 200ms;
  opacity: 0.5;
}

.form-control:focus + .form-control-placeholder,
.form-control:valid + .form-control-placeholder {
  font-size: 75%;
  transform: translate3d(0, -100%, 0);
  opacity: 1;
}
  </style>
</head>

<body id="page-top">
  <?php $this->load->view('admin/header'); ?>
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item" aria-current="page">Proses</li>
              <li class="breadcrumb-item active" aria-current="page">Buat Jadwal</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">GENERATE JADWAL KULIAH MENGGUNAKAN METODE GENETIKA</h6>
                </div>
                <div class="card-body">
                <div class="table-responsive p-3">
                  <form id="formBuatJadwal">
                    <div class="form-group row">
                      <div class="row col-sm-12">
                      <div class="col-sm-3">
                        <select class="selectpicker form-control" data-style="btn-outline-secondary" id="inputJenisSemester" name="jenis_semester" data-bv-notempty="true" data-bv-notempty-message="Jenis Semester belum dipilih" title="- Pilih Jenis Semester -">
                          <option value="0">GENAP</option>
                          <option value="1">GANJIL</option>
                        </select>
                      </div>
                      <!-- <div class="col-sm-3">
                        <input type="text" name="populasi" class="form-control" placeholder="Jumlah Populasi" value="10">
                        <label class="form-control-placeholder" for="populasi">Jumlah Populasi</label>
                        <small id="populasiHelper" class="badge badge-default badge-danger form-text text-white float-left">Jumlah Populasi tidak boleh kosong</small>
                      </div> -->
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="row col-sm-12">
                      <div class="col-sm-3">
                        <select class="selectpicker form-control" data-style="btn-outline-secondary" id="inputTahunAkademik" name="tahun_akademik" data-bv-notempty="true" data-bv-notempty-message="Tahun Akademik belum dipilih" multiple data-max-options="1" title="- Pilih Tahun Akademik -">
                          <?php
                            foreach ($dataTahunAkademik as $key => $value) {
                              echo "<option>$value[tahun_akademik]</option>";
                            }
                          ?>
                        </select>
                      </div>
                      </div>
                    </div>
                    <!-- <div class="form-group row">
                      <div class="row col-sm-12">
                      <div class="col-sm-3">
                        <select class="selectpicker form-control" data-style="btn-outline-secondary" id="inputProdi" name="prodi" data-bv-notempty="true" data-bv-notempty-message="Program Studi belum dipilih" multiple title="- Pilih Program Studi -">
                          
                        </select>
                      </div>
                      </div>
                    </div> -->
                  </form>
                  <button class="btn btn-primary btn-icon-split mb-3" id="submitBtn">
                    <span class="icon text-white-50">
                      <i class="far fa-paper-plane"></i>
                    </span>
                    <span class="text">Proses</span>
                  </button>

                  <div class="progress d-none">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" id="myProgress" 
                      aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%" value="0">0%</div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">TABEL JADWAL KULIAH</h6>
                </div>
                <div class="card-body">
                  <form class="form-inline p-3" id="filterTable">
                    <div class="form-group form-inline">
                      <select class="selectpicker form-control" data-style="btn-outline-secondary" id="inputFilter" name="filter" multiple data-max-options="1" title="Filter Tabel Jadwal Kuliah">
                          <option value="programstudi">Program Studi</option>
                          <option value="nama_mk">Matakuliah</option>
                          <option value="dosen">Dosen</option>
                          <option value="kelas">Kelas</option>
                        </select>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="form-group" id="inputdataFilter">
                      <select class="selectpicker form-control" data-style="btn-outline-secondary" name="dataFilter" multiple data-max-options="1" data-live-search="true">

                        </select>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <button class="btn btn-success btn-icon-split" id="bentrokBtn">
                      <span class="icon text-white-50">
                        <i class="fas fa-search"></i>
                      </span>
                      <span class="text">Cek Jadwal Bentrok</span>
                    </button>
                    &nbsp;&nbsp;&nbsp;
                    <button class="btn btn-danger btn-icon-split" id="hapusBtn">
                      <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                      </span>
                      <span class="text">Hapus Jadwal Kuliah</span>
                    </button>
                    &nbsp;&nbsp;&nbsp;
                    <button class="btn btn-info btn-icon-split" onclick="cetakClick()">
                    <span class="icon text-white-50">
                      <i class="fas fa-print"></i>
                    </span>
                    <span class="text">Cetak</span>
                  </button>
                  </form>
                <div class="table-responsive p-3">

                  <table class="table align-items-center table-flush" id="table" data-url="<?php echo base_url('admin/getData?tabel=tbl_jadwalkuliah') ?>" data-toggle="table" data-pagination="true" data-page-size="20" data-page-list="[10, 25, 50, 100, ALL]" data-search="true" data-row-style="rowStyle">
                    <thead class="bg-primary text-white text-center">
                      <tr>
                        <th data-field="no" data-formatter="indexFormatter" class="font-14 text-center">#</th>
                        <th data-field="id" data-visible="false">id</th>
                        <th data-field="tahun_angkatan" data-visible="false">tahun angkatan</th>
                        <th data-field="hari" class="font-14">Hari</th>
                        <th data-field="jam_kuliah" class="font-14">Jam</th>
                        <th data-field="nama_mk" class="font-14">Matakuliah</th>
                        <th data-field="sks" class="font-14">SKS</th>
                        <th data-field="semester" class="font-14">Semester</th>
                        <th data-field="kelas" class="font-14">Kelas</th>
                        <th data-field="dosen" class="font-14">Dosen</th>
                        <th data-field="ruang" class="font-14">Ruangan</th>
                        <th data-field="programstudi" data-visible="false" class="font-14">Program Studi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        // foreach ($data as $key => $value) {
                        //   echo "<tr>
                        //           <td></td>
                        //           <td>$value[id]</td>
                        //           <td>$value[tahun_angkatan]</td>
                        //           <td>$value[hari]</td>
                        //           <td>$value[jam_kuliah]</td>
                        //           <td>$value[nama_mk]</td>
                        //           <td>$value[sks]</td>
                        //           <td>$value[semester]</td>
                        //           <td>$value[kelas]</td>
                        //           <td>$value[dosen]</td>
                        //           <td>$value[ruang]</td>
                        //           <td>$value[programstudi]</td>
                                  
                        //         </tr>";
                        // }
                      ?>
                    </tbody>
                  </table>
                </div>
                </div>
              </div>
            </div>

    <div class="modal fade" id="myBentrok" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Form Cek Jadwal Bentrok</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                      <table id="tableBentrok">
                      <thead class="bg-primary text-white text-center">                        
                      </thead>
                    </table>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-icon-split" data-dismiss="modal">
                        <span class="icon text-white-50">
                          <i class="fas fa-window-close"></i>
                        </span>
                        <span class="text">Tutup</span>
                      </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myCetak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Form Cetak</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <div class="isi-laporan"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-icon-split" data-dismiss="modal">
                        <span class="icon text-white-50">
                          <i class="fas fa-window-close"></i>
                        </span>
                        <span class="text">Tutup</span>
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
      <script src="<?php echo base_url('assets/vendor/gijgo/gijgo.js') ?>" type="text/javascript"></script>
      <script src="<?php echo base_url('assets/vendor/select2/select2.min.js') ?>"></script>
    <script>
      $(document).ready(function () {
        var dataSelected;
        editManager = function (value, record, $cell, $displayEl, id, $grid) {
                    var data = $grid.data(),
                        $edit = $("<button data-toggle='tooltip' title='Ubah' class='btn btn-info btn-sm'><i class='fas fa-pencil-alt'></i></button>").attr('data-key', id),
                        $update = $("<button data-toggle='tooltip' title='Update' class='btn btn-success btn-sm'><i class='fa fa-save'></i></button>").attr('data-key', id).hide(),
                        $cancel = $("<button data-toggle='tooltip' title='Batal' class='btn btn-danger btn-sm'><i class='fa fa-times'></i></button>").attr('data-key', id).hide();
                    $edit.on('click', function (e) {
                        $grid.edit($(this).data('key'));
                        const id = $(this).data('key');
                        dataSelected = grid.getById(id);
                        $edit.hide();
                        $update.show();
                        $cancel.show();
                    });
                    $update.on('click', function (e) {
                        $grid.update($(this).data('key'));
                        $edit.show();
                        $update.hide();
                        $cancel.hide();
                    });
                    $cancel.on('click', function (e) {
                        $grid.cancel($(this).data('key'));
                        $edit.show();
                        $update.hide();
                        $cancel.hide();
                    });
                $displayEl.empty().append($edit).append($update).append($cancel);
                }
          
 // data-source="<?php echo base_url('admin/cekBentrokJadwal') ?>" data-ui-library="bootstrap3"
            var grid, countries;
            grid = $('#tableBentrok').grid({
                dataSource: "<?php echo base_url('admin/cekBentrokJadwal') ?>",
                uiLibrary: 'bootstrap3',
                primaryKey: 'id',
                grouping: { groupBy: '#' },
                inlineEditing: { mode: 'command', managementColumn: false},
                detailTemplate: '<div style="text-align: left"><p><b>SKS:</b> {sks}</p><p><b>SEMESTER:</b> {semester}</p><p><b>PROGRAM STUDI:</b> {programstudi}</p></div>',
                responsive: true,
                iconsLibrary: 'fontawesome',
                columns: [
                { field: 'id', hidden: true },
                { field: 'id_hari', hidden: true },
                { field: 'id_jam', hidden: true },
                { field: 'id_dosen', hidden: true },
                { field: 'jenis', hidden: true },
                { field: 'sks', hidden: true },
                { field: 'semester', hidden: true },
                { field: 'programstudi', hidden: true },
                { field: '#', hidden: true },
                { field: 'hari', title: 'Hari', editor: editorHari, editField: 'id_hari', width: 105 },
                { field: 'jam_kuliah', title: 'Jam', editor: editorJam, editField: 'id_jam', width: 140},
                { field: 'nama_mk', title: 'Matakuliah' },
                { field: 'kelas', title: 'Kelas', width:52 },
                { field: 'dosen', title: 'Dosen'},
                {width: 100, align: 'center', renderer: editManager}]
            });

            function editorHari($editorContainer, value, record) {
              var res = jQuery.ajax({
                  type: "GET",
                  url: "<?php echo base_url() ?>"+"admin/getData",
                  dataType: 'JSON',
                  data: {tabel:'tbl_hari',kolom:'nama',where:{kelas:record.jenis}},
                  async: false
              }) 

              var select = $('<select></select>');
              const hari = record.hari;
              $.each(res.responseJSON,function(index, el) {
                select.append("<option value='"+el.id+"' "+(el.text == hari ? 'selected' : '')+">"+el.text+"</option>");
              });

              $editorContainer.append(select);
              select.select2();

              select.on('change', function(e){
                var select = $('#selectJam'+record.id);
                select.empty();

                select.append(setSelectJam(e.target.value, record.sks, record.id_jam));

              })
            }
            
            function editorJam($editorContainer, value, record) {
              var select = $('<select id="selectJam'+record.id+'"></select>');

              select.append(setSelectJam(record.id_hari, record.sks, record.id_jam));

              $editorContainer.append(select);
              select.select2();
            }

            function setSelectJam(hari,sks,jam){
              var res = jQuery.ajax({
                  type: "GET",
                  url: "<?php echo base_url() ?>"+"admin/getData",
                  dataType: 'JSON',
                  data: {tabel:'tbl_jam',kolom:'range_jam',where:{hari:hari,sks:sks}},
                  async: false
                }) 
                
                var res;
                $.each(res.responseJSON,function(index, el) {
                  res += "<option value='"+el.id+"' "+(el.id == jam ? 'selected' : '')+">"+el.jam_kuliah+"</option>";
                });

                return res;
            }

            grid.on('rowDataChanged', function (e, id, record) {
                // Clone the record in new object where you can format the data to format that is supported by the backend.
                var data = $.extend(true, {}, record);

                // console.log(data);
                // console.log(data.id_hari);
                
                jQuery.ajax({
                      type: "POST",
                      url: "<?php echo base_url() ?>"+"admin/setJadwalBentrok",
                      dataType: 'json',
                      data: {manajemen: 'update', data: data},
                      success: function(res) {
                        if (res.status) {
                          Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: res.data,
                            showConfirmButton: false,
                            timer: 1500
                          })
                          grid.reload();
                        }else{
                          Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: res.data,
                            showConfirmButton: false,
                            timer: 1500
                          })
                        }
                      }
                })
            });
            
        });
    </script>
      <script type="text/javascript">
        $(document).ready(function(){

          $('#populasiHelper').hide();
          $('select[name=dataFilter]').selectpicker('hide');
          $('#formBuatJadwal').bootstrapValidator({
                message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'fas fa-exclamation-circle',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: ':disabled'
            // fields: {
            //         prodi: {
            //           message: 'Tidak ada data dengan Semester, Tahun Akademik dan Prodi ini',
            //             validators: {
            //                 callback: {
            //                   callback: function(value, validator, $fields){
            //                     var jenis_semester = $('select[name=jenis_semester]').val();
            //                     var tahun_akademik = $('select[name=tahun_akademik]').val()[0];

            //                     if (jenis_semester != '' && tahun_akademik != undefined) {
            //                       $.each(value,function(key,val){
            //                           jQuery.ajax({
            //                                 type: "POST",
            //                                 url: "<?php echo base_url() ?>"+"admin/cekDataJadwal",
            //                                 dataType: 'json',
            //                                 data: {jurusan:val, jenis_semester:jenis_semester, tahun_akademik:tahun_akademik},
            //                                 success: function(res) {
            //                                   if (res == false) {
            //                                     $('#formBuatJadwal').bootstrapValidator('updateStatus', 'prodi', 'INVALID', 'callback')
            //                                                         .bootstrapValidator('validateField', 'prodi');
            //                                   }
            //                                 }
            //                           })
            //                       })
            //                     }
            //                     return true;
            //                   }
            //                 }
            //             }
            //         }
            //   }
          })
        })

        $('#formBuatJadwal').submit(function() {
            return false;
        });

        $('#filterTable').submit(function(){
          return false;
        })

        // $('select[name=tahun_akademik]').change(function(e){
        //   if ($('select[name=prodi]').val() != '') {
        //     $('#formBuatJadwal').bootstrapValidator('updateStatus', 'prodi', 'VALIDATING', 'callback')
        //                           .bootstrapValidator('validateField', 'prodi');
        //   }
        // })

        // $('select[name=jenis_semester]').change(function(e){
        //   if ($('select[name=prodi]').val() != '') {
        //     $('#formBuatJadwal').bootstrapValidator('updateStatus', 'prodi', 'VALIDATING', 'callback')
        //                           .bootstrapValidator('validateField', 'prodi');
        //   }
        // })

        $('select[name=filter]').change(function(e){
          var val = e.target.value;
          $('select[name=dataFilter]').empty();
          $('select[name=dataFilter]').selectpicker({
                                        title: 'Memproses...'
                                        })
                                      .selectpicker('refresh');
          if (val == "") {
            $('select[name=dataFilter]').selectpicker('hide');
            $('#table').bootstrapTable('filterBy', {});
          }else{
            $('select[name=dataFilter]').selectpicker('show');
            
            getDataFilter(val);
          }
        })

        function getDataFilter(val){
          if (val == "programstudi") {
              jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/buatjadwal",
                    dataType: 'json',
                    data: {manajemen:'getDataFilter',tabel:"prodi"},
                    success: function(res) {
                      var option = "";
                      $.each(res,function(keys,value){
                        option += "<option>" + value.nama + "</option>";
                      })

                      $('select[name=dataFilter]').html(option);
                      $('select[name=dataFilter]').selectpicker({
                                                        title: '- Pilih Program Studi -'
                                                        })
                                                  .selectpicker('refresh');
                    }
              })
            }else
            if (val == "nama_mk") {
              jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/buatjadwal",
                    dataType: 'json',
                    data: {manajemen:'getDataFilter',tabel:"matakuliah"},
                    success: function(res) {
                      var option = "";
                      var cek = "";
                      $.each(res,function(keys,value){
                        if (value.programstudi !== cek) {
                            if (cek != '') {
                              option += "</optgroup>";
                            }
                            option += "<optgroup label='"+ value.programstudi +"'>";
                          }
                          option += "<option data-subtext='Semester " + value.semester +"' value='"+ value.nama +"'>"+ value.nama +"</option>";
                          
                          cek = value.programstudi;
                      })

                      option += "</optgroup>";

                      $('select[name=dataFilter]').html(option);
                      $('select[name=dataFilter]').selectpicker({
                                                        title: '- Pilih Matakuliah -'
                                                        })
                                                  .selectpicker('refresh');
                    }
              })
            }else
            if (val == "dosen") {
              jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/buatjadwal",
                    dataType: 'json',
                    data: {manajemen:'getDataFilter',tabel:"dosen"},
                    success: function(res) {
                      var option = "";
                      $.each(res,function(keys,value){
                        var dosen = value.nama + ', ' + value.title;
                        option += "<option value='"+ dosen +"' data-subtext='"+ value.title +"'>" + value.nama + "</option>";
                      })

                      $('select[name=dataFilter]').html(option);
                      $('select[name=dataFilter]').selectpicker({
                                                        title: '- Pilih Dosen -'
                                                        })
                                                  .selectpicker('refresh');
                    }
              })
            }else
            if (val == "kelas") {
              jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>"+"admin/buatjadwal",
                    dataType: 'json',
                    data: {manajemen:'getDataFilter',tabel:"kelas"},
                    success: function(res) {
                      var option = "";
                      var cek = "";
                      var kelas;
                      $.each(res,function(keys,value){
                        if (value.programstudi !== cek) {
                            if (cek != '') {
                              option += "</optgroup>";
                            }
                            option += "<optgroup label='"+ value.programstudi +"'>";
                          }
                          // option += "<option value='" + value.id + "' data-subtext='Semester " + value.semester +"'>"+ value.nama +"</option>";
                          kelas = JSON.parse(value.nama);
                            for (var i = 0; i < kelas.length; i++) {
                              option += '<option value="'+ [kelas[i],value.tahun_angkatan,value.programstudi] +'" data-subtext="'+ value.jenis +'">' + value.tahun_angkatan + ' ' + kelas[i] + '</option>';
                            }
                          
                          cek = value.programstudi;
                      })

                      option += "</optgroup>";

                      $('select[name=dataFilter]').html(option);
                      $('select[name=dataFilter]').selectpicker({
                                                        title: '- Pilih Kelas -'
                                                        })
                                                  .selectpicker('refresh');
                    }
              })
            }
        }

        $('select[name=dataFilter]').change(function(e){
          var field = $('select[name=filter]').val();

            switch(field.toString()){
              case 'programstudi':
                $('#table').bootstrapTable('filterBy', {programstudi: $(this).val()});
                break;
              case 'nama_mk':
                $('#table').bootstrapTable('filterBy', {nama_mk: $(this).val()});
                break;
              case 'dosen':
                $('#table').bootstrapTable('filterBy', {dosen: $(this).val()});
                break;
              case 'kelas':
                var dataFilter = e.target.value.split(",");
                $('#table').bootstrapTable('filterBy', {kelas: dataFilter[0],tahun_angkatan: dataFilter[1],programstudi: dataFilter[2]});
                break;
              default:
                $('#table').bootstrapTable('filterBy', {});
            }
        })

        $("#submitBtn").click(function (){
            $('#formBuatJadwal').submit();
            
            var data = $('#formBuatJadwal').serializeArray();
            var result_jurusan = [];

            $.each(data, function(index,value){
              return value['name'] == 'prodi' ? result_jurusan.push({'jurusan':value['value']}) : '';
            })

            data = jQuery.grep(data, function(value) {
              return value['name'] != 'id' && value['name'] != 'prodi';
            });

            var hasErr = $('#formBuatJadwal').find(".has-error").length;

            if (hasErr == 0) {
              if ($('input[name=populasi]').val() == '') {
                $('#populasiHelper').show();
              }else{
                $('#populasiHelper').hide();

                // $('.progress').removeClass('d-none').addClass('d-block');

                $('#submitBtn')
                    .attr('disabled',true)
                    .html('<span class="icon text-white-50"><i class="spinner-border spinner-border-sm" role="status"aria-hidden="true"></i></span><span class="text">Memproses...</span>');

                var start = new Date().getTime();

                // run_server_ga(data[0].value, data[1].value, start);
                generateJadwal(data[0].value, data[1].value, start);

              }
            }
         })

      // function run_server_ga(jenis_semester, tahun_akademik, start)
      // {
      //      console.log("Memanggil server untuk membuat JADWAL pada : " + new Date().toLocaleString() );

      //    if (!!window.EventSource) {
       
      //     var source= new EventSource("<?php echo base_url() ?>"+"admin/generatejadwal?jenis_semester="+jenis_semester+"&tahun_akademik="+tahun_akademik);

      //     var curr_fitness = 0;
      //     const curr_val = $('#myProgress').val();
       
      //    source.addEventListener('update', function(e)
      //    {
      //      var data = JSON.parse(e.data);
          
      //       const fitness = data.fitness;

      //       if (curr_val <= fitness) {
      //           var new_val = fitness * 100;
      //       }

      //       const percent = parseInt(curr_val > new_val ? curr_val : new_val);
      //       $('#myProgress').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%')

      //      if (data.status==true){
      //         source.close();

      //         const waktu = convertTime(start);

      //        createNotification('success', 'Jadwal kuliah berhasil dibuat, Waktu Proses = '+waktu);

      //        $('#table').bootstrapTable('refresh');
      //     }else
      //     if(data.status=='gagal'){
      //       source.close();

      //       const waktu = convertTime(start);

      //       createNotification('error', 'Tidak ditemukan solusi optimal, Waktu Proses = '+waktu);
      //     }
          
      // }, false);

      // source.onerror = function(e) {
      //   console.log('failed');
      //   source.close();

      //   const waktu = convertTime(start);

      //   createNotification('error', 'Terjadi masalah di server, Waktu Proses = '+waktu);
        
      // };

      // } else {
      //   console.log('not support');
      //   source.close();

      //   createNotification('error', 'Browser yang anda gunakan tidak support SSE, harap gunakan browser yang lain');
      // }

      // }

      function createNotification(status, teks){
        $('.progress').removeClass('d-block').addClass('d-none');

        $('#submitBtn')
            .attr('disabled',false)
            .html('<span class="icon text-white-50"><i class="far fa-paper-plane"></i></span><span class="text">Proses</span>');

        Swal.fire({
            position: 'top-end',
            icon: status,
            title: teks,
            showConfirmButton: true
          })

      }

      function convertTime(start){
        const sec_num = parseInt((new Date().getTime() - start) / 1000, 10);
        const hours   = Math.floor(sec_num / 3600);
        const minutes = Math.floor((sec_num - (hours * 3600)) / 60);
        const seconds = sec_num - (hours * 3600) - (minutes * 60);

        return (hours == 0) ? (minutes == 0) ? seconds+' Detik' : minutes +' Menit, '+seconds+' Detik' : hours+' Jam, '+ minutes+' Menit, '+seconds+' Detik';
      }

      function generateJadwal(jenis_semester, tahun_akademik, start){
        const request = jQuery.ajax({
          type: "GET",
          url: "<?php echo base_url() ?>" + "admin/generatejadwal",
          dataType: "JSON",
          data: {jenis_semester:jenis_semester, tahun_akademik:tahun_akademik},
          success: function(res){
            console.log(res);
            if (res.status==true) {
              const waktu = convertTime(start);

             createNotification('success', 'Jadwal kuliah berhasil dibuat, Waktu Proses = '+waktu);

             $('#table').bootstrapTable('refresh');  
            }else
            if(res.status=="gagal"){
              const waktu = convertTime(start);

              createNotification('error', 'Tidak ditemukan solusi optimal, Waktu Proses = '+waktu);
            }
            
          },
          error: function(res){
            console.log(res);
            const waktu = convertTime(start);

            createNotification('error', 'Terjadi masalah di server, Waktu Proses = '+waktu);
          }
        });
      }

    //   const forLoop = async (result_jurusan, data) => {
    //     var start = new Date().getTime();
    //     var prodi = $('select[name=prodi]').val();

    //     const total_jadwal = getTotalJadwal(data,prodi);

    //     const data_progress = $.map(result_jurusan, function(val,index){
    //       // return [(100/result_jurusan.length)*index];
    //       return [Math.round((total_jadwal.prodi[index].total/total_jadwal.total) * 100)]
    //     })

    //     for (var i = 0; i < result_jurusan.length; i++) {
    //       var jurusan = result_jurusan[i].jurusan;
    //       var last_response_len = false;
    //       var nilai_awal_progress = parseInt(total_jadwal.progress[i]);
    //       $('#myProgress').attr('aria-valuenow', nilai_awal_progress).css('width', nilai_awal_progress + '%').text(nilai_awal_progress + '%');

    //     const ajax = await jQuery.ajax({
    //         type: "POST",
    //         url: "<?php echo base_url() ?>"+"admin/generatejadwal",
    //         // dataType: 'JSON',
    //         data: {data:data,jurusan:jurusan,total:total_jadwal.prodi[i].total},
    //         cache: true,
    //         async : true,
    //         xhr: function () {
    //             var xhr = new window.XMLHttpRequest();
    //             //Download progress
    //             xhr.addEventListener("progress", function (evt) {
    //               // console.log(evt.currentTarget.response);
    //               var this_response, response = evt.currentTarget.response;
    //               if(last_response_len === false)
    //               {
    //                   this_response = response;
    //                   last_response_len = response.length;
    //               }
    //               else
    //               {
    //                   this_response = response.substring(last_response_len);
    //                   last_response_len = response.length;
    //               }

    //                 var curr_fitness = 0.0000;

    //                 try{
    //                   var fitness = JSON.parse(this_response.split('}{')).fitness;  
    //                   curr_fitness = fitness;
    //                 } catch(e){
    //                   var fitness = curr_fitness;  
    //                   // console.log(e);
    //                 }
                    
    //                 // const fitness = JSON.parse(this_response.split('}{')).fitness;  
    //                 const curr_val = parseInt($('#myProgress').attr('aria-valuenow'));
                    
    //                 // if (curr_val <= (100/result_jurusan.length)) {
    //                 //     const new_val = (fitness/result_jurusan.length);
    //                 // }else{
    //                 //     const new_val = total_progress[i] + (fitness/result_jurusan.length);
    //                 // }


    //                 if (curr_val <= data_progress[0]) {
    //                     var new_val = (fitness * data_progress[i]);
    //                 }else{
    //                     var new_val = total_jadwal.progress[i] + (fitness * data_progress[i]);
    //                 }

    //                 const percent = parseInt(curr_val > new_val ? curr_val : new_val);

    //                 $('#myProgress').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
    //             }, false);
    //             return xhr;
    //         },
    //         success: function(response) {
    //           var res = JSON.parse(response.split('{"fitness":"1.0000"}')[1]);

    //           var ms = (new Date().getTime() - start);
    //           min = Math.floor((ms/1000/60) << 0),
    //           sec = Math.floor((ms/1000) % 60);

    //           if (res['status'] == true) {
    //             $('#table').bootstrapTable('removeAll');
    //             $('#table').bootstrapTable('load', res[1]);
    //               if (res[0] == result_jurusan.length) {
    //                 $('.progress').removeClass('d-block').addClass('d-none');

    //                 $('#submitBtn')
    //                   .attr('disabled',false)
    //                   .html('<span class="icon text-white-50"><i class="far fa-paper-plane"></i></span><span class="text">Proses</span>');
    //                   Swal.fire({
    //                     position: 'top-end',
    //                     icon: 'success',
    //                     title: 'Jadwal Kuliah Berhasil Dibuat, ' + 'Waktu proses = ' + min + ' menit, ' + sec + ' detik',
    //                     showConfirmButton: true
    //                   })
    //               }
    //             }else
    //             if(res['status'] == false){
    //               $('.progress').removeClass('d-block').addClass('d-none');

    //               $('#submitBtn')
    //                   .attr('disabled',false)
    //                   .html('<span class="icon text-white-50"><i class="far fa-paper-plane"></i></span><span class="text">Proses</span>');

    //               Swal.fire({
    //                   position: 'top-end',
    //                   icon: 'error',
    //                   title: 'Tidak Ditemukan Solusi Optimal, Waktu proses = ' + min + ' menit, ' + sec + ' detik',
    //                   showConfirmButton: true
    //                 })
    //             }
    //         },
    //         error : function(jqXHR, textStatus, errorThrown){
    //           $('.progress').removeClass('d-block').addClass('d-none');

    //           $('#submitBtn')
    //               .attr('disabled',false)
    //               .html('<span class="icon text-white-50"><i class="far fa-paper-plane"></i></span><span class="text">Proses</span>');
    //           var ms = (new Date().getTime() - start);
    //           min = Math.floor((ms/1000/60) << 0),
    //           sec = Math.floor((ms/1000) % 60);

    //           Swal.fire({
    //                   position: 'top-end',
    //                   icon: 'error',
    //                   title: 'Jadwal Kuliah Gagal Dibuat, ' + 'Waktu proses = ' + min + ' menit, ' + sec + ' detik',
    //                   showConfirmButton: true
    //                 })

    //           console.log(jqXHR.responseText);
    //           console.log(textStatus);

    //         }
    //     });
    //   }
    // }

      function getTotalJadwal(data,prodi){
        var res = jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>"+"admin/cekDataTotalJadwal",
            dataType: 'json',
            data: {data:data,jurusan:prodi},
            async: false
          })
        return res.responseJSON;
      }

      function getJurusan(data,prodi){
        var res = jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>"+"admin/cekDataJenisJadwal",
            dataType: 'json',
            data: {data:data,jurusan:prodi},
            async: false
          })
        return res.responseJSON;
      }

      $('#hapusBtn').click(function(){
          swal.fire({
                    title: "Warning",
                    text: "Anda yakin untuk menghapus jadwal kuliah ini?",
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
                            url: "<?php echo base_url() ?>"+"admin/buatjadwal",
                            dataType: "JSON",
                            data: {manajemen:"hapus-tabel"},
                            success: function(res){
                                if (res === true) {
                                    Swal.fire(
                                      'Berhasil!',
                                      'Jadwal Kuliah Berhasil Dihapus',
                                      'success'
                                    )
                                    $('#table').bootstrapTable('removeAll');
                                }
                            }
                        });
                    }
                });
        })

      $('#bentrokBtn').click(function(event) {
        const totalRows = $('#table').bootstrapTable('getOptions').totalRows;

        if (totalRows > 0) {
          $('#myBentrok').modal();
          var grid = $('#tableBentrok').grid();
          grid.reload();
        }else{
          Swal.fire(
                      'Informasi',
                      'Belum ada jadwal yang dibuat',
                      'warning'
                    )
        }
      });

        function cetakClick(){
          const field = $('select[name=filter]').val().toString();
          const filter = $('select[name=dataFilter]').val().toString();

          const totalRows = $('#table').bootstrapTable('getOptions').totalRows;
          const laporan = '<embed src="<?php echo base_url() ?>cetak?field='+field+'&filter='+filter+'" frameborder="1" width="100%" height="400px">';
         
          if (totalRows > 0) {
            $('#myCetak').modal();
            $('.isi-laporan').empty();
            $('.isi-laporan').append(laporan);
          }else{
            Swal.fire(
                        'Informasi',
                        'Belum ada jadwal yang dibuat',
                        'warning'
                      )
          }
        }

        function indexFormatter(val,row,index){
            return index+1;
        }

        function detailFormatter(index, row) {
          var html = []
            var title = {"nama_mk":"Matakuliah", "sks":"SKS", "semester":"Semester", "programstudi": "Program Studi"}

            $.each(row, function (key, value) {
                if (typeof value !== 'object' && value !== undefined && title[key] !== undefined) {
                    html.push('<tr><td><b>' + title[key] + '</b></td><td>' + value +'</td></tr>');
                }
            })

          return html.join('')
        }

        function aksiFormatter(val){
            return ["<button data-toggle='tooltip' title='Ubah' class='ubah btn btn-info btn-sm'>",
                    "<i class='fas fa-pencil-alt'></i>",
                    "</button>"].join(' ');
        }

        window.aksiEvents = {
            'click .ubah': function (e, value, row, index) {
                $('#tableBentrok').editable();
            }
        }


        function rowStyle(row, index) {
          var classes = [
            'table-info',
            'table-secondary',
            'table-warning',
            'table-light'
          ]

          if (row.programstudi == 'Teknik Informatika') {
            return {
              classes: classes[0]
            }
          }else
          if (row.programstudi == 'Teknik Elektro') {
            return {
              classes: classes[1]
            }
          }else
          if (row.programstudi == 'Teknik Sipil') {
            return {
              classes: classes[2]
            }
          }else
          if (row.programstudi == 'Perencanaan Wilayah dan Kota') {
            return {
              classes: classes[3]
            }
          }
          return {}
        }

        jQuery.fn.ForceNumericOnly = function(){
            return this.each(function()
            {
                $(this).keydown(function(e)
                {
                var key = e.charCode || e.keyCode || 0;
                // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
                // home, end, period, and numpad decimal
                return (
                    key == 8 || 
                    key == 9 ||
                    key == 13 ||
                    key == 46 ||
                    key == 110 ||
                    key == 190 ||
                    (key >= 35 && key <= 40) ||
                    (key >= 48 && key <= 57) ||
                    (key >= 96 && key <= 105));
                });
            });
        };

        $('input[name="populasi"]').ForceNumericOnly();
      </script>
</body>

</html>