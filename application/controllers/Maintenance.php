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

        $users['users'] = $this->adminmodel->read_single_user($id);
        $this->load->view('edit_user', array_merge($users));
    }

    function update_user(){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE){
            //if failed
            echo '<p>';
            echo validation_errors();
            echo '</p>';
        }
        //verifica eventuali cambi della password
        //recupera quella vecchia dal db
        $id = $this->input->post('id_user');
        $editdate = date('Y-m-d H:i:s');
        $pw = $this->input->post('confirmpassword');
        $old_pws = $this->adminmodel->read_password($id);
        foreach ($old_pws as $old_pw) {
            $p = $old_pw->password;
        }

        if ($p != $pw) {
            //se non coincidono la considera come cambiata e applica ash
            $date = date('Y-m-d H:i:s');
            $newdate = strtotime ( '+3 month' , strtotime ( $date ) );
            $newdate = date ( 'Y-m-d H:i:s' , $newdate );
            $data=array(
                'full_name' => $this->input->post('full_name'),
                'username' => $this->input->post('username'),
                'password' => $pw,
                'role_id' => $this->input->post('role_id'),
                'editedAt' => $editdate,
                'pwexpireAt' => $newdate
            );
        }else{
            $data=array(
                'full_name' => $this->input->post('full_name'),
                'username' => $this->input->post('username'),
                'editedAt' => $editdate,
                'role_id' => $this->input->post('role_id')
            );
        }

        $this->adminmodel->update_user($id, $data);

        //trace user editing
        $tracelog=array(
            'date' => $editdate,
            'username' => $_SESSION['username'],
            'event_type' => 'User Updated',
            'event' => $this->input->post('full_name'). ' has been updated'
        );
        $this->logsmodel->trace_log($tracelog);

        redirect('admin/admincontroller');
    }

    function new_user(){
        $this->load->view('admin/create_user');
    }

    function create_user(){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('full_name', 'Full_Name', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[sf_users.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE){
            //if failed
            echo '<p>';
            echo validation_errors();
            echo '</p>';
        }else{
            $creationdate = date('Y-m-d H:i:s');
            $pw = $this->input->post('confirmpassword');
            $cpw = sha1($pw);
            //TO DO funzione scadenza password
            $data=array(
                'full_name' => $this->input->post('full_name'),
                'username' => $this->input->post('username'),
                'password' => $cpw,
                'role_id' => $this->input->post('role_id'),
                'enabled' => 0,
                'createdAt' => $creationdate
                //TO DO password expire
            );
            $this->adminmodel->create_user($data);
        }

        //trace user creation
        $tracelog=array(
            'date' => $creationdate,
            'username' => $_SESSION['username'],
            'event_type' => 'User Creation',
            'event' => $this->input->post('full_name'). ' has been created'
        );
        $this->logsmodel->trace_log($tracelog);

        redirect('admin/admincontroller');
    }

    function delete_user(){
        $id = $this->uri->segment(4);

        //verifica che non sia l'utente corrente
        $user_id = $this->session->userdata('id_user');
        if($id == $user_id){
            //redirect('admincontroller');
        }

        if ($id != 1){
            //se non è il default admin cancella l'utente
            $this->adminmodel->delete_user($id);
        }

        redirect('admin/admincontroller');
    }


}