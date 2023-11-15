<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function test1(){
		$barang = array(
			'kode_barang' 	=> 'A01', 
			'nama'			=> 'SariRoti Coklat',
			'hargajual'		=> '15000'
		);
		echo json_encode($barang);
	}

	public function get_barang(){
		$barang = $this->db->query("select * from barang")->result();
		echo json_encode($barang);
	}

	public function simpan_barang(){
		error_reporting(0);
		$data = file_get_contents('php://input');
		$brg = json_decode($data);
		if($brg){
			$result = $this->db->insert('barang', $brg);
			if($result){
				echo "sukses";
			}else{
				echo "gagal";
			}
		}else{
			echo "gagal : data invalid";
		}
	}

	public function get_kategori(){
		$k = $this->db->query("select kode, deskripsi from ref_kategori")->result();
		echo json_encode($k);
	}

	public function get_satuan(){
		$k = $this->db->query("select kode, deskripsi from ref_satuan")->result();
		echo json_encode($k);
	}

}
