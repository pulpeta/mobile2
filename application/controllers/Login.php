<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function user_login(){
        //$this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE){
            redirect('welcome/login');
        }else{
            $user = $this->loginuser->validate_credentials($this->input->post('username'), $this->input->post('password'));

            if ($user){
                //crea dati sessione
                $data = array(
                    'id' => $user->id_utente,
                    'utente' => $user->utente,
                    'logged-in' => true
                    );
                $this->session->set_userdata($data);
                redirect('consuntivazioni');
                }else{
                    redirect('login');
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
