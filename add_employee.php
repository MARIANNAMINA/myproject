<!doctype html> 
  <html lang="en"> 
   <link rel="shortcut icon" href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
  <link rel="apple-touch-icon" href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
  <head>
    <head> 
    <title>Statare LTD</title> 
     <!-- Required meta tags --> 
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
  
  <style>
    
	.paragraph {
		padding: 0px 0px 0px 0px;
	}
	
    .paragraph2 {
     	padding: 0px 0px 0px 600px;
	}
  
	.buttonstyle {		  
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

	.buttonstyle1 {			  
		background-color: #ffffff; 
		border: 2px solid #31333F;
		box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
		color: #31333F ;
		padding: 10px 24px;
		border-radius: 3px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 20px;
		font-weight: bold;
	}
    
		.username {
			margin-left: 500px;	
		}

		.textinput1, .textinput2, .textinput3, textinput4, textinput5 {
			font-size:20px;
		}
		#label1, #label2, #label3, #label4, #label5 {
			font-size:20px;
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
	
 </style>
  
  
     <!-- Bootstrap CSS --> 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> 
    </head>
    
    <body> 

	 <div class="header">
	 <label ><a href="login_manager.php" class="logout"><b>Log out</b></a></label>
	 <div class="logo">
		<a href="ManagerDS_css.html">
			<img src="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png" width="100" height="100"> 
		</a>
		<ul>
		<label class="nav">
		<li><a href="ManagerDS_css.html">Home</a></li>		
		<li><a href="EditProfileManager.html" >Profile</a></li>
		<li><a href="view_hours.html">View Hours</a></li>
		<li><a href="view_schedule_manager.html">View Schedule</a></li>
		<li><a href="Leave_Request_Manager.html" >Request For Leave</a></li> 
		<li><a href="AveragerPerWeek_CSS.html" >Average per week</a></li>
		<li><a href="IPrange_css.html">IP Range</a></li>
		<li><a href="Payrol_Report.html">Payroll Report</a></li>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn"style="color:orange;text-decoration: underline">My Employees</a>
			<div class="dropdown-content">
				<a href="add_employee.php" style="color:orange;text-decoration: underline">Add Employee</a>
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
  
		<h1 align = center><b>Add Employee</b><h1>
		
		<br>
 </div>

	<form action="uptadeadd.php" method="post" class="username" >	
	<div>
		<label id="label1" for="textinput"><b>Username : </b></label>
		<input style="margin-left:23px" type="textinput1" name="username" type="text" >
	</div>	
		<br>
		<br>
	<div>	
		<label id="label2" for="textinput"><b>Password : </b></label>
		<input style="margin-left:28px" type="password" name="password" type="text">
	</div>	
		<br>
		<br>
	<div>	
		<label id="label3" for="textinput"> <b>Name : </b></label>
		<input style="margin-left:63px" type="textinput3" name="name" type="text">
	</div>	
		<br>
		<br>
	<div>	
		<label id="label4" for="textinput"> <b>Surname : </b></label>
		<input style="margin-left:39px" type="textinput4" name="surname" type="text">
	</div>	
		<br>
		<br>
	<div>	
		<label id="label5" for="textinput"> <b>Date Of Birth : </b></label>
		<input style="margin-left:0px" type="textinput5" name="birthday" type="text" placeholder="YYYY-MM-DD">
	</div>
	
	<div class="paragraph2">
		<label onclick="myFunction2()" class="buttonstyle1">Cancel</label>
		
		<button onclick="myFunction1()"  type="submit" name="save" class="buttonstyle">Save</button>
	
	</div>
	</form>
	
<script>
		/* {
    if(confirm('Do you want to save the changes you made?')){
	window.alert("Changes were saved");}
	else {window.location.replace("add_employee.html");window.exit();
	}
	}*/
		function myFunction2() {
    if(confirm('Do you want to discard your changes?')){window.location.replace("manager_dashboard.html");}
	else {window.location.replace("add_employee.html");
	}
	
}
	
</script>



    </body> 
  </html> 
  