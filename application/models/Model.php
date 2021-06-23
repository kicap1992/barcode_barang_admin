<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

	}

	function index(){

	}

	function tampil_data_keseluruhan($namatabel) //gunakan ini untuk menampilkan tabel yg lebih spesifik 'where'
	{
		$this->db->select("*");
		$this->db->from($namatabel);
		
	 	$query = $this->db->get();
	 	return $query;
	}

	function tampil_data_where($namatabel,$array) //gunakan ini untuk menampilkan tabel yg lebih spesifik 'where'
	{
		$this->db->select("*");
		$this->db->from($namatabel);
		$this->db->where($array);
		// $this->db->limit(1);
	 	$query = $this->db->get();
	 	return $query;
	}

	function tampil_data_group_by($namatabel,$array,$kolum) //gunakan ini untuk menampilkan tabel yg lebih spesifik 'where'
	{
		$this->db->select("*");
		$this->db->from($namatabel);
		$this->db->where($array);
		$this->db->group_by($kolum);
	 	$query = $this->db->get();
	 	return $query;
	}

	function custom_query($query) 
	{
		$query1 = $this->db->query($query);
		return $query1;

	}

	function delete($table,$array_condition)
	{
		// $this->db->where($array);
		$this->db->delete($table, $array_condition);
		// $this->db->delete(table_name, where_clause)
	}


	function insert($namatabel,$array) 
	{
		return $this->db->insert($namatabel,$array);
	}

	function update($table,$array,$array_condition)
	{
		$this->db->where($array);
		$this->db->update($table, $array_condition);
	}

	function like($namatabel,$field,$like,$kategori)
	{
		if ($kategori == '') {
			$this->db->select("*");
			$this->db->from($namatabel);
			$this->db->like($field, $like, 'both'); 
			// $this->db->limit(1);
		 	$query = $this->db->get();
		 	return $query;
		}else{
			$this->db->select("*");
			$this->db->from($namatabel);
			$this->db->where(array('kategori'=>$kategori));
			$this->db->like($field, $like, 'both'); 
			// $this->db->limit(1);
		 	$query = $this->db->get();
		 	return $query;
		}
	}

	function serialize($data){
		$keys = array_column($data,'name');
		$values = array_column($data,'value');
		$data = array_combine($keys, $values);
		return $data;
	}


	



}