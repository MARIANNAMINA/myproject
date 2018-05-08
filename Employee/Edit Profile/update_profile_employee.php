<?php
/*
 * Contains main functionality of edit_profile_employee.php file
 */
session_start();
include('password.php');
include 'db.php';
?><!doctype html>  
	<html lang="en">
		<link rel="shortcut icon"
		  href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
		<link rel="apple-touch-icon"
		  href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
	</html>
	
	<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		$password_error = $phone_error = $emergency_phone_error = $country_error = "";
		$Password_len = $Hashed = $P = $EP = $E = $C = $A = $Password = $Phone = $EmergencyPhone = $Country = $Address = "";

		/* used mysqli_real_escape_string() function to prevent SQL injection */
		$Gender = mysqli_real_escape_string($conn, $_SESSION['OldGender']);	
		$Password = mysqli_real_escape_string($conn,$_POST['Password']);
		$Phone = mysqli_real_escape_string($conn,$_POST['Phone']);
		$EmergencyPhone = mysqli_real_escape_string($conn,$_POST['EmergencyPhone']);
		$Country = mysqli_real_escape_string($conn,$_POST['Country']);
		$Address = mysqli_real_escape_string($conn,$_POST['Address']);

		/* check if Password text box is empty */
		if (empty($_POST['word'])) {
			/* Error message because Password is required */
			$password_error = "*Password is required";
		} else {
			/* check if new user's password is the same with the old one */
			if(strcmp ($Password, $_SESSION['password']) == 0){
				/* encrypt the given password */
				$Hashed = password_hash($_SESSION['password'], PASSWORD_DEFAULT);
			} else{
				/* used mysqli_real_escape_string() function to prevent SQL injection */
				$Password = mysqli_real_escape_string($conn,$_POST['word']);
				/* Filter html characters out */
				$Password = strip_tags($Password);
				/* save the length of password to store it in DB */
				$Password_len = strlen($Password);
				/* encrypt the given password */
				$Hashed = password_hash($Password, PASSWORD_DEFAULT);
			}
		}
			
		/* check if Phone text box is empty */	
		if (empty($_POST['Phone'])) {
			/* Error message because Phone number is required */
			$phone_error = "*Phone number is required";
		} else {
			/* used mysqli_real_escape_string() function to prevent SQL injection */
			$P = $Phone = mysqli_real_escape_string($conn,$_POST['Phone']);
			/* Filter html characters out */
			$Phone = strip_tags($Phone);
			/* check if only integer numbers are inserted */
			if (!preg_match("/^\d+$/", $Phone)) {
				$P = "";
				/* Error message because new Phone number does not contain only integer numbers  */
				$phone_error = "*Invalid phone number";
			}
		}

		/* check if Emergency Phone text box is empty */
		if (empty($_POST['EmergencyPhone'])) {
			/* Error message because Emergency Phone number is required */
			$emergency_phone_error = "*Emergency phone number is required";
		} else {
			/* used mysqli_real_escape_string() function to prevent SQL injection */
			$EP = $EmergencyPhone = mysqli_real_escape_string($conn,$_POST['EmergencyPhone']);
			/* Filter html characters out */
			$EmergencyPhone = strip_tags($EmergencyPhone);			
			/* check if only integer numbers are inserted */
			if (!preg_match("/^\d+$/", $EmergencyPhone)) {
				$EP = "";
				/* Error message because new Emergency Phone number does not contain only integer numbers  */
				$emergency_phone_error = "*Invalid emergency phone number";
			}
		}

		/* check if Country text box is empty */
		if (empty($_POST['Country'])) {
			/* Initialize variables */
			$C = "";
			$Country = " ";
		} else {
			/* used mysqli_real_escape_string() function to prevent SQL injection */
			$C = $Country = mysqli_real_escape_string($conn,$_POST['Country']);
			/* Filter html characters out */
			$Country = strip_tags($Country);			
			/* check if only allowed characters are inserted */
			if (!preg_match("/^[a-zA-Z ]*$/", $C)) {
				$C = "";
				/* Error message because given Country does not contain only allowed characters  */
				$country_error = "*Only letters and white space allowed";
			}
		}

		/* check if Address text box is empty */
		if (empty($_POST['Address'])) {
			/* Initialize variables */
			$A = "";
			$Address = " ";
		} else {
			/* used mysqli_real_escape_string() function to prevent SQL injection */
			$A = $Address = mysqli_real_escape_string($conn,$_POST['Address']);
			/* Filter html characters out */
			$Address = strip_tags($Address);	
		}
		
		/* checks if the selected option is Female*/
		if(strcmp($Gender,"F")==0){
			/* used mysqli_real_escape_string() function to prevent SQL injection */
			$Gender = mysqli_real_escape_string($conn, $_POST['G1']);
		/* checks if the selected option is Male*/ 	
		}else if (strcmp($Gender,"M")==0){
			/* used mysqli_real_escape_string() function to prevent SQL injection */
			$Gender = mysqli_real_escape_string($conn, $_POST['G2']);
		/* checks if the selected option is Other*/
		}else{
			/* used mysqli_real_escape_string() function to prevent SQL injection */
			$Gender = mysqli_real_escape_string($conn, $_POST['G3']);
		}
		
	
		/* checks if there are errors in given Password, Phone and Emergency phone number, Country and Address */
		if(empty($password_error) && empty($phone_error) && empty($emergency_phone_error) && empty($country_error)){
			/* Manager's Username */
			$Username=$_SESSION['username'];
			/* update data of the selected manager */	
			$sqlUpdate = "UPDATE Employee SET Password= ?,Phone = ?,EmergencyPhone = ?,Country = ?,Address = ?,Gender = ?,CharactersPassword = ? WHERE Username LIKE '$Username'";
			
			
			/* Create a prepared statement */
			$stmt = mysqli_stmt_init($conn);
			/* Prepare the prepared statement */
			if(!mysqli_stmt_prepare($stmt, $sqlUpdate)){
				/* Call function */
				print_error();
				
			}else{
				/* Bind parameters */
				mysqli_stmt_bind_param($stmt, "siisssi", $Hashed, $Phone, $EmergencyPhone, $Country, $Address, $Gender, $Password_len);
				/* Run parameters inside database */
				mysqli_stmt_execute($stmt);
				/* Call function */
				print_success();
			}
			
		}	
	}
	
	/**
	 * Prints successful message related to data updated correctly in the database
	 */
	function print_success(){
	 echo '<script type="text/javascript">
		   window.alert("Updated correctly"); 
		   window.location.replace("EmployeeDashboard.html");
		   </script>';
	}

	/**
	 * Prints error message related to connection with database
	 */	
	function print_error(){
	echo '<script type="text/javascript">
		  window.alert("ERROR CONNECTING WITH DATABASE");
		  </script>';
	}
	?>


	