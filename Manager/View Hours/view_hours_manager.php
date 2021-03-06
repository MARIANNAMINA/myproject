<?php 
/*This screen gives the opportunity to an employee to see the situation in which he/she is.
He/she can see the time of clock in and clock out of each day. Also for each day he/she can see the length of his/her break and the full hours of work. 
*/
session_start();
?>
<!doctype html>
 
<html lang="en"> 
	<link rel="shortcut icon" href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
	<link rel="apple-touch-icon" href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
	  
	<head> 
		<title>Statare LTD</title> 
		<!-- Required meta tags --> 
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
	  
		<link rel="stylesheet" type="text/css" href="view_hours_manager.css">

		<!-- Bootstrap CSS --> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> 
	</head>
	<body> 
		
		<div class="header">
			<div class="username">
				<form action="logout_manager.php" method="post" id=form_id4>	 	
					<button onclick="myFunction4()" name="LogOutButton" id="LogOutButton" class="logout">LogOut</button>
				</form>  

				<div class="logo">
					<a href="manager_dashboard.html">
						<img src="statare.png" alt="Statare logo" width="50%" height="50%">
					</a>
					
					<ul>
						<label class="nav">
							<li><a href="manager_dashboard.html">Home</a></li>		
							<li><a href="edit_profile_manager.php" >Profile</a></li>
							<li><a href="view_hours_manager.php" style="color:orange;text-decoration: underline">View Hours</a></li>
							<li><a href="leave_request_manager.html" >Leave Request</a></li> 
							<li><a href="average_per_week.php">Average Report</a></li>
							<li><a href="payroll_report.php">Payroll Report</a></li>
							<li class="dropdown">
								<a href="javascript:void(0)" class="dropbtn" >My Employees</a>
								<div class="dropdown-content">
									<a href="add_employee.php">Add Employee</a>
									<a href="choose_employee.php">Edit Employee</a>
									<a href="delete_employee_.php">Delete Employee</a>
									<a href="employee_status_manager.php">Employee Status</a>
									<a href="manager_view_request.php">View Requests</a>
								</div>
							</li>	
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
						</label>
					</ul>
				</div>
			</div>
		</div>
		<h1 align="center"><b>View Hours</b><h1>
			
		<br>

		<div style="overflow-x:auto;">
		    <div class="username">
				<table name="table" id="table">
					<tr style="text-align:center">
						<th>Date </th>
						<th>ClockIn</th>
						<th>ClockOut</th>
						<th>Break Length </th>
						<th>Hours</th>
					</tr>
					
					<?php
						include_once 'db.php';

						$Username=$_SESSION['username'];//take the username of the employee who is loged in now

						//take ClockIn, ClockOut, Break and Date for the employee who is loged in now
						$sql = "SELECT ClockIn, ClockOut, BreakLength, Date FROM AttendanceTime WHERE Username LIKE '$Username' ORDER BY Date DESC";
						$result = mysqli_query($conn, $sql);
								
						if(!$result){//if the connection with database has problem
							echo '<script type="text/javascript">
								window.alert("ERROR CONNECTION WITH DATABASE");
								</script>';
							exit();
						}else{ //else if the connection with database is okay
						
							while($row = mysqli_fetch_array($result)){//while the table has data
											
								//calculate hours
								$endTime2 = ($row['ClockOut']{0} . $row['ClockOut']{1})*60*60 + ($row['ClockOut']{3} . $row['ClockOut']{4})*60 + ($row['ClockOut']{6} . $row['ClockOut']{7})*1;//calculate in seconds the time in which employee press the button clock out
								if($endTime2 == 0){//if is not clocked out
									$clockout = "-";//set default value
								}else{//if is clocked out
									$clockout = $row['ClockOut'];
								}
								$startTime2 = ($row['ClockIn']{0} . $row['ClockIn']{1})*60*60 + ($row['ClockIn']{3} . $row['ClockIn']{4})*60 + ($row['ClockIn']{6} . $row['ClockIn']{7})*1;//calculate in seconds the time in which employee press the button clock in
								$newTime2 = "-";//set default value
											
								if($endTime2 != 0){//has clocked out
									$newTime2 = $endTime2-$startTime2-$row['BreakLength'];//sum of hours in which employee has worked, in seconds

									$hours2 = (int)($newTime2 / 3600);//hours of sum of hours in which employee has worked
									$min2 = (int)(($newTime2 - $hours2*3600) / 60);//minutes of sum of hours in which employee has worked
									$sec2 = (int)($newTime2 - $hours2*3600 - $min2*60);//seconds of sum of hours in which employee has worked
										
									$newTime2 = calculate_hours_length($hours2, $min2, $sec2, $newTime2);

								}

								print_table($row, $clockout, $newTime2);
								
							}
						}
						
						/**
						 * Creates the time using hours, minutes and seconds.
						 *
						 * @param int $hours2 The number of the hours.
						 * 
						 * @param int $min2 The number of the minutes.
						 * 
						 * @param int $sec2 The number of the seconds.
						 * 
						 * @param time $newTime2 The time which will returned.
						 *
						 * @return time The calculated time
						 */
						function calculate_hours_length($hours2, $min2, $sec2, $newTime2){
							if(strlen($hours2) == 1 && strlen($min2) == 1 && strlen($sec2) == 1){//if hours and minutes and seconds are one digit
								$newTime2 = '0'.$hours2.':0'.$min2.':0'.$sec2;//hours length
							}else if(strlen($hours2) == 1 && strlen($min2) == 1 && strlen($sec2) != 1){//if hours and minutes are one digit
								$newTime2 = '0'.$hours2.':0'.$min2.':'.$sec2;//hours length
							}else if(strlen($hours2) == 1 && strlen($min2) != 1 && strlen($sec2) == 1){//if hours and seconds are one digit
								$newTime2 = '0'.$hours2.':'.$min2.':0'.$sec2;//hours length
							}else if(strlen($hours2) != 1 && strlen($min2) == 1 && strlen($sec2) == 1){//if minutes and seconds are one digit
								$newTime2 = $hours2.':0'.$min2.':0'.$sec2;//hours length
							}else if(strlen($hours2) != 1 && strlen($min2) == 1 && strlen($sec2) != 1){//if minutes is one digit
								$newTime2 = $hours2.':0'.$min2.':'.$sec2;//hours length
							}else if(strlen($hours2) != 1 && strlen($min2) != 1 && strlen($sec2) == 1){//if seconds is one digit
								$newTime2 = $hours2.':'.$min2.':0'.$sec2;//hours length
							}else if(strlen($hours2) == 1 && strlen($min2) != 1 && strlen($sec2) != 1){//if hours is one digit
								$newTime2 = '0'.$hours2.':'.$min2.':'.$sec2;//hours length
							}else if(strlen($hours2) != 1 && strlen($min2) != 1 && strlen($sec2) != 1){//if hours and minutes and seconds are two digit
								$newTime2 = $hours2.':'.$min2.':'.$sec2;//hours length
							}
							return $newTime2;
						}
						
						/**
						 * Prints the data to a table.
						 *
						 * @param table $row The table of data that will be printed.
						 *
						 * @param time $clockout The time in which the employee did clocked out.
						 * 
						 * @param time $newTime2 The calculated time.
						 *
						 * @return void
						 */
						function print_table($row, $clockout, $newTime2){
							echo "<tr>";
							echo "<td>" . $row['Date'] . "</td>";
							echo "<td>" . $row['ClockIn'] . "</td>";
							echo "<td>" . $clockout . "</td>";
							echo "<td>" . $row['BreakLength'] . "</td>";
							echo "<td>" . $newTime2 . "</td>";
							echo "</tr>";
						}
					?>

				</table>
			</div>
		</div>
	
		<script>
			function myFunction4() {
				document.getElementById("form_id4").submit();
			}
		</script>
	</body> 
</html> 
