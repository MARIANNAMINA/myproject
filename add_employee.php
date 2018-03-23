<?php 
session_start();
include('uptadeadd.php');
?><!doctype html>  
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
    .error{
		color:red;
		position:absolute;
	}
	.paragraph {
		padding: 0px 0px 0px 0px;
	}
	
    .paragraph2 {
     	padding: 0px 0px 0px 600px;
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
	.cancel_style {
	    background-color: #FFFFFF; 
        border: 2px solid #31333F;
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
		top: 220%;
		vertical-align: bottom;
		display: table-cell;
		color: #31333F; 
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
		top: 220%;
		vertical-align: bottom;
		display: table-cell;
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
	input[type=checkbox] {
		transform: scale(1.7);
	}		
	
 </style>
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
		<li><a href="view_hours_manager.html">View Hours</a></li>
		<li><a href="view_schedule_manager.html">View Schedule</a></li>
		<li><a href="leave_request_manager.html" >Leave Request</a></li> 
		<li><a href="average_per_week.html" >Average per week</a></li>
		<li><a href="ip_range.html">Location Request</a></li>
		<li><a href="payroll_report.html">Payroll Report</a></li>
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
	
	<form method="post" class="username" name="form_id" id="form_id" action="<?php $_SERVER['PHP_SELF']; ?>">
 	
	  <div style="margin-left:59px">
	
 	  <label><b>Username : </b></label> 
	  <input style="margin-left:124px" name="Username" id="Username" type="text" value="<?php echo "$Username"; ?>" placeholder="">
	  <label style="margin-left:56px"><b>Password : </b></label> 
	  <input style="margin-left:124px" name="Password" id="Password" value="<?php echo "$Password"; ?>" type="text" placeholder="">
	  <br>
	  <span style="margin-left:214px" class="error"><?php echo "$username_error"; ?></span>
	  <span style="margin-left:715px" class="error"><?php echo "$password_error"; ?></span>
	 
	  <br>
	  <br>	
	  
 	  <label><b>ID : </b></label> 
	  <input style="margin-left:182px" name="ID" id="ID" value="<?php echo "$ID"; ?>" type="text" placeholder="">
	  <label style="margin-left:56px"><b>SSN : </b></label> 
	  <input style="margin-left:166px" name="SSN" id="SSN" value="<?php echo "$SSN"; ?>" type="text" placeholder="">
	  <br>
	  <span style="margin-left:214px" class="error"><?php echo "$id_error"; ?></span>
	  <span style="margin-left:715px" class="error"><?php echo "$ssn_error"; ?></span>

	  <br>
	  <br>
	  
	  <label><b>First Name : </b></label> 
	  <input style="margin-left:116px" name="FirstName" id="FirstName" value="<?php echo "$FN"; ?>" type="text" placeholder="">
	  <label style="margin-left:56px"><b>Last Name : </b></label> 
	  <input style="margin-left:118px" name="LastName" id="LastName" value="<?php echo "$LN"; ?>" type="text" placeholder="">
	  <br>
	  <span style="margin-left:214px" class="error"><?php echo "$name_error"; ?></span>
	  <span style="margin-left:715px" class="error"><?php echo "$last_name_error"; ?></span>
	  
	  <br>
	  <br>
	 
	  <label><b>Department number : </b></label>
      <input style="margin-left:45px" name="DepartmentNum" id="DepartmentNum" value="<?php echo "$DN"; ?>" type="text" placeholder="">	
	  
	  <!--<select style="margin-left:45px" name="dynamicList" id="dynamicList" onclick="myFunction()" form="inner"></select>-->  
	  
	  <label style="margin-left:56px"><b>Role : </b></label> 
	  <input style="margin-left:163px" name="Role" id="Role" value="<?php echo "$Role"; ?>" type="text" placeholder="">
	   <br>
	  <span style="margin-left:214px" class="error"><?php echo "$dept_error"; ?></span>
	  <span style="margin-left:715px" class="error"><?php echo "$role_error"; ?></span>
	  
	  <br>
	  <br>
	 
	  <label><b>Country Number : </b></label>
      <input style="margin-left:73px" name="CountryNumber" id="CountryNumber" value="<?php echo "$CN"; ?>" type="text" placeholder="">
	  <br>
	  <span style="margin-left:214px" class="error"><?php echo "$country_num_error"; ?></span>
	  
	  <br>
	  <br>
	  
	  <label><b>Salary : </b></label> 
	  <input style="margin-left:154px" name="Salary" id="Salary" type="text" value="<?php echo "$S"; ?>" placeholder="">
	  <label style="margin-left:56px"><b>Salary Type : </b></label>
        	 <select style="margin-left:110px" name="SalaryType" id="SalaryType">
                    <option value="Fixed">Fixed</option>
                    <option value="FixedWithOvertime">Fixed With Overtime</option>
	            <option value="PartTime">Part Time</option>
                 </select>
	  <br>
  	  <span style="margin-left:214px" class="error"><?php echo "$salary_error"; ?></span>
	  <br>
	  <br>
	   
	  <label><b>Phone : </b></label> 
	  <input style="margin-left:153px" name="Phone" id="Phone" value="<?php echo "$P"; ?>" type="text" placeholder="">
	  <label style="margin-left:56px"><b>Emergency Phone : </b></label> 
	  <input style="margin-left:60px" name="EmergencyPhone" id="EmergencyPhone" value="<?php echo "$EP"; ?>" type="text" placeholder="">
	  <br>
	  <span style="margin-left:214px" class="error"><?php echo "$phone_error"; ?></span>
	  <span style="margin-left:715px" class="error"><?php echo "$emergency_phone_error"; ?></span>
	  
	  <br>
	  <br>
	  
	  <label><b>Email: </b></label> 
	  <input style="margin-left:164px" name="Email" id="Email" value="<?php echo "$E"; ?>" type="text" placeholder="">
	  <br>
	  <span style="margin-left:214px" class="error"><?php echo "$email_error"; ?></span>
	  
	  <br>
	  <br>
	
	  <label><b>Country : </b></label> 
	  <input style="margin-left:140px" name="Country" id="Country" value="<?php echo "$C"; ?>" type="text" placeholder="">
	  <label style="margin-left:56px"><b>Address : </b></label> 
	  <input style="margin-left:131px" name="Address" id="Address" value="<?php echo "$A"; ?>" type="text" placeholder="">
	  <br>
	  <span style="margin-left:214px" class="error"><?php echo "$country_error"; ?></span>
	  <span style="margin-left:715px" class="error"><?php echo "$address_error"; ?></span>
	 
	  <br>
	  <br>
	   
	  <label><b>Date of Birth : </b></label> 
	  <input style="margin-left:103px" name="DateofBirth" id="DateofBirth" value="<?php echo "$DOB"; ?>" placeholder="YYYY-MM-DD">
	  <br>
	  <span style="margin-left:214px" class="error"><?php echo "$birthdate_error"; ?></span>
	  
	  <br>
	  <br>
 
	  <label><b>Manager : </b></label> 
	  <input style="margin-left:136px" type="checkbox" name="Manager" id="Manager">	
	 
	  <br>
	  <br>
 
	  <label><b>Gender : </b></label>
          <select style="margin-left:143px" name="Gender" id="Gender">
	  <option value="Male">Male</option>
	  <option value="Female">Female</option>
	  </select>
          <br>
          <br>
	  <button onclick="myFunction1()" class="save_style" name="save">Save</button>
	  <button onclick="myFunction2()" class="cancel_style">Cancel</button>
	  
     </div>
    </div>	

	  </form>
	 
	<!--<form method="post" id="inner">
	</form>-->
	  
<script>

	function myFunction1() {
		if(confirm('Do you want to save the changes you made?')){
		document.getElementById("form_id").submit();
		return true;
	}else{
		window.location.replace("manager_dashboard.html")
	}
	}
	
	function myFunction2() {
    if(confirm('Do you want to discard your changes?')){
	window.location.replace("manager_dashboard.html");}
	else {
	window.location.replace("add_employee.php");
	}
	
}
</script>
    </body> 
  </html> 

