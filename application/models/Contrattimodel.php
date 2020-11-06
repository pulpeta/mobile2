<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Contrattimodel extends CI_Model {

    function read_contratti($id){

        $this->db->select('contratti.*, operatori.*, utenti.utente');
        $this->db->from('contratti');
        $this->db->join('operatori', 'operatori.id = contratti.operatore_id');
        $this->db->join('utenti', 'utenti.id_utente = contratti.utente_id');
        $this->db->order_by('scadenza', 'ASC');
        $this->db->where('cliente_id', $id);
        $query = $this->db->get()->result();

        return $query;
    }

    function delete_contratto($id){
        $this->db->where('idc', $id);
        $this->db->delete('contratti');
    }

    function checkcontratti($id){

        $this->db->select('contratti.*');
        $this->db->from('contratti');
        $this->db->where('cliente_id', $id);
        $query = $this->db->get();

        return $query->num_rows();
    }

    function read_contratto($id){

        $this->db->select('*');
        $this->db->from('contratti');
        $this->db->where('idc', $id);
        $query = $this->db->get()->result();

        return $query;
    }

    function update_contratto($idc, $data){

        $this->db->where('idc', $idc);
        $this->db->update('contratti', $data);

    }

    function nuovo_contratto($data){

        $this->db->insert('contratti', $data);
    }

    function estrai_no_vincolo(){

        $this->db->select('idc, numero, operatore, nome, cognome, cf, piva');
        $this->db->from('contratti');
        $this->db->join('operatori', 'operatori.id = contratti.operatore_id');
        $this->db->join('clienti', 'clienti.id = contratti.cliente_id');
        $this->db->where('vincolo', 0);
        $this->db->where('avvisato', null);
        $this->db->order_by('piva', 'ASC');
        $this->db->order_by('cognome', 'ASC');
        $this->db->order_by('operatore', 'ASC');
        $export = $this->db->get()->result();

        return $export;
    }

    function estrai_24(){

        $this->db->select('idc, numero, operatore, nome, cognome, cf, piva');
        $this->db->from('contratti');
        $this->db->join('operatori', 'operatori.id = contratti.operatore_id');
        $this->db->join('clienti', 'clienti.id = contratti.cliente_id');
        $this->db->where('vincolo', 24);
        $this->db->where('avvisato', null);
        $this->db->order_by('piva', 'ASC');
        $this->db->order_by('cognome', 'ASC');
        $this->db->order_by('operatore', 'ASC');
        $export = $this->db->get()->result();

        return $export;
    }

    function estrai_30(){
        $this->db->select('idc, numero, operatore, nome, cognome, cf, piva');
        $this->db->from('contratti');
        $this->db->join('operatori', 'operatori.id = contratti.operatore_id');
        $this->db->join('clienti', 'clienti.id = contratti.cliente_id');
        $this->db->where('vincolo', 30);
        $this->db->where('avvisato', null);
        $this->db->order_by('piva', 'ASC');
        $this->db->order_by('cognome', 'ASC');
        $this->db->order_by('operatore', 'ASC');
        $export = $this->db->get()->result();

        return $export;
    }

    function set_avvisato($idc){

        $day = date('Y-m-d');
        $data = array(
            'avvisato' => $day
            );
        $this->db->where('idc', $idc);
        $this->db->update('contratti', $data);

    }

    function reset_avvisati(){

        $this->db->select('idc');
        $this->db->from('contratti');
        $idc = $this->db->get()->result();

        $data = array(
            'avvisato' => ''
        );

        foreach ($idc as $i){
            $id=$i->idc;
            $this->db->where('idc', $id);
            $this->db->update('contratti', $data);
        }
    }

    function check_30(){

        $this->db->select('idc, avvisato');
        $this->db->from('contratti');
        $this->db->where('avvisato !=', '000-00-00');
        $idc = $this->db->get()->result();

        $now = new DateTime(date('Y-m-d'));
        $data = array(
            'avvisato' => ''
        );


        foreach ($idc as $i){
            $id=$i->idc;
            $avvisato = new Datetime(date('Y-m-d', strtotime($i->avvisato)));

            $diff = $now->diff($avvisato)->format('%a');

            if($diff > 30){
                $this->db->where('idc', $id);
                $this->db->update('contratti', $data);
            }
        }

    }

}