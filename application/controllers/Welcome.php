<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

/**
* Index Page for this controller.
*
* Maps to the following URL
* 		http://example.com/index.php/welcome
*	- or -
* 		http://example.com/index.php/welcome/index
*	- or -
* Since this controller is set as the default controller in
* config/routes.php, it's displayed at http://example.com/
*
* So any other public methods not prefixed with an underscore will
* map to /index.php/welcome/<method_name>
* @see https://codeigniter.com/user_guide/general/urls.html
*/

public function __construct()
{
parent::__construct();

@session_start();
$this->load->model('insertdata');
$this->load->helper('download');
$this->load->library('form_validation'); 

$this->load->library('encryption');
// f
error_reporting(0);
}

public function index()
{
$this->load->view('login');
}

public function login()
{

$this->load->view('login');

}

public function register()
{

$submit=$this->input->post('submit');

if(isset($submit))
{
$name=$this->input->post('name');
$email=$this->input->post('email');
$phone=$this->input->post('phone');
$password=$this->input->post('password');

error_reporting(0); 	   	
if($this->insertdata->check_email($email))  
{

$this->session->set_flashdata('msg','email are duplicate. try again');
$this->load->view('login');
}

else
{

$data=array('name'=>$name,'email'=>$email,'phone_no'=>$phone,'password'=>getHashedPassword($password),'position'=>'Student');

$this->session->set_flashdata('msg','your registration successful. try to login');
$this->insertdata->insert($data);
$this->load->view('login');

}
}
}

public  function login_validation() 
{

$this->form_validation->set_rules('username', 'Username', 'required');  
$this->form_validation->set_rules('password', 'Password', 'required');  

if($this->form_validation->run())  
{  

$username = $this->input->post('username');  
$password = $this->input->post('password');  
$position=$this->input->post('position');

if($this->insertdata->can_login($username, $password,$position)and $position=='Teacher')  
{  
 echo $username;

error_reporting(0);

echo $this->db->last_query();
$session_data = array(  
'username'     =>     $username  
);  

$data['value_id']=$this->insertdata->fetch_id($username);

echo $id=$data['value_id']->id;
echo $this->db->last_query();
  

$this->session->set_userdata('set_id',$id);   

$this->session->set_userdata($session_data);  
redirect(base_url() . 'listing');  


}  

else if($this->insertdata->can_login($username, $password,$position)and $position=='Student')  
{  
	echo $this->db->last_query();
$session_data = array(  
'username'     =>     $username  
);  
$this->session->set_userdata($session_data);  
redirect(base_url() . 'notes');  
}  

else  
{  
$this->session->set_flashdata('msg', 'Invalid Username and Password');  
redirect(base_url() . 'login');  
}  
} 

else  
{  

$this->login();  
} 
}

