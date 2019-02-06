<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php 
if($this->session->flashdata('msg')!='')
{
?>

<div><?php echo $this->session->flashdata('msg');?>
	
	<?php echo $this->session->tempdata('item');?>
</div>
<?php 
}
?>

<div class="container">
  <h2>Vertical (basic) form</h2>
  <form action="<?php echo base_url('main');?>" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>

    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
