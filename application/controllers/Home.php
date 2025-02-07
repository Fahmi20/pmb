<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	   function __construct()
    {
        parent::__construct();
	    
		$this->load->model('m_user');
        
        date_default_timezone_set('Asia/Jakarta');

        if($this->session->userdata('validated') != true){
            redirect('login');  
        }
        
    }


    function index(){

    	redirect('user');

    }

}