public function listing()
{

$submit=$this->input->post('submit');

$id= $_REQUEST['id'];
if($this->session->userdata('username') != '')  
{  


if($id!='' and $submit=='')
{
$data1['retrive']=$this->insertdata->selectdata($id);
$data1['retrive2']=$this->insertdata->course();
$this->db->last_query();

$this->load->view('listing',$data1);

}

else if($id=='' and $submit=='')
{

$branch['retrive1']=$this->insertdata->course(); 

//$this->session->set_flashdata("msg1","Data have been saved");
$this->load->view('listing',$branch); 
}
}  

else  
{  
redirect(base_url() . 'Posts/index');  
} 

if(isset($submit))
{

$id=$this->input->post('id');
$file_name = $_FILES['Notes']['name'];
$file_size =$_FILES['Notes']['size'];
$file_tmp =$_FILES['Notes']['tmp_name'];
$file_type=$_FILES['Notes']['type'];

if($file_name=='' and $id!='')
{

move_uploaded_file($file_tmp,"document/".$file_name);

$Course=$this->input->post('Course');
$subject_name=$this->input->post('subject_name');
$Branch=$this->input->post('Branch');
$Semester=$this->input->post('Semester');
$teacher_name=$this->input->post('teacher_name');
$Date=$this->input->post('Date');
$Notes=$this->input->post('Note');
$file_name = $_FILES['Note']['name'];
$hidden=$this->input->post('hidden');
$subject_code=$this->input->post('subject_code');


if($file_name=='')
{
$data=array('subject_name'=>$subject_name,'Branch'=>$Branch,'Semester'=>$Semester,'teacher_name'=>$teacher_name,'Date'=>$Date,'subject_code'=>$subject_code,'Notes'=>$hidden,'course'=>$Course);
}

else if($file_name!='')
{
$data=array('subject_name'=>$subject_name,'Branch'=>$Branch,'Semester'=>$Semester,'teacher_name'=>$teacher_name,'Date'=>$Date,'subject_code'=>$subject_code,'Notes'=>$file_name,'course'=>$Course);

}


$this->insertdata->updatedata($data,$id);
echo $this->db->last_query();
$this->session->set_flashdata("msg1","Data have been update");

redirect('detail');
//redirect('listing');

}

if($file_name!='' and $id=='')
{
$file_name = $_FILES['Notes']['name'];
$file_size =$_FILES['Notes']['size'];
$file_tmp =$_FILES['Notes']['tmp_name'];
$file_type=$_FILES['Notes']['type'];

move_uploaded_file($file_tmp,"document/".$file_name);
echo $Course=$this->input->post('Course');
$subject_name=$this->input->post('subject_name');
$Branch=$this->input->post('Branch');
$Semester=$this->input->post('Semester');
$teacher_name=$this->input->post('teacher_name');
$Date=$this->input->post('Date');
$Notes=$this->input->post('Notes');
$subject_code=$this->input->post('subject_code');

$data=array('subject_name'=>$subject_name,'Branch'=>$Branch,'Semester'=>$Semester,'teacher_name'=>$teacher_name,'Date'=>$Date,'subject_code'=>$subject_code,'Notes'=>$file_name,'course'=>$Course);

// echo $this->db->last_query();
$this->insertdata->listing($data);
$this->session->set_flashdata("msg1","Data have been saved");
redirect('detail'); 

}
}
}

function logout()  
{  
$this->session->unset_userdata('username');  
redirect(base_url() . 'login');  
} 


function notes()
{

if(!empty($_GET['file'])){
$fileName = basename($_GET['file']);
$filePath = 'document/'.$fileName;
if(!empty($fileName) && file_exists($filePath)){

header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$fileName");
header("Content-Type: application/zip");
header("Content-Transfer-Encoding: binary");
readfile($filePath);
exit;
}else{
echo 'The file does not exist.';
}
}

$data['retrive']=$this->insertdata->notes(); 
$data['retrive1']=$this->insertdata->coursefetch(); 
force_download($data, NULL);
$this->load->view('notes',$data);
}

function detail()
{
$data['retrive']=$this->insertdata->detail();
$data['retrive1']=$this->insertdata->coursefetch(); 
force_download($data, NULL);
$this->load->view('detail',$data); 


}

