<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	   function __construct()
    {
        parent::__construct();
	    
		$this->load->model('m_user');
        $this->load->library('Toast');
        date_default_timezone_set('Asia/Jakarta');
        if($this->session->userdata('validated') != true){
            redirect('login');  
        }
        
    }

    function sukses(){
        $id = $this->uri->segment('3');
       // $data['siswa'] = $this->m_user->get_calon_mahasiswa_by_id_join($id);

    
               
                $this->load->view('user/v_header');
                $this->load->view('user/v_data');
                $this->load->view('user/v_footer');
         
  
    }

    function form_pdf() {
        $id = $this->uri->segment('3');
        $is_admin = $this->session->userdata('jenis_user') == '1';
    
        if ($is_admin) {
            $data['siswa'] = $this->m_user->get_calon_siswa_by_id_join($id);
    
            if (!empty($data['siswa'])) {
                $this->load->view('user/v_form_pdf', $data);
            } else {
                show_404();
            }
        } else {
            // Redirect or handle unauthorized access as needed
            redirect('user/form'); // Replace 'your_login_page' with the actual login page URL
        }
    }

    
    function cetak_pdf($id){
        //echo "$id";
        //$id = $this->uri->segment('3');
        $is_admin = $this->session->userdata('jenis_user') == '1';
        $data['siswa'] = $this->m_user->get_calon_mahasiswa_by_id_join($id);
        //$data['siswa'] = $this->m_user->get_calon_siswa_by_id_join($id);
        if(!empty($data['siswa'])){
            $data['getprogram'] = $this->m_user->get_program($id);
            $this->load->view('user/v_form_pdf', $data);            
        }else{
            show_404();
        }
    }

    function verify_form(){
        $id = $this->uri->segment('3');
        $this->m_user->verify_form($id);
        
        redirect('user/form_data/'.$id);
    }

    function index(){

    	$this->load->view('user/v_header');
    	$this->load->view('user/v_dashboard');
    	$this->load->view('user/v_footer');

    }


    function cek_payment(){
        $trx_id = $this->input->post('trx_id');    		
		$url = 'http://103.167.35.203/callback/bsistikes/api/inquiry';
        $post = array(
            'trx_id' => $trx_id
        );
        $post_string = http_build_query($post);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_HEADER, FALSE);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_string);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_TIMEOUT, 0); //timeout in seconds
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
        curl_setopt($curl, CURLOPT_URL, $url);
        $result = curl_exec($curl);
        $arr_result = json_decode($result, true);
        file_put_contents('cekinquiry.html', $result);
		
        if(count($arr_result['payment']) != 0){
            //file_put_contents('enam.html', $arr_result['status']);
			$va = $arr_result['virtual_account'];
			$this->m_user->update_status_payment($trx_id, $va);
			$aplikan = $this->m_user->get_aplikan($trx_id);
			
			
			foreach ($aplikan as $dd) {
				$aplikanid = $dd->AplikanID;
				$pmbformulirid = $dd->PMBFormulirID;
				$pmbperiodid = $dd->PMBPeriodID;
				$nama = $dd->Nama;
			}
          
			$arr = array(
                   'PMBFormJualID ' => $arr_result['trx_id'],
                   'AplikanID' => $aplikanid,
				   'PMBFormulirID' => $pmbformulirid,
				   'PMBPeriodID' => $pmbperiodid,
				   'Nama' => $nama,
				   'BuktiSetoran' => $va,
				   'NA' => 'N'
			);
            $this->m_user->insert_pmbformjual($arr);
            echo 1;
        }else{
            echo 0;
        }
    }

    function form_data(){
        $id = $this->uri->segment('3');
        $data['siswa'] = $this->m_user->get_calon_mahasiswa_by_id_join($id);

        if(!empty($data['siswa'])){
            if($data['siswa'][0]->form_submit != 1){
                redirect('user/data_formulir');
            }else{
                $data['prodi'] = $this->m_user->get_v_prodi();
                $this->load->view('user/v_header');
                $this->load->view('user/v_data_form', $data);
                $this->load->view('user/v_footer');
            }
            
        }else{
            show_404();
        }
    }

	
 //Revisi Abdi 04012024
 //Revisi Fahmi 04012024
