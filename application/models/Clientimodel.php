<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Utentimodel extends CI_Model
{

    function create_user($data){
        $this->db->insert('utenti', $data);
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
        $this->db->from('utenti');
        $this->db->where('id_utente', $id);
        $query = $this->db->get()->result();

        return $query;
    }

    function read_password($id){
        $this->db->select('password');
        $this->db->from('utenti');
        $this->db->where('utenti.id_utente', $id);
        $query = $this->db->get()->result();

        return $query;
    }

    function update_user($id, $data){
        $this->db->where('id_utente', $id);
        $this->db->update('utenti', $data);
    }

    function delete_user($id){
        $this->db->where('id_utente', $id);
        $this->db->delete('utenti');
    }
}