<?php 
session_start();
include ('db.php');
include('update_profile_manager.php'); 
$_SESSION['flag_clicked']=false;
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

    <!-- Bootstrap CSS -->
	<style>
	.parent {
	   margin-top: 0%;
	   margin-left: 59px;
	   display:inline-block;
	}

	.right {
	  position: absolute;
	  top: 240px;
      left: 165px;
	}

	.right1 {
	  position: absolute;
	  top: 260px;
 	  left: 165px;
	}
	 
	.right2 {
	  position: absolute;
	  top: 280px;
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
		top: 215%;
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
		top: 215%;
		vertical-align: bottom;
		display: table-cell;
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
	   
		body{
			height:100%;
		   width:100%;
		   background-image:url("statare3.jpg");  
		   background-repeat:no-repeat;  
		   background-size:cover;   
		   filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='statare3.jpg',sizingMethod='scale');
		   -ms-filter:"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='statare3.jpg',sizingMethod='scale')";
		}	

	    .error{
			color:red;
			position:absolute;
		}
		
		.confirm_box {
		  position:fixed;
		  top:0;
		  left:0;
		  width:100%;
		  height:100%;
		}
		.confirm_box .overlay {
		  background:rgba(0,0,0,0.5);
		  position:absolute;
		  z-index:9;
		  top:0;
		  left:0;
		  height:100%;
		  width:100%;
		}
		.confirm_box .confirm_model {
		  position:absolute;
		  width:100%;
		  height:100%;
		  left:0;
		  top:0;
		  z-index:10;
		  overflow:hidden;
		}
		.confirm_box .confirm_model .model {
		  background:#fff;
		  width: 400px;
		  border-radius:4px;
		  margin:40px auto;
		  overflow:hidden;
		}
		.confirm_box .confirm_model .model .header{
		  float:left;
		  width:100%;
		  background:#f8f8f8;
		  border-bottom:solid 2px #ccc;
		  padding:10px;
		  box-sizing:border-box;
		}
		.confirm_box .confirm_model .model .header h1{
		  font-size:14px !important;
		  font-family:helvetica;
		  color:#555;
		  font-weight:300;
		}
		.confirm_box .confirm_model .model .content {
		  padding:10px 20px;
		  float:left;
		  width:100%;
		  box-sizing:border-box;
		}
		.confirm_box .confirm_model .model .content p{
		  font-size:12px !important;
		  font-family:helvetica;
		  color:#555;
		  font-weight:300;
		}
		.confirm_box .confirm_model .model .content .buttons_container {
		  float:left;
		  width:100%;
		  padding:10px;
		  text-align:right;
		}
		.confirm_box .confirm_model .model .content .buttons_container .button{
		  float:right;
		  padding:5px 20px;
		  border:none;
		  margin:0 10px;
		  border-radius:3px;
		  border-bottom:solid 2px transparent;
		  cursor:pointer;
		}
		.confirm_box .confirm_model .model .content .buttons_container .button:hover {
		  border-bottom:solid 2px rgba(0,0,0,0.4);
		}
		.confirm_box .confirm_model .model .content .buttons_container .button.confirm {
		  background: #31333F; 
		  color:#fff;
		}
		.confirm_box .confirm_model .model .content .buttons_container .button.deny {
		  background:#a30;
		  color:#fff;
		}
		
	   
	</Style>
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
		<li><a href="edit_profile_manager.php"  style="color:orange;text-decoration: underline">Profile</a></li>
		<li><a href="view_hours_manager.php">View Hours</a></li>
		<li><a href="leave_request_manager.html" >Leave Request</a></li> 
		<li><a href="average_per_week.html">Average Report</a></li>
		<li><a href="ip_range.html">Location Request</a></li>
		<li><a href="payroll_report.html">Payroll Report</a></li>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn">My Employees</a>
			<div class="dropdown-content">
				<a href="add_employee.php">Add Employee</a>
				<a href="choose_employee.html">Edit Employee</a>
				<a href="delete_employee.html">Delete Employee</a>
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
	 
	  <h1 style="text-align:center"><b>Edit Profile</b></h1>
      <Img class="parent" src = "https://www.buira.org/assets/images/shared/default-profile.png" alt = "this image shows employee's photo" height = "100" width = "100"  >  
	  <br>
	  <br>		


	<form method="post" class="username" name="form_id" id="form_id" action="<?php $_SERVER['PHP_SELF']; ?>">
	

	  		<?php 
		include_once 'db.php'; 
 		$Username=$_SESSION['username'];
		
		
		$sql = "SELECT  Username, ID, Name, Surname, Password, Birthdate, Gender, Address, Country, Phone, EmergencyPhone, Role, Salary, SalaryType, SSN, Email FROM Employee WHERE Username LIKE '$Username' ";
		/*NumDept, Department.NameDept, Department.NumDept FROM Employee, Department WHERE Username LIKE '$Username'  AND Department.NumDept = Employee.NumDept";
*/		$sqlD = "SELECT  Username, NumDept, CountryNumber, Department.NameDept, Department.CountryNum, Department.NumberDept, CorporateHeadquarter.CountryNum, CorporateHeadquarter.Name FROM Employee, Department, CorporateHeadquarter WHERE Department.NumberDept = Employee.NumDept && Department.CountryNum = CorporateHeadquarter.CountryNum && Department.CountryNum = Employee.CountryNumber && Username LIKE '$Username' ";

        $result = mysqli_query($conn, $sql);
		$resultD = mysqli_query($conn, $sqlD);
		
		
		if(!$result){
			echo '<script type="text/javascript">
				window.alert("ERROR CONNECTION WITH DATABASE");
				</script>';
			exit();
		}else{
			if($row = mysqli_fetch_array($result)){	
				$field1 = $Username;

			}
		}
		if(!$resultD){
			echo '<script type="text/javascript">
				window.alert("ERROR CONNECTION WITH DATABASE");
				</script>';
			exit();
		}else{
			if($row1 = mysqli_fetch_array($resultD)){	
				

			}
		}		

		
		?>
	
	  <label class="right"><b><?php echo $field1; ?></b> </label><br>
	  <label class="right1"><b><?php echo $row['Role']; ?></b></label>
	  <label class="right2"><b><?php echo  $row1['NameDept'];?></b></label>
	  <div style="margin-left:59px">
	  <div style="margin-left:59px">
	 
 	  <label><b><label style="color:red">*</label>Username : </b></label> 
	  <input style="margin-left:116px" name="Username" id="Username" value="<?php echo $field1; ?>" type="text" readonly>
	  <label style="margin-left:56px"><b><label style="color:red">*</label>Password : </b></label> 
	  <input style="margin-left:116px" name="word" id="Password" value="******" type="password" >
	  <br>
	  
