<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="<?php echo base_url('css/style.css');?>">  
</head>
<body style="background-color: #0099cc;">
<div class="login-page">
<div class="form">
<h2>Admin</h2>	
 <?php 

if($this->session->flashdata('active_msg')!='')
{
?>
<div class="alert alert-success alert-dismissible col-lg-6 col-sm-offset-4">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong style="color:#cc3300;"><?php echo $this->session->flashdata('active_msg');?></strong>
</div>
<?php 
}

?> 

<form class="login-form" method="post" action="<?php echo base_url('teacher_registration');?>">
<input type="email" name="email" placeholder="email" required />
<br>
<button type="submit" name="send_email">login</button>
</form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>
</html>