function form_input() {
    $id = $this->uri->segment('3');
    $data['siswa'] = $this->m_user->get_calon_mahasiswa_by_id_join($id);
    $data['tmplahir'] = "tes";
	$is_admin = $this->session->userdata('jenis_user') == '1'; //Revisi Fahmi

    if ($is_admin || !empty($data['siswa'])) {
        $data['prodi'] = $this->m_user->get_v_prodi();
        $data['program'] = $this->m_user->get_v_program();
        $data['pendidikanortu'] = $this->m_user->get_v_pendidikanortu();
        $data['sumber'] = $this->m_user->get_v_sumber();
        $data['kelamin'] = $this->m_user->get_kelamin();

        // Buat direktori berdasarkan id jika tidak ada
        $upload_path = 'filebox/camaba/' . $id . '/ktp-ijazah/';

        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0755, true);
        }

        $config['upload_path']   = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png'; // Ekstensi yang diizinkan
        $config['max_size']      = 4048; // Maksimum 4MB (perbaikan pada nilai max_size)

        $this->load->library('upload', $config);

        // Pengunggahan Foto KTP
        if ($this->upload->do_upload('foto-ktp')) {
            $upload_data = $this->upload->data();

            // Merename file
            $nama_file_foto_ktp = $id . '-ktp.jpg';

            // Pindahkan dan rename file
            $path_foto_ktp = $upload_data['full_path'];
            $path_baru_foto_ktp = $upload_path . $nama_file_foto_ktp;

            if (rename($path_foto_ktp, $path_baru_foto_ktp)) {
                // Lakukan sesuatu dengan $nama_file_foto_ktp atau redirect ke halaman sukses
                // ...

                // Pengunggahan Foto Ijazah
                if ($this->upload->do_upload('foto-ijazah')) {
                    $upload_data_ijazah = $this->upload->data();

                    // Merename file
                    $nama_file_foto_ijazah = $id . '-ijazah.jpg';

                    // Pindahkan dan rename file
                    $path_foto_ijazah = $upload_data_ijazah['full_path'];
                    $path_baru_foto_ijazah = $upload_path . $nama_file_foto_ijazah;

                    if (rename($path_foto_ijazah, $path_baru_foto_ijazah)) {
                        // Lakukan sesuatu dengan $nama_file_foto_ijazah atau redirect ke halaman sukses
                        // ...

                        // Redirect atau lakukan sesuatu setelah upload sukses
                        redirect('user/cetak_pdf/' . $id);
                    } else {
                        // Jika rename foto ijazah gagal
                        unlink($path_foto_ijazah); // Hapus file yang sudah diunggah
                        $error_ijazah = array('error_ijazah' => 'Gagal merename file ijazah.');
                        $this->load->view('user/v_header');
                        $this->load->view('user/v_form_input', $data + $error_ijazah);
                        $this->load->view('user/v_footer');
                        return; // Hentikan eksekusi agar form tidak di-render ulang
                    }
                } else {
                    // Jika upload foto ijazah gagal
                    $error_ijazah = array('error_ijazah' => $this->upload->display_errors());
                    $this->load->view('user/v_header');
                    $this->load->view('user/v_form_input', $data + $error_ijazah);
                    $this->load->view('user/v_footer');
                    return; // Hentikan eksekusi agar form tidak di-render ulang
                }
            } else {
                // Jika rename foto KTP gagal
                unlink($path_foto_ktp); // Hapus file yang sudah diunggah
                $error_ktp = array('error_ktp' => 'Gagal merename file KTP.');
                $this->load->view('user/v_header');
                $this->load->view('user/v_form_input', $data + $error_ktp);
                $this->load->view('user/v_footer');
                return; // Hentikan eksekusi agar form tidak di-render ulang
            }
        } else {
            // Jika upload foto KTP gagal
            $error_ktp = array('error_ktp' => $this->upload->display_errors());
            $this->load->view('user/v_header');
            $this->load->view('user/v_form_input', $data + $error_ktp);
            $this->load->view('user/v_footer');
            return; // Hentikan eksekusi agar form tidak di-render ulang
        }
    } else {
        show_404();
    }
}


    function profile(){
        $data['profile'] = $this->m_user->get_profile($this->session->userdata('email'));
        $this->load->view('user/v_header');
    	$this->load->view('user/v_profile', $data);
    	$this->load->view('user/v_footer');
    }

    function change_password(){

        $email = $this->session->userdata('email');
        $cek = $this->m_user->cek_password($email);

        if($cek == md5($this->input->post('old_password'))){
            if($this->input->post('new_password') == $this->input->post('confirm_new_password')){
                $this->m_user->update_password($email, md5($this->input->post('new_password')));
                echo "<script>
                alert('Password berhasil di ubah');
                window.location.href='".base_url()."user/password';  
                </script>";
            }else{
                echo "<script>
                alert('Konfirmasi password tidak cocok');
                window.location.href='".base_url()."user/password';  
                </script>";
            }
        }else{
            echo "<script>
            alert('Password lama tidak cocok');
            window.location.href='".base_url()."user/password';  
            </script>";
        }
    }

    function password(){
        $this->load->view('user/v_header');
    	$this->load->view('user/v_password');
    	$this->load->view('user/v_footer');
    }
	
	//Ditambahkan Oleh Fahmi
    function form(){
        $this->load->model('M_user');

        
        // Mendapatkan semua email
        $data['all_users'] = $this->m_user->get_all_users();
    
        // Mendapatkan email yang dipilih dari form
        $selected_email = $this->input->get('search_formulir');
        $data['selected_email'] = $selected_email;
    
        // Mendapatkan formulir sesuai dengan email yang dipilih
        if (!empty($selected_email)) {
            $data['formulirs'] = $this->m_user->get_formulirs_by_email($selected_email);
        } else {
            // Jika tidak ada email yang dipilih, tampilkan semua formulir dan users
            $data['formulirs'] = $this->m_user->get_all_formulirs();
        }
    

        $this->load->view('user/v_header');
    	$this->load->view('user/v_form', $data);
    	$this->load->view('user/v_footer');
    }

    function invoice(){
        $email = $this->session->userdata('email');
        $data['invoice'] = $this->m_user->get_invoice_by_email($email);
        $this->load->view('user/v_header');
    	$this->load->view('user/v_invoice', $data);
    	$this->load->view('user/v_footer');
    }

    function payment(){
        
        $uri = $this->uri->segment('3');
        $email = $this->session->userdata('email');
        $data['invoice'] = $this->m_user->get_invoice($uri, $email);

        if(!empty($data['invoice'])){
            $this->load->view('user/v_header');
            $this->load->view('user/v_payment', $data);
            $this->load->view('user/v_footer');
        }else{
            show_404();
        }
    }




    function buy_form(){ 
        $startDate = time();
        $limit = date('Y-m-d H:i:s', strtotime('+1 day', $startDate));
        $replid = $this->input->post('departemen');
        $departemen = $this->m_user->get_price_departemen($replid);
        foreach ($departemen as $dd){
            $awalan = $dd->kodeawalan;
            $price = $dd->form_price;
        }
        $jml = $price*$this->input->post('jml_form');
        $profil = $this->m_user->get_profile($this->session->userdata('email'));
        $id_form = $this->m_user->get_form_last_id();

        foreach ($profil as $pd) {
            $post = array(
                'trx_nim' => substr($pd->phone,6),
                'trx_id' => $id_form,
                'billing_type' => 'c',
                'trx_amount' => $jml,
                'customer_name' => $pd->nama_user,
                'customer_email' => $this->session->userdata('email'),
                'customer_phone' => $pd->phone,
                'min' => $jml,
                'max' => $jml,
                'description' => $replid,
                'datetime_expired' => $limit
            );
		
        }
	
        $url = 'http://103.167.35.203/callback/bsistikes/api/register';
        $post_string = http_build_query($post);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_HEADER, FALSE);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_string);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_TIMEOUT, 0); //timeout in seconds

        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
        curl_setopt($curl, CURLOPT_URL, $url);

        $result = curl_exec($curl);
        $arr_result = json_decode($result, true);
