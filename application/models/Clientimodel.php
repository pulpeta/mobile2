<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Clientimodel extends CI_Model
{

    function Readclienti(){

		$this->db->select('*');
		$this->db->from('clienti');
		$this->db->order_by('cliente', 'ASC');
		$query = $this->db->get()->result();

		return $query;

	}

}
