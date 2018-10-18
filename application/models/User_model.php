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
          $this->db->where('Usertype_id=1');
          $query = $this->db->get();
          if($query->num_rows() > 0) {
          $results= $query->result();
      }  

       return $results;
     }
public function admindeleteusers2()  
      {   $results2 = array();
          $this->db->select("*"); 
          $this->db->from('users');
          $this->db->where('Usertype_id=2');
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

}
?>