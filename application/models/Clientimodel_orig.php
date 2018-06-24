<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Clientimodel extends CI_Model
{

    function create_cliente($data){
        $this->db->insert('clienti', $data);
    }

    function read_clienti($cognome, $cfpi){
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

        return $query;
    }

    function get_clienti_count($st = NULL)
    {
        if ($st == "NIL") $st = "";
        $sql = "select * from tbl_books where name like '%$st%'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }


    function read_single_cliente($id){
        $this->db->select('*');
        $this->db->from('utenti');
        $this->db->where('id_cliente', $id);
        $query = $this->db->get()->result();

        return $query;
    }

    function update_cliente($id, $data){
        $this->db->where('id_cliente', $id);
        $this->db->update('clienti', $data);
    }

    function delete_cliente($id){
        $this->db->where('id_clienti', $id);
        $this->db->delete('clienti');
    }
}