function forget_password()
{

$send=$this->input->post('send');

if(isset($send))
{

$email=$this->input->post('email');
$this->session->set_userdata('email',$email);

$config = Array(
'protocol' => 'smtp',
'smtp_host' => 'ssl://smtp.googlemail.com',
'smtp_port' => 465,
'smtp_user' => 'rajeevkashyap002@gmail.com', // enter yours email
'smtp_pass' => '12raju1997@', //enter yours gmail password
'mailtype' => 'html',
'charset' => 'iso-8859-1',
'wordwrap' => TRUE
);

$this->session->set_userdata('email',$email);

$code= base64_encode(rand(1,10000));

$this->session->set_userdata('code',$code);
$message = "<div style=''><div style='color:green; borer 1px solid black;'><h1> EDUCATION POINT (MIET)</h1> 
<p><img src='<?php echo base_url();?>document/image2 (14).jpg'></p>
<p style='color:orange;'><strong>click on the below link  for password reset.</strong></p>
</div></div>
http://localhost/codelgniter/Welcome/set_password/$code
";
$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->from($email); // change it to yours
$this->email->to($email);//msz  where and in which email to send?
$this->email->subject('EDUCATION POINT (MIET)');
$this->email->message($message);
if($this->email->send())
{

$this->session->set_flashdata('active_msg','Activation Link has been sended Check your mail');
$this->load->view('forget_password');

}
else
{
echo"not hello";     
}
}

if(!isset($send))
{
$this->load->view('forget_password');
}

}

function set_password()
{

$id=$this->uri->segment(3);

$code=base64_decode($id);
$email=$this->session->userdata('email'); 

if(!isset($submit))
{
$this->load->view('set_password');
}

echo $submit=$this->input->post('submit');

if(isset($submit))
{

$new_password=$this->input->post('new_password');
$confirm_password=$this->input->post('confirm_password');

if(!empty($code))
{

if($new_password==$confirm_password and $new_password!='' and $confirm_password!='' and $email!='')
{

$this->db->last_query();
$this->insertdata->update($new_password,$email); 
$this->db->last_query();

// $this->load->view('login');

$this->session->set_flashdata('msg1',"your password has been reset. please login ");
redirect('login');
}
}
}

}

function branch()
{

$branch_id=$_GET['UserId']; 

$this->db->last_query();
$data['retrive']=$this->insertdata->branch($branch_id);
$this->db->last_query();

echo "<option>".'select branch'."</option>";
foreach($data['retrive'] as $row)
{
?>
<option><?php echo $row->branches;?></option>
<?php 
}
}

function notes_filter()
{

echo$Course= $_GET['Course'];
echo $branch=$_GET['Branch'];
echo $Semester=$_GET['Semester'];

$data['retrive']=$this->insertdata->notes_filter($Course,$branch,$Semester);

if(!empty($_GET['file'])){
$fileName = basename($_GET['file']);
$filePath = 'document/'.$fileName;
if(!empty($fileName) && file_exists($filePath)){

header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$fileName");
header("Content-Type: application/zip");
header("Content-Transfer-Encoding: binary");

readfile($filePath);
exit;
}else{
echo 'The file does not exist.';
}
}
$this->db->last_query();
?>
<thead>
<tr>
<th>ID</th>
<th>Teacher Name</th>
<th>Semester</th>
<th>Subject</th>
<th>Brance</th>
<th>Date</th>
<th>Subject Code</th>
<th>Download</th>
</tr>
</thead>
<?php 
 $count=count($data['retrive']);
 if($count>0)
 {

foreach($data['retrive'] as $row)  
{ 

?>
<tbody>
<tr>
<td><?php echo $row->id;?></td>
<td><?php echo $row->teacher_name;?></td>
<td><?php echo $row->Semester;?></td>
<td><?php echo $row->subject_name;?></td>
<td><?php echo $row->Branch;?></td>
<td><?php echo $row->Date;?></td>
<td><?php echo $row->subject_code;?></td>
<td><a href="<?php echo base_url('welcome/notes_filter');?>?file=<?php echo $row->Notes;?>"class="btn btn-primary" >Dowload File</a></td>
</tr>
</tbody>
<?php 
}
}
else
{

?>
<tr>
<td colspan="12" style="color: red; margin-left: 200px;">
<div class="col-sm-offset-5" class="alert alert-primary" role="alert"><h3><?php echo"data are not found";?></h3></div>

</td>	
</tr>

<?php 

}

}

