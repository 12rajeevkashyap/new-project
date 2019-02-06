<!DOCTYPE html>
<html>
<head>
	<title></title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<?php echo $this->session->flashdata('msg');?>	

<form method="post" action="test">
  <div class="form-group">
    <label for="exampleInputEmail1">name </label>
 <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">address</label>
    <input type="text" class="form-control"  name="address" id="exampleInputPassword1" placeholder="Password">
  </div>

   <div class="form-group">
    <label for="exampleInputPassword1">mobile</label>
    <input type="text" class="form-control"  name="mobile" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>

</form>
</body>
</html>