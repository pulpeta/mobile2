<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contratti extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $loggedin = $this->session->userdata('logged-in');

        if(!isset($loggedin) || $loggedin != TRUE){
            //not logged
            redirect('welcome/login');
        }
    }

    function index(){
        $this->load->view('indexadmin');
    }

    function estrai_no_vincolo(){

        $export = $this->contrattimodel->estrai_no_vincolo();

        foreach ($export as $idc){
            $i=$idc->idc;
            $this->contrattimodel->set_avvisato($i);
        }

        $csv='';
        $csv="Numero;Operatore;Nome;CognomeRagioneSociale;CF;PIVA;\n";
        foreach ($export as $e){
            $csv .= $e->numero;
            $csv .= ";";
            $csv .= $e->operatore;
            $csv .= ";";
            $csv .= $e->nome;
            $csv .= ";";
            $csv .= $e->cognome;
            $csv .= ";";
            $csv .= $e->cf;
            $csv .= ";";
            $csv .= $e->piva;
            $csv .= ";\n";
        }
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=export_zero_".date('d-m-y').".csv");
        echo $csv;
        exit;

    }

    function estrai_24(){

        $export = $this->contrattimodel->estrai24();

        foreach ($export as $idc){
            $i=$idc->idc;
            $this->contrattimodel->set_avvisato($i);
        }

        $csv='';
        $csv="Numero;Operatore;Nome;CognomeRagioneSociale;CF;PIVA;\n";
        foreach ($export as $e){
            $csv .= $e->numero;
            $csv .= ";";
            $csv .= $e->operatore;
            $csv .= ";";
            $csv .= $e->nome;
            $csv .= ";";
            $csv .= $e->cognome;
            $csv .= ";";
            $csv .= $e->cf;
            $csv .= ";";
            $csv .= $e->piva;
            $csv .= ";\n";
        }
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=export_zero_".date('d-m-y').".csv");
        echo $csv;
        exit;

    }

    function estrai_30(){

        $export = $this->contrattimodel->estrai_30();

        foreach ($export as $idc){
            $i=$idc->idc;
            $this->contrattimodel->set_avvisato($i);
        }

        $csv='';
        $csv="Numero;Operatore;Nome;CognomeRagioneSociale;CF;PIVA;\n";
        foreach ($export as $e){
            $csv .= $e->numero;
            $csv .= ";";
            $csv .= $e->operatore;
            $csv .= ";";
            $csv .= $e->nome;
            $csv .= ";";
            $csv .= $e->cognome;
            $csv .= ";";
            $csv .= $e->cf;
            $csv .= ";";
            $csv .= $e->piva;
            $csv .= ";\n";
        }
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=export_zero_".date('d-m-y').".csv");
        echo $csv;
        exit;

    }

    function reset_avvisati(){

        $this->contrattimodel->reset_avvisati();
        redirect('contratti');

    }

    function check_30(){

        $this->contrattimodel->check_30();
        redirect('contratti');
    }

}