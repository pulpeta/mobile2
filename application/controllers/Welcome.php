<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /*public function __construct(){
        parent::__construct();

        $loggedin = $this->session->userdata('logged-in');

        if(isset($loggedin) || $loggedin = TRUE){
            redirect('admincontroller');
        }
    }*/

    function index(){
	    $this->load->view('login');
    }

	function login(){
        $this->load->view('login');
    }
}
