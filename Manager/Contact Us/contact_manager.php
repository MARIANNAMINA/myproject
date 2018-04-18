<?php session_start();

/*This screen gives the chance to an employee to send an email to another employee.
‘To’ , ‘Subject’ and ‘Description’ fields are required to complete from the employee.
If an employee don’t complete at least one of this fields, the email will not be send.
When the three fields are complete, pressing the button ‘Send’, an alert box will appears 
and pressing the button ‘OK’ the email will be send to the email which is written in the 
field ‘To’ and your screen will be your Dashboard. At the alert box pressing the button ‘Cancel’, 
the email will not be send and you will stay on the same screen (Contact us screen). If you press 
the button ‘Cancel’ which is on the screen, an alert box will appears and pressing the button ‘OK’,  
the email will not be send and the screen now will be your Dashboard. At the alert box pressing the button ‘Cancel’,
you will stay on the same screen (Contact us screen).
*/

include('contact.php'); 
?>
<!doctype html>
<html lang="eng">
	<link rel="shortcut icon" href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
	<link rel="apple-touch-icon" href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<title>Statare LTD</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" type="text/css" href="contact_manager.css">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	</head>
	<body>
			
		<div class="header">

			<form action="logout_manager.php" method="post" id=form_id4>	 	
				<button onclick="myFunction4()" name="LogOutButton" id="LogOutButton" class="logout">LogOut</button>
			</form>  

			<div class="logo">
				<a href="clock_in_manager.html">
					<img src="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png" width="100" height="100"> 
				</a>
				
				<ul>
					<label class="nav">
						<li><a href="clock_in_manager.html">Home</a></li>
						<li class="dropdown">
							<a href="javascript:void(0)" class="dropbtn">Language</a>
							<div class="dropdown-content">
								<a href="#">Ελληνικά</a>
								<a href="#">English</a>
								<a href="#">Norsk</a>
								<a href="#">Polski</a>
								<a href="#">Deutsch</a>
								<a href="#">Svenska</a>
							</div>
						</li>
						<li><a href="contact_manager.php" style="color:orange;text-decoration: underline">Contact Us</a></li>
					</label>
				</ul>
			</div> 
		</div>
		<br>
		<div>

			<form method="post" class="username" id="form_id" action="<?php $_SERVER['PHP_SELF']; ?>">
					
				<label  id="label" for="textinput3" ><b><label style="color:red">*</label>TO :</b></label> 
				<div class = "input1">
					<input name="To" id="To" type="text" value="<?php echo "$TO"; ?>" placeholder=""  required="">
				</div> 
				<span style="margin-left:360px" class="error"><?php echo "$to_error"; ?></span>
					
				<br>
				<label  id="label" for="textinput3" ><b><label style="color:red">*</label>SUBJECT :</b></label> 
				<div class = "input1">
					<input name="Subject" id="Subject" type="text" value="<?php echo "$SUBJECT"; ?>" placeholder=""  required="">
				</div>  
				<span style="margin-left:360px" class="error"><?php echo "$subject_error"; ?></span>
					
				<br>
				<label id="label" for="textinput3"><b><label style="color:red">*</label>Description :</b></label>  
				<div class = "input1">
					<input name="Description" id="Description" type="text" value="<?php echo "$DESCRIPTION"; ?>" placeholder=""  required="">
				</div>
				<span style="margin-left:360px" class="error"><?php echo "$descripiton_error"; ?></span>

				<div>
					<br>
					<div class="paragraph2">	
						<button class="buttonstyle1" id="cancel" name="cancel">Cancel</button>	
						<button class="buttonstyle" id="send" name="send">Send</button>
					</div>			
				</div>
			</form>
		</div>
			  
		<div  id="welcomeDiv" style="display:none" class="confirm_box">
			<div class="overlay"></div>
			<div class="confirm_model">
				<div class="model">
					<div class="header">
						<h1 class="title">
						   Do you want to send the message?
						</h1>
					</div>
					<div class="content">
						<div class="buttons_container">
						   <button class="confirm button" id="yes" name="yes">Yes</button>
						   <button class="deny button" id="no" name="no">No</button>
						</div>
					</div>
				 </div>
			</div>
		</div>

		<div  id="cancelDiv" style="display:none" class="confirm_box">
			<div class="overlay"></div>
			<div class="confirm_model">
				<div class="model">
					<div class="header">
						 <h1 class="title">
						   Do you want to leave this page?
						 </h1>
					</div>
					<div class="content">
						 <div class="buttons_container">
						   <button class="confirm button" id="yes2" name="yes2">Yes</button>
						   <button class="deny button" id="no2" name="no2">No</button>
						 </div>
					</div>
				</div>
			</div>
		</div>
					
		<script>
			$("#send").click(function ( event ) { //when an employee press the button 'send', an alert box appears 
				event.preventDefault();
				document.getElementById('welcomeDiv').style.display = "block";
				$("#yes").click(function ( event ) { //if employee press yes at alert box
					document.getElementById('welcomeDiv').style.display = "none";
					document.getElementById('form_id').submit();
				});
				$("#no").click(function ( event ) { //if employee press no at alert box
					document.getElementById('welcomeDiv').style.display = "none";
				});
			});

			$("#cancel").click(function ( event ) { //when an employee press the button 'cancel', an alert box appears 
				event.preventDefault();
				document.getElementById('cancelDiv').style.display = "block";
				$("#yes2").click(function ( event ) { //if employee press yes at alert box 
					document.getElementById('cancelDiv').style.display = "none";
					window.location.replace("clock_in_manager.html");
				});
				$("#no2").click(function ( event ) { //if employee press no at alert box
					document.getElementById('cancelDiv').style.display = "none";
				});
			});
		</script>
	</body>
</html>
