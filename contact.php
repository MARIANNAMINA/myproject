<?php

			session_start();
			include 'db.php';

			if(isset($_POST['send'])){
				
			}
			
			
			$Username=$_POST['Username'];

			$from = $_POST['From'];
			$to = $_POST['To'];
			$subject = $_POST['Subject'];
			$description = $_POST['Description'];
			
			// the message
			//$msg = "First line of text\nSecond line of text";

			// use wordwrap() if lines are longer than 70 characters
			//$description = wordwrap($description,70);

			$headers .= "Content-type: text/html;\r\n";
			$headers .= "From: $from";

			// send email
			mail($to,$subject,$description,$headers);

?>