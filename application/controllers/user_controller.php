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
          redirect('user_controller/login_view');

        }
        else{
          $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
          redirect('user_controller/index');
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
            redirect('user_controller/adminreg');

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
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('confirmpassword', 'Confirm password', 'required|matches[password]');
            $user=array(
                'First_name'=>$this->input->post('First_name'),
                'Last_name'=>$this->input->post('Last_name'),
                'Email'=>$this->input->post('Email'),
                'password'=>md5($this->input->post('password')),             
                'Usertype_id'=>$this->input->post('Usertype_id')
            );
                  
             
            $email_check=$this->user_model->email_check($user['Email']);
       

            if($email_check){
              $this->user_model->adminadduser($user);
              $this->session->set_flashdata('success_msg', 'Registered successfully');
               $body = '
                <p>Dear '.$user['First_name'].',</p>
                <p>You have been registered to the Patient appointment system</p>
                <p>These are your details: <br>
                <strong>Username: </strong> '.$user['First_name'].'<br>
                <strong>Password: </strong>123456</p>            
                ';
                $settings = array(
                    'to' => $this->input->post('Email'),
                    'subject' => 'ACCOUNT REGISTRATION',
                    'body' => $body
                );
                // Send email to user
                $sent = send_email($settings);
                if($sent){
                   
                    //Set session message
                    $this->session->set_flashdata('user_registered','New user has been registered');
                    redirect('user_controller/adminreg');
                }else{
                    //Set session message
                    $this->session->set_flashdata('failed_register','Could not finish registration. Try again later');
                      redirect('user_controller/adminreg');
                }
                
               
            }else{
                  $this->session->set_flashdata('error_msg','Email already exists');
                  redirect('user_controller/adminreg');
            }
            
    }


              

           
    public function admindeleteusers(){
              $data = array(
                'results' => $this->user_model->admindeleteusers(),
                'results2' => $this->user_model->admindeleteusers2(),
            );
            $this->load->view('admindeleteusers',$data);
        }
    public function delete_user($id,$_email,$first_name){
        
            $deleted = $this->user_model->delete_user($id);
            if($deleted){
                
                $this->session->set_flashdata('success_msg', 'Deleted record successfully.');
                 $user=array(
                'First_name'=>$first_name,
                'Email'=>urldecode($_email),
                
            );
                 $body = '
                <p>Dear '.$user['First_name'].',</p>
                <p>You have beensuspended from the Patient appointment system</p>
              
                
                ';
                $settings = array(
                    'to' => $user['Email'],
                    'subject' => 'ACCOUNT DEACTIVATION',
                    'body' => $body
                );
                // Send email to user
                $sent = send_email($settings);
                if($sent){
                   
                    //Set session message
                    $this->session->set_flashdata('user_deleted','User has been deleted');
                    redirect('user_controller/admindeleteusers');
                }else{
                    //Set session message
                    $this->session->set_flashdata('failed','Could not delete');
                      redirect('user_controller/admindeleteusers');
                }
                
               
            }else{
                $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
            }
            redirect('user_controller/admindeleteusers');
        }
    public function admincancelappointments(){
           $data = array(
                'results' => $this->user_model->admincancelappointments()
            );
            $this->load->view('admincancelappointments',$data);
         }
    public function adminbookappointments()
       {
      $this->load->view('adminbookappointments');
        }
    public function adminbookapp(){
         $user=array(
            'First_name'=>$this->input->post('First_name'),
            'Last_name'=>$this->input->post('Last_name'),
            'Email'=>$this->input->post('Email'),
            'Password'=>md5($this->input->post('password')),
            'Usertype_id'=>$this->input->post('Usertype_id')
        );
        
        $email_check=$this->user_model->email_check($user['Email']);

        if($email_check){
          $this->user_model->adminadduser($user);
          $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
          redirect('user_controller/adminreg');

        }
        else{
          $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
          redirect('user');
        }
    }
    
}


?>