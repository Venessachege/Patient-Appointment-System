<?php
class User_model extends CI_model{

//user self registration

public function register_user($user){


$this->db->insert('users', $user);

}
//user login
public function login_user($email,$pass){

  $this->db->select('*');
  $this->db->from('users');
  $this->db->where('Email',$email);
  $this->db->where('Password',$pass);

  if($query=$this->db->get())
  {
      return $query->row_array();
  }
  else{
    return false;
  }


}
//check if email exists
public function email_check($email){

  $this->db->select('*');
  $this->db->from('users');
  $this->db->where('Email',$email);
  $query=$this->db->get();

  if($query->num_rows()>0){
       return false;
  }else{
    return true;
  }

}
//display appointments
public function get_data()  
      {   $results = array();
          $this->db->select("*"); 
          $this->db->from('appointments');
          $query = $this->db->get();
          if($query->num_rows() > 0) {
          $results= $query->result();
      }  

       return $results;
     }
//user admin registration
public function adminadduser($user){


       $this->db->insert('users', $user);

}
//admin delete users
public function admindeleteusers()  
      {   $results = array();
          $this->db->select("*"); 
          $this->db->from('users');
          $this->db->where('Usertype_id=3');
          $query = $this->db->get();
          if($query->num_rows() > 0) {
          $results= $query->result();
      }  

       return $results;
     }
public function admindeleteusers2()  
      {   $results2 = array();
          $this->db->select("*"); 
          $this->db->from('doctors');
          
          $query = $this->db->get();
          if($query->num_rows() > 0) {
          $results2= $query->result();
      }  

       return $results2;
     }
    
public function delete_user($id){
        $this->db->where('ID',$id);
        return $this->db->delete('users');
    }
public function delete_user2($id){
        $this->db->where('Doctors_id',$id);
        return $this->db->delete('doctors');
    }
//function updateUser($postData,$id){
//
//        $name = trim($postData['txt_name']);
//        $email = trim($postData['txt_email']);
//        if($name !='' && $email !=''  ){
//
//            // Update
//            $value=array('name'=>$name,'email'=>$email);
//            $this->db->where('id',$id);
//            $this->db->update('users',$value)){
//
//        }
//admin cancel appointments
public function admincancelappointments()  
      {   $results = array();
          $this->db->select("*"); 
          $this->db->from('appointments');
          $query = $this->db->get();
          if($query->num_rows() > 0) {
          $results= $query->result();
      }  

       return $results;
     }


//display doctors in patients module
public function displayrecords()
	{
	$query=$this->db->query("select * from doctors");
	return $query->result();
	}
	
	//display appointments
public function displayappointments($id)
	{
	$query=$this->db->query("select * from appointment WHERE Patients_ID='".$id."'");
	return $query->result();
	}
	//delete records
public function deleterecords($id)
	{
		$query=$this->db->query("DELETE FROM `appointment` WHERE Doctor_ID='".$id."'");
		 $this->session->set_flashdata('success_msg', 'Your appointment has been cancelled');
          
	}
public function updatepassword($Email,$pass,$npass){
    
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('Email',$Email);
        $this->db->where('Password',md5($pass));
        $query = $this->db->get();
        if($query->num_rows()>0){
            $data = array(
                           'Password' => md5($npass)
                        );
            $this->db->where('Email', $Email);
            $this->db->update('users', $data); 
             $this->session->set_flashdata('success_msg', 'Password updated');
             redirect('user_controller/login_user');
        }else{
             $this->session->set_flashdata('error_msg', 'Update not successful');
             redirect('user_controller/forgotpassword');
        }
    }

}
?>