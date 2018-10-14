<?php

class User_controller extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user_model');
        $this->load->library('session');
    }
    
    public function profile(){
        $data = array(
            'results' => $this->user_model->get_data()
        );
        $this->load->view('profile',$data);
    }
    
    public function home(){
        $this->load->view('home');
    }
    
    public function book(){
        $this->load->view('book');
    }
    
    public function index(){
        $this->load->view("signup.php");
    }

    public function register_user(){

        $user=array(
            'First_name'=>$this->input->post('First_name'),
            'Last_name'=>$this->input->post('Last_name'),
            'Email'=>$this->input->post('Email'),
            'Password'=>md5($this->input->post('Password'))
        );
        
        print_r($user);

        $email_check=$this->user_model->email_check($user['Email']);

        if($email_check){
          $this->user_model->register_user($user);
          $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
          redirect('login_view');

        }
        else{
          $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
          redirect('user');
        }

    }
    
    public function login_user(){
        $user_login=array(
          'Email'=>$this->input->post('Email'),
          'Password'=>md5($this->input->post('Password'))
        );

        $data=$this->user_model->login_user($user_login['Email'],$user_login['Password']);
        if($data){
            $this->session->set_userdata('ID',$data['ID']);
            $this->session->set_userdata('Email',$data['Email']);
            $this->session->set_userdata('First_name',$data['First_name']);
            $this->session->set_userdata('Last_name',$data['Last_name']);
       
//          $this->load->view('profile.php');
            redirect('profile');

        }else{
            $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
            $this->load->view("login");
        }
}

    public function login_view(){
        $this->load->view("login.php");
    }
    
    public function user_logout(){
      $this->session->sess_destroy();
      redirect('user/login_view', 'refresh');
    }
    
      public function adminreg(){
        $this->load->view('adminregistration');
    }
     public function adminadduser(){

        $user=array(
            'First_name'=>$this->input->post('First_name'),
            'Last_name'=>$this->input->post('Last_name'),
            'Email'=>$this->input->post('Email'),
            'Password'=>md5($this->input->post('Password'))
//            'Usertype_id'=>$this->input->post('Usertype_id'),
        );
        
        print_r($user);

        $email_check=$this->user_model->email_check($user['Email']);

        if($email_check){
          $this->user_model->register_user($user);
          $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
          redirect('login_view');

        }
        else{
          $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
          redirect('user');
        }

    }
     public function admindeleteusers(){
          $data = array(
            'results' => $this->user_model->admindeleteusers()
        );
        $this->load->view('admindeleteusers',$data);
    }
     public function admincancelappointments(){
       $data = array(
            'results' => $this->user_model->admincancelappointments()
        );
        $this->load->view('admincancelappointments',$data);
     }
       public function adminbookappointments(){
        $this->load->view('adminbookappointments');
    }
    
}


?>