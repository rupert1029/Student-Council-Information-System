<?php include('server.php')?>
<html>
<head>
<title>Fines List</title>
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
    <center><h2>Fines List</h2></center>
    <?php $results = mysqli_query($db, "SELECT fines.id_number,fines.status,fines.date_of_payment,student.last_name,student.first_name,student.middle_name,Sum(penalty) as amount FROM fines,student  WHERE fines.id_number=student.id_number GROUP BY id_number"); ?>
      <table class="table table-secondary" style="margin-top:20px">
      <thead class="thead-light">
        <tr class="success">
        <th scope="col">ID Number</th> 
        <th scope="col">Student Name</th> 
        <th scope="col">Penalty</th>
        <th scope="col">Status</th>
        <th scope="col">Date of Payment</th>
        <th scope="col">Options</th>
        </tr>
      </thead>
      <?php while ($row = mysqli_fetch_array($results)){ ?>
      <tbody>
        <tr>
        <td><?php echo $row['id_number']?></td>
        <td><?php echo ucwords($row['last_name']." ".$row['first_name']." ".$row['middle_name'])?></td>
        <td><?php echo "₱".$row['amount']?></td>
        <td style="font-weight: bold"><?php echo $row['status']?></td>
        <td><?php if ($row['date_of_payment'] == NULL){
						echo "";
				      		}
				      	else
				      		{
				      	echo date('d M Y, g:i A',strtotime($row['date_of_payment']));}?>
				      		
				      </td>
        <td><a class="fa fa-edit" href="fines_update.php?edit8=<?php echo $row['id_number']; ?>"> Edit</a> | <a class="fa fa-trash" href ="#" data-toggle="modal" data-target="#exampleModal"> Delete</a></td>
        </tr>
      </tbody>
       <?php } 
       ?>
      </table><br/>
      <a href = "fines_add.php"><button type="button" class="btn btn-info fa fa-plus" style="font-size: 23px; margin-left:935px"> Add Fines</button></a></li>
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