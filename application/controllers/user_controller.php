<?php
class User_controller extends CI_Controller {

        public function index()
        {
                $this->load->view('signup');
//                 $this->load->view('signupdb');
                   echo"login";
              
        }
         public function login()
        {
               
                $this->load->view('login');
        }
       public function patient()
        {
               
                $this->load->view('patient');
        }
    
}