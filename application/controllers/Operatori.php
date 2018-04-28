<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operatori extends CI_Controller {

    function index(){
        $operatori['operatori'] = $this->adminmodel->lista_operatori();
        $this->load->view('operatori', $operatori);

    }

    function read_operator(){

    }

    function save_operator(){

    }

    function create_operator(){

    }

    function delete_operator(){

    }
}
