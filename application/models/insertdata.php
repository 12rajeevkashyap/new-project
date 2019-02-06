<?php

class insertdata extends CI_Model {

public function insert($data)
{

$this->db->insert('users',$data); 

}

public function check_email($email)
{

$value=$this->db->query("select email from users where email='$email'");

// count($value);
// echo $value->num_rows();
if($value->num_rows()==1)
{

return true;

}

else
{

return false;
}

}

function can_login($username, $password,$position)  
{  
$this->db->where('name', $username);  
$this->db->where('password', $password); 
$this->db->where('position', $position); 
$query = $this->db->get('users');  
//SELECT * FROM users WHERE username = '$username' AND password = '$password'  
if($query->num_rows() > 0)  
{  
return true;  
}  
else  
{  
return false;       
}  
}

function can_login1($username, $password)  
{  

$this->db->where('name', $username);  
$this->db->where('password', $password); 
$this->db->where('status', 2);   
$query = $this->db->get('users');  
//SELECT * FROM users WHERE username = '$username' AND password = '$password'  
if($query->num_rows() > 0)  
{  
return true;  
}  
else  
{  
return false;       
}  
}


function listing($data)
{

$this->db->insert('listing',$data);

}

function notes()
{

$this->db->select("*");
$this->db->from("listing");
$value=$this->db->get();
return $value;

}

function file($id)
{
//  $this->db->select("*");
// $this->db->from("listing");
// $value=$this->db->get();
$value= $this->db->query("select * from listing where id='$id'");
return $value;
}


function file_insert($data)
{
$this->db->insert('file',$data);
}


function detail()
{
$this->db->select("*");
$this->db->from("listing");
$this->db->order_by("id", "desc");
$value=$this->db->get();
return $value;
}

function update($new_password,$email)
{
$this->db->query("update users set password='$new_password' where email='$email'");  
}

function selectdata($id)
{
$value=$this->db->query("select * from listing  where id='$id'");
return $value;
}

function updatedata($data,$id)
{  
$this->db->where('id',$id);
$this->db->update('listing',$data);
}

function course()
{

$value=$this->db->query("select * from course");
return $value;

}

function branch($branch_id)
{

$value=$this->db->query("select * from branch where course_id='$branch_id'");

return $value->result();
//return $value->row();
}

function coursefetch()
{

$value=$this->db->query("select * from course ");
return $value;

}

function notes_filter($Course,$branch,$Semester)
{

$value=$this->db->query("select * from listing where course='$Course' and Branch='$branch' and	Semester='$Semester'");
return $value->result();

}

function delete($id)
{

$this->db->query("delete from listing where id='$id'");

}


function teacher_registration($data)
{
$this->db->insert('users',$data);
}


function fetch_id($username)
{

$value=$this->db->query("select * from users where name='$username'"); 
return $value->row(); 

}


// function update_id($id)
// {
//   $this->db->query("update users set ");
// }


function edit_profile($id)
{

$value=$this->db->query("select * from users where id='$id'");
return $value->result();

} 

function edit_profile_data($data,$id)
{

$this->db->where('id',$id);
$this->db->update('users',$data);

}


function select_id($id)
{

$value=$this->db->query("select * from  users  where id='$id'");

return $value->row();

}

function pagination()
{

  $val=$this->db->query("select count(*) from tbl_pagination ");

   return $val->result();

}

function paginationc($lower_limit,$page_limit)
{
 
$val1=$this->db->query(" SELECT * FROM tbl_pagination WHERE 1 limit ". ($lower_limit)." ,  ". ($page_limit). " ");

 return $val1->result();



}

function test($data)
{

  $this->db->insert('test',$data);


}


}