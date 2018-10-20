<?php 
 
if (!defined('BASEPATH')) exit('No direct script access allowed'); 
class charts_controller extends CI_Controller 
 
    { 
    function __construct() 
        { 
        parent::__construct(); 
        $this->load->model('charts_model'); 
 
        // $this->load->library('form_validation'); 
 
        $this->load->helper('string'); 
        } 
 
    public 
 
    function charts() 
        { 
        $this->load->view('chart_view'); 
        } 
 
    public 
 
    function getdata() 
        { 
        $data = $this->charts_model->get_all_users(); 
 
        //         //data to json 
 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Topping", 
            "pattern" => "", 
            "type" => "string" 
        ); 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Total", 
            "pattern" => "", 
            "type" => "number" 
        ); 
        foreach($data as $cd) 
            { 
            $responce->rows[]["c"] = array( 
                array( 
                    "v" => "$cd->First_name", 
                    "f" => null 
                ) , 
                array( 
                    "v" => (int)$cd->ID, 
                    "f" => null 
                ) 
            ); 
            } 
 
        echo json_encode($responce); 
        } 
    }