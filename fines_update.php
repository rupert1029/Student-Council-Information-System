<?php include('server.php'); 


  if (isset($_GET['edit8'])) {
    $id_number = $_GET['edit8'];
    $update = true;
    $record = mysqli_query($db, "SELECT fines.id_number,fines.status,fines.date_of_payment,fines.event_code,Sum(penalty) as amount FROM fines WHERE id_number='$id_number'");
		
	
			$result = mysqli_fetch_array($record);
			$id_number = $result["id_number"];
			$event_code = $result['event_code'];
			$amount = $result["amount"];
			$status = $result["status"];
			$date_paid = $result["date_of_payment"];
		
	}	
?>

<!DOCTYPE html>
<head>
<title>Add Fines</title>
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
		<center><h2>Update Fines</h2></center><br/>

<!--Input Group-->
	<form method="POST" action="server.php">
  		<div class="row" style="width:570px">
    		<div class="col">
          <h5>Select Student Name:</h5><select name = "id_number" class="form-control">
          <option selected>Select Student</option>
              <?php 
                  $query = "SELECT * FROM student";
                  $results = mysqli_query($db, $query); 
                  $count = mysqli_num_rows($results);
                    if($count = 1){
                      while ($row = mysqli_fetch_array($results)){?>
                      <option value="<?php echo $row['id_number'] ?>" ><?php echo ucwords($row['last_name'] ." ". $row['first_name'] ." ". $row['middle_name']) ?></option>
              
              <?php } 
                }?>
        </select>
        </div>
  		</div><br/>
  		<div class="row">
    		<div class="col">
      			<h5>Total Penalty:</h5><input type="text" class="form-control" value="<?php echo "₱".$amount; ?>" name="penalty" style="width: 540px" readonly>
    		</div>
  		</div><br/>
        <div class="row">
        <div class="col">
          <h5>Status:</h5><select name="status" class="form-control">
                  <option selected>Status</option>
                  <option value="Paid">Paid</option>
          </select>
        </div>
        <div class="col">
            <h5>Date of Payment: </h5><input type="date" class="form-control" name="date_of_payment" required>
        </div>
      </div><br/><br/><br/>
  		<center>
			    <?php if ($update == true): ?>
          <button type="submit" class="btn btn-info" name="update9" style="font-size: 23px" onclick="myFunction()">Update</button>
          	<?php else: ?>
          <button type="submit" class="btn btn-info" name="save" style="font-size: 23px">Save</button>
          	<?php endif ?>
		</center>
	</form>

<!-- Dropdown Menus Activation -->
<script>
function myFunction() {
  confirm("Successfully Updated!");
}
</script>
<script src="bootstrap/js/jquery-slim.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>