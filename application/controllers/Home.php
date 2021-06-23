<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	// var $table = $this->mhome->;
	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('form');
		// $this->load->library('form_validation');

		$this->load->model('model');
		$this->load->model('m_tabel_ss');
		$admin = $this->session->userdata('admin');
		if ($admin == '' || $admin == null || $admin != 'admin') {
			$this->session->set_flashdata('error', 'Sila Login Terlebih Dahulu');
			redirect('/login');
		}
		
	}

	function index()
	{
		// print_r('sini halaman Login');
		$main['header'] = "Halaman Utama";

		if ($this->input->post('proses') == "edit") {
			// print_r('sini edit');
			$data = $this->model->serialize($this->input->post('data'));
			// print_r($data);
			$this->model->update('tb_list_barang',array('id' => $this->input->post('id')),$data);
			// print_r($this->input->post('id'));
			if($this->db->affected_rows() > 0){
				// print_r('Ada Perubahan');
				$this->session->set_flashdata('success', 'Detail Barang Behasil Terupdate');
			}
			else
			{
				$this->session->set_flashdata('success', 'Detail Barang Tetap Sama Seperti Sebelumnya');
				// print_r('tiada Perubahan');
			}
		}
		elseif ($this->input->post('proses') == "cari_data") {
			// print_r("sini datanya");
			$id = $this->input->post('id');
			$cek_data = $this->model->tampil_data_where('tb_list_barang',array('id' => $id))->result();
			// print_r(count($cek_data));
			print_r(json_encode($cek_data[0]));
		}
		elseif ($this->input->post('proses') == "tables") {
			$list = $this->m_tabel_ss->get_datatables(array('a.nama','a.harga'),array(null, 'a.nama','a.harga',null),array('a.nama' => 'asc'),"tb_list_barang a",null,null);
	    $data = array();
	    $no = $_POST['start'];
	    foreach ($list as $field) {
	      $no++;
	      $row = array();
	      // $ket = str_replace("\r\n",'+', $field->ket);
	      $row[] = $no;
	      $row[] = $field->nama;
	      $row[] = "Rp .". number_format($field->harga);
	      // $row[] = $field->waktu;
	      $row[] = '<center><a data-toggle="modal" data-id="'.$field->id.'" title="Lihat Detail Barang" class="lihat_informasi btn btn-primary btn-sm nc-icon nc-zoom-split" href="#lihat_informasi" id="klik_'.$field->id.'"></a></center>';
	      $data[] = $row;
		  }

	    $output = array(
	      "draw" => $_POST['draw'],
	      "recordsTotal" => $this->m_tabel_ss->count_all("tb_list_barang a",null,null),
	      "recordsFiltered" => $this->m_tabel_ss->count_filtered(array('a.nama','a.harga'),array(null, 'a.nama','a.harga',null),array('a.nama' => 'asc'),"tb_list_barang a",null,null),
	      "data" => $data,
	    );
	    //output dalam format JSON
	    echo json_encode($output);
		}
		elseif ($this->input->post('proses') == 'tambah') {
			$data = $this->model->serialize($this->input->post('data'));
			$cek_data = $this->model->tampil_data_where('tb_list_barang',array('id' => $data['id']))->result();
			if (count($cek_data) > 0) {
				?>
				<script type="text/javascript">
					var myhtml = document.createElement("div");
 					myhtml.innerHTML = "Barcode sudah terdaftar dalam sistem sebelumnya dengan Nama Barang  <br><b><?=$cek_data[0]->nama?></b><br>Sila cek di list barang";
					swal({
            title: "Barcode Sudah Terdaftar",
            content: myhtml,
            icon: "warning",
            showLoaderOnConfirm: true,
          })

          reset();
				</script>
				<?php
			}
			else
			{
				$this->model->insert('tb_list_barang',$data);
				$this->session->set_flashdata('success', 'Barang dengan nama\n '.$data['nama'].'\n berhasil ditambahkan ke dalam daftar barang');
				print_r("<script>location.reload()</script>");
			}
		}
		else
		{
			$main['count'] = count($this->model->tampil_data_keseluruhan('tb_list_barang')->result());
			$this->load->view('login/index',$main);
		}
		
	}

	function logout() {
		$this->session->unset_userdata('admin');
		redirect('login');
	}

}
?>