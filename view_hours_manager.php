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
		 text-align: left;
		 padding: 8px;
		 color:black;
		 background-color:white;
		 border:2px solid #31333F;
	 }
	 
	 th{
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
		font-size: 14pt;
			
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

                <form action"logout.php">
                <label ><a href="index.html" class="logout"><b>Log out</b></a></label>
                </form>



	 <div class="logo">
		<a href="manager_dashboard.html">
			<img src="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png" width="100" height="100"> 
		</a>
		<ul>
		<label class="nav">
		<li><a href="manager_dashboard.html">Home</a></li>
		<li><a href="edit_profile_manager.html" >Profile</a></li>
		<li><a href="view_hours_manager.html" style="color:orange;text-decoration: underline">View Hours</a></li>
		<li><a href="view_schedule_manager.html">View Schedule</a></li>
		<li><a href="leave_request_manager.html" >Leave Request</a></li> 
		<li><a href="average_per_week.html">Average per week</a></li>
		<li><a href="ip_range.html">Location Request</a></li>
		<li><a href="payroll_report.html">Payroll Report</a></li>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn">My Employees</a>
			<div class="dropdown-content">
				<a href="add_employee.html">Add Employee</a>
				<a href="employee_status_manager.html">Employee Status</a>
				<a href="view_request_manager.html">View Requests</a>
				<a href="delete_employee.html">Delete Employee</a>
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

     <div class="paragraph">
  
	<h1 align="center"><b>View Hours</b><h1>
	
	<br>
  
   <h4 style="margin-left:80px"><b>Week 47</b></h4>
  
   
    <button class="buttonstyle1"> < </button> 
    <button class="buttonstyle2"> > </button> 
 
   <br>
   
   <label style="margin-left:80px"><b> Prev </b></label>
   <label style="margin-left:37px"><b> Next </b></label>

  <hr>
      <div style="overflow-x:auto;">
  
	<table style="margin-left:80px" name="table" id="table">
		<tr>
		<th>ClockIn</th>
		<th>ClockOut</th>
        <th>Break Length </th>
        <th>Hours</th>
        <th>Week Total</th>
		</tr>
		
	<?php
		include_once 'db.php';

                $Username=$_SESSION['username'];

                $sql = "SELECT ClockIn, ClockOut, Break, ReturnBreak FROM AttendanceTime WHERE Username LIKE '$Username'";
                $result = mysqli_query($conn, $sql);
				
				if(!$result){
						   echo '<script type="text/javascript">
							window.alert("ERROR CONNECTION WITH DATABASE");
							</script>';
							echo $Username;
					        exit();
				}else{ 
					//echo mysqli_num_rows($result);
							while($row = mysqli_fetch_array($result)){ 
								 // IF EINAI NULL TO RETURN??
								 //DES NOMIZW EN LATHOS TO APOT TOU
								
								
								$char1 = ($row['ReturnBreak']{0} . $row['ReturnBreak']{1})*60*60 + ($row['ReturnBreak']{3} . $row['ReturnBreak']{4})*60 + ($row['ReturnBreak']{6} . $row['ReturnBreak']{7})*1;
								$char2 = ($row['Break']{0} . $row['Break']{1})*60*60 + ($row['Break']{3} . $row['Break']{4})*60 + ($row['Break']{6} . $row['Break']{7})*1;
								echo $newTime = $char1-$char2;
								
								echo "-";
								echo $hours = (int)($newTime / 3600);
								echo "-";
								echo $min = (int)(($newTime - $hours*3600) / 60);
								echo "-";
								echo $sec = (int)($newTime - $hours*3600 - $min*60);
								echo "-";
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
								
                                echo "<tr>";
                                echo "<td>" . $row['ClockIn'] . "</td>";
                                echo "<td>" . $row['ClockOut'] . "</td>";
                                echo "<td>" . $newTime . "</td>";
                                echo "<td></td>";
                                echo "<td></td>";
                                echo "</tr>";

							}
				}
		
	?>

 	</table>
    
      </div>
  </div>
     
    </body> 
  </html> 
