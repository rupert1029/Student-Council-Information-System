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
    <center><h2>Add Moderator</h2></center><br/>

<!--Input Group-->
  <form method="POST" action="organization_moderator_list.php">
      <div class="row" style="width:300px">
        <div class="col">
          <h5>Instructor ID:</h5><input type="text" class="form-control" placeholder="Instructor ID" name="instructor_id"  pattern="[A-Za-z0-9]+" required autofocus>
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
         <h5>Organization Name:</h5><select name = "organization_code" class="form-control">
                  <option selected>Select Organization</option>
                  <?php 
                    $query = "SELECT * FROM organization";
                    $results = mysqli_query($db, $query); 
                    $count = mysqli_num_rows($results);
                    if($count = 1){
                      while ($row = mysqli_fetch_array($results)){
                  ?>
                      <option value = "<?php echo $row['organization_code'] ?>"><?php echo $row['organization_name'] ?></option>
                    
                    <?php } 
                      }?>
              </select>
        </div>
        <div class="col">
       <h5>Academic Year/Semeter:</h5><select name = "academic_code" class="form-control">
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
      </div><br/><br/>
      <center>
      <button type="reset" class="btn btn-danger" style="font-size: 23px">Reset</button>
      <button type="submit" class="btn btn-info" name="game" style="font-size: 23px" onclick="myFunction()">Save</button>
    </center>
  </form>

<!-- Dropdown Menus Activation -->
<script>
function myFunction() {
  confirm("Successfully Saved!");
}
</script>
<script src="bootstrap/js/jquery-slim.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>