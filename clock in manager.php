<!doctype html>
<html lang="eng">
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
	  
			.logo{
				   margin-top: 1.6%;
				   margin-bottom: 0.1%;
				   margin-left: 1.3%;
				   display:inline-block;
			}
		
		.form-horizontal {
			text-align: center;
		}
				
		.col-md-1{
			text-align: center;			
		}	
		
		.clockbutton{
			text-align: center;
			font-size: 24pt;
			width: 300px;
			background-color: #31333F;
			font-family: sans-serif, Arial;
			color: white;
			margin-left:525px;
		}
		
		.timer{
			text-align: center;
			font-family: sans-serif, Arial;
			font-size: 45pt;
		}
		
		.date{
			text-align: center;
			font-family: sans-serif, Arial;
			font-size: 20pt;
		}
		
		.nav{
			 position: absolute;
			 top: 9%;
			 left: 8%;
			 font-weight: bold;
		}
		
		.buttondropdown{
			font-family: sans-serif, Arial; 
			float: right; 
			padding: 0px;
		}
		li {
			float: left;
		}

		li a, .dropbtn {
			display: inline-block;
			color: white;
			text-align: center;
			padding: 14px 16px;
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
	   
		.logout{
			position:absolute;
			color: orange;
			left: 94.5%;
			bottom:96%;
			 font-size: 14pt;
			 font-family:sans-serif, Arial;
			 text-decoration:none; 
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
	
		<label ><a href="Login_Manager.php" class="logout"><b>Log out</b></a></label>
	 
		<div class="logo">
		<a href="clock in manager.html">
			<img src="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png" width="100" height="100"> 
		</a>
	
	<ul>
		<label class="nav" >
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
  
		<h1 align="center"><b>Clock in</b></h1>
	  
	<br />
	<div class="date">
		<div id="date" >28/11/2017</div>
	</div>
	
	<div class="timer">
		<div id="timer" >00:00:00</div>
		
		
		<?php

// current time
echo date('h:i:s') . "\n";

// sleep for 10 seconds
sleep(10);

// wake up !
echo date('h:i:s') . "\n";

?>
		
		
	</div>
	<p />
	<p />	
	
	<form action="Confirmation_clockin_manager.html">
	
		<button id="ClockInButton"class="clockbutton">Clock in</button><p />
		
	</form>
	<form action="Confirmation_clockout_manager.html">
	<button id="ClockInButton"class="clockbutton">Clock out</button><p />
	</form>
	<form action="Confirmation_break_manager.html">
	<button id="ClockInButton"class="clockbutton">Break</button><p />
	</form>
	<button id="ReturnFromBreak"class="clockbutton">Return from Break</button><p />
	<form action="ManagerDS_css.html">
	<button id="DashBoard"class="clockbutton">Log on to Dashboard</button><p />
	</form>
	
	</body>
	</div>	
</html>