<!--	  <span style="margin-left:715px" class="error"><?php echo "$password_error"; ?></span>
	 --> 
	  <br>
	  <br>	
	  
 	  <label><b><label style="color:red">*</label>ID : </b></label> 
	  <input style="margin-left:174px" name="ID" id="ID" value="<?php echo $row['ID']; ?>" type="text" readonly>
	  <label style="margin-left:56px"><b><label style="color:red">*</label>SSN : </b></label> 
	  <input style="margin-left:156px" name="SSN" id="SSN" value="<?php echo $row['SSN']; ?>" type="text" readonly>
	  <br>

	  <br>
	  <br>
	  
	  <label><b><label style="color:red">*</label>First Name : </b></label> 
	  <input style="margin-left:110px" name="FirstName" id="FirstName" value="<?php echo $row['Name']; ?>" type="text">
	  <label style="margin-left:56px"><b><label style="color:red">*</label>Last Name : </b></label> 
	  <input style="margin-left:112px" name="LastName" id="LastName" value="<?php echo $row['Surname']; ?>" type="text">
	  <br>
	  <span style="margin-left:214px" class="error"><?php echo "$first_name_error"; ?></span>
	  <span style="margin-left:715px" class="error"><?php echo "$last_name_error"; ?></span> 
	  <br>
	  <br>
	 
	  <label><b><label style="color:red">*</label>Department : </b></label>
      <input style="margin-left:102px" name="DepartmentNum" id="DepartmentNum" value="<?php echo  $row1['NameDept'];?>" type="text" readonly>	
	  <label style="margin-left:56px"><b><label style="color:red">*</label>Role : </b></label> 
	  <input style="margin-left:155px" name="Role" id="Role" value="<?php echo $row['Role']; ?>" type="text" readonly>
	   <br>
	  
	  <br>
	  <br>
	 
	  <label><b><label style="color:red">*</label>Working Country : </b></label>
      <input style="margin-left:64px" name="CountryNumber" id="CountryNumber" value="<?php echo $row1['Name']; ?>" type="text" readonly>
	  <br>

	  <br>
	  <br>
	  
	  <label><b><label style="color:red">*</label>Salary : </b></label> 
	  <input style="margin-left:150px" name="Salary" id="Salary" type="text" value="<?php echo $row['Salary']; ?>" readonly>
	  <label style="margin-left:56px"><b><label style="color:red">*</label>Salary Type : </b></label>
      <input style="margin-left:100px" name="SalaryType" id="SalaryType" type="text" value="<?php if ($row['SalaryType'] == 'F'){echo Fixed; }else{ if($row['SalaryType'] == 'FO'){echo Fixed_with_Overtime; } else {echo Part_time;}} ?>" readonly>
	  <br>

	  <br>
	  <br>
	   
	  <label><b><label style="color:red">*</label>Phone : </b></label> 
	  <input style="margin-left:150px" name="Phone" id="Phone" value="<?php echo $row['Phone']; ?>" type="text">
	  <label style="margin-left:56px"><b><label style="color:red">*</label>Emergency Phone : </b></label> 
	  <input style="margin-left:50px" name="EmergencyPhone" id="EmergencyPhone" value="<?php echo $row['EmergencyPhone']; ?>" type="text">
	  <br>
	  <span style="margin-left:214px" class="error"><?php echo "$phone_error"; ?></span>
	  <span style="margin-left:715px" class="error"><?php echo "$emergency_phone_error"; ?></span>
	  
	  <br>
	  <br>
	  
	  <label><b><label style="color:red">*</label>Email: </b></label> 
	  <input style="margin-left:162px" name="Email" id="Email" value="<?php echo $row['Email']; ?>" type="text" readonly>
	  <br>
	
	  
	  <br>
	  <br>
	
	  <label><b>Country : </b></label> 
	  <input style="margin-left:144px" name="Country" id="Country" value="<?php echo $row['Country']; ?>" type="text">
	  <label style="margin-left:56px"><b>Address : </b></label> 
	  <input style="margin-left:131px" name="Address" id="Address" value="<?php echo $row['Address']; ?>" type="text">
	  <br>
	  <span style="margin-left:214px" class="error"><?php echo "$country_error"; ?></span>
	  <span style="margin-left:715px" class="error"><?php echo "$address_error"; ?></span>
	 
	  <br>
	  <br>
	   
	  <label><b><label style="color:red">*</label>Date of Birth : </b></label> 
	  <input style="margin-left:100px" name="DateofBirth" id="DateofBirth" value="<?php echo $row['Birthdate']; ?>" type="text" readonly>
	  <br>
	  
	  <br>
	  <br>
 
	  <label><b>Gender : </b></label>
   <!--       <input style="margin-left:143px" name="Gender" id="Gender" value="<?php if ($row['Gender'] == 'F'){echo Female; }else{echo Male; } ?>" readonly>
	-->
          <select style="margin-left:143px" name="Gender" id="Gender" >
	  <!--<option value="<?//php if (strcmp($row['Gender'],"F")){echo "Female"; }else{echo "Male"; } ?>"></option>
	  <option value="Female">Female</option>
	  <option value="Other">Other...</option>-->
	    
	  <?php
	  if(strcmp($row['Gender'],"F")){
		  echo "<option value='Female'>Female</option>";
		  echo "<option value='Male'>Male</option>";
		  echo "<option value='Other...'>Other...</option>";
	  }else if(strcmp($row['Gender'],"M")){
		  echo "<option value='Male'>Male</option>";
		  echo "<option value='Female'>Female</option>";
		  echo "<option value='Other...'>Other...</option>";
	  }else {
		  echo "<option value='Other...'>Other...</option>";
		  echo "<option value='Male'>Male</option>";
		  echo "<option value='Female' >Female</option>";
	  }
	  
        ?>
		</select> 
          <br>
          <br>
	  <button onclick="myFunction1()" class="save_style" name="save">Save</button>
	  <button onclick="myFunction2()" class="cancel_style" name="cancel">Cancel</button>
	  

		
     </div>
    </div>	


	</form>
	
