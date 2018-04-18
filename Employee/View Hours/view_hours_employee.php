<?php session_start();?>
<!doctype html>
 
<html lang="en"> 
	<link rel="shortcut icon" href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
	<link rel="apple-touch-icon" href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
	  
	<head> 
		<title>Statare LTD</title> 
		<!-- Required meta tags --> 
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
	  
		<style>
	  
			.paragraph {
			 
			 padding: 0px 0px 0px 40px;
		  
			}
		  
			.buttonstyle1 {
				 background-color: #31333F; 
				 border: 2px solid #31333F;
				 box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
				 color: #ffffff ;
				 padding: 10px 24px;
				 border-radius: 3px;
				 text-align: center;
				 text-decoration: none;
				 display: inline-block;
				 font-size: 20px;
				 font-weight: bold;
				 margin-left:80px;
			}
		   
			.buttonstyle2 {
				 background-color: #31333F; 
				 border: 2px solid #31333F;
				 box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
				 color: #ffffff ;
				 padding: 10px 24px;
				 border-radius: 3px;
				 text-align: center;
				 text-decoration: none;
				 display: inline-block;
				 font-size: 20px;
				 font-weight: bold;
			}

			table {
				 border-collapse: collapse;
				 width: 85%;
			 }
			 
			td {
				 font-size: 20px;
				 text-align: left;
				 padding: 8px;
				 color:black;
				 background-color:white;
				 border:2px solid #31333F;
			 }
			 
			 th{
				 font-size: 20px;
				 text-align: left;
				 padding: 8px;
				 background-color:#31333F;
				 border:2px solid #31333F;
				 color:white;
			  }

			 tr:nth-child(even){
			  background-color: white;
			  border:2px solid #31333F;
			  color:black;
			 }

			   .logout{
					position:absolute;
					color: orange;
					left: 94%;
					bottom:95%;
					font-size: 16pt;
					background-color: #31333F;
					border: #31333F;
			   }
					
			label a:hover {
				color: orange;
			}
			
			.nav{
					position: absolute;
					top: 9%;
					left: 8%;
					font-weight: bold;
				}
			.header { 
				   background-color: #31333F;
				   color: white;
				   margin-bottom: 1.1%;    		
			 } 
			  
			 .logo{
				   margin-top: 1.6%;
				   margin-bottom: 0.1%;
				   margin-left: 1.3%;
				   display:inline-block;
			}
			  
			li {
				float: left;
			}
			li a, .dropbtn {
				display: inline-block;
				color: white;
				text-align: center;
				padding: 17px 11px;
				text-decoration: none;
			}
			li a:hover, .dropdown:hover .dropbtn {
				background-color: #31333F;
				color: orange;
				background-color: transparent;
				text-decoration: underline;
			}
			li.dropdown {
				display: inline-block;
			}
			.dropdown-content {
				display: none;
				position: absolute;
				background-color: #31333F ;
				min-width: 160px;
				box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
				z-index: 1;
			}
			.dropdown-content a {
				color: white;
				padding: 12px 16px;
				text-decoration: none;
				display: block;
				text-align: left;
			}
			.dropdown-content a:hover {background-color: #31333F}
			.dropdown:hover .dropdown-content {
				display: block;
			}
			  
			.left_assig {
				margin-left:4;
			}
			  
			input{
				background-color: #f1f1f1;
				color: black;
				padding: 10px 24px;
				border-radius: 8px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
			}
			
			body{
				height:100%;
				width:100%;
				background-image:url("statare3.jpg");  
				background-repeat:no-repeat;  
				background-size:cover;   
				filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='statare3.jpg',sizingMethod='scale');
				-ms-filter:"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='statare3.jpg',sizingMethod='scale')";
				}	
				.username {
					margin-left: 80px;
					margin-right: 80px;
				}		
				
		
		</style>
	 
		<!-- Bootstrap CSS --> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> 
	</head>
	<body> 
		
		<div class="header">

			<form action="logout_employee.php" method="post" id=form_id4>	 	
				<button onclick="myFunction4()" name="LogOutButton" id="LogOutButton" class="logout">LogOut</button>
			</form>  

			<div class="logo">
				<a href="EmployeeDashboard.html">
					<img src="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png" width="100" height="100"> 
				</a>
				<ul>
					<label class="nav">
						<li><a href="EmployeeDashboard.html">Home</a></li>
						<li><a href="edit_profile_employee.php" >Profile</a></li>
						<li><a href="view_hours_employee.php" style="color:orange;text-decoration: underline">View Hours</a></li>
						<li><a href="employee_view_request.php" >View Requests</a></li> 
						<li><a href="leave_request_employee.html">Leave Request</a></li>
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

		<div class="paragraph">
	  
			<h1 align="center"><b>View Hours</b><h1>
			
			<br>

			<div style="overflow-x:auto;">
		  
				<table style="margin-left:80px" name="table" id="table">
					<tr>
						<th>Date</th>
						<th>ClockIn</th>
						<th>ClockOut</th>
						<th>Break Length </th>
						<th>Hours</th>
					</tr>
					
					<?php
						include_once 'db.php';

						$Username=$_SESSION['username'];

						$sql = "SELECT ClockIn, ClockOut, Break, ReturnBreak, Date FROM AttendanceTime WHERE Username LIKE '$Username' ORDER BY Date DESC";
						$result = mysqli_query($conn, $sql);
							
						if(!$result){
							echo '<script type="text/javascript">
								window.alert("ERROR CONNECTION WITH DATABASE");
								</script>';
							exit();
						}else{ 
							while($row = mysqli_fetch_array($result)){ 
											 
								//calculate break length
								$endTime = ($row['ReturnBreak']{0} . $row['ReturnBreak']{1})*60*60 + ($row['ReturnBreak']{3} . $row['ReturnBreak']{4})*60 + ($row['ReturnBreak']{6} . $row['ReturnBreak']{7})*1;
								$startTime = ($row['Break']{0} . $row['Break']{1})*60*60 + ($row['Break']{3} . $row['Break']{4})*60 + ($row['Break']{6} . $row['Break']{7})*1;
								$newTime = "-";
											
								if($endTime != 0){//has returned from break
											
									$newTime = $endTime-$startTime;//break length in milliseconds
									$break = (int)($newTime/60);
												
									$hours = (int)($newTime / 3600);
									$min = (int)(($newTime - $hours*3600) / 60);
									$sec = (int)($newTime - $hours*3600 - $min*60);
										
									if(strlen($hours) == 1 && strlen($min) == 1 && strlen($sec) == 1){
										$newTime = '0'.$hours.':0'.$min.':0'.$sec;
									}else if(strlen($hours) == 1 && strlen($min) == 1 && strlen($sec) != 1){
										$newTime = '0'.$hours.':0'.$min.':'.$sec;
									}else if(strlen($hours) == 1 && strlen($min) != 1 && strlen($sec) == 1){
										$newTime = '0'.$hours.':'.$min.':0'.$sec;
									}else if(strlen($hours) != 1 && strlen($min) == 1 && strlen($sec) == 1){
										$newTime = $hours.':0'.$min.':0'.$sec;
									}else if(strlen($hours) != 1 && strlen($min) == 1 && strlen($sec) != 1){
										$newTime = $hours.':0'.$min.':'.$sec;
									}else if(strlen($hours) != 1 && strlen($min) != 1 && strlen($sec) == 1){
										$newTime = $hours.':'.$min.':0'.$sec;
									}else if(strlen($hours) == 1 && strlen($min) != 1 && strlen($sec) != 1){
										$newTime = '0'.$hours.':'.$min.':'.$sec;
									}else if(strlen($hours) != 1 && strlen($min) != 1 && strlen($sec) != 1){
										$newTime = $hours.':'.$min.':'.$sec;
									}
																		
									$date=$row['Date'];
									$clockin=$row['ClockIn'];
												
									$query="UPDATE AttendanceTime SET BreakLength='$break' WHERE (Username='$Username' AND Date='$date' AND ClockIn='$clockin')";
									if(!mysqli_query($conn,$query)){
										echo '<script type="text/javascript">
											window.alert("ERROR CONNECTING WITH DATABASE");
											</script>';
										exit();
									}
								}
										
								//calculate hours
								$endTime2 = ($row['ClockOut']{0} . $row['ClockOut']{1})*60*60 + ($row['ClockOut']{3} . $row['ClockOut']{4})*60 + ($row['ClockOut']{6} . $row['ClockOut']{7})*1;
								if($endTime2 == 0){//if is not clocked out
									$clockout = "-";
								}else{
									$clockout = $row['ClockOut'];
								}
								$startTime2 = ($row['ClockIn']{0} . $row['ClockIn']{1})*60*60 + ($row['ClockIn']{3} . $row['ClockIn']{4})*60 + ($row['ClockIn']{6} . $row['ClockIn']{7})*1;
								$newTime2 = "-";
										
								if($endTime2 != 0){//has clocked out
									$newTime2 = $endTime2-$startTime2-$break;//hours

									$hours2 = (int)($newTime2 / 3600);
									$min2 = (int)(($newTime2 - $hours2*3600) / 60);
									$sec2 = (int)($newTime2 - $hours2*3600 - $min2*60);
										
									if(strlen($hours2) == 1 && strlen($min2) == 1 && strlen($sec2) == 1){
										$newTime2 = '0'.$hours2.':0'.$min2.':0'.$sec2;
									}else if(strlen($hours2) == 1 && strlen($min2) == 1 && strlen($sec2) != 1){
										$newTime2 = '0'.$hours2.':0'.$min2.':'.$sec2;
									}else if(strlen($hours2) == 1 && strlen($min2) != 1 && strlen($sec2) == 1){
										$newTime2 = '0'.$hours2.':'.$min2.':0'.$sec2;
									}else if(strlen($hours2) != 1 && strlen($min2) == 1 && strlen($sec2) == 1){
										$newTime2 = $hours2.':0'.$min2.':0'.$sec2;
									}else if(strlen($hours2) != 1 && strlen($min2) == 1 && strlen($sec2) != 1){
										$newTime2 = $hours2.':0'.$min2.':'.$sec2;
									}else if(strlen($hours2) != 1 && strlen($min2) != 1 && strlen($sec2) == 1){
										$newTime2 = $hours2.':'.$min2.':0'.$sec2;
									}else if(strlen($hours2) == 1 && strlen($min2) != 1 && strlen($sec2) != 1){
										$newTime2 = '0'.$hours2.':'.$min2.':'.$sec2;
									}else if(strlen($hours2) != 1 && strlen($min2) != 1 && strlen($sec2) != 1){
										$newTime2 = $hours2.':'.$min2.':'.$sec2;
									}
								}
								echo "<tr>";
								echo "<td>" . $row['Date'] . "</td>";
								echo "<td>" . $row['ClockIn'] . "</td>";
								echo "<td>" . $clockout . "</td>";
								echo "<td>" . $newTime . "</td>";
								echo "<td>" . $newTime2 . "</td>";
								echo "</tr>";

							}
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
