<?php
session_start();
include('db.php');
include('payroll_function.php');
?>
<!doctype html>
<html lang="en">
	<link rel="shortcut icon" href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
	<link rel="apple-touch-icon" href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<title>Statare LTD</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" type="text/css" href="payroll_report.css">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	</head>
	<body>
	  
		<div class="header">

			<form action="logout_manager.php" method="post" id="form_id4">	 	
				<button onclick="myFunction4()" name="LogOutButton" id="LogOutButton" class="logout">LogOut</button>
			</form>  



			<div class="logo">
				<a href="manager_dashboard.html">
					<img src="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png" width="100" height="100"> 
				</a>
				<ul>
					<label class="nav">
						<li><a href="manager_dashboard.html">Home</a></li>		
						<li><a href="edit_profile_manager.php" >Profile</a></li>
						<li><a href="view_hours_manager.php">View Hours</a></li>
						<li><a href="leave_request_manager.php" >Leave Request</a></li>
						<li><a href="average_per_week.php">Average Report</a></li>
						<li><a href="payroll_report.php" style="color:orange;text-decoration: underline">Payroll Report</a></li>
						<li class="dropdown">
							<a href="javascript:void(0)" class="dropbtn" >My Employees</a>
							<div class="dropdown-content">
								<a href="add_employee.php">Add Employee</a>
								<a href="choose_employee.php">Edit Employee</a>
								<a href="delete_employee_.php">Delete Employee</a>
								<a href="employee_status_manager.php">Employee Status</a>
								<a href="leaveRequest.html">View Requests</a>
							</div>
						</li>	
						<li class="dropdown">
							<a href="javascript:void(0)" class="dropbtn">Language</a>
							<div class="dropdown-content">
								<a href="#">Ελληνικά</a>
								<a href="#">English</a>
							</div>
						</li>
					</label>
				</ul>
				
			</div>
		</div>
			
		
		<div class="paragraph">
	  
			<h1 align="center"><b>Payroll Report</b><h1>
		   
		</div>
		<br>

		<form name="form_id" id="form_id" class="username" method="post" action="<?php $_SERVER['PHP_SELF'];?>">

			<label  id="label" style="margin-right:6%"><b>From :</b></label> 
			<input id="textinput1" name="from_date" type="date" placeholder=""  required="">
							
			<br>
			<br>
				
			<label id="label" style="margin-right:8%"> <b>To :</b></label>
			<input id="textinput2" name="to_date" type="date" placeholder=""  required="">
						
		<!--<br>
			<br>
				
			<label  id="label" for="textinput3"> <b>File name :</b></label>
			<input id="textinput3" name="file_name" type="search" placeholder=""  required="">-->
				
			<br>
			<br>
				
			<label style="margin-right:6%"><b>Format : </b></label>
			<select style="margin-left:45px" name="format_export" id="format_export">
				<option value="XML">XML</option>
				<option value="JSON">JSON</option>
			</select>
			  
			<br>
			<br>   
			  
			<button class="cancel_style" id="cancel" name="cancel">Cancel</button>		
			<button class="save_style" id="export_btn" name="export_btn">Export</button>  
		
		</form>
		
	<!--pop up window -->
	<div id="exportDiv" style="display:none" class="confirm_box">
		<div class="overlay"></div>
		<div class="confirm_model">
			<div class="model">
				<div class="header">
					<h1 class="title">
						Are you sure you want to export this report? 
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

	<div id="cancelDiv" style="display:none" class="confirm_box">
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
						<button class="confirm button" id="yes_cancel" name="yes_cancel">Yes</button>
						<button class="deny button" id="no_cancel" name="no_cancel">No</button>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script>
		/*
		If save button is clicked, wait for user to click yes or no button of the pop up window. If user click yes
		submit form otherwise go to manager_dashboard.html page
		 */
		$("#export_btn").click(function (event) {
			event.preventDefault();
			document.getElementById('exportDiv').style.display = "block";
			$("#yes").click(function (event) {
				document.getElementById('exportDiv').style.display = "none";
				document.getElementById('form_id').submit();
			});
			$("#no").click(function (event) {
			   document.getElementById('exportDiv').style.display = "none";
			});
		});

		/*
		If cancel button is clicked, wait for user to click yes or no button of the pop up window. If user click no
		submit form otherwise go to manager_dashboard.html page
		*/
		$("#cancel").click(function (event) {
			event.preventDefault();
			document.getElementById('cancelDiv').style.display = "block";
			$("#yes_cancel").click(function (event) {
				document.getElementById('cancelDiv').style.display = "none";
				window.location.replace("manager_dashboard.html");
			});
			$("#no_cancel").click(function (event) {
				document.getElementById('cancelDiv').style.display = "none";
			});
		});
		</script>
	</body>
</html>




