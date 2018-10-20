<?php 
class charts_model extends CI_Model 
{ 
    function __construct() 
    { 
        parent::__construct(); 
    } 
    //get fruts data 
    public function get_all_users() 
    { 
        return $this->db->get('users')->result(); 
    } 
}