<?php
/*
 * Contains main functionality of edit_profile_employee.php file
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
$first_name_error = $last_name_error = $password_error = $phone_error = $emergency_phone_error = $email_error = $country_num_error = $address_error = $birthdate_error = "";
$P = $EP = $E = $C = $A = $DOB = $Password = $Phone = $EmergencyPhone = $Email = $Country = $Address = $DateofBirth = "";

$flag=true;

    // check if Password text box is empty
	if (empty($_POST['word'])) {
        $password_error = "*Password is required";
    } else {
        $Password = $_POST['word'];
        // save the length of password to store it in the DB
        $Password_len = strlen($Password);
        // encrypt the given password
        $Hashed = password_hash($Password, PASSWORD_DEFAULT);
    }


if(empty($_POST['FirstName'])){
	$first_name_error="*First Name is required";
}else{
	$FirstName=$_POST['FirstName'];
	if(!preg_match("/^[a-zA-Z ]*$/",$FirstName)){
		$first_name_error="*Only letters and white space allowed";
	}
}

if(empty($_POST['LastName'])){
	$last_name_error="*Last Name is required";
}else{
	$LastName=$_POST['LastName'];
	if(!preg_match("/^[a-zA-Z ]*$/",$LN)){
		$last_name_error="*Only letters and white space allowed";
	}
}

if(empty($_POST['Phone'])){
//	$P="";
	$Phone=" ";
}else{
	$Phone=$_POST['Phone'];

	if (!preg_match("/^\d+$/",$Phone)) {
//      $P="";
	  $phone_error = "*Invalid phone number"; 
    }
}

if(empty($_POST['EmergencyPhone'])){
//	$EP="";
	$EmergencyPhone=" ";
}else{
	$EmergencyPhone=$_POST['EmergencyPhone'];
	 if (!preg_match("/^\d+$/",$EmergencyPhone)) {
  //    $EP="";
	  $emergency_phone_error = "*Invalid phone number"; 
    }
}


if(empty($_POST['Country'])){
	//$C="";
	$Country=" ";
}else{
	$Country=$_POST['Country'];
	
	if(!preg_match("/^[a-zA-Z ]*$/",$Country)){
	//	$C="";
		$country_error="*Only letters and white space allowed";
	}
}

if(empty($_POST['Address'])){
	//$A="";
	$Address=" ";
}else{
	$Address=$_POST['Address'];
	
}

$Gender=$_SESSION['OldGender'];  /* 
$UsernameManager=$_SESSION['username'];
$Manager=0;
if(isset($_POST['Manager'])){
$Manager=1;
} */
if(strcmp($Gender,"F")==0){
	$Gender = $_POST['G1'];
}else if (strcmp($Gender,"M")==0){
	$Gender = $_POST['G2'];
}else{
	$Gender = $_POST['G3'];
}
//	if( empty($phone_error) && empty($emergency_phone_error) && empty($email_error) && empty($country_num_error) && empty($address_error) && empty($birthdate_error)){
	if(empty($password_error) && empty($first_name_error) && empty($last_name_error) && empty($phone_error) && empty($emergency_phone_error) && empty($country_error) && empty($address_error)){
	
		
	//	if($flag){
	//	
		$sqlUpdate = "UPDATE Employee SET Password='$Hashed',Name = '$FirstName', Surname = '$LastName',Phone = '$Phone', EmergencyPhone = '$EmergencyPhone', Country = '$Country', Address = '$Address', Gender = '$Gender', CharactersPassword = '$Password_len' WHERE Username = '$_SESSION[username]'";
		$result = mysqli_query($conn,$sqlUpdate);
		if(!$result){
			echo '<script>
			window.alert("ERROR!");
			</script>';
		//	$Username="";
		}else{
			echo '<script type="text/javascript">
			window.alert("Updated Correctly");
				
			
			</script>';
		}
	//	}
		
	}	
}

?>

