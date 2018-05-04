<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Utentimodel extends CI_Model
{

    function create_user($data){
        $this->db->insert('sf_users', $data);
    }

    function read_users(){
        //popola la lista degli utenti ordinandola
        $this->db->select('id_utente, utente');
        $this->db->from('utenti');
        $this->db->order_by('utente', 'ASC');
        $query = $this->db->get()->result();

        return $query;
    }

    function read_single_user($id){
        $this->db->select('*');
        $this->db->from('sf_users');
        $this->db->where('sf_users.id_user', $id);
        $query = $this->db->get()->result();

        return $query;
    }

    function read_user_name($id){
        $this->db->select('full_name');
        $this->db->from('sf_users');
        $this->db->where('sf_users.id_user', $id);
        $query = $this->db->get()->result();

        return $query;
    }

    function read_password($id){
        $this->db->select('password');
        $this->db->from('sf_users');
        $this->db->where('sf_users.id_user', $id);
        $query = $this->db->get()->result();

        return $query;
    }

    function update_user($id, $data){
        $this->db->where('id_user', $id);
        $this->db->update('sf_users', $data);
    }

    function delete_user($id){
        $this->db->where('id_user', $id);
        $this->db->delete('sf_users');
    }
}