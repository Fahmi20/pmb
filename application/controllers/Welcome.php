<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('briva'); // Memuat library MyLibrary
    }

	// BUAT DATA VIRTUAL ACCOUNT
	public function creaeVirtualAccount(){
		$data['custCode'] = '123987';
		$data['nama'] = 'johny papa';
		$data['ammount'] = '20000';
		$data['keterangan'] = 'test';
		$data['expiredDate'] = '2023-12-12 09:57:26';
		$hasil = $this->briva->BrivaCreate($data);
		echo json_encode($hasil);
	}

	// BACA DATA VIRTUAL ACCOUNT
	public function readVirtualAccount(){
		$data['custCode'] = '123987';
		$hasil = $this->briva->BrivaRead($data);
		echo json_encode($hasil);
	}

	// BACA STATUS BAYAR ATAU BELUM
	public function readStatus(){
		$data['custCode'] = '123987';
		$hasil = $this->briva->BrivaReadStatus($data);
		echo json_encode($hasil);
	}

	public function updateStatus(){
		$data['custCode'] = '123987';
		// STATUS BAYAR Y DAN N
		$data['statusBayar'] = 'Y';
		$hasil = $this->briva->BrivaUpdateStatus($data);
		echo json_encode($hasil);
	}

	public function updateVirtualAccount(){
		$data['custCode'] = '123987';
		$data['nama'] = 'Jamila';
		$data['ammount'] = '90000';
		$data['keterangan'] = 'test';
		$data['expiredDate'] = '2023-12-12 09:57:26';
		$hasil = $this->briva->BrivaUpdate($data);
		echo json_encode($hasil);
	}
	public function deleteVirtualAccount(){
		$data['custCode'] = '123987';
		$hasil = $this->briva->BrivaDelete($data);
		echo json_encode($hasil);
	}
	
}
