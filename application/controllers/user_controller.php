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
    
   
    
    public function index(){
        $this->load->view("signup.php");
    }

    public function register_user(){
        
//        $this->form_validation->set_rules('confirmpassword', 'Confirm password', 'required|matches[Password]',array(
//                'matches' => "Passwords do not match"));
//         if($this->form_validation->run() == FALSE){
//              $this->load->view('signup');
//       }else{
        $user=array(
            'First_name'=>$this->input->post('First_name'),
            'Last_name'=>$this->input->post('Last_name'),
            'Email'=>$this->input->post('Email'),
            'Password'=>md5($this->input->post('Password')),
            'Usertype_id'=>3
        );
        
//        print_r($user);

        $email_check=$this->user_model->email_check($user['Email']);

        if($email_check){
            
          $this->user_model->register_user($user);
          $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
            $body = '
                <p>Dear '.$user['First_name'].',</p>
                <p>You have been registered to the Patient appointment system</p>
                <p>These are your details: <br>
                <strong>Firstname: </strong> '.$user['First_name'].'<br>
                <strong>Lastname: </strong> '.$user['Last_name'].'<br>
                
                ';
                $settings = array(
                    'to' => $this->input->post('Email'),
                    'subject' => 'ACCOUNT REGISTRATION',
                    'body' => $body
                );
                // Send email to user
                $sent = send_email($settings);
                if($sent){
                    redirect('user_controller/login_view');
                   
                }else{
//                    //Set session message
//                    $this->session->set_flashdata('failed_register','Could not finish registration. Try again later');
//                      redirect('user_controller/');
                }
                
               
            }else{
                  $this->session->set_flashdata('error_msg','Email already exists');
                  redirect('user_controller/adminreg');
            }
            
         
         }
    
    //login
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
             $this->session->set_userdata('Usertpe_id',$data['Usertype_id']);
         if($Usertype_id==1){
//        
            redirect('user_controller/adminreg');
         }else{
              redirect('user_controller/adminreg');
         }
        }else{
            $this->session->set_flashdata('error_msg', 'Credentials do not match');
            $this->load->view("login");
        }
}
     //load login view
    public function login_view(){
        $this->load->view("login.php");
    }
    //logout
    public function user_logout(){
      $this->session->sess_destroy();
      redirect('user/login_view', 'refresh');
    }
    //admin register users vie
    public function adminreg(){
            $this->load->view('adminregistration');
        }
    //admin register user
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
    //admin view users       
    public function admindeleteusers(){
              $data = array(
                'results' => $this->user_model->admindeleteusers(),
                'results2' => $this->user_model->admindeleteusers2(),
            );
            $this->load->view('admindeleteusers',$data);
        }
    
    //admin delete users
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
     public function delete_user2($id,$_email,$first_name){
        
            $deleted = $this->user_model->delete_user2($id);
            if($deleted){
                
                $this->session->set_flashdata('success_msg', 'Deleted record successfully.');
                
            
                 redirect('user_controller/admindeleteusers');
                }else{
                    //Set session message
                    $this->session->set_flashdata('failed','Could not delete');
                      redirect('user_controller/admindeleteusers');
                }
                
               
    
        }
    //admin cancel appointments
    public function admincancelappointments(){
           $data = array(
                'results' => $this->user_model->admincancelappointments()
            );
            $this->load->view('admincancelappointments',$data);
         }
    //admin book appointments view
    public function adminbookappointments()
       {
      $this->load->view('adminbookappointments');
        }
    //admin book appointments
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
    //patients appointment function
    public function appointments()
	{
		$id=$this->session->userdata("ID");
		$result['data']=$this->user_model->displayappointments($id);
		$result['First_name']=$this->session->userdata("First_name");
		$result['Last_name']=$this->session->userdata("Last_name");
		$this->load->view("appointments",$result);
	}
    //patients view doctor 
    public function home(){
		  $result['data']=$this->user_model->displayrecords();
		  $result['First_name']=$this->session->userdata("First_name");
		  $result['Last_name']=$this->session->userdata("Last_name");
	      $this->load->view('home',$result);
             
        }
    //patient bboking appointment
    public function book(){
	    if($this->input->post('book_appointment'))
		{
		$id=$this->session->userdata("ID");	
		$e=$this->input->post('availabletime');
		$p=$this->input->post('doctorid');
		$m=$this->input->post('time');
		
		
		$que=$this->db->query("select * from appointment where Doctor_ID='".$p."' AND Available_Time='".$m."'");
		$row = $que->num_rows();
		if($row)
		{
		$data['error']="<h3 style='color:red'>Doctor already Booked</h3>";
		}
		else
		{
		$que=$this->db->query("INSERT INTO appointment(Patients_ID, Available_Date, Doctor_ID, Available_Time, Approval)  values('$id','$e','$p','$m','Not yet Approved')");
		
		$data['error']="<h3 style='color:blue'>Your appointment has been recorded successfully</h3>";
        
            
		}			
				
		}
		$data['groups'] = $this->user_model->displayrecords();
		$data['First_name']=$this->session->userdata("First_name");
		$data['Last_name']=$this->session->userdata("Last_name");
        $this->load->view('book',@$data);
        }
    public function deletedata()
	{
     $id=$this->input->get('id');
	$this->user_model->deleterecords($id);
   
	redirect('user_controller/appointments');
         
	}

    public function forgotpassword(){
         $this->load->view('forgotpassword');
    }
        public function changepassword()
{    
        $Email=$this->input->post('Email');
        $pass=$this->input->post('Password');
        $npass=$this->input->post('newpassword');
        $rpass=$this->input->post('confirmpassword');
        if($npass!=$rpass){
            
          
         $this->session->set_flashdata('error_msg', 'Passwords do not match');
             redirect('user_controller/forgotpassword');
          
        }
            else{
                
              $this->user_model->updatepassword($Email,$pass,$npass);
        }

}
    
    //logout
    public function logout(){
         $this->session->unset_userdata(array('ID','Email','First_name','Last_name'));
          $this->session->set_flashdata('user_logged_out','You are now logged out');
            redirect('user_controller/login_user');
    }
    
}


?>