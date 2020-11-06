<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consuntivazioni extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$loggedin = $this->session->userdata('logged-in');
		$id = $this->session->userdata('id');
		$utente = $this->session->userdata('utente');

	}

    function index(){

		$clienti['clienti'] = $this->Riferimentimodel->Readriferimenti();

	    $this->load->view('home');

    }
}
