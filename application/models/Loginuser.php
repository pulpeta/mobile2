<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Loginuser extends CI_Model {

    function validate_credentials($username, $password){

    	$password = hash ("sha256", $password);

        $this->db->select('*');
        $this->db->from('utenti');
        $this->db->where('utente', $username);
        $this->db->where('password', ($password));
        $query = $this->db->get();

        if ($query && $query->num_rows() == 1){
            return $query->result()[0];
        } else {
            return null;
        }
    }
}
