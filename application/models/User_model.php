<?php
class User_model extends CI_model{



public function register_user($user){


$this->db->insert('users', $user);

}

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
     public function get_data($a)  
      {  
         //data is retrive from this query  
         $query = $this->db->get('appointments');  
         return $query->result();  
      }  


}


?>