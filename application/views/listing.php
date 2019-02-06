<!DOCTYPE html>
<html>
<head>
<title></title>

<!-- <link rel="stylesheet" href="<?php echo base_url('css/style.css');?>"> -->

<style type="text/css">

* {box-sizing: border-box;}

body { 
margin: 0;
font-family: Arial;
}

.header {
overflow: hidden;
background-color: #f1f1f1;
padding: 20px 10px;
}

.header a {
float: left;
color: black;
text-align: center;
padding: 12px;
text-decoration: none;
font-size: 18px; 
line-height: 25px;
border-radius: 4px;
}

.header a.logo {
font-size: 25px;
font-weight: bold;
}

.header a:hover {
background-color: #ddd;
color: black;
}

.header a.active {
background-color: #337ab7;
color: white;
}

.header-right {
float: right;
}

@media screen and (max-width: 500px) {
.header a {
float: none;
display: block;
text-align: left;
}
.header-right {
float: none;
}
}


.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #009999;
   color: white;
   text-align: center;
   height:80px;
}

</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body style="background-color:#204060;">

<?php 

$id=$this->session->userdata('set_id');
 $data['value']=$this->insertdata->select_id($id);

     $name=$data['value']->name;

?>

<div class="header" style="background-color: #009999;">
<a href="#default" class="active" class="logo" style="color:white;"><h4><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size: 24px;"></i>EDUCATION POINT(MIET)</h4></a>
<div class="header-right">

<a class="active" href="<?php echo base_url('detail');?>" style="color:white;"><i class="fa fa-arrow-circle-right" style="font-size:20px"></i>&nbsp; <i class="fa fa-file" aria-hidden="true"></i>&nbsp;Notes</a>

<a class="active" href="" style="color:white;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php echo $name;?></a>
<a class="active" href="<?php echo base_url('edit_profile');?>/<?php echo $this->session->userdata('set_id');?>" style="color:white;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Edit Profile</a>
<a  class="active" href="<?php echo base_url('Welcome/logout');?>" style="color:white;"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


</div>
</div>
<br>
<div class="container">
 <?php 
 if(!empty($this->session->flashdata('msg1')))
 {

?>
<div class="col-lg-4 col-sm-offset-4" id="fade">
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong style="margin-left: 50px;"><?php echo $this->session->flashdata('msg1');?></strong> 
</div>
</div>  
<?php 
}

?>
   
