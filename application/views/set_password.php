<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="<?php echo base_url('css/style.css');?>">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #0099cc;" >

<!-- <?php 
if($this->session->flashdata('active_msg')!='')
{
?>
<div class="alert alert-success alert-dismissible col-lg-4 col-sm-offset-4">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong><?php echo $this->session->flashdata('active_msg');?></strong>
</div>
<?php 
}
?> -->
<div class="login-page">
<div class="form">
<form class="login-form" method="post" action="">
<input type="text" name="new_password" placeholder="new password" required/>
<input type="text" name="confirm_password" placeholder="confirm password" required/>
<button type="submit" name="submit" value="submit">submit</button>
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