<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function index(){
	    $this->load->view('login');
    }

	function login(){
        $this->load->view('login');
    }
}
