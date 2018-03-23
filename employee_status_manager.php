<?php session_start();
?><!DOCTYPE HTML>
<html lang="en">
<link rel="shortcut icon" href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
<link rel="apple-touch-icon" href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
<head> 
    <title>Statare LTD</title> 
     <!-- Required meta tags --> 
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
  
  <style>
  
			.header { 
				   background-color: #31333F;
				   color: white;
				   margin-bottom: 1.1%; 
			} 
  
			 
			.paragraph {
			 
					padding: 0px 0px 0px 40px;
		  
			}
			.logo{
				   margin-top: 1.6%;
				   margin-bottom: 0.1%;
				   margin-left: 1.3%;
				   display:inline-block;
			}
			.nav{
					position: absolute;
					top: 9%;
					left: 8%;
					font-weight: bold;
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
				 width: 100%;
			  }

			 th {
				 text-align: left;
				 padding: 8px;
				 background-color:#31333F;
				 color:white;
				 border:2px solid #31333F;
			  }
			  
			  td {
				 text-align: left;
				 padding: 8px;
				 background-color:white;
				 color:black;	 
				 border:2px solid #31333F;
			  }

			 tr:nth-child(even){
			  background-color: white;
			  color:black;
			  border:2px solid #31333F;
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
				min-width: 120%;
				padding: 14px 16px;
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

			.logout_style{
					background-color: #31333F; 
					border: 2px solid white;
					color: white;
					box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
					padding: 0.8%;
					border-radius: 8px;
					text-align: center;
					text-decoration: none;
					display: inline-block;
					font-size: 20px;
					font-weight: bold;
					position: fixed;
					top: 4%;
					right: 1%;
					
					font-size: 18pt;
					font-family: sans-serif;
					cursor:pointer;
			}

		   .logout{
				position:absolute;
				color: orange;
				left: 94%;
				bottom:95%;
				font-size: 14pt;
				font-weight: bold;
		   }
		   
		   label a:hover {
			  color: orange;
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
    
    <!--image-->
     <div class="header"> 		

                <form action"logout.php">
                <label ><a href="index.html" class="logout"><b>Log out</b></a></label>
                </form>




	 	<div class="logo">
		<a href="manager_dashboard.html">
			<img src="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png" width="100" height="100"> 
		</a>
		
	<ul >
		<label class="nav" >
		<li><a href="manager_dashboard.html">Home</a></li>		
		<li><a href="edit_profile_manager.html" >Profile</a></li>
		<li><a href="view_hours_manager.html">View Hours</a></li>
		<li><a href="view_schedule_manager.html" >View Schedule</a></li>
		<li><a href="Leave_Request_Manager.html" >Leave Request</a></li> 
		<li><a href="Average_per_Week.html">Average per week</a></li>
		<li><a href="ip_range.html">Location Request</a></li>
		<li><a href="payroll_report.html">Payroll Report</a></li>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn" style="color:orange;text-decoration: underline">My Employees</a>
			<div class="dropdown-content">
				<a href="add_employee.html">Add Employee</a>
				<a href="employee_status_manager.php" style="color:orange;text-decoration: underline">Employee Status</a>
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
  
	<h1 align="center"><b>Employee Status</b><h1>
	
	<br>
		
   <h4 style="margin-left:80px"><b>Page 1</b></h4>
    <button class="buttonstyle1"> < </button> 
    <button class="buttonstyle2"> > </button> 
   
   <br>
   
   <label style="margin-left:80px"><b> Prev </b></label>
   <label style="margin-left:37px"><b> Next </b></label>

  <hr>
  <form class="username"  method="POST">
   
   <div style="overflow-x:auto;">
<?php
include_once 'db.php';
$Username=$_SESSION['username'];
$sql="SELECT `Leave`.LeaveID,Employee.Username,Employee.Name,Employee.Surname FROM `Leave` INNER JOIN Employee ON (`Leave`.Username=Employee.Username) WHERE `Leave`.FromDate <= curdate() AND `Leave`.ToDate >= curdate() AND `Leave`.State='A' AND Employee.UsernameManager LIKE '$Username'";
$leaveSql=mysqli_query($conn,$sql);
if(!($leaveSql)){
	echo "Errormessage" . mysqli_error($conn) . "!!!";
	exit();
}else{
$sqlClockedIn="SELECT AttendanceTime.*,Employee.Name,Employee.Surname,Employee.ID FROM (SELECT MAX(AttendanceTime.ClockIn) AS ClockInMax,AttendanceTime.Date,AttendanceTime.Username FROM AttendanceTime WHERE AttendanceTime.Date = curdate() GROUP BY AttendanceTime.Date,AttendanceTime.Username) AS A INNER JOIN AttendanceTime ON (A.Date=AttendanceTime.Date AND A.ClockInMax=AttendanceTime.ClockIn AND A.Username=AttendanceTime.Username) INNER JOIN Employee ON Employee.Username=A.Username WHERE Employee.UsernameManager LIKE '$Username'";
$conClockedIn=mysqli_query($conn,$sqlClockedIn);
if(!$conClockedIn){
	echo '<script type="text/javascript">
	window.alert("ERROR CONNECTION WITH DATABASE2");
	window.location.replace("employee_status_manager.php");
	</script>';
	exit();
}else{?>
<table style="width:100%" name="table" id="table"> 
<tr> 
      <th>Username</th> 
      <th>First Name</th>  
      <th>Last Name</th>  
      <th>Status</th>  
      <th>Time in</th>  
      
     </tr> 
<?php	
	while($row = mysqli_fetch_array($conClockedIn)){
		$flag=false;
		while($rowLeave=mysqli_fetch_array($leaveSql)){
			if(strcmp($row['Username'],$rowLeave['Username']) == 0){
				echo "<tr>";
				echo "<td>" . $rowLeave['Username'] . "</td>";
				echo "<td>" . $rowLeave['Name'] . "</td>";
				echo "<td>" . $rowLeave['Surname'] . "</td>";
				echo "<td>Leave</td>";
				echo "<td>-</td>";
				echo "</tr>";
				$flag=true;
				break;
			}
		}
		if(!($flag)){
		if(is_null($row['ClockOut']) && is_null($row['Break']) && is_null($row['ReturnBreak'])){
		echo "<tr>";
		echo "<td>" . $row['Username'] . "</td>";
		echo "<td>" . $row['Name'] . "</td>";
		echo "<td>" . $row['Surname'] . "</td>";
		echo "<td>Clocked in</td>";
		echo "<td>" . $row['ClockIn'] . "</td>";
		echo "</tr>";
		}elseif(!is_null($row['ClockOut']) && is_null($row['Break']) && is_null($row['ReturnBreak'])){
		echo "<tr>";
		echo "<td>" . $row['Username'] . "</td>";
		echo "<td>" . $row['Name'] . "</td>";
		echo "<td>" . $row['Surname'] . "</td>";
		echo "<td>Clocked out</td>";
		echo "<td>-</td>";
		echo "</tr>";
		}elseif(is_null($row['ClockOut']) && !is_null($row['Break']) && is_null($row['ReturnBreak'])){
		echo "<tr>";
		echo "<td>" . $row['Username'] . "</td>";
		echo "<td>" . $row['Name'] . "</td>";
		echo "<td>" . $row['Surname'] . "</td>";
		echo "<td>On Break</td>";
		echo "<td>" . $row['ClockIn'] . "</td>";
		echo "</tr>";
		}elseif(is_null($row['ClockOut']) && !is_null($row['Break']) && !is_null($row['ReturnBreak'])){
			if($row['Break'] > $row['ReturnBreak']){
					echo "<tr>";
					echo "<td>" . $row['Username'] . "</td>";
					echo "<td>" . $row['Name'] . "</td>";
					echo "<td>" . $row['Surname'] . "</td>";
					echo "<td>On Break</td>";
					echo "<td>" . $row['ClockIn'] . "</td>";
					echo "</tr>";
			}elseif($row['Break'] < $row['ReturnBreak']){
					echo "<tr>";
					echo "<td>" . $row['Username'] . "</td>";
					echo "<td>" . $row['Name'] . "</td>";
					echo "<td>" . $row['Surname'] . "</td>";
					echo "<td>Returned from break</td>";
					echo "<td>" . $row['ClockIn'] . "</td>";
					echo "</tr>";
			}else{
				echo "Something went wrong";
			}
		}elseif(!is_null($row['ClockOut']) && !is_null($row['Break']) && !is_null($row['ReturnBreak'])){
			if($row['ClockOut']>$row['Break'] && $row['ClockOut']>$row['ReturnBreak']){
				    echo "<tr>";
					echo "<td>" . $row['Username'] . "</td>";
					echo "<td>" . $row['Name'] . "</td>";
					echo "<td>" . $row['Surname'] . "</td>";
					echo "<td>Clocked out</td>";
					echo "<td>-</td>";
					echo "</tr>";
			}elseif($row['Break']>$row['ClockOut'] && $row['Break']>$row['ReturnBreak']){
				    echo "<tr>";
					echo "<td>" . $row['Username'] . "</td>";
					echo "<td>" . $row['Name'] . "</td>";
					echo "<td>" . $row['Surname'] . "</td>";
					echo "<td>On Break</td>";
					echo "<td>" . $row['ClockIn'] . "</td>";
					echo "</tr>";
			}elseif($row['ReturnBreak']>$row['ClockOut'] && $row['ReturnBreak']>$row['Break'] ){
				    echo "<tr>";
					echo "<td>" . $row['Username'] . "</td>";
					echo "<td>" . $row['Name'] . "</td>";
					echo "<td>" . $row['Surname'] . "</td>";
					echo "<td>Returned from break</td>";
					echo "<td>" . $row['ClockIn'] . "</td>";
					echo "</tr>";
			}else{
				echo "Something went wrong";
			}
		}else{
			echo "Something went wrong";
		}
		}
	}	
}
}
?>
   </table>  
   </div>
   </form>
  </div>
     
    </body> 
</html> 
