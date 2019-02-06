<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="<?php echo base_url('css/style.css');?>">  

</head>
<body style="background-color: #0099cc;">
<div class="login-page">
	<h3 style="color: #6600cc;">Meerut Institute And Engineering College</h3>
<div class="form">
<?php 


if($this->session->flashdata('msg')!='')
{
?>
<div class="alert alert-success alert-dismissible col-lg-6 col-sm-offset-4">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong style="color:#cc3300;"><?php echo $this->session->flashdata('msg');?></strong>
</div>

<?php 
}
if($this->session->flashdata('msg1')!='')
{
?>
<div class="alert alert-success alert-dismissible col-lg-6 col-sm-offset-4">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong style="color:blue;"><?php echo $this->session->flashdata('msg1');?></strong>
</div>
<?php 
}
?>
	
<form class="register-form" method="post" action="<?php echo base_url('register');?>">
<h2>Student Registration</h2>
<input type="text" name="name" id="name" placeholder="name" required />
<div style="color:red;"><?php echo form_error('dname'); ?></div>
<input type="password"  name="password" placeholder="password" required/>
<input type="email" name="email" placeholder="email address" required/>
<div style="color:red;"><?php echo form_error('demail'); ?></div>
<input type="phone"  name="phone" placeholder="phone number" required/>


<button type="submit" name="submit">Registration</button>
<p class="message">Already registered? <a href="#"><strong>Sign In</strong></a></p>
</form>

<form class="login-form" method="post" action="<?php echo base_url('login');?>">
	<h2>Login Form</h2>
<input type="text" name="username" placeholder="username" required />
<input type="password" name="password" placeholder="password" required />
<select name="position" required>
<option> Select Position</option>
<option value="Teacher">Teacher</option>
<option value="Student">Student</option>	
</select>
<p class="message"> <a href="<?php echo base_url('forget_password');?>"><strong>Forget Password</strong></a></p><br>
<button type="submit" name="submit">login</button>
<p class="message">Not registered? <a href="#"><strong>Create an account</strong></a></p>
</form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$('.message a').click(function(){
$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

</script>

</body>
</html>