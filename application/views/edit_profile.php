<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="<?php echo base_url('css/style.css');?>">  

</head>
<body style="background-color: #0099cc;">
<div class="login-page">
<div class="form">
<form class="" method="post" action="<?php echo base_url('edit_profile_data');?>">
<h2>Student Registration</h2>
<?php 
 foreach($value as $row)
 {  
?>
<input type="text" name="name" id="name" placeholder="name"  value="<?php echo $row->name;?>" required />
<div style="color:red;"><?php echo form_error('dname'); ?></div>
<input type="text"  name="password" placeholder="password" value="<?php echo $row->password;?>" required/>
<input type="email" name="email" placeholder="email address" value="<?php echo $row->email;?>" required/>
<div style="color:red;"><?php echo form_error('demail'); ?></div>
<input type="phone"  name="phone" placeholder="phone number" value="<?php echo $row->phone_no;?>" required/>
<?php 
 } 
?>
<button type="submit" name="submit">Registration</button>
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