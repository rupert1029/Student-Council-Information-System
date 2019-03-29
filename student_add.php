<?php include('server.php')?>
<!DOCTYPE html>
<head>
<title>Add Student</title>
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
		<center><h2>Add Student</h2></center><br/>

<!--Input Group-->
	<form method="POST" action="student_list.php">
  		<div class="row" style="width:300px">
    		<div class="col">
     	 		<h5>ID Number:</h5><input type="text" class="form-control" placeholder="ID Number" name="id_number" pattern="[A-Za-z0-9]+"  required autofocus>
    		</div>
  		</div><br/>
  		<div class="row">
    		<div class="col">
     	 		<h5>Last Name:</h5><input type="text" class="form-control" placeholder="Last Name" name="last_name"  pattern="[A-Za-z0-9]+" required>
    		</div>
    		<div class="col">
      			<h5>First Name:</h5><input type="text" class="form-control" placeholder="First Name" name="first_name"  pattern="[A-Za-z0-9]+" required>
    		</div>
    		<div class="col">
      			<h5>Middle Name:</h5><input type="text" class="form-control" placeholder="Middle Name" name="middle_name"  pattern="[A-Za-z0-9]+" required>
    		</div>
  		</div><br/>
  		<div class="row">
  			<div class="col">
  			<h5>Course Code:</h5><select name = "course_code" class="form-control">
    			<option selected>Course Code</option>
          <?php 
              $query = "SELECT * FROM program";
              $results = mysqli_query($db, $query); 
              $count = mysqli_num_rows($results);
              if($count = 1){
                while ($row = mysqli_fetch_array($results)){
                  ?>
                <option value = "<?php echo $row['course_code'] ?>"><?php echo $row['course_code']?></option>
              
              <?php } 
                }?>
  			</select>
  			</div>
  			<div class="col">
  			<h5>Section ID:</h5><select name = "section_id" class="form-control">
    			<option selected>Year and Section</option>
          <?php 
              $query = "SELECT * FROM section";
              $result = mysqli_query($db, $query); 
              $count = mysqli_num_rows($result);
              if($count = 1){
                while ($row = mysqli_fetch_array($result)){
            ?>
            <option value = "<?php echo $row['section_id'] ?>"><?php echo $row['section_id']?></option>
              
              <?php } 
                }?>
  			</select>
  			</div>
  			<div class="col">
      			<h5>Status:</h5><input type="text" class="form-control" placeholder="Status" name="status"  pattern="[A-Za-z0-9]+" required>
    		</div>
  		</div><br/><br/>
  		<center>
			<button type="reset" class="btn btn-danger" style="font-size: 23px">Reset</button>
			<button type="submit" class="btn btn-info" name="save" style="font-size: 23px">Save</button>
		</center>
	</form>

<!-- Dropdown Menus Activation -->
<script src="bootstrap/js/jquery-slim.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>