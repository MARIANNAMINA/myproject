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
  
	.parent {
	   margin-top: 0%;
	   margin-left: 59px;
	   display:inline-block;
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
		padding: 14px 16px;
       }

       li a:hover, .dropdown:hover .dropbtn {
	    color: orange;
        background-color: transparent;
      }
	  
	  .left_assig {
		margin-left:4;
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
		<a href="EmployeeDashboard.html">
			<img src="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png" width="100" height="100"> 
		</a>
		<ul>
		<label class="nav">
		<li><a href="EmployeeDashboard.html">Home</a></li>
		<li><a href="edit_profile_employee.html">Profile</a></li>
		<li><a href="view_hours_employee.html">View Hours</a></li>
		<li><a href="view_schedule_employee.html">View Schedule</a></li>
		<li><a href="employee_view_request.php"style="color:orange; text-decoration: underline">View Requests</a></li>
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
    
  
	<h1 align="center"><b>View Requests</b></h1>
	

	<br>
    <br>
    <h4 style="margin-left:80px"><b>Page 1</b></h4>
    <button class="buttonstyle1"> < </button> 
    <button class="buttonstyle2"> > </button> 
   
   <br>
   
   <label style="margin-left:80px"><b>Prev</b></label>
   <label style="margin-left:37px"><b>Next</b></label>
   
    <hr>
 
  <div style="overflow-x:auto;">
 
    <table style="width:97.5%" name="table" id="table"> 
      
     <tr> 
     
      <th>From</th>  
      <th>To</th>  
      <th>Description</th>  
      <th>State</th>  
      
     </tr> 
	<?php 
		include_once 'db.php';
		$Username=$_SESSION['username'];
		
		
		$sql = "SELECT  `FromDate`, `ToDate`,  `Reason`, `State` FROM `Leave` WHERE `Username` LIKE '$Username'";
        $result = mysqli_query($conn, $sql);
		
		
		if(!$result){
			echo '<script type="text/javascript">
				window.alert("ERROR CONNECTION WITH DATABASE");
				</script>';
			exit();
		}else{
		
			while($row = mysqli_fetch_array($result)){ 	
				if ($row['State'] == 'p'){
					echo "<tr><td>" . $row['FromDate'] . "</td><td>" . $row['ToDate'] . "</td><td>" . $row['Reason'] . "</td><td> Pending </td></tr>";
				}else if ($row['State'] == 'a'){
					echo "<tr><td>" . $row['FromDate'] . "</td><td>" . $row['ToDate'] . "</td><td>" . $row['Reason'] . "</td><td> Accepted </td></tr>";
				}else if ($row['State'] == 'r'){
					echo "<tr><td>" . $row['FromDate'] . "</td><td>" . $row['ToDate'] . "</td><td>" . $row['Reason'] . "</td><td> Rejected </td></tr>";
				}
				
			}
		}

	?>
		
    </table>  
    
   </div>
   </div>

    </body> 
  </html> 