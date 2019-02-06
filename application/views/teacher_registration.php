<!DOCTYPE html>

<!-- <?php echo error_reporting(0);?> -->
<html>
<head>
<title></title>
<link rel="stylesheet" href="<?php echo base_url('css/style.css');?>">  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #0099cc;">
 <?php 

if($this->session->flashdata('msg')!='')
{
?>
<div class="alert alert-success alert-dismissible col-lg-5 col-sm-offset-4">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong style="color:#cc3300; margin-left: 200px;"><?php echo $this->session->flashdata('msg');?></strong>
</div>
<?php 
}

?>

<div class="login-page">
<div class="form">


<form class="login-form" method="post" action="<?php echo base_url('teacher_registration');?>">
<input type="text" name="username" placeholder="username" value="" required />
<input type="email" name="email" value="<?php echo $this->session->userdata('email1');?>" placeholder="email" required />
<input type="text" name="phone" placeholder="phone" required />
<input type="password" name="password" placeholder="password" required />
<br>
<button type="submit" name="teacher_submit">login</button>
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