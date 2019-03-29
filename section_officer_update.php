<?php include('server.php'); 

  if (isset($_GET['edit4'])) {
    $id_number = $_GET['edit4'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM section_officer WHERE id_number='$id_number'");
    
    		$n = mysqli_fetch_array($record);
			$id_number = $n["id_number"];
			$position = $n["position"];
			$academic_code = $n["academic_code"];
			$section_id = $n["section_id"];
  
?>

<!DOCTYPE html>
<head>
<title>Add Section</title>
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
		<center><h2>Update Section Officer</h2></center><br/>

<!--Input Group-->
	<form method="POST" action="section_officer_list.php">
  		<div class="row" style="width:300px">
  		</div><br/>
  		<div class="row">
    		<div class="col">
     	 		<select name = "id_number" class="form-control">
								  <option selected>Select Student</option>
									<?php 
										$query = "SELECT * FROM student";
										$result = mysqli_query($db, $query); 
										$count = mysqli_num_rows($result);
										if($count = 1){
											while ($row = mysqli_fetch_array($result)){
									?>
									<option value="<?php echo $row['id_number'] ?>" ><?php echo ucwords($row['first_name'] ." ". $row['middle_name'] ." ". $row['last_name']) ?></option>										
									
									<?php } 
							  		}?>
						</select>
    		</div>
    		<div class="col">
      			<select name = "position" class="form-control">
								  <option selected>Select Position</option>
									<option value="President">President</option>
									<option value="Vice-President">Vice-President</option>
									<option value="Vecretary">Secretaty</option>
									<option value="Treasurer">Treasurer</option>
									<option value="Auditor">Auditor</option>
									<option value="P.I.O">P.I.O</option>
									<option value="Muse">Muse</option>
									<option value="Prince">Prince</option>

						</select>
    		</div>
    		<div class="col">
						<select name = "academic_code" class="form-control">
				     		 <option selected>Select Academic Year</option>
									<?php 
										$query = "SELECT * FROM academic_year";
										$results = mysqli_query($db, $query); 
										$count = mysqli_num_rows($results);
										if($count = 1){
											while ($row = mysqli_fetch_array($results)){
									?>
											<option value = "<?php echo $row['academic_code'] ?>"><?php echo $row['acad_year']." "."(".$row['semester'].")" ?></option>
										
										<?php } 
							  			}?>
						</select>
    		</div>


  		</div><br/>
  		<br/><br/>
  		<?php }?>
  		<center>
			<?php if ($update == true): ?>
					<button type="submit" class="btn btn-info" name="update4" style="font-size: 23px">Update</button>
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