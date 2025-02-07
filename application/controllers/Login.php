<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Login extends CI_Controller {

	public function index($msg = NULL)
	{
	    if($this->session->userdata('validated') == true) {
        	redirect('home');
        }

        $this->load->library('session');
        $token = $this->make_token();
        $this->session->set_userdata('token', $token);
        $data = array('msg' => $msg, 'token' => $token);

		$this->load->view('v_login', $data);
        $this->load->view('user/v_footer');
	}
 //
	private function make_token() {
	    $this->load->helper('string');
	    $this->load->helper('security');

	    $text = random_string('alnum', 16);
	    $str = do_hash($text, 'md5');

	    return $str;
	}

	public function process($id=NULL)
    {

        $this->load->model('m_login');
        $valid = $this->security->xss_clean($this->input->post('login'));
        $username = $this->session->userdata('username');

        if (!$valid == $this->session->userdata('token')) {

            $this->load->model('m_login');
            $result = $this->m_login->validate();

             if(! $result) {
                $msg = '<font size="2" style="color:red;">Email/ Password tidak cocok</font><br>';
                $this->index($msg);
            }
            else {
                
                $username = $this->session->userdata('username');
                $this->m_login->update_last_login($username);
                $this->m_login->cek_expired();

                redirect('home');

            }       
        }
        else {
            redirect('login');
        }


    }

      function logout()
    {
        $this->session->set_userdata('validated', false);
        $this->session->sess_destroy();

        redirect('login', 'refresh');
    }
	
	public function lupapassword()
{
    $this->load->view('v_lupapassword');
    $this->load->model('m_login');

    // Check if form is submitted
    if ($this->input->post('email')) {
        $email = $this->input->post('email');

        // Check if the email exists in the database
        $user_exists = $this->m_login->checkUserByEmail($email);

        if ($user_exists) {
            // Generate a unique reset token
            $reset_token = md5(uniqid(rand(), true));

            // Save the reset token to the database
            $this->m_login->saveResetToken($email, $reset_token);

            // Send email with the reset link
            $this->sendResetEmail($email, $reset_token);

            // Display success message
            $this->session->set_flashdata('success_msg', 'Email berhasil dikirim. Periksa inbox untuk link password reset.');
        } else {
            // Display error message
            $this->session->set_flashdata('error_msg', 'Email Tidak Terdaftar, Mohon Periksa Kembali email');
        }

        // Redirect to the login page or another appropriate page
        redirect('login/lupapassword');
    }
}


    private function sendResetEmail($email, $reset_token)
{
    // Configure email settings
    $this->load->library('email');
    $this->load->helper('url');

    $config = array(
        'protocol' => 'smtp',
        'smtp_host' => 'mail.gunungsari.id',
        'smtp_port' => 587,
        'smtp_user' => 'github@gunungsari.id',
        'smtp_pass' => '5Tikesypgs',
        'smtp_crypto' => 'tls',
        'mailtype' => 'html',
        'charset' => 'utf-8',
        'wordwrap' => true,
    );
    $this->email->initialize($config);

    // Set email content
    $this->email->from('github@gunungsari.id', 'PMB Stikes 2023.');
    $this->email->to($email);
    $this->email->subject('Password Reset');

    $reset_link = base_url("login/reset_password/{$reset_token}"); // Assuming you have a reset_password method in the Login controller

    // Customize the email message below
    $message = "Click the following link to reset your password: {$reset_link}";

    $this->email->message($message);

    try {
        // Send email
        if ($this->email->send()) {
            // Display success pop-up message
            echo '<script>
                alert("Email berhasil dikirim. Periksa inbox untuk link password reset.");
            </script>';
            
        } else {
            throw new Exception('Email tidak dapat dikirim: ' . $this->email->print_debugger());
        }
    } catch (Exception $e) {
        log_message('error', $e->getMessage());  // Log the error for debugging
    
        // Display error pop-up message
        echo '<script>
            alert("Terjadi kesalahan saat mengirim email. Silakan coba lagi nanti.");
        </script>';
        
        return 'Terjadi kesalahan saat mengirim email. Silakan coba lagi nanti.';
    }
    
}

    public function reset_password($reset_token = null)
{
    // Check if the reset token is provided
    $this->load->model('m_login');
    if ($reset_token) {
        // Check if the reset token is valid
        $user_exists = $this->m_login->checkUserByResetToken($reset_token);

        if ($user_exists) {
            $data['reset_token'] = $reset_token;
            $this->load->view('update_password', $data);
        } else {
            // Set error message for the view
            $this->session->set_flashdata('error_msg', 'Invalid reset token.');
            // Redirect to login/reset_password or any other appropriate page
            redirect('login/reset_password');
        }
    } else {
        // Redirect to login/lupapassword if reset token is not provided
        redirect('login/lupapassword');
    }
}

    public function update_password()
{
    $this->load->model('m_login');

    $reset_token = $this->input->post('reset_token');
    $new_password = $this->input->post('password');
    $confirm_password = $this->input->post('confirm_password');

    // Validate passwords
    if ($new_password !== $confirm_password) {
        $this->session->set_flashdata('error_msg', 'Passwords Tidak Sesuai.');
    } else {
        // Check if the reset token is valid
        $user_exists = $this->m_login->checkUserByResetToken($reset_token);

        if ($user_exists) {
            // Update the password in the database
            $this->m_login->updatePasswordByResetToken($reset_token, $new_password);

            // Set success message for the view
            $this->session->set_flashdata('success_msg', 'Password Berhasil Diubah.');
        } else {
            // Set error message for the view
            $this->session->set_flashdata('error_msg', 'Invalid reset token.');
        }
    }
    // Redirect back to the appropriate view
    redirect("login");
}

	
}
