<!DOCTYPE html>
<html lang="en">
<head>
<title>Bootstrap Example</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
.vertical-menu {
width: 200px;
}

.vertical-menu a {
background-color: #eee;
color: black;
display: block;
padding: 12px;
text-decoration: none;
}

.vertical-menu a:hover {
background-color: #ccc;
}

.vertical-menu a.active {
background-color: #4CAF50;
color: white;
}


input[type=checkbox] {
  position: relative;
  width: 1em;
  height: 1em;
  border: 1px solid gray;
  /* Adjusts the position of the checkboxes on the text baseline */ 
  vertical-align: -2px;
  /* Set here so that Windows' High-Contrast Mode can override */
  color: green;
}

input[type=checkbox]::before {
  content: "✔";
  position: absolute;
  font-size: 1.2em;
  right: 0;
  top: -0.3em;
  visibility: hidden;
}

input[type=checkbox]:checked::before {
  /* Use `visibility` instead of `display` to avoid recalculating layout */
  visibility: visible;
}

input[type=checkbox]:disabled {
  border-color: black;
  background: #ddd;
  color: gray;
}
</style>

</head>
<body style="background-color:#204060;">

<div class="header" style="background-color: #009999;">
<a href="#default" class="active" class="logo" style="color:white;"><h4><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size: 24px;"></i>EDUCATION POINT(MIET)</h4></a>
<div class="header-right">

<a class="active" href="<?php echo base_url('file_listing');?>" style="color:white;"><i class="fa fa-arrow-circle-left" style="font-size:20px"></i>&nbsp; <i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;Listing</a>
<a class="active" href="" style="color:white;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php echo $this->session->userdata('username');?></a>
<a  class="active" href="<?php echo base_url('Welcome/logout');?>" style="color:white;"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</div>
</div>
<div class="container">
<div class="row">
<div class="col-lg-4 col-sm-offset-4" id="fade">
<?php 
if( $this->session->flashdata('msg1')!='')
{

?>  
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

<strong style="margin-left: 50px;"><?php echo $this->session->flashdata('msg1');?></strong> 

</div>
<?php 
}
?>
</div>
</div>
<div class="row">
<br>
<div class="col-lg-8 col-sm-offset-3">
<form class="form-inline" action="">
<div class="form-group">
<select class="form-control "  name="Course" id="Course">
<option>select Course</option>  
<?php 
foreach ($retrive1->result() as $row)  
{ 
?>
<option value="<?php echo $row->Courses;?>"'><?php echo $row->Courses;?></option>   
<?php 
}
?>
</select>
</div>
<div class="form-group">
<select class="form-control" id="Branch" name="Branch">
<option>select Branch</option>  
</select>
</div>
<div class="form-group">
<select class="form-control" id="Semester" name="Semester">
<option>select Semester</option>
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
<button type="button" name="submit" id="submit" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Search</button>
</form>
<br>
</div>
</div>  	
<div class="row">
<div class="panel panel-default">
<div class="panel-body">
<table class="table table-bordered" id="show">
<thead>
<tr>
<th>ID</th>
<th>Teacher Name</th>
<th>Course</th>
<th>Semester</th>
<th>Subject</th>
<th>Branch</th>
<th>Date</th>
<th>Subject Code</th>
<th>Download</th>
<th>Update</th>
<th>Delete</th>
<th>Delete</th>
</tr>
</thead>
<?php 
$i=1;
foreach ($retrive->result() as $row)  
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
<td><a href="<?php echo base_url('notes');?>?file=<?php echo $row->Notes;?>"class="btn btn-primary" ><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Dowload File</a>
<a href="#">File Link</a>
</td>
<td><a href="<?php echo base_url();?>listing?id=<?php echo $row->id;?>"class="btn btn-success" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Update</a></td>
<td><input type="checkbox" name="customer_id[]" class="delete_customer" value="<?php echo $row->id;?>" / >
</td>
<td>
<button type="button"  value="<?php echo $row->id;?>" name="btn_delete" id="delete1" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete</button>
</td>
</tr>
</tbody>
<?php 
}
?>
<tr>
</td>
<td colspan="12" ><button type="button" style="margin-left: 1020px;" name="btn_delete" id="btn_delete" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete</button></td>
</tr>
</table>
</div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

<script type="text/javascript">
$(document).ready(function(){

$("#submit").click(function(){

var Course=$("#Course").val();
var Branch=$("#Branch").val();
var Semester=$("#Semester").val();
// alert(Course);
//   alert(Branch);
//      alert(Semester); 
$.ajax({
type: "GET",
url: "<?php echo base_url();?>Welcome/detail_filter",
data: {Course:Course,Branch:Branch,Semester:Semester},

success: function(data) {
$("#show").html(data);

}
});
});
});

</script>   

<script>
$(document).ready(function(){

$('#btn_delete').click(function(){

if(confirm("Are you sure you want to delete this?"))
{
var id = [];

$(':checkbox:checked').each(function(i){
id[i] = $(this).val();
 // alert(id[i]);
});

if(id.length === 0) //tell you if the array is empty
{
alert("Please Select atleast one checkbox");
}
else
{
$.ajax({
url:'Welcome/delete',
method:'GET',
data:{id:id},
success:function()
{
location.reload(true);
for(var i=0; i<id.length; i++)
{
$('tr#'+id[i]+'').css('background-color', '#ccc');
$('tr#'+id[i]+'').fadeOut('slow');
}
}

});
}

}
else
{
return false;
}
});

});
</script>

<script type="text/javascript">
$(document).ready(function(){
$("#delete1").click(function(){
var UserId=$("#delete1").val();
  if(confirm("Are you sure you want to remove this image from database?"))
  {
$.ajax({
type: "GET",
url: "<?php echo base_url();?>Welcome/delete1",
data: {UserId:UserId},

success: function(data) {
$("#show").html(data);

window.location.href = "detail";
}
});
}

});
});

</script>  

</body>
</html>
