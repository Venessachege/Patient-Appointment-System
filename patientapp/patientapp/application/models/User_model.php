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
	function displayrecords()
	{
	$query=$this->db->query("select * from doctors");
	return $query->result();
	}
	
	
	function displayappointments($id)
	{
	$query=$this->db->query("select * from appointment WHERE Patients_ID='".$id."'");
	return $query->result();
	}
	
	function deleterecords($id)
	{
		$query=$this->db->query("DELETE FROM `appointment` WHERE Doctor_ID='".$id."'");
		
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


}


?>