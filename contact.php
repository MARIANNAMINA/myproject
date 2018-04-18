<?php

	session_start();
	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		include 'db.php';
		
		$Username=$_SESSION['username'];
		$from = $Username;
		
		//to make the fields required
		$to_error="";
		$subject_error="";
		$descripiton_error="";
		
		//to hold the text in the input
		$TO="";
		$SUBJECT="";
		$DESCRIPTION="";
		
		if(empty($_POST['To'])){
			$to_error="* ' To ' field is required";
		}else if (!filter_var($_POST['To'], FILTER_VALIDATE_EMAIL)) {
			$to_error = "* Invalid email format"; 
		}else{
			$to_error="";
			$to=$_POST['To'];
			$TO=$to;
		}
		
		if(empty($_POST['Subject'])){
			$subject_error="* ' Subject ' field is required";
		}else{
			$subject_error="";
			$subject=$_POST['Subject'];
			$SUBJECT=$subject;
		}
		
		if(empty($_POST['Description'])){
			$descripiton_error="* ' Description ' field is required";
		}else{
			$descripiton_error="";
			$description=$_POST['Description'];
			$DESCRIPTION=$description;
		}
		
		$headers .= "Content-type: text/html;\r\n";
		$headers .= "From: $from";

		if(empty($to_error) && empty($subject_error) && empty($descripiton_error)){
			// send email
			mail($to,$subject,$description,$headers);
			echo '<script type="text/javascript">
			window.location.replace("clock_in_manager.html");
			</script>';
			
		}
	}
?>
