<?php

	session_start();
	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		include 'db.php';
		
		$Username=$_SESSION['username']; //takes the username of the employee who is loged in
		$from = $Username; //set the 'from' field of the email
		
		//to make the fields required
		$to_error="";
		$subject_error="";
		$descripiton_error="";
		
		//to hold the text in the input
		$TO="";
		$SUBJECT="";
		$DESCRIPTION="";
		
		if(empty($_POST['To'])){//if employee didn't set the 'To' field
			$to_error="* ' To ' field is required"; //show to the employee an error
		}else if (!filter_var($_POST['To'], FILTER_VALIDATE_EMAIL)) {//else if employee has set the 'To' field but is not an email
			$to_error = "* Invalid email format"; //show to the employee an error
		}else{//else if employee has set right the 'To' field
			$to_error="";
			$to=$_POST['To'];
			$TO=$to;
		}
		
		if(empty($_POST['Subject'])){//if employee didn't set the 'Subject' field
			$subject_error="* ' Subject ' field is required";//show to the employee an error
		}else{//else if employee has set the 'Subject' field
			$subject_error="";
			$subject=$_POST['Subject'];
			$SUBJECT=$subject;
		}
		
		if(empty($_POST['Description'])){//if employee didn't set the 'Description' field
			$descripiton_error="* ' Description ' field is required";//show to the employee an error
		}else{//else if employee has set the 'Description' field
			$descripiton_error="";
			$description=$_POST['Description'];
			$DESCRIPTION=$description;
		}
		
		$headers .= "Content-type: text/html;\r\n";
		$headers .= "From: $from";

		if(empty($to_error) && empty($subject_error) && empty($descripiton_error)){//if all the fields are set
			// send the email
			mail($to,$subject,$description,$headers);
			echo '<script type="text/javascript">
			window.location.replace("clock_in_manager.html");
			</script>';//replace the screen with clock in manager
			
		}
	}
?>