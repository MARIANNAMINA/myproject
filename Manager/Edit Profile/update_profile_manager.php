<?php
/*
 * Contains main functionality of edit_profile_manager.php file
 */
session_start();
include('password.php');
include 'db.php';
?><!doctype html>  
	<html lang="en">
		<link rel="shortcut icon" href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
	</html>
	
	<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		$password_error = $phone_error = $emergency_phone_error = $country_error = $address_error = "";
		$Password_len = $Hashed = $P = $EP = $E = $C = $A = $Password = $Phone = $EmergencyPhone = $Country = $Address = "";

		$Gender = mysqli_real_escape_string($conn, $_SESSION['OldGender']);	
		$Password = mysqli_real_escape_string($conn,$_POST['Password']);
		$Phone = mysqli_real_escape_string($conn,$_POST['Phone']);
		$EmergencyPhone = mysqli_real_escape_string($conn,$_POST['EmergencyPhone']);
		$Country = mysqli_real_escape_string($conn,$_POST['Country']);
		$Address = mysqli_real_escape_string($conn,$_POST['Address']);

		// check if Password text box is empty
		if (empty($_POST['word'])) {
			$password_error = "*Password is required";
		} else {
			if(strcmp ($Password, $_SESSION['password']) == 0){
				$Hashed = password_hash($Password, PASSWORD_DEFAULT);
			} else{
				$Password = mysqli_real_escape_string($conn,$_POST['word']);
				/* Filter html characters out */
				$Password = strip_tags($Password);
				// save the length of password to store it in the DB
				$Password_len = strlen($Password);
				// encrypt the given password
				$Hashed = password_hash($Password, PASSWORD_DEFAULT);
			}
		}
			
		// check if Phone text box is empty
		if (empty($_POST['Phone'])) {
			$phone_error = "*Phone number is required";
		} else {
			$P = $Phone = mysqli_real_escape_string($conn,$_POST['Phone']);
			/* Filter html characters out */
			$Phone = strip_tags($Phone);
			// check if only integer numbers are inserted
			if (!preg_match("/^\d+$/", $Phone)) {
				$P = "";
				$phone_error = "*Invalid phone number";
			}
		}

		// check if Emergency Phone text box is empty
		if (empty($_POST['EmergencyPhone'])) {
			$emergency_phone_error = "*Emergency phone number is required";
		} else {
			$EP = $EmergencyPhone = mysqli_real_escape_string($conn,$_POST['EmergencyPhone']);
			/* Filter html characters out */
			$EmergencyPhone = strip_tags($EmergencyPhone);			
			// check if only integer numbers are inserted
			if (!preg_match("/^\d+$/", $EmergencyPhone)) {
				$EP = "";
				$emergency_phone_error = "*Invalid emergency phone number";
			}
		}

		// check if Country text box is empty
		if (empty($_POST['Country'])) {
			$C = "";
			$Country = " ";
		} else {
			$C = $Country = mysqli_real_escape_string($conn,$_POST['Country']);
			/* Filter html characters out */
			$Country = strip_tags($Country);			
			// check if only characters are inserted
			if (!preg_match("/^[a-zA-Z ]*$/", $C)) {
				$C = "";
				$country_error = "*Only letters and white space allowed";
			}
		}

		if (empty($_POST['Address'])) {
			$A = "";
			$Address = " ";
		} else {
			$A = $Address = mysqli_real_escape_string($conn,$_POST['Address']);
			/* Filter html characters out */
			$Address = strip_tags($Address);	
		}
  
		if(strcmp($Gender,"F")==0){
			$Gender = mysqli_real_escape_string($conn, $_POST['G1']);
		}else if (strcmp($Gender,"M")==0){
			$Gender = mysqli_real_escape_string($conn, $_POST['G2']);
		}else{
			$Gender = mysqli_real_escape_string($conn, $_POST['G3']);
		}
		
	
		if(empty($password_error) && empty($phone_error) && empty($emergency_phone_error) && empty($country_error) && empty($address_error)){
			$Username=$_SESSION['username'];
			/* update data of the selected manager */	
			$sqlUpdate = "UPDATE Employee SET Password= ?,Phone = ?,EmergencyPhone = ?,Country = ?,Address = ?,Gender = ?,CharactersPassword = ? WHERE Username LIKE '$Username'";
			
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sqlUpdate)){
				print_error();
				
			}else{
				mysqli_stmt_bind_param($stmt, "siisssi", $Hashed, $Phone, $EmergencyPhone, $Country, $Address, $Gender, $Password_len);
				mysqli_stmt_execute($stmt);
				print_success();
			}
			
		}	
	}
	
	function print_success(){
	 echo '<script type="text/javascript">
		   window.alert("Updated correctly"); 
		   window.location.replace("manager_dashboard.html");
		   </script>';
	}
	
	function print_error(){
	echo '<script type="text/javascript">
		  window.alert("ERROR CONNECTING WITH DATABASE");
		  </script>';
	}

	?>

