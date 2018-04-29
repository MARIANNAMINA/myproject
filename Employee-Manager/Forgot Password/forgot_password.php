<?php session_start();

include('forgot_pass.php'); 
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

		<link rel="stylesheet" type="text/css" href="forgot_password.css">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	</head>
	<body>
			
		<br>
		<p class="title_class"><b>Forgot Password</b></p>
		<br>
		<br>
		<br>
	
		<form method="post" class="username" id="form_id" action="<?php $_SERVER['PHP_SELF']; ?>">
					
			<label id="label"><b><label class="label_star">*</label>Username :</b></label> 
			<div class = "input1">
				<input name="User" id="User" type="text" value="<?php echo "$USER"; ?>" placeholder=""  required="">
			</div> 
			<span class="error"><?php echo "$user_error"; ?></span>
					
			<br>
			<label id="label"><b><label class="label_star">*</label>Email :</b></label> 
			<div class = "input1">
				<input name="Email" id="Email" type="text" value="<?php echo "$EMAIL"; ?>" placeholder=""  required="">
			</div>  
			<span class="error"><?php echo "$email_error"; ?></span>

			<div>
				<br>
				<div class="paragraph2">	
					<button class="buttonstyle1" id="cancel" name="cancel">Cancel</button>	
					<button class="buttonstyle" id="send" name="send">Okay</button>
				</div>			
			</div>
		</form>
		  
		<div  id="welcomeDiv" style="display:none" class="confirm_box">
			<div class="overlay"></div>
			<div class="confirm_model">
				<div class="model">
					<div class="header">
						<h1 class="title">
						   Are you sure you want a new password?
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
					window.close();
				});
				$("#no2").click(function ( event ) { //if employee press no at alert box
					document.getElementById('cancelDiv').style.display = "none";
				});
			});
		</script>
	</body>
</html>