<div class="row">
<div class="panel panel-default col-sm-10 col-sm-offset-1" >
<div class="panel-body">
<br><br>
<?php 
if($retrive!='')
{

foreach ($retrive->result() as $row)  
{    

// echo $retrive->$row;	
?>
<form class="form-horizontal" action="<?php echo base_url('listing');?>"  enctype="multipart/form-data" method="post" name="registration" >
<div class="form-group">
<label class="control-label col-sm-2" for="email">Subject Name:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="subject_name" placeholder="Subject Name" value="<?php echo $row->subject_name;?>" name="subject_name">
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2" for="pwd">Course:</label>
<div class="col-sm-10">          
<select class="form-control" name="Course"  id="Course1">
<option>select courses</option>	

<?php 
foreach ($retrive2->result() as $row1)  
{    
?>
<option value="<?php echo $row1->Courses;?>"<?php if($row->course==$row1->Courses){echo 'selected';}?>><?php echo $row1->Courses;?></option>
<?php 
}
?>

</select>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2" for="pwd">Branch:</label>
<div class="col-sm-10">   	
<select class="form-control valid" id="Branch" name="Branch" aria-required="true" aria-invalid="false">
	<option>select branch</option>
<option <?php if($row->Branch=='CS'){echo 'selected';}?>>CS</option>
<option <?php if($row->Branch=='EE'){echo 'selected';}?>>EE</option>
<option <?php if($row->Branch=='Me'){echo 'selected';}?>>Me</option>
<option <?php if($row->Branch=='EC'){echo 'selected';}?>>EC</option>
<option  <?php if($row->Branch=='Civil'){echo 'selected';}?>>Civil</option>
</select>

<input type="hidden" class="form-control" id="Branch" value="<?php echo $row->id;?>" name="id" placeholder="Branch">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="pwd">Semester:</label>
<div class="col-sm-10">          

<select class="form-control" name="Semester" id="Semester">
<option>Select Semester</option>
<option value='1' <?php if($row->Semester==1){echo 'selected';}?>>1</option>
<option value='2' <?php if($row->Semester==2){echo 'selected';}?>>2</option>
<option value='3' <?php if($row->Semester==3){echo 'selected';}?> >3</option>
<option  value='4'<?php if($row->Semester==4){echo 'selected';}?>>4</option>
<option value='5' <?php if($row->Semester==5){echo 'selected';}?>>5</option>
<option  value='6'<?php if($row->Semester==6){echo 'selected';}?>>6</option>
<option  value='7'<?php if($row->Semester==7){echo 'selected';}?>>7</option>
<option  value='8'<?php if($row->Semester==8){echo 'selected';}?>>8</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="pwd">Teacher Name:</label>
<div class="col-sm-10">          
<input type="text" class="form-control" name="teacher_name" id="teacher_name" placeholder="Teacher Name" value="<?php echo $row->teacher_name;?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="pwd">Date:</label>
<div class="col-sm-10">          
<input type="date" class="form-control" id="Date" value="<?php echo $row->Date;?>" placeholder="Date" name="Date">

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="pwd">Notes:</label>
<div class="col-sm-10">          
<input type="file" class="form-control" id="Notes" value="<?php echo $row->Notes;?>" placeholder="Notes" name="Note">
<input type="hidden" class="form-control" id="Date" value="<?php echo $row->Notes;?>" placeholder="Date" name="hidden">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="pwd">Subject Code:</label>
<div class="col-sm-10">          
<input type="text" class="form-control" value="<?php echo $row->subject_code;?>" id="subject_code" placeholder="Subject Code" name="subject_code">
</div>
</div>
<div class="form-group">        
<div class="col-sm-offset-5 col-sm-10">
<button type="submit" id="button" name="submit"  class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;Submit</button>
</div>
</div>
</form>
<?php 
}
}
else
{
?>
<form class="form-horizontal" action="<?php echo base_url('listing');?>"  enctype="multipart/form-data" method="post" name="registration" >
<div class="form-group">
<label class="control-label col-sm-2" for="email">Subject Name:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="subject_name" placeholder="Subject Name"  name="subject_name">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="pwd">Course</label>
<div class="col-sm-10">          
<select class="form-control" id="Course" name="Course">
<option >Select Course</option>	
<?php 
foreach ($retrive1->result() as $row)  
{    
?>
<option value="<?php echo $row->Courses;?>"><?php echo $row->Courses;?></option>
<?php 
}
?>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="pwd">Branch:</label>
<div class="col-sm-10">          
<select class="form-control" id="Branch" name="Branch">
<option>select branch</option>	
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="pwd">Semester:</label>
<div class="col-sm-10">          
<select class="form-control" name="Semester" id="Semester">
<option>Select Semester</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="pwd">Teacher Name:</label>
<div class="col-sm-10">          
<input type="text" class="form-control" name="teacher_name" id="teacher_name" placeholder="Teacher Name">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="pwd">Date:</label>
<div class="col-sm-10">          
<input type="date" class="form-control" id="Date"  placeholder="Date" name="Date">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="pwd">Notes:</label>
<div class="col-sm-10">          
<input type="file" class="form-control" value="" id="Notes" placeholder="Notes" name="Notes">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="pwd">Subject Code:</label>
<div class="col-sm-10">          
<input type="text" class="form-control"  id="subject_code" placeholder="Subject Code" name="subject_code">
</div>
</div>
<div class="form-group">        
<div class="col-sm-offset-5 col-sm-10">

<button type="submit" id="button" name="submit"  class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;Submit</button>
</div>
</div>
</form>
<?php 
}
?>
</div>
</div>
</div>
</div>
<br><br><br><br>
<div class="footer">
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<script>
$(function() {
$("form[name='registration']").validate({

rules: {

subject_name: "required",
Branch: "required",
Course: "required",
Semester: "required",
teacher_name: "required",
subject_code: "required",

Notes: "required",

Date: "required",
},
messages: {
Branch: "<div style='color:red;'>Course is required</div>",
Course: "<div style='color:red;'>Branch is required</div>",
subject_name: "<div style='color:red;'>Subject name is required</div>",
Semester: "<div style='color:red;'>Semester is required</div>",
teacher_name: "<div style='color:red;'>Teacher name is required</div>",
Date: "<div style='color:red;'>Date is required</div>",
Notes: "<div style='color:red;'>Notes is required</div>",
subject_code: "<div style='color:red;'>Subject Code is required</div>",

},

submitHandler: function(form) {
form.submit();
}
});
});
</script>

<script type="text/javascript">

$(document).ready(function(){

$("#Course").change(function(){
	
var UserId=$(this).val();
    
$.ajax({
type: "GET",
url: "<?php echo base_url();?>Welcome/branch",
data: {UserId:UserId},

success: function(data) {
$("#Branch").html(data);

}
});
});
});

</script>

</body>
</html>