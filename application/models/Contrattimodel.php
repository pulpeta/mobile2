<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Contrattimodel extends CI_Model {

    public function leggi_contratti(){
        $this->db->select('*');
        $this->db->from('contratti');
        $this->db->join('operatori', 'contratti.operatore_id = operatori.id');
        $query = $this->db->get()->result();

        if ($query){
            return $query;
        } else {
            return null;
        }
    }

}