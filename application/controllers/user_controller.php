<?php

class User_controller extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('user_model');
        $this->load->library('session');

}
     public function profile(){
             $this->load->view("profile");
        }
      public function home(){
             $this->load->view('home');
        }
         public function book(){
             $this->load->view('book');
        }
        public function index()
        {
        $this->load->view("signup.php");
        }

        public function register_user(){

              $user=array(
              'First_name'=>$this->input->post('First_name'),
              'Last_name'=>$this->input->post('Last_name'),
              'Email'=>$this->input->post('Email'),
              'Password'=>md5($this->input->post('Password')),

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
    function login_user(){
  $user_login=array(

  'Email'=>$this->input->post('Email'),
  'Password'=>md5($this->input->post('Password'))

    );

    $data=$this->user_model->login_user($user_login['Email'],$user_login['Password']);
      if($data)
      {
        $this->session->set_userdata('ID',$data['ID']);
        $this->session->set_userdata('Email',$data['Email']);
        $this->session->set_userdata('First_name',$data['First_name']);
          $this->session->set_userdata('Last_name',$data['Last_name']);
       
//        $this->load->view('profile.php');
            redirect('profile');

      }
      else{
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        $this->load->view("login");

      }


}


public function login_view(){

$this->load->view("login.php");

}


//function user_profile(){
//
//$this->load->view('user_profile.php');
//
//}
public function user_logout(){

  $this->session->sess_destroy();
  redirect('user/login_view', 'refresh');
}
    public function appointments()  
      {  
         $this->data['appointments'] = $this->user_model->get_data(); // calling Post model method getPosts()
         $this->load->view('profile', $this->data); // load the vie
      }  

}

?>