    <!--   Core JS Files   -->
    <script src="<?=base_url()?>assets/js/core/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/js/core/popper.min.js"></script>
    <script src="<?=base_url()?>assets/js/core/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    
    <!-- Chart JS -->
    <script src="<?=base_url()?>assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="<?=base_url()?>assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?=base_url()?>assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?php echo base_url() ?>sweet-alert/sweetalert.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?=base_url()?>sweet-alert/toastr/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>sweet-alert/toastr/toastr.min.css">

    <script type="text/javascript">
      function logout(){
        swal({
          title: "Yakin ingin Logout?",
          text: "Anda akan keluar dari sistem",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((logout) => {
          if (logout) {

            window.location.href ='<?php echo base_url("home/logout") ?>';
          } else {
            swal("Terima kasih kerana masih di sistem");
          }
        });
      }
    </script>
    


    <?php if ($this->session->flashdata('success')): ?>
      <script type="text/javascript">
          swal({
            title: "Berhasil",
            text: "<?=$this->session->flashdata('success')?>",
            icon: "success",
            showLoaderOnConfirm: true,
          })
          
        
      </script>

    <?php elseif ($this->session->flashdata('error')): ?>
      <script type="text/javascript">
          swal({
            title: "Berhasil",
            text: "<?=$this->session->flashdata('error')?>",
            icon: "error",
            showLoaderOnConfirm: true,
          })
          
        
      </script>
    <?php endif ?>