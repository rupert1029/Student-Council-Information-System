<?php include('server.php')?>
<html>
<head>
<title>Section List</title>
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
		<center><h2>Section Officer List</h2></center>
		<?php $results = mysqli_query($db, "SELECT * FROM section_officer,student,section,academic_year WHERE section_officer.id_number=student.id_number AND section_officer.section_id=section.section_id AND section_officer.academic_code=academic_year.academic_code"); ?>
			<table class="table table-secondary" style="margin-top:20px">
			<thead class="thead-light">
				<tr class="success">
					<th scope="col">ID Number</th>
					<th scope="col">Student Name</th>
					<th scope="col">Position</th>
					<th scope="col">Section</th>
					<th scope="col">Academic Year</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<?php while ($row = mysqli_fetch_array($results)){ ?>
			<tbody>
				<tr>
					<td><?php echo ($row['id_number'])?></td>
					<td><?php echo ucwords($row['last_name']." ".$row['first_name']." ".$row['middle_name'])?></td>
					<td><?php echo $row['position']?></td>
					<td><?php echo $row['section_id'] ?></td>
					<td><?php echo $row['acad_year']." "."(".$row['semester'].")" ?></td>
					<td><a class="fa fa-edit" href="section_officer_update.php?edit9=<?php echo $row['id_number']; ?>"> Edit</a> 
				</tr>
			</tbody>
			 <?php } ?>
			</table><br/>
			<a href = "section_officer_add.php"><button type="button" class="btn btn-info fa fa-plus" style="font-size: 23px; margin-left:935px"> Add Organization Officer</button></a></li>
		</div>	


<!-- Dropdown Menus Activation -->
<script src="bootstrap/js/jquery-slim.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>