<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
    }

				
	// protected $allowedFields = [
	// 	'Nama', 'Kebangsaan', 'WargaNegara', 'Handphone', 'ProdiID','PresenterID','CatatanPresenter'
	// ]; 


    function get_last_insert_aplikan($aplikanid){
        $query = $this->db->query("SELECT * from aplikan WHERE AplikanID = '$aplikanid'");
        return $query->result();
    }

      // Select Program Nama
      function select_sumber_info($infoid){
        $query = $this->db->query("SELECT Nama from sumberinfo where infoID = '$infoid'");
        return $query->result()[0]->Nama;
    }

    // Select Program Nama
    function select_program_nama($programid){
        $query = $this->db->query("SELECT Nama from program where programID = '$programid'");
        return $query->result()[0]->Nama;
    }

    //Select pendidikan terakhir Orang Tua
    function select_pendidikan_terakhir($pendidikanid){
        $query = $this->db->query("SELECT Nama from pendidikanortu where Pendidikan = '$pendidikanid'");
        return $query->result()[0]->Nama;
    }

     // Select Program Nama
     function select_kelamin($jeniskelamin){
        $query = $this->db->query("SELECT Nama from kelamin where Kelamin = '$jeniskelamin'");
        return $query->result()[0]->Nama;
    }

    function inputdata($data = null,$table = null){
		$this->db->insert($table,$data);
	}

    function Savedata($table,$data){
        $this->db->insert($table, $data);
    }

    function Updateaplikandata($aplikanid, $arr){
        $this->db->where('AplikanID', $aplikanid);
        $this->db->update('aplikan', $arr);
    }

     function get_price_departemen($replid){
        $query = $this->db->query("SELECT PMBFormulirID as kodeawalan, harga as form_price from pmbformulir where NA='N' and PMBFormulirID = '$replid'");
        return $query->result();
    }
  function get_pmb_period_id(){
        $query = $this->db->query("SELECT PMBPeriodID, FormatNoAplikan, DigitNoAplikan  from pmbperiod where NA='N'");
        return $query->result();
    }
    function get_name_departemen(){
        $query = $this->db->query("SELECT PMBFormulirID as replid, Nama as departemen from pmbformulir where na = 'n'");
        return $query->result();
    }


    function verify_form($id){
        $email = $this->session->userdata('email');
        $pin = rand(10000,99999);
        $this->db->query("UPDATE aplikan set form_submit = 1, `Password` = $pin where PMBFormulirID = '$id' and email = '$email'");
    }

   
	function get_aplikan($id){
        $query = $this->db->query("SELECT * from aplikan where aplikanid = '$id'");
		return $query->result();
    }
    function get_pendidikan(){
        $query = $this->db->get('pendidikanortu');
        return $query->result();
    }

    function get_agama(){
        $query = $this->db->get('Agama');
        return $query->result();
    }

    function get_pendidikanortu_by_idproses(){
        $query = $this->db->query("SELECT * from pendidikanortu where NA = 'N'");
        return $query->result()[0]->Pendidikan;
    }

    function get_prodi_by_idproses(){
        $query = $this->db->query("SELECT * from Prodi where NA = 'N'");
        return $query->result()[0]->ProdiID;
    }

	function get_sumber_by_idproses(){
		$query = $this->db->query("SELECT * from sumberinfo where NA = 'N'");
		return $query->result()[0]->InfoID;
    }

    //Select pendidikan terakhir Orang Tua
    function get_kelamin(){
        $query = $this->db->query("SELECT Kelamin,Nama from kelamin");
        return $query->result();
    }

    function get_calon_mahasiswa_by_id_join($id) {
    $email = $this->session->userdata('email');

    if ($this->session->userdata('jenis_user') != 0) {
        $this->db->where('email', $email);
    }

    $this->db->where('aplikanid', $id);
    $query = $this->db->get('aplikan');
    
    return $query->result();
}

    function get_calon_siswa_by_id($id){
        $email = $this->session->userdata('email');
        $this->db->where('email', $email);
        $this->db->where('aplikanid', $id);
        $query = $this->db->get('aplikan');
        return $query->result();
    }

    function update_calonsiswa_v3($replid, $arr, $tgllahirayah, $tgllahiribu){
        $email = $this->session->userdata('email');
        $this->db->where('aplikanid', $replid);
        $this->db->where('email', $email);
        $this->db->set('tgllahirayah', $tgllahirayah);
        $this->db->set('tgllahiribu', $tgllahiribu);
        $this->db->update('aplikan', $arr);        
    }

    function update_calonsiswa_v2($replid, $arr, $tgllahir){
        $email = $this->session->userdata('email');
        $this->db->where('aplikanid', $replid);
        $this->db->where('email', $email);
        // $this->db->set('tgllahir', $tgllahir);
        $this->db->update('aplikan', $arr);        
        $this->db->update('aplikan', $arr);        
    }
	
	//
	function update_aplikan_data($aplikanid, $arr){		
        $this->db->where('AplikanID', $aplikanid);
        $this->db->update('aplikan', $arr);
    }

    function input_data($data, $tbl){
		//$this->db->insert($table,$data);
       
        $this->db->insert($tbl, $data);
	}

    function update_aplikan($aplikanid, $arr){
        //$email = $this->session->userdata('email');
        $this->db->where('AplikanID', $aplikanid);
        $this->db->update('aplikan', $arr);
    }

    function get_program($programid){
        $query = $this->db->query("SELECT * from program where programID='$programid' and NA = 'N'");
        return $query->result_array();
    }

    function get_mhsw($aplikanid){
        $query = $this->db->query("SELECT * from aplikan where aplikanid='$aplikanid' and NA = 'N'");
        return $query->result();
    }
	
    function get_v_prodi(){
        $query = $this->db->query("SELECT ProdiID from prodi");
        return $query->result();
    }

    function get_v_program(){
        $query = $this->db->query("SELECT ProgramID,Nama from program WHERE NA = 'N'");
        return $query->result();
    }
	
    function get_v_sumber(){
        $query = $this->db->query("SELECT * from sumberinfo order by urutan");
        return $query->result();
    }
    function get_v_pendidikanortu(){
        $query = $this->db->query("SELECT * from pendidikanortu order by pendidikan");
        return $query->result();
    }
	
     // repliid tidak ada, digunakan di v_form.php
    function get_id_formulir($email) {
        $query = $this->db->query("SELECT aplikan.aplikanid as replid, aplikan.nama, aplikan.pssbid, aplikan.form_submit,
                                    formulir.status_formulir, formulir.datetime_expired, formulir.id_formulir
                                    FROM aplikan
                                    INNER JOIN formulir ON aplikan.aplikanID = formulir.virtual_account
                                    WHERE aplikan.email = '$email'");
        $result = $query->result();
    
        // Check and mark as expired if the datetime has passed
        foreach ($result as &$cd) {
            $cd->is_expired = strtotime($cd->datetime_expired) < time();
        }
    
        return $result;
    }
	
	function get_formulirs_by_email($email) {
        $this->db->select('
            aplikan.aplikanid as replid,
            aplikan.nama,
            aplikan.pssbid,
            aplikan.form_submit,
            formulir.status_formulir,
            formulir.id_formulir,
            formulir.email,
            users.email as user_email,
            formulir.datetime_expired,
            formulir.datetime_input
        ');
        $this->db->from('aplikan');
        $this->db->join('formulir', 'aplikan.aplikanID = formulir.virtual_account');
        $this->db->join('users', 'users.email = aplikan.Email');
    
        $this->db->where('aplikan.email', $email);
    
        $query = $this->db->get();
        $result = $query->result();
    
        // Check and mark as expired if the datetime has passed
        foreach ($result as &$formulir) {
            $formulir->is_expired = strtotime($formulir->datetime_expired) < time();
        }
    
        return $result;
    }
    
    function get_all_formulirs() {
        $query = $this->db->get('formulir');
        return $query->result();
    }
    
    function get_all_users() {
        $query = $this->db->get('users');
        return $query->result();
    }
     
	 // get calon siswa apakah pakai paramater atau tidak dan diambil dari mana
    function get_last_calonsiswa($trx_id){
		 $query = "select count(PMBFormulirID) as jml 
      from pmbformjual 
      where  PMBFormulirID = (select kodeawalan from formulir where trx_id='$trx_id')";

        $query = $this->db->query("SELECT count(*) as jml from aplikan");
        if(!empty($query->result()[0]->jml)){
            $j = $query->result()[0]->jml;
            return $j+1;
        }else{
            return 1;
        }
    }

    function insert_calonsiswa($arr){
        $this->db->insert('aplikan', $arr);
    }

	function insert_pmbformjual($arr){
        $this->db->insert('pmbformjual', $arr);
    }
	
    function get_jml_form($trx_id){
		$query = $this->db->query("SELECT jml_formulir, kodeawalan from formulir where trx_id = '$trx_id' and status_formulir = 0");
        return $query->result();		
    }
    
	// ini error tidak ada trx id di aplikan....kecuali di tabel formulir.
    function update_status_payment($trx_id, $va){
        $this->db->query("UPDATE formulir set status_formulir = 1 where trx_id = '$trx_id' and virtual_account = '$va'");
    }

    function insert_user($arr){
        $this->db->insert('users', $arr);
    }

    function cek_otp($id, $otp){
        $query = $this->db->query("SELECT COUNT(*)  as jml from users_temp where idmd5 = '$id' and otp = '$otp'");
        return $query->result()[0]->jml;
    }

    function get_user_temp_by_md5($md5){
        $this->db->where('idmd5', $md5);
        $query = $this->db->get('users_temp');
        return $query->result();
    }

    function get_form_last_id(){
        $query = $this->db->query("SELECT trx_id from formulir where substr(trx_id,1,4)=YEAR(CURDATE()) order by trx_id desc limit 1");
		
		if(isset($query->result()[0]->trx_id)){
			
            $akhir = $query->result()[0]->trx_id;
			return $akhir+1;

        }else{

            return date('Y').'8401';
			
        }
    }

    function get_last_temp(){
        $query = $this->db->query("SELECT COUNT(*) as jml from users_temp");
        if($query->result()){
            $jml = $query->result()[0]->jml;
            return $jml+1;
        }else{
            return 1;
        }
    }

    function add_temp_user($temp){
        $this->db->insert('users_temp', $temp);
        return $this->db->insert_id();
    }

    function cek_avail_user($email, $hp){
        $query = $this->db->query("SELECT count(*) as jml from users where email = '$email' or phone = '$hp'");
        return $query->result()[0]->jml;
    }

    function get_form_by_email($email){
		
        $this->db->where('email', $email);
		
    }

    function update_password($email, $password){
        $this->db->query("UPDATE users set password = '$password' where email = '$email'");
    }

    function cek_password($email){
        $query = $this->db->query("SELECT password from users where email = '$email'");
        return $query->result()[0]->password;
    }

    function get_invoice_by_email($email){

        $this->db->where('email', $email);
        $query = $this->db->get('formulir');
        return $query->result();
    }

    function get_invoice($formulir_id, $email) {
        // Ubah kondisi where untuk memperbolehkan admin mengakses formulir berdasarkan ID tanpa memperhatikan email
        $this->db->where('id_formulir', $formulir_id);
        
        // Hanya tambahkan kondisi where ini jika bukan admin (jenis_user != 0)
        if ($this->session->userdata('jenis_user') != 0) {
            $this->db->where('email', $email);
        }
        
        $this->db->where('status_formulir', '0');
        $query = $this->db->get('formulir');
        return $query->result();
    }

    function update_formulir($data, $json_api, $id){
        $this->db->where('id_formulir', $id);
        $this->db->update('formulir', $data);
    }

    function get_profile($email){
        $query = $this->db->query("SELECT * FROM users where email = '$email'");
        return $query->result();
    }

    function buy_formulir($data){
        $query = $this->db->insert('formulir', $data);
        return $this->db->insert_id();
    }
	function insert_aplikan($data){
       $this->db->insert('aplikan', $data);
		
    }

    function get_name($email){
        $query = $this->db->query("SELECT nama_user from users where email = '$email'");
        return $query->result()[0]->nama_user;
    }

	 function get_trx_id($va){
        $query = $this->db->query("SELECT trx_id from billing_log  where va = '");
        return $query->result()[0]->nama_user;
    }
	
    function update_last_login($username){
        $now = date('Y-m-d H:i:s');
        $this->db->query("UPDATE users set last_login = '$now' where email = '$username'");
    }

}