<?php
class User_controller extends CI_Controller {

        public function index()
        {
                $this->load->view('signup');
              
        }
         public function login()
        {
               
                $this->load->view('login');
        }
}