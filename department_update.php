<?php include('server.php'); 

  if (isset($_GET['edit1'])) {
    $department_code = $_GET['edit1'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM department WHERE department_code='$department_code'");
    
      $n = mysqli_fetch_array($record);
      $department_code = $n['department_code'];
      $department_name = $n['department_name'];
  
?>


<!DOCTYPE html>
<head>
<title>Add Department</title>
	<link rel = "stylesheet" href = "bootstrap/css/bootstrap.min.css">
	<link rel = "stylesheet" href = "font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">

   <!-- Navigations -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-info" style="margin-top:20px">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		<nav class="collapse navbar-collapse" id="navbarText">
				<img src="1.png" width="100" height="100" alt="" style="margin-left:5px">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="index.php" style="font-size:50px; margin-top:5px; margin-left:382px">SSC<span class="sr-only">(current)</span></a>
		      </li>
			</ul>  
			 
<!-- User Profile and Logout Button -->
			<div class="btn-group" style="margin-left:430px" height="100px">
				<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:25px;">
				</button>
				<div class="dropdown-menu">
					<a class="dropdown-item fa fa-power-off" href="login.php"> Logout</a>
				</div>
			</div>
         
</div>
		</nav>
</nav>


		<div class="container"><br/><br/>
		<a class="fa fa-home" href="index.php" style="font-size:25px"> Home</a><br/><br/>
		<center><h2>Update Department</h2></center><br/>

<!--Input Group-->
	<form method="POST" action="department_list.php">
  		<div class="row" style="width:300px">
  		</div><br/>
  		<div class="row">
    		<div class="col">
     	 		<input type="text" class="form-control" value="<?php echo $department_code; ?>" name="department_code" required>
    		</div>
    		<div class="col">
      			<input type="text" class="form-control" value="<?php echo $department_name; ?>" name="department_name" required>
    		</div>
    	<?php }?>
  		</div><br/>
  		<br/><br/>
  		<center>
			 <?php if ($update == true): ?>
					<button type="submit" class="btn btn-info" name="update1" style="font-size: 23px">Update</button>
       		<?php else: ?>
					<button type="submit" class="btn btn-info" name="save" style="font-size: 23px">Save</button>
      		<?php endif ?>
		</center>
	</form>

<!-- Dropdown Menus Activation -->
<script src="bootstrap/js/jquery-slim.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>