<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Operatorimodel extends CI_Model
{
    function lista_operatori(){
        $this->db->select('*');
        $this->db->from('operatori');
        $this->db->order_by('operatore', 'ASC');
        $query = $this->db->get()->result();
        return $query;
    }

    function leggi_operatore($id){
        $this->db->select('*');
        $this->db->from('operatori');
        $this->db->where('id', $id);
        $query = $this->db->get()->result();
        return $query;
    }

    function nuovo_operatore($operatore){
        $this->db->insert('operatori', $operatore);
    }

    function check_elimina($id){

    }

    function elimina_operatore($id){
        $this->db->where('id', $id);
        $this->db->delete('operatori');
    }

    function salva_operatore($id, $operatore){
        $this->db->where('id', $id);
        $this->db->update('operatori', $operatore);
    }

}