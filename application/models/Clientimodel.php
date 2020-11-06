<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Clientimodel extends CI_Model
{

    function create_cliente($data){

        $this->db->insert('clienti', $data);

    }

    function read_clienti($cognome, $cfpi, $limit, $filter){

        //popola la lista degli utenti ordinandola
        $this->db->select('*');
        $this->db->from('clienti');
        $this->db->order_by('cf', 'DESC');
        $this->db->order_by('cognome', 'ASC');
        if($cognome){
            $this->db->where('cognome', $cognome);
        }
        if($cfpi){
            $this->db->where('cf', $cfpi);
            $this->db->or_where('piva', $cfpi);
        }
        if ($filter == 'privati'){
            $this->db->where('cf !=', null);
        }
        if ($filter == 'aziende'){
            $this->db->where('piva !=', null);
        }
        if($limit > 0){
            $this->db->limit($limit);
        }
        $query = $this->db->get()->result();

        return $query;

    }

    function get_clienti_count($cognome, $cfpi){

        //popola la lista degli utenti ordinandola
        $this->db->select('*');
        $this->db->from('clienti');
        $this->db->order_by('cf', 'DESC');
        $this->db->order_by('cognome', 'ASC');
        if($cognome){
            $this->db->where('cognome', $cognome);
        }
        if ($cfpi){
            $this->db->where('piva', $cfpi)->or_where('cf', $cfpi);
        }
        $query = $this->db->get()->result();

        return $query->num_rows();

    }


    function read_single_cliente($id){

        $this->db->select('*');
        $this->db->from('clienti');
        $this->db->where('id', $id);
        $query = $this->db->get()->result();

        return $query;
    }

    function update_cliente($id, $data){

        $this->db->where('id', $id);
        $this->db->update('clienti', $data);
    }

    function delete_cliente($id){

        $this->db->where('id', $id);
        $this->db->delete('clienti');
    }
}