<?php
    class Pages_controller extends CI_Controller{
       public function __construct(){
           parent::__construct();
           
       }
        public function profile(){
             $this->load->view('profile');
        }
         public function home(){
             $this->load->view('home');
        }
         public function book(){
             $this->load->view('book');
        }
    }
        ?>