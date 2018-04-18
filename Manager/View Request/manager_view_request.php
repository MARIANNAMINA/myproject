<?php session_start();
  
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
  
  <style>
  
			.parent {
			   margin-top: 0%;
			   margin-left: 59px;
			   display:inline-block;
			 }

			 .right {
			  position: absolute;
			  top: 220px;
			  left: 165px;
			 }

			 .right1 {
			  position: absolute;
			  top: 240px;
			  left: 165px;
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
	  
			.nav{
					position: absolute;
					top: 9%;
					left: 8%;
					font-weight: bold;
			}
		
	  .cancel_style {
	    background-color: #DCDCDC; 
        border: 2px solid #DCDCDC;
		box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
        padding: 0.8%;
		border-radius: 8px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
		font-weight: bold;
		position: absolute;
		left: 85%;
		vertical-align: bottom;
		display: table-cell;		
	  } 

       .save_style {
	    background-color: #31333F; 
        border: 2px solid #31333F;
		color: white;
		box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
        padding: 0.8%;
		border-radius: 8px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
		font-weight: bold;
		position: absolute;
        left: 94%;
		vertical-align: bottom;
		display: table-cell;
	  } 
		
      li {
       float: left;
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
	  
	  li.dropdown {
        display: inline-block;
      }
	  
      .dropdown:hover .dropdown-content {
        display: block;
       }
	   
      .dropdown-content a {
        color: white;
        text-decoration: none;
        display: block;
        text-align: left;
      }
	  
	  .dropdown-content {
        display: none;
        position: absolute;
        background-color: #31333F ;
        min-width: 120%;
		padding: 20%;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
      }

       li a,.dropbtn {
        display: inline-block;
        color: white;
        text-align: center;
        text-decoration: none;
		padding: 17px 11px;
       }

       li a:hover, .dropdown:hover .dropbtn {
	    color: orange;
        background-color: transparent;
      }
	  
	  .left_assig {
		margin-left:4;
	   }
	   
        <!--.logout{
			position:absolute;
			color: orange;
			left: 94%;
			bottom:95%;
			font-size: 14pt;
	   }-->
	   
	   	.logout{
			position:center;
			font-size: 16pt;
			background-color: #31333F;
			border: #31333F;
			color: orange;
			
		}
	   label a:hover {
          color: orange;
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
		
		table{
			margin-left: auto;
			margin-right: auto;
			margin-bottom: auto;
			margin-top: auto;
		}
		
		td {
     text-align: center;
     padding: 8px;
	 color:black;
	 background-color:white;
	 border:2px solid #31333F;
  }
 th{
     text-align: center;
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
 
 			.username {
				margin-left: 80px;
				margin-right: 80px;
			}
		
		.paragraph {		 
			padding: 0px 0px 0px 40px;  
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

 </style>
    
     <!-- Bootstrap CSS --> 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> 
    </head>
    
    <body> 	   
	 <div class="header"> 
		<form action="logout_manager.php" method="post" id=form_id4>	 	
			<button onclick="myFunction4()" name="LogOutButton" id="LogOutButton" class="logout">LogOut</button>
	 	</form>  



		<div class="logo">
		<a href="manager_dashboard.html">
			<img src="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png" width="100" height="100"> 
		</a>
		<ul>
		<label class="nav">
		<li><a href="manager_dashboard.html">Home</a></li>		
		<li><a href="edit_profile_manager.html" >Profile</a></li>
		<li><a href="view_hours_manager.html">View Hours</a></li>
		<li><a href="view_schedule_manager.html" >View Schedule</a></li>
		<li><a href="leave_request_manager.html" >Leave Request</a></li> 
		<li><a href="average_per_week.html">Average per week</a></li>
		<li><a href="ip_range.html">Location Request</a></li>
		<li><a href="payroll_report.html">Payroll Report</a></li>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn" style="color:orange;text-decoration: underline">My Employees</a>
			<div class="dropdown-content">
				<a href="add_employee.html">Add Employee</a>
				<a href="employee_status_manager.html">Employee Status</a>
				<a href="manager_view_request.php" style="color:orange;text-decoration: underline">View Requests</a>
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
  
	<h1 align="center"><b>View Requests</b><h1>
	
	<br>
  
    <h4 style="margin-left:80px"><b>Page 1</b></h4>
    <button class="buttonstyle1"> < </button> 
    <button class="buttonstyle2"> > </button> 
   
   <br>
   
   <label style="margin-left:80px"><b> Prev </b></label>
   <label style="margin-left:37px"><b> Next </b></label>
   
  <hr>
  	<!--	<form class="username" action="ipadd.php" method="POST"> -->
   
   <div style="overflow-x:auto;">
   
    <table style="width:97.5%" name="table" id="table""> 
      
     <tr style="text-align:center"> 
     
      <th>Name</th> 
	  <th>Surname</th> 
      <th>From</th>  
      <th>To</th>  
      <th>Reason</th>  
      <th>State</th>  
      
     </tr> 
		<?php 
		include_once 'db.php';
		include('changeState_viewRequest.php');
		$Username=$_SESSION['username'];
		
		
		$sql = "SELECT  `Name`, `Surname`, `FromDate`, `ToDate`,  `Reason`, `Leave`.`State`, `Leave`.`Username`, `Leave`.`LeaveID` FROM `Leave`, `Employee` WHERE `Leave`.`Username`=`Employee`.`Username` AND `Leave`.`Username` IN ( SELECT  `Username` FROM  `Employee` WHERE  `UsernameManager` LIKE  '$Username')";
        $result = mysqli_query($conn, $sql);
		
		
		if(!$result){
			echo $Username;
			echo '<script type="text/javascript">
				window.alert("ERROR CONNECTION WITH DATABASE");
				</script>';
			exit();
		}else{
			?>
			
			<form method="post" id="status" action="<?php $_SERVER['PHP_SELF']; ?>">
			<?php
			
			while($row = mysqli_fetch_array($result)){	
				
				$UsernameEmp = $row['Username'];
				$LeaveID = $row['LeaveID'];
				
				echo "<tr><td>" . $row['Name'] . "</td><td>" . $row['Surname'] . "</td><td>" . $row['FromDate'] . "</td><td>" . $row['ToDate'] . "</td><td>" . $row['Reason'] . "</td>";
				
				?><td>
					
					<select name='selectbasic' class="form-control" id="selectbasic" onchange="myFunction()">
						<option value='Pending' selected="selected">Pending</option>
						<option value='Reject'>Reject</option>
						<option value='Accept'>Accept</option>
					</select>
					</td>
				</tr>
				</form>
				<?php 
					changeState($UsernameEmp, $LeaveID);
			}
		}
	
	?>
			
		
    </table>  
    
   </div>
   <script>
   
   function selevtValue() {
    document.getElementById("mySelect").selectedIndex = ;
}
function myFunction() {
    document.getElementById("status").submit();
}

		
		function myFunction4() {
        document.getElementById("form_id4").submit();
        }
</script>
							
	
   
  </div>
  <!--   </form> -->
    </body> 
  </html> 
