<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }

    function cek_expired(){
        $this->db->query("UPDATE formulir set status_formulir = 2 where date(datetime_expired) < now() and status_formulir = 0");
    }

    function update_last_login($username){
        $now = date('Y-m-d H:i:s');
        $this->db->query("UPDATE users set last_login = '$now' where email = '$username'");
    }
    
    function validate()
    {
        $username = $this->security->xss_clean($this->input->post('email'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        $this->db->where('email', $username);
        $this->db->where('password', md5($password));
        
        $query = $this->db->get('users');

        foreach ($query->result() as $qd) {
            $jenis= $qd->jenis_user;
        }

        if($query->num_rows() == 1) {
            $row = $query->row();
            $data = array(
                'email' => $row->email,
                'password' => $row->password,
                'validated' => true,
                'jenis' => $jenis
                );
            $this->session->set_userdata($data);
            return true;
        }
        else {
	        return false;
        }
    }
	
	function saveResetToken($email, $reset_token)
{
    $this->db->where('email', $email);
    $data = array('reset_token' => $reset_token);
    $this->db->update('users', $data);
}


    public function checkUserByEmail($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');

        return $query->num_rows() > 0;
    }

    public function checkUserByResetToken($reset_token)
    {
        try {
            $this->db->where('reset_token', $reset_token);
            $query = $this->db->get('users');
            return $query->num_rows() > 0;
        } catch (Exception $e) {
            log_message('error', 'Error checking user by reset token: ' . $e->getMessage());
            return false;
        }
    }

    public function updatePasswordByResetToken($reset_token, $new_password)
{
    try {
        $hashed_password = md5($new_password); // Use md5 to hash the password

        $data = array('password' => $hashed_password, 'reset_token' => null);
        $this->db->where('reset_token', $reset_token);
        $this->db->update('users', $data);
    } catch (Exception $e) {
        log_message('error', 'Error updating password by reset token: ' . $e->getMessage());
    }
}


}
?>