function detail_filter()
{

echo$Course= $_GET['Course'];
echo $branch=$_GET['Branch'];
echo $Semester=$_GET['Semester'];

$data['retrive']=$this->insertdata->notes_filter($Course,$branch,$Semester);

if(!empty($_GET['file'])){
$fileName = basename($_GET['file']);
$filePath = 'document/'.$fileName;
if(!empty($fileName) && file_exists($filePath)){

header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$fileName");
header("Content-Type: application/zip");
header("Content-Transfer-Encoding: binary");

readfile($filePath);
exit;
}else{

}
}
$this->db->last_query();
?>

<thead>
<tr>
<th>ID</th>
<th>Teacher Name</th>
<th>Course</th>
<th>Semester</th>
<th>Subject</th>
<th>Brance</th>
<th>Date</th>
<th>Subject Code</th>
<th>Download</th>
<th>Update</th>
<th>Delete</th>
<th>Delete</th>
</tr>
</thead>
<?php 

 $count=count($data['retrive']);

 if($count>0)
  {
foreach ($data['retrive'] as $row)  
{ 

?>
<tbody>
<tr>
<td><?php echo $row->id;?></td>
<td><?php echo $row->teacher_name;?></td>
<td><?php echo $row->course;?></td>
<td><?php echo $row->Semester;?></td>
<td><?php echo $row->subject_name;?></td>
<td><?php echo $row->Branch;?></td>
<td><?php echo $row->Date;?></td>
<td><?php echo $row->subject_code;?></td>
<td><a href="<?php echo base_url('notes');?>?file=<?php echo $row->Notes;?>"class="btn btn-primary" ><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Dowload File</a></td>
<td><a href="<?php echo base_url();?>listing?id=<?php echo $row->id;?>"class="btn btn-success" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Update</a></td>
<td><input type="checkbox" name="customer_id[]"  class="delete_customer" value="<?php echo $row->id;?>" / ></td>

<td>
<button type="button"  del1="<?php echo $row->id;?>" name="btn_delete" id="ajax" class=" Remove1 btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete</button></td>
</tr>
<tr><td colspan="12" ><button type="button" style="margin-left: 1020px;" name="btn_delete1" id="btn_delete1" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete</button>


</td></tr>
<?php 
}
}
else
{
?>
<tr>
<td colspan="12" style="color: red; margin-left: 200px;">
<div class="col-sm-offset-5"><h3><?php echo"data are not found";?></h3></div>
</td>	
</tr>
<?php 
}

}
function delete()
{
 foreach($_GET['id'] as $id)
 {
$this->insertdata->delete($id); 
//echo$this->db->last_query();
 }

}

function delete1()
{

 echo $id=$_POST['remove'];
$this->insertdata->delete($id); 

$this->session->set_flashdata('msg1','data has been deleted');
echo$this->db->last_query();
 


}

function adminlogin()
{

$this->load->view('admin');

}

function admin()
{

$this->form_validation->set_rules('username', 'Username', 'required');  
$this->form_validation->set_rules('password', 'Password', 'required'); 

if($this->form_validation->run())  
{  

$username = $this->input->post('username');  
$password = $this->input->post('password'); 

if($this->insertdata->can_login1($username, $password))  
{  
//echo $this->db->last_query();

$session_data = array(  
'username'     =>     $username  
);  
//$this->session->set_userdata($session_data);  
$this->load->view('create_registration');
} 

else  
{  
//$this->session->set_flashdata('msg', 'Invalid Username and Password');  
redirect(base_url() . 'admin');  

} 

}

else  
{  

$this->admin();  
} 


}

