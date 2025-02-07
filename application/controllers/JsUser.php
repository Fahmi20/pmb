<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JsUser extends CI_Controller {

	
	   function __construct()
    {
        parent::__construct();
	    
		$this->load->model('M_user');
        $this->load->library('Toast');
        $this->load->library('email'); // Memuat library Email
        $this->load->helper('url');
        date_default_timezone_set('Asia/Jakarta');
        if($this->session->userdata('validated') != true){
            redirect('login');  
        }
        
    }


       
       

    public function sendEmailbaru($nama_lengkap, $AplikanID, $prodi, $kontak, $waktu_mendaftar, $catatan_presenter) {
        //$nama_lengkap, $AplikanID, $prodi, $kontak, $jml, $waktu_mendaftar

        // $mail->Password = 'gunungsari123';
        // $mail->SMTPSecure = 'ssl';

        $config['protocol'] = 'smtp'; // Protokol pengiriman email
        $config['smtp_host'] = 'mail.gunungsari.id'; // Host server SMTP Anda
        $config['smtp_port'] = '587'; // Port SMTP (misalnya, 587 / 465)
        $config['smtp_user'] = 'github@gunungsari.id'; // Email pengirim
        $config['smtp_pass'] = '5Tikesypgs'; // Kata sandi email pengirim
       
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = FALSE;

        $config['smtp_crypto'] = 'tls'; // or html


        $this->email->initialize($config);

        $content = "<b>berikut ini adalah Data Calon mahasiswa:</b></p>
        <table>
		 <tr>
            <td>Presenter</td>
            <td>:</td>
            <td> $catatan_presenter </td>
          </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td> $nama_lengkap </td>
          </tr>
          <tr>
            <td>ID Aplikan</td>
            <td>:</td>
            <td> $AplikanID </td>
          </tr>
          <tr>
            <td>Prodi</td>
            <td>:</td>
            <td> $prodi </td>
          </tr>
          <tr>
            <td>Kontak</td>
            <td>:</td>
            <td> $kontak </td>
          </tr>
          <tr>
          <td>Waktu Pendaftaran</td>
          <td>:</td>
          <td> $waktu_mendaftar </td>
        </tr>
        </table>
        <p>Selamat <b>$nama_lengkap </b> telah Berhasil Melakukan Pendaftaran.</p>
        <br>
        ";

        $this->email->from('github@gunungsari.id', 'PMB Stikes 2024.');
        $this->email->to(['stikes.gs@gmail.com']);
        $this->email->subject('Data Pendaftaran Calon mahasiswa');
        $this->email->message($content);
        $this->email->send();
        redirect('/user/data/'.$AplikanID, 'refresh');

        // if ($this->email->send()) {
        //     echo 'Email berhasil dikirim.';
        // } else {
        //     echo 'Gagal mengirim email.';
        //     echo $this->email->print_debugger();
        // }
    }

    public function sendEmail($nama_lengkap, $AplikanID, $prodi, $kontak, $jml, $waktu_mendaftar) {
        $config['protocol'] = 'smtp'; // Protokol pengiriman email
        $config['smtp_host'] = 'smtp.gmail.com'; // Host server SMTP Anda
        $config['smtp_port'] = '587'; // Port SMTP (misalnya, 587)
        $config['smtp_user'] = 'saifulstmik511@gmail.com'; // Email pengirim
        $config['smtp_pass'] = 'ilyvmsrwqiezzjuf'; // Kata sandi email pengirim
        $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'text'; // or html
          //  $config['validation'] = FALSE;

        $config['smtp_crypto'] = 'tls'; // or html

        // $nama_lengkap = "ipul"; 
        // $id            = "12312";
        // $prodi         = "programmer";
        // $kontak        = "039820193821";
        // $jumlah        = "32";
        // $waktu_mendaftar = "2023";

        $this->email->initialize($config);

        $content = "<p>Hallo <b>$nama_lengkap </b> berikut ini adalah komentar yang dikirimkan:</p>
        <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td> $nama_lengkap </td>
          </tr>
          <tr>
            <td>ID Aplikan</td>
            <td>:</td>
            <td> $AplikanID </td>
          </tr>
          <tr>
            <td>Prodi</td>
            <td>:</td>
            <td> $prodi </td>
          </tr>
          <tr>
            <td>Kontak</td>
            <td>:</td>
            <td> $kontak </td>
          </tr>
          <tr>
          <td>Waktu Pendaftar</td>
          <td>:</td>
          <td> $waktu_mendaftar </td>
        </tr>
        </table>
        <p>Terimakasih <b>$nama_lengkap </b> telah Berhasil Melakukan Pendaftaran.</p>
        <br>
        <span>Jumlah Pendaftar : $jml";

        $this->email->from('saifulstmik511@gmail.com', 'PMB 2023 Stikes');
        $this->email->to(['saifulfiven@gmail.com']);
        $this->email->subject('Data Pendaftaran Calon mahasiswa');
        $this->email->message($content);

        if ($this->email->send()) {
            echo 'Email berhasil dikirim.';
        } else {
            echo 'Gagal mengirim email.';
            echo $this->email->print_debugger(); // Menampilkan pesan error jika terjadi kesalahan
        }
    }

    function save_hobi(){
    
        $arr = array(
            'hobi' => $this->input->post('hobi'),
            'alamatsurat' => $this->input->post('alamatsurat'),
            'keterangan' => $this->input->post('keterangan')
        );

        $this->m_user->update_calonsiswa($this->input->post('replid'), $arr);

    }


    function save_sekolah(){

        if($this->input->post('asalsekolah') == ''){
            $a = 'BELUM SEKOLAH';
        }else{
            $a = $this->input->post('asalsekolah');
        }

        $arr = array(
            'asalsekolah' => $a,
            'noijasah' => $this->input->post('noijasah'),
			'nisn' => $this->input->post('propinsiasal'),//CREATED BY FAHMI
            'npsn' => $this->input->post('negaraasal'),//CREATED BY FAHMI
            'tglijasah' => $this->input->post('tglijasah'),
            'ketsekolah' => $this->input->post('ketsekolah'),
            'darah' => $this->input->post('darah'),
            'berat' => $this->input->post('berat'),
            'tinggi' => $this->input->post('tinggi'),
            'kesehatan' => $this->input->post('kesehatan')
        );

        $this->m_user->update_calonsiswa($this->input->post('replid'), $arr);

    }

    function save_data_wali(){
        $replid = $this->input->post('replid');
        $data = $this->input->post('data');
        $obj = new stdClass();

        $array = json_decode($data, true);

        $tgl_lahir_ayah = $array['6']['value'].'-'.$array['5']['value'].'-'.$array['4']['value'];
        $tgl_lahir_ibu = $array['17']['value'].'-'.$array['16']['value'].'-'.$array['15']['value'];
        
        unset($array['4']);
        unset($array['5']);
        unset($array['6']);
        unset($array['15']);
        unset($array['16']);
        unset($array['17']);

        foreach($array as $var){
            $obj->{$var['name']}=$var['value']; 
        }
        
        $this->m_user->update_calonsiswa_v3($replid, $obj, $tgl_lahir_ayah, $tgl_lahir_ibu);

    }

    function save_data_pribadi(){
        $replid = $this->input->post('replid');
        $data = $this->input->post('data');

        // $replid = 497;

        // $data = '[{"name":"nisn","value":"TKhao a ta"},{"name":"nik","value":"K"},{"name":"noun","value":"PhhD iraaao"},{"name":"nama","value":"Aath og k imhel"},{"name":"panggilan","value":"Nnkont"},{"name":"tmplahir","value":"Bi na"},{"name":"tgl_lahir","value":"01"},{"name":"bln_lahir","value":"12"},{"name":"thn_lahir","value":"1990"},{"name":"status","value":"Eksklusif"},{"name":"agama","value":"Budha"},{"name":"suku","value":"BUGIS"},{"name":"warga","value":"WNA"},{"name":"anakke","value":"0"},{"name":"jsaudara","value":"0"},{"name":"statusanak","value":"Kandung"},{"name":"jkandung","value":"0"},{"name":"jtiri","value":"0"},{"name":"bahasa","value":"Ph"},{"name":"alamatsiswa","value":"Aie  te"},{"name":"kodepossiswa","value":"83"},{"name":"jarak","value":"0"},{"name":"emailsiswa","value":"zee.fandy@gmail.com"},{"name":"telponsiswa","value":"212"},{"name":"hpsiswa","value":"350"}]';

        $obj = new stdClass();

        $array = json_decode($data, true);

        $tgl_lahir = $array['8']['value'].'-'.$array['7']['value'].'-'.$array['6']['value'];
        
        unset($array['6']);
        unset($array['7']);
        unset($array['8']);

        foreach($array as $var){
            $obj->{$var['name']}=$var['value']; 
        }
             
        $this->m_user->update_calonsiswa_v2($replid, $obj, $tgl_lahir);

    }

    function save_aplikan(){
        $aplikanid = $this->input->post('aplikanid');
        //$data = $this->input->post('data');
        $arr = array(
            'Nama' => $this->input->post('namamhsw'),
            'Kebangsaan' =>$this->input->post('noktp'),
            'WargaNegara' => $this->input->post('nokkk'),
			'Handphone' =>$this->input->post('nohp'),
            'ProdiID' =>$this->input->post('prodiid'),
			'PresenterID' =>$this->input->post('sumber'),
			'CatatanPresenter' =>$this->input->post('datapresenter')
		);


        $this->M_user->update_aplikan($aplikanid, $arr);
    }
	
	//Simpan Step Form Saiful
	 //public function simpandata(){

        function saveaplikandata(){
            $aplikanid = $this->input->post('aplikanid');
            $data = $this->input->post('data');

            $obj = new stdClass();
    
            $array = json_decode($data, true);  
            foreach($array as $var){
                $obj->{$var['name']}=$var['value']; 
            }
          

            $this->M_user->Updateaplikandata($aplikanid, $obj);

            //$this->M_user->update_status_payment($aplikanid, $aplikanid);

            //Sisipkan update login, password tabel aplikan
            $profile = $this->M_user->get_profile($this->session->userdata('email'));

            foreach ($profile as $pd):
                $email =  $pd->email;
                $password =  $pd->password;
            endforeach;
                
            $datalogin = array(
                'Login'      => $email,
                'Password'   => $password,
            );

            $this->M_user->Updateaplikandata($aplikanid, $datalogin);

            $last_aplikan['aplikan'] = $this->M_user->get_last_insert_aplikan($aplikanid);
           
            // Kirim Ke Email
            $nama_lengkap   = $last_aplikan['aplikan'][0]->Nama;
            $kontak         = $last_aplikan['aplikan'][0]->Handphone;
            $prodi          = $last_aplikan['aplikan'][0]->ProdiID;
            $AplikanID      = $last_aplikan['aplikan'][0]->AplikanID;
            $waktu_mendaftar= $last_aplikan['aplikan'][0]->TanggalBuat;
			$catatan_presenter= $last_aplikan['aplikan'][0]->CatatanPresenter;
            //$emailnya       = $this->session->userdata('email');
            $jml            = $this->M_user->get_last_calonsiswa($aplikanid);


            $arr = array(
                'PMBID'         => $aplikanid,
                'AplikanID'     => $aplikanid,
                'Nama'          => $nama_lengkap,
                'PMBFormulirID' => $last_aplikan['aplikan'][0]->PMBFormulirID,
                'PMBPeriodID'   => $last_aplikan['aplikan'][0]->PMBPeriodID,
                'PMBFormJualID' => $last_aplikan['aplikan'][0]->PMBFormJualID,
                'ProgramID'     => $last_aplikan['aplikan'][0]->ProgramID,
                'ProdiID'       => $prodi,
                'BuktiSetoran'  => $last_aplikan['aplikan'][0]->BuktiSetoran,
                'TempatLahir'   => $last_aplikan['aplikan'][0]->TempatLahir,
                'TanggalLahir'  => $last_aplikan['aplikan'][0]->TanggalLahir,
                'NomorKTP'      => $last_aplikan['aplikan'][0]->NomorKTP,
                'Login'         => $email,
                'Password'      => $password,
                'StatusAwalID'  => 'B',
            );

            
            //$this->EmailController->sendEmail($nama_lengkap, $AplikanID, $prodi, $kontak,$jml, $waktu_mendaftar);

            $this->M_user->input_data($arr, 'pmb');
            $this->sendEmailbaru($nama_lengkap, $AplikanID, $prodi, $kontak, $waktu_mendaftar, $catatan_presenter);

        }

    function select_prodi(){
        $aplikanid = $this->input->post('aplikanid');
        $mhsw = $this->m_user->get_mhsw($aplikanid);
        
        $vp = $this->m_user->get_v_prodi();

        echo '<select class="select22" id="prodi" name="prodi" data-minimum-results-for-search="Infinity" onchange="select_kelompok(this.value);">';
        foreach ($mhsw as $pd) {
            if($vp == $pd->prodiid){
                echo '<option selected value="'.$pd->ProdiID.'">'.$pd->Prodi.'</option>';
            }else{
                echo '<option value="'.$pd->ProdiID.'">'.$pd->Prodi.'</option>';
            }
        }
        echo '</select>';
        echo '<script>$(".select22").select2({
            minimumResultsForSearch: Infinity
        });</script>';
    }

    function select_sumber(){
        $aplikanid = $this->input->post('aplikanid');
        $mhsw = $this->m_user->get_mhsw($aplikanid);

        $vk = $this->m_user->get_v_sumber();

        echo '<select class="select333" id="sumber" name="sumber">';
        foreach ($mhsw as $kd) {
            if($vk == $kd->Negara){
                echo '<option selected value="'.$vk->InfoID.'">'.$vk->Nama .'</option>';
            }else{                
                echo '<option value="'.$vk->InfoID.'">'.$vk->Nama .'</option>';
            }
        }
        echo '</select>';
        echo '<script>$(".select33").select3({
            minimumResultsForSearch: Infinity
        });</script>';
    }

    
    // Ipul
    function select_pendidikanayah(){
        $aplikanid = $this->input->post('aplikanid');
        $mhsw = $this->m_user->get_mhsw($aplikanid);

        $vk = $this->m_user->get_v_pendidikan();

        echo '<select class="select444" id="pendidikanayah" name="pendidikanayah">';
        foreach ($mhsw as $kd) {
            if($vk == $kd->PendidikanAyah){
                echo '<option selected value="'.$vk->Pendidikan.'">'.$vk->Nama .'</option>';
            }else{                
                echo '<option value="'.$vk->Pendidikan.'">'.$vk->Nama .'</option>';
            }
        }
        echo '</select>';
        echo '<script>$(".select44").select3({
            minimumResultsForSearch: Infinity
        });</script>';
    }

}