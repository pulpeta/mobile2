<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function user_login(){
        //$this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE){
            //if failed
            //redirect('welcome/login');
            redirect('welcome/login');
            echo validation_errors();
        }else{
            $user = $this->loginuser->validate_credentials($this->input->post('username'), $this->input->post('password'));

            //inserire verifica se username esiste
            //se non esiste redirect a login

            if ($user){
                //crea dati sessione
                $data = array(
                    'id_user' => $user->id,
                    'username' => $user->username,
                    'logged-in' => true
                    );
                $this->session->set_userdata($data);
                redirect('Utenti');
                }else{
                    redirect('welcome/login');
                    }
                }
    }

    public function user_logout()
    {
        //distrugge sessione
        $this->session->sess_destroy();
        // reindirizza alla home page
        redirect('welcome/login');
    }
}
