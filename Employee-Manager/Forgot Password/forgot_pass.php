<?php

	session_start();
	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		include 'db.php';
		include('password.php');
		
		//to make the fields required
		$user_error="";
		$email_error="";
		
		//to hold the text in the input
		$USER="";
		$EMAIL="";
		
		$userName = $_POST['User'];
		
		if(empty($_POST['User'])){//if employee didn't set the 'User' field
			$user_error="* ' Username ' field is required";//show to the employee an error
		}else{//else if employee has set the 'User' field
			$user_error="";
			$user=$_POST['User'];
			$USER=$user;
		}
		
		if(empty($_POST['Email'])){//if employee didn't set the 'Email' field
			$email_error="* ' Email ' field is required"; //show to the employee an error
		}else if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {//else if employee has set the 'Email' field but is not an email
			$email_error = "* Invalid email format"; //show to the employee an error
		}else{//else if employee has set right the 'Email' field
			$email_error="";
			$email=$_POST['Email'];
			$EMAIL=$email;
		}
		
		$from = $_POST['User']; //set the 'from' field of the email
		
		$headers .= "Content-type: text/html;\r\n";
		$headers .= "From: $from";
		
		$subject = "Your new password!";
		
		$description = generateRandomString($length = 10);//new random code
		
		$Hashed = password_hash($description, PASSWORD_DEFAULT);
		
		$sqlEmpl = "UPDATE Employee SET Password='$Hashed' WHERE Username LIKE '$userName'";
		if(!mysqli_query($conn,$sqlEmpl)){
			echo '<script>
				window.alert("ERROR!YOU MAY INSERT A USERNAME THAT ALREADY EXISTS IN THE DATABASE");
				</script>';
		}else{

			if(empty($user_error) && empty($email_error)){//if all the fields are set      
				// send the email
				mail($email,$subject,$description,$headers);
				echo '<script type="text/javascript">
					window.close();
					</script>';//replace the screen with Login screen
			}
		}
	}
	
	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
?>
