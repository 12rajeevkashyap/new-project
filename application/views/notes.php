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

</style>

</head>
<body  style="background-color:#204060;">

<div class="header" style="background-color: #009999;">
<a href="#default" class="active" class="logo" style="color:white;"><h4><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size: 24px;"></i>EDUCATION POINT(MIET)</h4></a>
<div class="header-right">

<a class="active" href="<?php echo base_url('notes');?>" style="color:white;"><i class="fa fa-file" aria-hidden="true"></i>&nbsp;Notes</a>
<a class="active" href="" style="color:white;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php echo $this->session->userdata('username');?></a>
<a  class="active" href="<?php echo base_url('Welcome/logout');?>" style="color:white;"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</div>
</div>
<div class="container">
<div class="row">
<br>
<div class="col-lg-8 col-sm-offset-3">
<form class="form-inline" action="">
<div class="form-group">
<select class="form-control"  name="Course" id="Course">
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
<th>Semester</th>
<th>Subject</th>
<th>Branch</th>
<th>Date</th>
<th>Subject Code</th>
<th>Download</th>

</tr>
</thead >

<?php 
foreach ($retrive->result() as $row)  
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

<td><a href="<?php echo base_url('notes');?>?file=<?php echo $row->Notes;?>"class="btn btn-primary" ><i class="fa fa-download" aria-hidden="true"></i>Dowload File</a></td>
</tr>
</tbody>
<?php 
}
?>

</table>
</div>
</div>
</div>
</div>
<script type="text/javascript">

$(document).ready(function(){

$("#Course").change(function(){
	
var UserId=$(this).val();
// alert(UserId);
    
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
url: "<?php echo base_url();?>Welcome/notes_filter",
data: {Course:Course,Branch:Branch,Semester:Semester},

success: function(data) {
$("#show").html(data);

}

});

});
});

</script>



</body>
</html>
