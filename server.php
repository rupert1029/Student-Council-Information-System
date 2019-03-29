<?php 
	session_start();

	// variable declaration
	$username = "";
	$errors = array(); 
	$_SESSION['success'] = "";


	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'sco');


	
	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Invalid Entry! Please Try Again");
			}
		}
	}

	//ADD STUDENT
		$id_number ="";
		$last_name="";
		$first_name="";
		$middle_name="";
		$course_code = "";
		$section_id = "";
		$status = "";
		$update = false;
	if(isset($_POST['save'])){
		$id_number = $_POST['id_number'];
		$last_name = $_POST['last_name'];
		$first_name = $_POST['first_name'];
		$middle_name = $_POST['middle_name'];
		$course_code = $_POST['course_code'];
		$section_id = $_POST['section_id'];
		$status = $_POST['status'];
		$sql = "INSERT INTO student (id_number, last_name, first_name, middle_name, course_code, section_id, status)
			VALUES ('$id_number','$last_name','$first_name' ,'$middle_name','$course_code','$section_id','$status')";
			mysqli_query($db, $sql);
			header('location: student_list.php'); 
	}

	//DELETE STUDENT
		$id_number ="";
		$last_name="";
		$first_name="";
		$middle_name="";
		$course_code = "";
		$section_id = "";
		$status = "";
		$update = false;
	if (isset($_GET['del'])) {
		$id_number = $_GET['del'];

		$query = "SELECT * FROM student WHERE id_number='$id_number'";
		$result = mysqli_query($db, $query);
		if (mysqli_num_rows($result)==1){

			while ($row = mysqli_fetch_assoc($result)) {
				mysqli_query($db, "DELETE FROM student WHERE student.id_number='$id_number'");
				$_SESSION['message'] = "Contact deleted!"; 
				header('location: student_list.php');
			}
		}
		
	}

	//EDIT STUDENT
	if (isset($_POST['update'])) {
		$id_number = $_POST['id_number'];
		$last_name = $_POST['last_name'];
		$first_name = $_POST['first_name'];
		$middle_name = $_POST['middle_name'];
		$course_code = $_POST['course_code'];
		$section_id = $_POST['section_id'];
		$status = $_POST['status'];

		$query = "SELECT * FROM student WHERE id_number='$id_number'";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results)==1){
			while ($row = mysqli_fetch_assoc($results)) {
				mysqli_query($db, "UPDATE student SET id_number ='$id_number', last_name ='$last_name', first_name ='$first_name', middle_name ='$middle_name', course_code ='$course_code', section_id ='$section_id', status ='$status' WHERE id_number='$id_number'");
				$_SESSION['message'] = "Successfully updated!"; 
				header('location: student_list.php');
				}
			}
		}


	//ADD DEPARTMENT
		$department_code ="";
		$department_name="";
		$update = false;
	if(isset($_POST['submit'])){
		$department_code = $_POST['department_code'];
		$department_name = $_POST['department_name'];
		$sql = "INSERT INTO department (department_code, department_name)
			VALUES ('$department_code','$department_name')";
			mysqli_query($db, $sql);
			header('location: department_list.php'); 
	}

		//EDIT STUDENT
	if (isset($_POST['update1'])) {
		$department_code = $_POST['department_code'];
		$department_name = $_POST['department_name'];

		$query = "SELECT * FROM department WHERE department_code='$department_code'";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results)==1){
			while ($row = mysqli_fetch_assoc($results)) {
				mysqli_query($db, "UPDATE department SET department_code='$department_code', department_name ='$department_name' WHERE department_code='$department_code'");
				$_SESSION['message'] = "Successfully updated!"; 
				header('location: department_list.php');
				}
			}
		}

	//ADD SECTION
		$section_id ="";
		$year="";
		$update = false;
	if(isset($_POST['go'])){
		$section_id = $_POST['section_id'];
		$year = $_POST['year'];
		$sql = "INSERT INTO section (section_id, year)
			VALUES ('$section_id','$year')";
			mysqli_query($db, $sql);
			header('location: section_list.php'); 
	}

	//EDIT SECTION
	if (isset($_POST['update3'])) {
		$section_id = $_POST['section_id'];
		$year = $_POST['year'];

		$query = "SELECT * FROM section WHERE section_id ='$section_id'";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results)==1){
			while ($row = mysqli_fetch_assoc($results)) {
				mysqli_query($db, "UPDATE section SET section_id ='$section_id', year ='$year' WHERE section_id ='$section_id'");
				$_SESSION['message'] = "Successfully updated!"; 
				header('location: section_list.php');
				}
			}
		}

	//ADD PROGRAM
		$course_code ="";
		$course_name ="";
		$department_code ="";
		$update = false;
	if(isset($_POST['gora'])){
		$course_code = $_POST['course_code'];
		$course_name = $_POST['course_name'];
		$department_code = $_POST['department_code'];
		$sql = "INSERT INTO program (course_code, course_name, department_code)
			VALUES ('$course_code','$course_name','$department_code')";
			mysqli_query($db, $sql);
			header('location: program_list.php'); 
	}

	//EDIT PROGRAM
	if (isset($_POST['update2'])) {
		$course_code = $_POST['course_code'];
		$course_name = $_POST['course_name'];
		$department_code = $_POST['department_code'];

		$query = "SELECT * FROM program WHERE course_code ='$course_code'";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results)==1){
			while ($row = mysqli_fetch_assoc($results)) {
				mysqli_query($db, "UPDATE program SET course_code ='$course_code', course_name ='$course_name', department_code ='$department_code' WHERE course_code ='$course_code'");
				$_SESSION['message'] = "Successfully updated!"; 
				header('location: program_list.php');
				}
			}
		}


	//ADD ORGANIZATION
		$organization_code ="";
		$organization_name="";
		$update = false;
	if(isset($_POST['gors'])){
		$organization_code = $_POST['organization_code'];
		$organization_name = $_POST['organization_name'];
		$sql = "INSERT INTO organization (organization_code, organization_name)
			VALUES ('$organization_code','$organization_name')";
			mysqli_query($db, $sql);
			header('location: organization_list.php'); 
	}

	//EDIT ORGANIZATION
	if(isset($_POST['update5'])){
		$organization_code = $_POST['organization_code'];
		$organization_name = $_POST['organization_name'];

		$query = "SELECT * FROM organization WHERE organization_code ='$organization_code'";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results)==1){
			while ($row = mysqli_fetch_assoc($results)) {
				mysqli_query($db, "UPDATE organization SET organization_code ='$organization_code', organization_name ='$organization_name' WHERE organization_code ='$organization_code'");
				$_SESSION['message'] = "Successfully updated!"; 
				header('location: organization_list.php');
				}
			}
		}

	//ADD EVENT
		$event_code ="";
		$event_name="";
		$date="";
		$update = false;
	if(isset($_POST['gorz'])){
		$event_code = $_POST['event_code'];
		$event_name = $_POST['event_name'];
		$date = $_POST['date'];
		$sql = "INSERT INTO event (event_code, event_name, date)
			VALUES ('$event_code','$event_name','$date')";
			mysqli_query($db, $sql);
			header('location: event_list.php'); 
	}

	//EDIT EVENT
	if (isset($_POST['update7'])) {
		$event_code = $_POST['event_code'];
		$event_name = $_POST['event_name'];
		$date = $_POST['date'];

		$query = "SELECT * FROM event WHERE event_code ='$event_code'";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results)==1){
			while ($row = mysqli_fetch_assoc($results)) {
				mysqli_query($db, "UPDATE event SET event_code ='$event_code', event_name ='$event_name', date ='$date' WHERE event_code ='$event_code'");
				$_SESSION['message'] = "Successfully updated!"; 
				header('location: event_list.php');
				}
			}
		}

		//ADD FINES
		$id_number ="";
		$event_code="";
		$penalty="";
		$update = false;
	if(isset($_POST['saves'])){
		$id_number = $_POST['id_number'];
		$event_code = $_POST['event_code'];
		$penalty = $_POST['penalty'];
		$sql = "INSERT INTO fines (id_number, event_code, penalty)
			VALUES ('$id_number','$event_code','$penalty')";
			mysqli_query($db, $sql);
			header('location: fines_list.php'); 
	}

	//EDIT FINES
	if (isset($_POST['update8'])) {
		$id_number = $_POST['id_number'];
		$event_code = $_POST['event_code'];
		$penalty = $_POST['penalty'];

		$query = "SELECT * FROM fines WHERE id_number ='$id_number'";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results)==1){
			while ($row = mysqli_fetch_assoc($results)) {
				mysqli_query($db, "UPDATE fines SET id_number ='$id_number', event_code ='$event_code', penalty ='$penalty' WHERE id_number ='$id_number'");
				$_SESSION['message'] = "Successfully updated!"; 
				header('location: fines_list.php');
				}
			}
		}

	//ADD ACADEMIC YEAR
		$academic_code ="";
		$acad_year="";
		$semester="";
		$update = false;
	if(isset($_POST['submits'])){
		$academic_code = $_POST['academic_code'];
		$acad_year = $_POST['acad_year'];
		$semester = $_POST['semester'];
		$sql = "INSERT INTO academic_year (academic_code, acad_year, semester)
			VALUES ('$academic_code','$acad_year','$semester')";
			mysqli_query($db, $sql);
			header('location: academicyear_list.php'); 
	}

	//EDIT ACADEMIC YEAR
	if(isset($_POST['update6'])){
		$academic_code = $_POST['academic_code'];
		$acad_year = $_POST['acad_year'];
		$semester = $_POST['semester'];

		$query = "SELECT * FROM academic_year WHERE academic_code ='$academic_code'";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results)==1){
			while ($row = mysqli_fetch_assoc($results)) {
				mysqli_query($db, "UPDATE academic_year SET academic_code ='$academic_code', acad_year ='$acad_year', semester ='$semester' WHERE academic_code ='$academic_code'");
				$_SESSION['message'] = "Successfully updated!"; 
				header('location: academicyear_list.php');
				}
			}
		}

	//ADD SECTION OFFICER
		$id_number = "";
		$position = "";
		$academic_code = "";
		$update = false;
	if(isset($_POST['submiter'])){
		$id_number = $_POST['id_number'];
		$position = $_POST['position'];
		$academic_code = $_POST['academic_code'];

		$sql = "INSERT INTO section_officer (id_number, section_id, position, academic_code )
			VALUES ('$id_number','$section_id','$position','$academic_code')";
			mysqli_query($db, $sql);
			$_SESSION['message'] = "successfully saved";
			header('location: section_officer_list.php'); //redirect to homepage
	}

	//EDIT SECTION OFFICER
	if(isset($_POST['update4'])){
		$id_number = $_POST['id_number'];
		$position = $_POST['position'];
		$academic_code = $_POST['academic_code'];

		$query = "SELECT * FROM section_officer WHERE id_number ='$id_number'";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results)==1){
			while ($row = mysqli_fetch_assoc($results)) {
				mysqli_query($db, "UPDATE section_officer SET id_number ='$id_number', position ='$position',academic_code ='$academic_code' WHERE id_number ='$id_number'");
				$_SESSION['message'] = "Successfully updated!"; 
				header('location: section_officer_list.php');
				}
			}
		}

