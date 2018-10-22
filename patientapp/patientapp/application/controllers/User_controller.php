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
		
	public function appointments()
	{
		$id=$this->session->userdata("ID");
		$result['data']=$this->user_model->displayappointments($id);
		$result['First_name']=$this->session->userdata("First_name");
		$result['Last_name']=$this->session->userdata("Last_name");
		$this->load->view("appointments",$result);
	}
      
	public function home(){
		  $result['data']=$this->user_model->displayrecords();
		  $result['First_name']=$this->session->userdata("First_name");
		  $result['Last_name']=$this->session->userdata("Last_name");
	      $this->load->view('home',$result);
             
        }
         public function book(){
	    if($this->input->post('book_appointment'))
		{
		$id=$this->session->userdata("ID");	
		$e=$this->input->post('availabletime');
		$p=$this->input->post('doctorid');
		$m=$this->input->post('time');
		
		
		$que=$this->db->query("select * from appointment where Doctor_ID='".$p."'");
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
		$id=$this->session->userdata("ID");
       
//      $this->load->view('profile.php');
        redirect('index.php/user_controller/home',$data);

      }
      else{
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
	public function deletedata()
	{
     $id=$this->input->get('id');
	$this->user_model->deleterecords($id);
	redirect('index.php/user_controller/appointments');
	}


}

?>