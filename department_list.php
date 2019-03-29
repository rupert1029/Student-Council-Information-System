<?php include('server.php')?>
<html>
<head>
<title>Department List</title>
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

<!-- Table List -->
		<div class="container"><br/><br/>
		<a class="fa fa-home" href="index.php" style="font-size:25px"> Home</a><br/><br/>
		<center><h2>Department List</h2></center>
		<?php $results = mysqli_query($db, "SELECT * FROM department WHERE department.department_code = department.department_code"); ?>
			<table class="table table-secondary" style="margin-top:20px">
			<thead class="thead-light">
				<tr class="success">
				<th scope="col">Department Code</th>	
				<th scope="col">Department Name</th>
				<th scope="col">Options</th>
				</tr>
			</thead>
			<?php while ($row = mysqli_fetch_array($results)){ ?>
			<tbody>
				<tr>
				<td><?php echo $row['department_code']?></td>
				<td><?php echo $row['department_name']?></td>
				<td><a class="fa fa-edit" href="department_update.php?edit1=<?php echo $row['department_code']; ?>"> Edit</a> | <a class="fa fa-trash" href ="#" data-toggle="modal" data-target="#exampleModal"> Delete</a></td>
				</tr>
			</tbody>
			 <?php } 
			 ?>
			</table><br/>
			<a href = "department_add.php"><button type="button" class="btn btn-info fa fa-plus" style="font-size: 23px; margin-left:935px"> Add Department</button></a></li>
		</div>	


<!-- Delete Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel" style="color:red; font-size:35px">WARNING!!!</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body fa fa-info-circle" style="font-size:30px; color:#428bca">
			You cannot delete this data.
			</div>
			</div>
			</div>
		</div>

<!-- Dropdown Menus Activation -->
<script src="bootstrap/js/jquery-slim.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>