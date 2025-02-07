<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

		
	function __construct()
    {
        parent::__construct();
	    
		$this->load->model('m_user');
		$this->load->library('Toast');
        date_default_timezone_set('Asia/Jakarta');
     
        
    }

	function index(){
		
		$this->load->view('v_register');

	}

	function resend_otp(){
		$id = $this->input->post('id');
		$user = $this->m_user->get_user_temp_by_md5($id);
		foreach ($user as $ud) {
			echo $this->send_otp($ud->phone, $ud->otp, $ud->otp_via);
			
		}
	}


	function cek_otp(){
		$id = $this->input->post('id');
		$first = $this->input->post('first');
		$second = $this->input->post('second');
		$third = $this->input->post('third');
		$fourth = $this->input->post('fourth');
		$otp = $first.$second.$third.$fourth;

		$cek = $this->m_user->cek_otp($id, $otp);

		if($cek == 0){
			$notif = $this->toast->alert("Maaf, kode OTP tidak cocok", "alert");
			$this->session->set_flashdata('notif', $notif);

			redirect('register/otp/'.$id);
		}else{
			$user = $this->m_user->get_user_temp_by_md5($id);
			foreach ($user as $ud) {
				$arr = array(
					'nama_user' => $ud->nama_user,
					'email' => $ud->email,
					'phone' => $ud->phone,
					'password' => $ud->password
				);
				$this->m_user->insert_user($arr);
			}
			$notif = $this->toast->alert("Registrasi sukses, silakan melakukan login", "success");
			$this->session->set_flashdata('notif', $notif);

			redirect('login');
		}
	}

	function send_otp($no, $otp, $via){
		$userkey = 'ea32d7aa62ad';
		$passkey = 'da612497a98f7171404e0a43';
		$telepon = $no;
		if($via == 'wa'){
			$message = '<#> Pakai kode OTP '.$otp.' untuk masuk ke akun YP Gunung Sari. JANGAN KASIH KODENYA KE SIAPAPUN';
			$url = 'https://console.zenziva.net/wareguler/api/sendWA/';
		}else{
			$message = 'Pakai '.$otp.' YP Gunung Sari';
			$url = 'https://console.zenziva.net/reguler/api/sendsms/';
		}
		$curlHandle = curl_init();
		curl_setopt($curlHandle, CURLOPT_URL, $url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
		curl_setopt($curlHandle, CURLOPT_POST, 1);
		curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
			'userkey' => $userkey,
			'passkey' => $passkey,
			'to' => $telepon,
			'message' => $message
		));
		$results = json_decode(curl_exec($curlHandle), true);
		return $results['status'];
		curl_close($curlHandle);
								
	}

	function otp(){
		$uri = $this->uri->segment('3');
		$data['user'] = $this->m_user->get_user_temp_by_md5($uri);
		$this->load->view('v_otp', $data);
	}

	function process(){

		$email = $this->input->post('email');
		$hp = $this->input->post('phone');

		$cek = $this->m_user->cek_avail_user($email, $hp);
		if($cek != 0){
			$notif = $this->toast->alert("Maaf Email/Nomor Hp anda sudah tersedia, mohon gunakan yang lain", "alert");
			$this->session->set_flashdata('notif', $notif);
			redirect('register');

		}else{
			$otp = rand(1000,9999);
			$last = $this->m_user->get_last_temp();
			$idmd5 = md5($last.$this->input->post('phone'));
			$temp = array(
				'nama_user' => $this->input->post('nama_user'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'password' => md5($this->input->post('password')),
				'otp_via' => $this->input->post('otp_via'),
				'otp' => $otp,
				'idmd5' => $idmd5
			);
			
			$status = $this->send_otp($this->input->post('phone'), $otp, $this->input->post('otp_via'));
			if($status != 1){
				$notif = $this->toast->alert("Maaf kode OTP gagal dikirim, mohon ulangi registrasi", "warning");
				$this->session->set_flashdata('notif', $notif);
				redirect('register');
			}else{
				$notif = $this->toast->alert("Kami telah mengirimkan kode OTP ke nomor anda", "success");
				$this->session->set_flashdata('notif', $notif);

				$id = $this->m_user->add_temp_user($temp);
				redirect('register/otp/'.$idmd5);
			}
			
		}
		




	}

}