function teacher_registration()
{


$send=$this->input->post('send_email');
$email=$this->input->post('email');



if(isset($send))
{
$this->session->set_userdata('email',$email);

$config = Array(
'protocol' => 'smtp',
'smtp_host' => 'ssl://smtp.googlemail.com',
'smtp_port' => 465,
'smtp_user' => 'rajeevkashyap002@gmail.com', // enter yours email
'smtp_pass' => '12raju1997@', //enter yours gmail password
'mailtype' => 'html',
'charset' => 'iso-8859-1',
'wordwrap' => TRUE
);

$this->session->set_userdata('email',$email);
$code= base64_encode(rand(1,10000));

$this->session->set_userdata('code',$code);
$message = "<div style='color:green;'><h1> EDUCATION POINT (MIET)</h1> 
<p><img src='<?php echo base_url();?>document/image2 (14).jpg'></p>
<p style='color:orange;'><strong>click on the below link  for password reset.</strong></p>
</div>
http://localhost/codelgniter/teacher_registration/?id=1
";
$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->from($email); // change it to yours
$this->email->to($email);//msz  where and in which email to send?
$this->email->subject('EDUCATION POINT (MIET)');
$this->email->message($message);
if($this->email->send())
{

$this->session->set_flashdata('active_msg','Activation Link has been sended Check your mail');
$this->load->view('create_registration');

}

else
{
echo"not hello";
}
}

if($_REQUEST['id']!='')
{

 $email1=$this->session->userdata('email');

$this->session->set_userdata('email1',$email1);

$this->load->view('teacher_registration');
}

$teacher_submit=$this->input->post('teacher_submit');

if(isset($teacher_submit))
{

$username=$this->input->post('username');
$email=$this->input->post('email'); 
$phone=$this->input->post('phone'); 
echo $password=$this->input->post('password');


 $data=array('name'=>$username,'email'=>$email,'phone_no'=>$phone,'password'=>$password,'position'=>'Teacher');
$this->insertdata->teacher_registration($data);

$this->session->set_flashdata('msg1',"registration successful. please login ");
$this->load->view('login');

}
}

function file()
{

$data['retrive']=$this->insertdata->file($id);
$this->load->view('file',$data);

}

function file_listing()
{
 
echo $id= $_REQUEST['id'];
echo  $subject_name= $_REQUEST['subject_code'];

$file_listing=$this->input->post('file_listing');
  
 echo $_SESSION['id']=$id;
if(isset($file_listing))
{
  echo $_SESSION['id'];

 echo $_REQUEST['id'];

echo $file_name = $_FILES['Notes']['name'];
$file_size =$_FILES['Notes']['size'];
$file_tmp =$_FILES['Notes']['tmp_name'];
$file_type=$_FILES['Notes']['type'];

move_uploaded_file($file_tmp,"document/".$file_name);

 $data=array('subject_name'=>$subject_name,'file'=>$file_name,'	subject_id'=>$id);
  $this->insertdata->file_insert($data);
  echo $this->db->last_query();

}

if($file_name=='')
{
$this->load->view('file_listing');
}

}

function edit_profile($id)
{
 $id= $this->uri->segment(2);

$this->session->set_userdata('id',$id);
$data['value'] =$this->insertdata->edit_profile($id); 
$this->load->view('edit_profile',$data);

}

public function edit_profile_data()
{

   $id=$this->session->userdata('id'); 

 $name=$this->input->post('name');
$password=$this->input->post('password');
$email=$this->input->post('email');    
$phone=$this->input->post('phone');

$data=array('name'=>$name,'password'=>$password,'email'=>$email,'phone_no'=>$phone);
$this->insertdata->edit_profile_data($data,$id);    
echo $this->db->last_query();

$this->session->set_flashdata('msg1','Profile Updated Successful');

  redirect('listing');

}


function delete2()
{

  echo $_GET['remove1'];

}

function test()
{

 $this->load->view('test');


$submit=$this->input->post('submit');
if(isset($submit))
{

 $name=$this->input->post('name');
 $address=$this->input->post('address');
 $mobile=$this->input->post('mobile');

 $data=array('name'=>$name,'address'=>$address,'mobile'=>$mobile);
 echo $this->db->last_query();
   
  $this->insertdata->test($data); 

  $this->session->set_flashdata('msg','data has been insert');

}



}


}


