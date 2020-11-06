<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $loggedin = $this->session->userdata('logged-in');

        if(!isset($loggedin) || $loggedin != TRUE){
            //not logged
            redirect('welcome/login');
        }
    }

    function index(){

        $users['users'] = $this->utentimodel->read_users();

        $this->load->view('maintenance', $users);
    }

    function db_optimization (){
        //ottimizza tutte le tabelle del db
        $DB = new mysqli ('localhost', 'root', 'root');
        $dbname = 'mobile';
        $this->maintenancemodel->db_optimization($DB, $dbname);

        redirect('maintenance');
    }

    function db_backup(){
        $this->maintenancemodel->db_backup();

        redirect('maintenance');
    }

    function edit_user(){
        $id = $this->uri->segment(3);

        $users['users'] = $this->utentimodel->read_single_user($id);
        $this->load->view('edit_user', $users);
    }

    function update_user(){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('utente', 'Utente', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confermapassword', 'Conferma Password', 'trim|required|matches[password]');

        $id = $this->input->post('id_utente');

        if ($this->form_validation->run() == FALSE){
            $users['users'] = $this->utentimodel->read_single_user($id);
            $this->load->view('edit_user', $users);
        }else{
            $confpw = $this->input->post('confermapassword');
            $old_pw = $this->utentimodel->read_password($id);
            if($old_pw[0] == $confpw){
                $data=array(
                    'utente' => $this->input->post('utente'),
                );
            }else{
                $confpw=sha1($confpw);
                $data=array(
                    'utente' => $this->input->post('utente'),
                    'password' => $confpw,
                );
            }
            $this->utentimodel->update_user($id, $data);
            $users['users'] = $this->utentimodel->read_single_user($id);
            $this->load->view('edit_user', $users);
        }
    }

    function new_user(){
        $this->load->view('create_user');
    }

    function create_user(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('utente', 'Utente', 'trim|required|is_unique[utenti.utente]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confermapassword', 'Conferma Password', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE){
            $this->load->view('create_user');
        }else{
            $pw = $this->input->post('confermapassword');
            $cpw = sha1($pw);

            $user=array(
                'utente' => $this->input->post('utente'),
                'password' => $cpw,
            );
            $this->utentimodel->create_user($user);
            redirect('maintenance');
        }

    }

    function delete_user(){
        $id = $this->uri->segment(3);

        if ($id != 1){
            //se non è il default admin cancella l'utente
            $this->utentimodel->delete_user($id);
        }

        redirect('maintenance');
    }


}