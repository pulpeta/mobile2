<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clienti extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $loggedin = $this->session->userdata('logged-in');

        if(!isset($loggedin) || $loggedin != TRUE){
            //not logged
            redirect('welcome/login');
        }
    }

    function index(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('cognome', 'Cognome', 'trim');
        $this->form_validation->set_rules('cfpi', 'CFPI', 'trim');
        $this->form_validation->set_rules('limit', 'Limit', 'integer|trim');

        $cognome = $this->input->post('cognome');
        $cfpi = $this->input->post('cfpi');
        $limit = $this->input->post('limit');
        $filter = $this->input->post('filtra');

        if(!isset($limit)){
            $limit=50;
        }

        $clienti['clienti'] = $this->clientimodel->read_clienti($cognome, $cfpi, $limit, $filter);

        $this->load->view('clienti', $clienti);
    }

    function edit_cliente(){
        $id = $this->uri->segment(3);
        $cliente['cliente'] = $this->clientimodel->read_single_cliente($id);
        $contratti['contratti'] = $this->contrattimodel->read_contratti($id);

        $this->load->view('edit_cliente', array_merge($cliente, $contratti));
    }

    function update_cliente(){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('cognome', 'Cognome', 'trim|required');
        $this->form_validation->set_rules('cf', 'CF', 'trim');
        $this->form_validation->set_rules('piva', 'PIVA', 'trim');

        $id = $this->input->post('id');
        $data['nome'] = $this->input->post('nome');
        $data['cognome'] = $this->input->post('cognome');
        if(!($this->input->post('cf'))){
            $data['cf'] = NULL;
        }else{
            $data['cf'] = $this->input->post('cf');
        }
        if(!($this->input->post('piva'))){
            $data['piva'] = NULL;
        }else{
            $data['piva'] = $this->input->post('piva');
        }



        if ($this->form_validation->run() == FALSE){
            $cliente['cliente'] = $this->clientimodel->read_single_cliente($id);
            $this->load->view('edit_cliente', $cliente);
        }else{
            $this->clientimodel->update_cliente($id, $data);
            $cliente['cliente'] = $this->clientimodel->read_single_cliente($id);
            $this->load->view('edit_cliente', $cliente);
        }
    }

    function nuovo_cliente(){
        $this->load->view('create_cliente');
    }

    function create_cliente(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('cognome', 'Cognome', 'trim|required');
        $this->form_validation->set_rules('cf', 'CF', 'trim|is_unique[clienti.cf]');
        $this->form_validation->set_rules('piva', 'PIVA', 'trim|is_unique[clienti.piva]');



        if ($this->form_validation->run() == FALSE){
            $this->load->view('create_cliente');
        }else{
            $data['nome'] = $this->input->post('nome');
            $data['cognome'] = $this->input->post('cognome');
            if(!($this->input->post('cf'))){
                $data['cf'] = NULL;
            }else{
                $data['cf'] = $this->input->post('cf');
            }
            if(!($this->input->post('piva'))){
                $data['piva'] = NULL;
            }else{
                $data['piva'] = $this->input->post('piva');
            }
            $this->clientimodel->create_cliente($data);
            redirect('clienti');
        }

    }

    function delete_cliente(){
        $id = $this->uri->segment(3);
        //verificare se ci sono contratti presenti prima di eliminare il cliente
        $rec = $this->Contrattimodel->checkcontratti($id);

        if($rec == 0){
            $this->clientimodel->delete_cliente($id);
            redirect('clienti');
        }else{

            echo '<div class="container">';
            echo '<div class="row text-center">';
            echo '<div class="col-sm-12 text-center">';
            echo '<h4 style="text-align: center">Impossibile cancellare: sono presenti dei contratti</h4>';
            echo '<p style="text-align: center;"><a class="btn btn-sm btn-primary" href="clienti">Indietro</a></p>';
            echo '</div></div></div>';
        }

    }

    function delete_contratto(){

        $id = $this->uri->segment(3);
        $cliente_id = $this->uri->segment(4);
        $this->contrattimodel->delete_contratto($id);
        redirect('clienti/edit_cliente/'.$cliente_id);

    }

    function edit_contratto(){

        $idc = $this->uri->segment(3);
        $contratto['contratto'] = $this->contrattimodel->read_contratto($idc);
        $operatori['operatori'] = $this->operatorimodel->lista_operatori();

        $this->load->view('edit_contratto', array_merge($contratto, $operatori));

    }

    function update_contratto(){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('numero', 'Numero', 'trim|required');
        $this->form_validation->set_rules('vincolo', 'Vincolo', 'trim|integer');
        $this->form_validation->set_rules('scadenza', 'Scadenza', 'trim');

        echo $this->input->post('scadenza');

        $array = explode("/", $this->input->post('scadenza'));

        // Riorganizzo gli elementi in stile DD/MM/YYYY
        $data_mysql = $array[2]."-".$array[1]."-".$array[0];

        echo $data_mysql;

        $cliente_id = $this->input->post('cliente_id');
        $idc = $this->input->post('idc');
        $data['numero'] = $this->input->post('numero');
        $data['operatore_id'] = $this->input->post('operatore');
        $data['vincolo'] = $this->input->post('vincolo');
        $data['scadenza'] = $data_mysql;

        if ($this->form_validation->run() == FALSE){
            $contratto['contratto'] = $this->contrattimodel->read_contratto($idc);
            $this->load->view('edit_contratto', $contratto);
        }else{
            $this->contrattimodel->update_contratto($idc, $data);
            $cliente['cliente'] = $this->contrattimodel->read_contratto($idc);
            redirect('clienti/edit_cliente/'.$cliente_id);
        }
    }

    function nuovo_contratto(){

        $id = $this->uri->segment(3);
        $cliente['cliente'] = $this->clientimodel->read_single_cliente($id);
        $operatori['operatori'] = $this->operatorimodel->lista_operatori();

        $this->load->view('create_contratto', array_merge($cliente, $operatori));

    }

    function salva_contratto(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('numero', 'Numero', 'trim|required|is_unique[contratti.numero]');
        $this->form_validation->set_rules('vincolo', 'Vincolo', 'trim');
        $this->form_validation->set_rules('scadenza', 'Scadenza', 'trim');

        $array = explode("/", $this->input->post('scadenza'));

       // Riorganizzo gli elementi in stile mysql
       $data_mysql = $array[2]."-".$array[1]."-".$array[0];

       if ($this->form_validation->run() == FALSE){
           $this->load->view('create_contratto');
       }else{
           $data['numero'] = $this->input->post('numero');
           $data['operatore_id'] = $this->input->post('operatore');
           $data['utente_id'] =  $_SESSION['id_utente'];
           $data['cliente_id'] = $this->input->post('cliente_id');
           $data['vincolo'] = $this->input->post('vincolo');
           $data['scadenza'] = $data_mysql;

           $this->contrattimodel->nuovo_contratto($data);
           redirect('clienti/edit_cliente/'.$this->input->post('cliente_id'));
       }

    }


}