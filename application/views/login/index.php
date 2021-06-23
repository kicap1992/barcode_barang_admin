<!DOCTYPE html>
<html lang="en">

  <head>
    <?php $this->load->view('login/head'); ?>
    <link href="<?=base_url()?>assets/css/barcode.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>assets/js/datatables/jquery.dataTables.min.css">
  </head>

  <body class="">
    <div class="wrapper ">

      <?php $this->load->view('login/sidebar'); ?>

      <div class="main-panel">
        
        <?php $this->load->view('login/navbar'); ?>
        
        <div class="content">
          
          <?php $this->load->view('login/atas'); ?>

          <div class="modal fade" id="lihat_informasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-2">
            <div class="modal-dialog" role="document">
              <div class="modal-content">

                <div class="modal-body">
                  <h5 class="card-title" id="judul_modal">Detail Barang</h5>
                  <div class="form-group">
                    <label>ID</label>
                    <input type="" id="id" class="form-control" disabled="">
                  </div>
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <textarea name="nama" id="nama_edit" class="form-control" style="resize: none" disabled="" placeholder="Nama Barang"></textarea>
                  </div> 
                  <div class="form-group">
                    <label>Harga Barang</label>
                    <input type="" id="harga_edit" name="harga" class="form-control" disabled="" placeholder="Harga Barang">
                  </div>            
                </div>
                <div class="modal-footer">
                  <button id="button_edit" class="btn btn-primary btn-sm waves-effect waves-light" onclick="edit()">Edit Detail</button>
                  <button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="card ">
                <div class="card-header ">
                  <h5 class="card-title">Penambahan Barang</h5>
                  <!-- <p class="card-category">Last Campaign Performance</p> -->
                </div>
                <div class="card-body ">
                  <div id="sini_js" style="display: none"></div>
                  <form id="sini_form">

                    <input type="hidden" name="id_pertama" id="id_pertama">
                    <input type="hidden" name="id_kedua" id="id_kedua">

                    <div class="row" id="text_reset" style="display: none">
                      <div class="col-md-12">
                        <div class="form-group">
                          <center><h6>Klik <i>Reset</i> Untuk Scan Kembali Barcode</h6></center>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <center><div id="interactive" class="viewport"></div></center>
                          <div class="controls">
                            <fieldset class="reader-config-group">
                              <center><span>Hidupkan Flashlight</span>
                              <input type="checkbox" name="settings_torch" /></center>
                            </fieldset>
                          </div>
                          <label>Nama Barang</label>
                          <!-- <input type="text" class="form-control" placeholder="Nama Barang" id="nama" name="nama"> -->
                          <textarea class="form-control" name="nama" id="nama" placeholder="Nama Barang"></textarea>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Harga Barang</label>
                          <input type="text" class="form-control" placeholder="Harga Barang" id="harga" name="harga" maxlength="7">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Foto Barang</label>
                          
                        </div>
                      </div>
                    </div>

                  </form>
                  <div class="row">
                    <div class="col-md-12">
                      <center><button type="button" onclick="reset()" class="btn btn-danger btn-round">Reset</button>
                      <button type="button" class="btn btn-info btn-round" onclick="tambah()">Tambah</button>
                      </center>
                    </div>
                  </div>
                  
                </div>
                <div class="card-footer ">
                  <!-- <div class="legend">
                    <i class="fa fa-circle text-primary"></i> Opened
                    <i class="fa fa-circle text-warning"></i> Read
                    <i class="fa fa-circle text-danger"></i> Deleted
                    <i class="fa fa-circle text-gray"></i> Unopened
                  </div> -->
                  <hr>
                  <div class="stats">
                    <i class="fa fa-calendar"></i> Terakhir Ditambah
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card card-chart">
                <div class="card-header">
                  <h5 class="card-title">List Barang</h5>
                  <!-- <p class="card-category">Line Chart with Points</p> -->
                </div>
                <div class="card-body">
                  <table id="table1" class="table table-striped table-bordered" width="100%" cellspacing="0" >
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">
                  <!-- <div class="chart-legend">
                    <i class="fa fa-circle text-info"></i> Tesla Model S
                    <i class="fa fa-circle text-warning"></i> BMW 5 Series
                  </div> -->
                  <hr/>
                  <div class="card-stats">
                    <i class="fa fa-check"></i> Jumlah : 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php $this->load->view('login/footer'); ?>

      </div>
    </div>
    
    <?php $this->load->view('login/script'); ?>
    <!-- <script src="vendor/jquery-1.9.0.min.js" type="text/javascript"></script> -->
    <!-- <script src="http://webrtc.github.io/adapter/adapter-latest.js" type="text/javascript"></script> -->
    <script src="<?=base_url()?>dist/adapter.js" type="text/javascript"></script>
    <script src="<?=base_url()?>dist/quagga.js" type="text/javascript"></script>
    <script src="<?=base_url()?>dist/live_w_locator.js" type="text/javascript"></script>
    <script src="<?=base_url()?>sweet-alert/block/jquery.blockUI.js"></script> 
    <script src="<?=base_url()?>assets/js/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
      var url = "https://scan-barcode.kuwakuwi.com/home"
      function reset(){
        $("#text_reset").attr('style', 'display : none');
        $("#interactive").attr('style', 'display : block');
        $("#id_pertama").val(null)
        $("#id_kedua").val(null)
        $("#nama").val(null)
        $("#harga").val(null)
        App.init();
      }

      function tambah() {
        // console.log('sini tambah');
        if ($("#id_pertama").val() == null || $("#id_kedua").val() == null || $("#id_pertama").val() == '' || $("#id_kedua").val() == '') {
          toastnya("interactive","Barcode Harus Discan Terlebih Dahulu")
        }
        else if ($("#nama").val() == null || $("#nama").val() == '') {
          toastnya("nama","Nama Barang Harus Terisi")
        }
        else if ($("#harga").val() == null || $("#harga").val() == '') {
          toastnya("harga","Harga Barang Harus Terisi")
        }
        else{
          let data = $('#sini_form').serializeArray();
          let harga = $("#harga").val();
          harga = harga.replace(/\,/g,'');
          data = jQuery.grep(data, function(value) {
            return value['name'] != 'id_pertama' && value['name'] != 'id_kedua' && value['name'] != 'harga' && value['name'] != 'settings_torch';
          });
          let id_barcode = [{"name" : "id" ,"value" : $("#id_pertama").val()}];
          harga = [{"name" : "harga" ,"value" : harga}];
           data = data.concat(id_barcode,harga)
          console.log(data)
          $.ajax({
            // url: "https://scan-barcode.kuwakuwi.com/home/",
            url: url,
            type: 'post',
            data: {data : data, proses : 'tambah'},
            // dataType: 'json',
            beforeSend: function(res) {                   
              $.blockUI({ 
                message: "Sedang Diproses", 
                css: { 
                border: 'none', 
                padding: '15px', 
                backgroundColor: '#000', 
                '-webkit-border-radius': '10px', 
                '-moz-border-radius': '10px', 
                opacity: .5, 
                color: '#fff' 
              } });
            },
            success: function (response) {
              $.unblockUI();
              console.log(response);
              $("#sini_js").html(response)
              // location.reload();

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
              $.unblockUI();
              swal({
                // title: "Submit Keperluan ?",
                text: "Koneksi Internet Anda Mungkin Hilang Atau Terputus, Halaman Akan Terefresh Kembali",
                icon: "warning",
                buttons: {
                    cancel: false,
                    confirm: true,
                  },
                // dangerMode: true,
              })
              .then((hehe) =>{
                location.reload();
              });
             
            } 
          });
        }
      }
      
      function toastnya(id,mesej){
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        };

        toastr.error("<center>"+mesej+"</center>");
        $("#"+id).focus();
      }

      $(document).on("click", ".lihat_informasi", function () {
        // console.log($(this).data('id'));
        let id = $(this).data('id');
        let data = $.ajax({
          // url: "<?=base_url()?>home/",
          url: url,
          type: 'post',
          data: {id : id, proses : 'cari_data'},
          async : false,
          // dataType: 'json',
          beforeSend: function(res) {                   
            $.blockUI({ 
              message: "Sedang Diproses", 
              css: { 
              border: 'none', 
              padding: '15px', 
              backgroundColor: '#000', 
              '-webkit-border-radius': '10px', 
              '-moz-border-radius': '10px', 
              opacity: .5, 
              color: '#fff' 
            } });
          },
          success: function (response) {
            $.unblockUI();
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) { 
            $.unblockUI();
            swal({
              // title: "Submit Keperluan ?",
              text: "Koneksi Internet Anda Mungkin Hilang Atau Terputus, Halaman Akan Terefresh Kembali",
              icon: "warning",
              buttons: {
                  cancel: false,
                  confirm: true,
                },
              // dangerMode: true,
            })
            .then((hehe) =>{
              location.reload();
            });
           
          } 
        });
        // console.log(JSON.parse(data.responseText));
        data = JSON.parse(data.responseText);
        $("#id").val(data.id);
        $("#nama_edit").val(data.nama);
        $("#harga_edit").val(numberWithCommas(data.harga));
        $("#button_edit").attr({
          'onclick' : "edit('"+data.id+"',0)"
        })
      });

      function edit(id,e) {
        if (e == 0 ) {
          // $("#id").removeAttr('disabled');
          $("#nama_edit").removeAttr('disabled');
          $("#harga_edit").removeAttr('disabled');
          $("#button_edit").attr({
            'onclick' : "edit('"+id+"',1)"
          })
          e = 1;
        }
        else if (e == 1) 
        {
          if ($("#nama_edit").val() == null || $("#nama_edit").val() == '') {
            toastnya("nama_edit","Nama Barang Harus Terisi")
          }
          else if ($("#harga_edit").val() == null || $("#harga_edit").val() == '') {
            toastnya("harga_edit","Harga Barang Harus Terisi")
          }
          else
          {
            swal({
              // title: "Submit Keperluan ?",
              text: "Yakin Ingin Update Detail Barang",
              icon: "info",
              buttons: {
                  cancel: true,
                  confirm: true,
                },
              dangerMode: true,
            })
            .then((hehe) =>{
              if (hehe) {
                let harga = $("#harga_edit").val();
                harga = harga.replace(/\,/g,'');
                let data = [{"name" : "nama" ,"value" : $("#nama_edit").val()}];
                harga = [{"name" : "harga" ,"value" : harga}];
                data = data.concat(harga)
                // console.log('jalnkan')
                $.ajax({
                  // url: "<?=base_url()?>home/",
                  url: url,
                  type: 'post',
                  data: {data : data, id : id, proses : 'edit'},
                  // dataType: 'json',
                  beforeSend: function(res) {                   
                    $.blockUI({ 
                      message: "Sedang Diproses", 
                      css: { 
                      border: 'none', 
                      padding: '15px', 
                      backgroundColor: '#000', 
                      '-webkit-border-radius': '10px', 
                      '-moz-border-radius': '10px', 
                      opacity: .5, 
                      color: '#fff' 
                    } });
                  },
                  success: function (response) {
                    $.unblockUI();
                    console.log(response);
                    // $("#sini_js").html(response)
                    location.reload();

                  },
                  error: function(XMLHttpRequest, textStatus, errorThrown) { 
                    $.unblockUI();
                    swal({
                      // title: "Submit Keperluan ?",
                      text: "Koneksi Internet Anda Mungkin Hilang Atau Terputus, Halaman Akan Terefresh Kembali",
                      icon: "warning",
                      buttons: {
                          cancel: false,
                          confirm: true,
                        },
                      // dangerMode: true,
                    })
                    .then((hehe) =>{
                      location.reload();
                    });
                   
                  } 
                });
              }
            });
          }
        }
      }

      function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      }
    </script>
    <script type="text/javascript">
      var table;
      $(document).ready(function() {
   
        //datatables
        table = $('#table1').DataTable({ 
          // "searching": false,
          "ordering": false,
          "processing": true, 
          "serverSide": true, 
          "order": [], 
           
          "ajax": {
            // "url": "<?php echo base_url('home/')?>",
            "url": url,
            "type": "POST",
            data : {proses : 'tables'}
          },

           
          "columnDefs": [
            { 
              "targets": [ 0 ], 
              "orderable": false, 
            },
          ],

        });

      });
     
    </script>

    <script type="text/javascript">
      var elem = document.getElementById("harga");
      var elem = document.getElementById("harga_edit");

      elem.addEventListener("keydown",function(event){
          var key = event.which;
          if((key<48 || key>57) && key != 8) event.preventDefault();
      });

      elem.addEventListener("keyup",function(event){
          var value = this.value.replace(/,/g,"");
          this.dataset.currentValue=parseInt(value);
          var caret = value.length-1;
          while((caret-3)>-1)
          {
              caret -= 3;
              value = value.split("");
              value.splice(caret+1,0,",");
              value = value.join("");
          }
          this.value = value;
      });
    </script>
  </body>

</html>
