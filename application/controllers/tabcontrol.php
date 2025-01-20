<?php

defined("BASEPATH") Or ("No Direct Script Access Allowed");
class tabcontrol extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function test_db() {
        $query = $this->db->get('users');
        echo '<pre>';
        print_r($query->result());
        echo '</pre>';
    }    
}
?>