//ADD MODERATOR
		$instructor_id = "";
		$last_name = "";
		$first_name = "";
		$middle_name = "";
		$organization_code = "";
		$academic_code="";
		$update = false;
	if(isset($_POST['game'])){
		$instructor_id = $_POST['instructor_id'];
		$last_name = $_POST['last_name'];
		$first_name = $_POST['first_name'];
		$middle_name = $_POST['middle_name'];
		$organization_code = $_POST['organization_code'];
		$academic_code = $_POST['academic_code'];

		$sql = "INSERT INTO organization_moderator (instructor_id, last_name, first_name, middle_name, organization_code, academic_code )
			VALUES ('$instructor_id','$last_name','$first_name','$middle_name','$organization_code','$academic_code')";
			mysqli_query($db, $sql);
			$_SESSION['message'] = "successfully saved";
			header('location: organization_moderator_list.php'); //redirect to homepage
	}

//ADD ORGANIZATION OFFICER
		$id_number = "";
		$position = "";
		$section_id="";
		$academic_code = "";
		$update = false;
	if(isset($_POST['larga'])){
		$id_number = $_POST['id_number'];
		$section_id = $_POST['section_id'];
		$position = $_POST['position'];
		$academic_code = $_POST['academic_code'];

		$sql = "INSERT INTO organization_officer (id_number, position, section_id, academic_code )
			VALUES ('$id_number','$position','$section_id','$academic_code')";
			mysqli_query($db, $sql);
			$_SESSION['message'] = "successfully saved";
			header('location: organization_officer_list.php'); //redirect to homepage
	}
	?>