<div  id="welcomeDiv" style="display:none" class="confirm_box">
  <div class="overlay"></div>
   <div class="confirm_model">
     <div class="model">
	 <div class="header">
         <h1 class="title">
           Do you want to save the changes you made?
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

	
	<script>
/*	function myFunction() {
		var old = prompt("Please enter your password:");
		while (old == null || old == "") {
			alert("Please try again!");
			var old = prompt("Please enter your password:");
		} 
		<?php
		include_once 'db.php';
		include('password.php');
 		$Username=$_SESSION['username'];
		$Password=$_POST['old'];
		
		$sql="SELECT Username, Password FROM Employee WHERE Username LIKE '$Username' ";
		$result = mysqli_query($conn, $sql);
		$row=mysqli_fetch_array($result);
		
		if ($Password == null)  {  ?>
			alert("Yes");
			
			
<?php	  	}  
		
		?> 
	//	alert("Good");
	}  */
$("#save").click(function ( event ) { 
    event.preventDefault();
	document.getElementById('welcomeDiv').style.display = "block";
	$("#yes").click(function ( event ) { 
		document.getElementById('welcomeDiv').style.display = "none";
		document.getElementById('form_id').submit();
	});
	$("#no").click(function ( event ) { 
		document.getElementById('welcomeDiv').style.display = "none";
		window.location.replace("manager_dashboard.html");
	});
});

$("#cancel").click(function ( event ) { 
    event.preventDefault();
	document.getElementById('welcomeDiv').style.display = "block";
	$("#yes").click(function ( event ) { 
		document.getElementById('welcomeDiv').style.display = "none";
	    window.location.replace("manager_dashboard.html");
	});
	$("#no").click(function ( event ) { 
		document.getElementById('welcomeDiv').style.display = "none";
		document.getElementById('form_id').submit();
	});
});

		function myFunction4() {
        document.getElementById("form_id4").submit();
        }
	
	</script>
  </body>
</html>
