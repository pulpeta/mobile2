<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Riferimentimodel extends CI_Model
{

    function Readriferimenti(){

		$this->db->select('*');
		$this->db->from('riferimenti');
		$this->db->order_by('riferimento', 'ASC');
		$query = $this->db->get()->result();

		return $query;

	}

}
