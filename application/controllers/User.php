<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	// var $table = $this->mhome->;
	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('form');
		// $this->load->library('form_validation');

		$this->load->model('model');
		$this->load->model('m_tabel_ss');
		
	}

	function index() {
		header('Access-Control-Allow-Origin: *');
		// if ($this->input->post('proses') == 'coba2') {
		// 	// print_r($this->input->post('img_data'));
		// 	define('UPLOAD_DIR', 'images/');
	 //    $image_parts = explode(";base64,", $_POST['img_data']);
	 //    $image_type_aux = explode("image/", $image_parts[0]);
	 //    $image_type = $image_type_aux[0];
	 //    $image_base64 = base64_decode($image_parts[0]);
	 //    $file = UPLOAD_DIR . 'heheh.jpg';
	 //    file_put_contents($file, $image_base64);
		// }
		if ($this->input->post('proses') == "cari") {
			$cari_data = $this->model->tampil_data_where('tb_list_barang',array('id' => $this->input->post('id')))->result();
			if (count($cari_data) > 0 ) {
				?>
				<script type="text/javascript">
					if ($("#list_beli").val() == '' || $("#list_beli").val() == null || $("#list_beli").val() == undefined) {
						$("#id_barang").val("<?=$cari_data[0]->id?>");
						$("#nama").html("<?=$cari_data[0]->nama?>");
						$("#nama_barang").val("<?=$cari_data[0]->nama?>");
						$("#harga_barang").val("<?=$cari_data[0]->harga?>");
						$("#harga").html("Rp. <?=number_format($cari_data[0]->harga)?>");
						$("#total").html("Masukkan Jumlah Pembelian");
						$("#interactive").attr('style','display : none');
						$("#button_listing").attr('style','display : block');
						Quagga.stop();
						$("#div_jumlah").attr('style','display : block');
						$("#jumlah_pembelian").focus();
					}
					else
					{
						$("#id_barang").val("<?=$cari_data[0]->id?>");
						// console.log($("#id_barang").val())
						var array_list = JSON.parse($("#list_beli").val());
						var cek = 0
						// var key,value;
						// for (var [key, value] of Object.entries(array_list)) {
						//   // console.log(value.id);
						//   if (value.id == $("#id_barang").val()) {
						//   	cek = 1;
						//   	break;
						//   }
						// }
						// Object.keys(array_list).forEach(function (key) {
						// 	console.log(array_list[key].id)
						//   if (array_list[key].id == $("#id_barang").val()) {
						//   	cek = 1;
						//   	break;
						//   }
						// });
						
						for (var i = 0; i < array_list.length; ++i) {
			        // console.log(array_list[i].id)
			        if (array_list[i].id == $("#id_barang").val()) {
						  	cek = 1;
						  	break;
						  }
				    }
						if (cek == 1) {
							swal({
				        text: "Barang Yang Discan Sudah Ada Dalam List Pembelian",
				        icon: "info",
				        buttons: false,
				        timer : 2000
				      });
				      reset()
						}
						else
						{
							$("#id_barang").val("<?=$cari_data[0]->id?>");
							$("#nama").html("<?=$cari_data[0]->nama?>");
							$("#nama_barang").val("<?=$cari_data[0]->nama?>");
							$("#harga_barang").val("<?=$cari_data[0]->harga?>");
							$("#harga").html("Rp. <?=number_format($cari_data[0]->harga)?>");
							$("#total").html("Masukkan Jumlah Pembelian");
							$("#interactive").attr('style','display : none');
							$("#button_listing").attr('style','display : block');
							Quagga.stop();
							$("#div_jumlah").attr('style','display : block');
							$("#jumlah_pembelian").focus();
						}
					}					
				</script>
				<?php
			}
			else
			{
				?>
				<script type="text/javascript">
					swal({
		        text: "Barcode Yang Discan Tiada Dalam Sistem",
		        icon: "warning",
		        buttons: false,
		        timer : 2000
		      })
		      App.init()
				</script>
				<?php
			}
		}
	}

	
}
?>