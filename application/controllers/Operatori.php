<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operatori extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $loggedin = $this->session->userdata('logged-in');

        if(!isset($loggedin) || $loggedin != TRUE){
            //not logged
            redirect('welcome/login');
        }
    }

    function index(){
        $operatori['operatori'] = $this->operatorimodel->lista_operatori();
        $this->load->view('operatori', $operatori);

    }

    function create_operatore(){
        $this->load->view('operatoricrea');
    }

    function  add_operatore(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('operatore', 'Operatore', 'trim|required');

        if ($this->form_validation->run() == FALSE){
            //if failed
            echo '<p>';
            echo validation_errors();
            echo '</p>';
        }else{
            $data=array(
                'operatore' => $this->input->post('operatore')
            );
            $this->operatorimodel->nuovo_operatore($data);
        }

        redirect('operatori');
    }

    function edit_operatore(){
        $id = $this->uri->segment(3);
        $operatore['operatore'] = $this->operatorimodel->leggi_operatore($id);

        $this->load->view('operatoriedit', $operatore);
    }

    function update_operatore(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('operatore', 'Operatore', 'trim|required');

        if ($this->form_validation->run() == FALSE){
            //if failed
            echo '<p>';
            echo validation_errors();
            echo '</p>';
        }else {
            $id = $this->input->post('id');
            $nome['operatore'] = $this->input->post('operatore');
            $this->operatorimodel->salva_operatore($id, $nome);
            redirect('operatori');
        }
    }

    function elimina_operatore(){
        //prima verificare che non ci siano contratti attivi
        $id = $this->uri->segment(3);
        $this->operatorimodel->elimina_operatore($id);

        redirect('operatori');

    }
}