//			file_put_contents('xxxx.html', $post_string);
        if(isset($arr_result['virtual_account'])){
			
            $arr = array(
                'jml_formulir' => $this->input->post('jml_form'),
                'email' => $this->session->userdata('email'),
                'datetime_expired' => $limit,
                'virtual_account' => $arr_result['virtual_account'],
                'trx_amount' => $arr_result['trx_amount'],
                'kodeawalan' => $awalan,
                'trx_id' => $arr_result['trx_id'],
                'description' => $arr_result['description']
            );
            $last_id = $this->m_user->buy_formulir($arr);
			
			$PMBPeriod = $this->m_user->get_pmb_period_id();
			foreach ($PMBPeriod as $dd) {
				$PMBPeriodID = $dd->PMBPeriodID;
			}
			$arr2 = array(
				'AplikanID' => $id_form,
                'Email' => $this->session->userdata('email'),
                'PMBFormulirID' => $last_id,
                'PMBPeriodID' => $PMBPeriodID,
				'ProdiID' => '',
				'TanggalBuat' => date('Y-m-d H:i:s')
			);           
			
			 $this->m_user->insert_aplikan($arr2);
			$notif = $this->toast->alert("Virtual account berhasil di generate", "success");
			$this->session->set_flashdata('notif', $notif);

			redirect('user/payment/'.$last_id);
      
        }else{
            $notif =$id_form;
			$this->session->set_flashdata('notif', $notif);
            redirect('user/form');

        }

    }

    function data(){
        $this->load->view('user/v_header');
    	$this->load->view('user/v_data');
    	$this->load->view('user/v_footer');
    }

}