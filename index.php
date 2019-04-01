<?php include('server.php')?>
<!DOCTYPE html>
<head>
<title>Home</title>
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
					<a class="dropdown-item fa fa-power-off" href="login.php">Logout</a>
				</div>
			</div>
		</nav>
	</nav>

<!--Button Group-->
<div class="row">
	<div class="col">
  		<div class="btn-toolbar align-left-content-between" role="toolbar" aria-label="Toolbar with button groups" style="margin-top: 2px">
  			<div class="btn-group-vertical mr-2" role="group" aria-label="First group">
    			<a href = "student_list.php"><button type="button" class="btn btn-info" style="width: 200px; border-radius: 0px">Students</button></a>
    			<a href = "department_list.php"><button type="button" class="btn btn-info" style="width: 200px; border-radius: 0px">Department</button></a>
    			<a href = "program_list.php"><button type="button" class="btn btn-info" style="width: 200px; border-radius: 0px">Program</button></a>
    			<a href = "section_list.php"><button type="button" class="btn btn-info" style="width: 200px; border-radius: 0px">Sections</button></a>
    			<a href = "section_officer_list.php"><button type="button" class="btn btn-info" style="width: 200px; border-radius: 0px">Section Officers</button></a>
    			<a href = "organization_list.php"><button type="button" class="btn btn-info" style="width: 200px; border-radius: 0px">Organizations</button></a>
    			<a href = "organization_moderator_list.php"><button type="button" class="btn btn-info" style="width: 200px; border-radius: 0px">Organization Moderator</button></a>
    			<a href = "organization_officer_list.php"><button type="button" class="btn btn-info" style="width: 200px; border-radius: 0px">Organization Officers</button></a>
    			<a href = "organization_member_list.php"><button type="button" class="btn btn-info" style="width: 200px; border-radius: 0px">Organization Members</button></a>
    			<a href = "academicyear_list.php"><button type="button" class="btn btn-info" style="width: 200px; border-radius: 0px">Academic Year</button></a>
    			<a href = "event_list.php"><button type="button" class="btn btn-info" style="width: 200px; border-radius: 0px">Events</button></a>
    			<a href = "fines_list.php"><button type="button" class="btn btn-info" style="width: 200px; border-radius: 0px">Fines</button></a>

  			</div>
  		</div>
  	</div>
 </div>
<!--Carousel-->
<div class="row">
	<div class="col">
		<div style="margin-left:160px; margin-right:50px; margin-top:-650px">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner" style="margin-top:5px">
					<div class="carousel-item active">
						<img src="C.png" class="d-block w-100" alt="...">
					</div>
				</div>
					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
			</div>
		</div>
	</div>
</div>
</div>
</div>

<!-- Dropdown Menus Activation -->
<script src="bootstrap/js/jquery-slim.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>