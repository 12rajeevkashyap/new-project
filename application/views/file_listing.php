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

</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body style="background-color:#204060;">
<div class="header" style="background-color: #009999;">
<a href="#default" class="active" class="logo" style="color:white;"><h4><i class="fa fa-graduation-cap" aria-hidden="true" style="font-size: 24px;"></i>EDUCATION POINT(MIET)</h4></a>
<div class="header-right">

<a class="active" href="<?php echo base_url('detail');?>" style="color:white;"><i class="fa fa-arrow-circle-right" style="font-size:20px"></i>&nbsp; <i class="fa fa-file" aria-hidden="true"></i>&nbsp;Notes</a>
<a class="active" href="" style="color:white;"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php echo $this->session->userdata('username');?></a>
<a  class="active" href="<?php echo base_url('Welcome/logout');?>" style="color:white;"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


</div>
</div>
<br>
<div class="container">
<div class="row">
<div class="panel panel-default col-sm-10 col-sm-offset-1" >
<div class="panel-body">
<br><br>
<form class="form-horizontal" action="<?php echo base_url('file_listing');?>"  enctype="multipart/form-data" method="post" name="registration" >

<div class="form-group">
<label class="control-label col-sm-2" for="pwd">Notes:</label>
<div class="col-sm-10">          
<input type="file" class="form-control" value="" id="Notes" placeholder="Notes" name="Notes">
</div>
</div>

<div class="form-group">        
<div class="col-sm-offset-5 col-sm-10">
<button type="submit" id="button" name="file_listing" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;Submit</button>
</div>
</div>

</form>
</div>
</div>
</div>
</div>
<br><br><br><br>
<div class="header " style="background-color: #009999;" >
<div class="col-sm-offset-5"><a href="#default" class="logo" style="color: white;"></a></div>
<div class="header-right">

</div>
</div>
</option>
</select>

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