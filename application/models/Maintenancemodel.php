<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//il nome della classe qui sotto deve corrispondere al nome del file
class Maintenancemodel extends CI_Model{

    function db_optimization($DB,$dbname){
        $results = $DB->query('show databases');
        $allDbs = array();
        while ($row = $results->fetch_array(MYSQLI_NUM)){
            $allDbs[] = $row[0];
        }
        $results->close();
        foreach ($allDbs as $dbName)
        {
            if ($dbName == 'mobile'){
                $DB->select_db($dbName);
                $results = $DB->query('SHOW TABLE STATUS WHERE Data_free > 0');
                if ($results->num_rows > 0){
                    while ($row = $results->fetch_assoc()){
                        $DB->query('optimize table ' . $row['Name']);
                    }
                }
                $results->close();
            }
        }
        $DB->close();
    }

    function db_backup(){

        // Load the DB utility class
        $this->load->dbutil();

        // Backup your entire database and assign it to a variable
        $backup =& $this->dbutil->backup();

        // Load the file helper and write the file to your server
        $this->load->helper('file');
        //write_file(FCPATH.'resources/db_bck/'.$filename, $backup);
        write_file(FCPATH.'resources/db_bck/'.$filename, $backup);
        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download($filename, $backup);
    }

}