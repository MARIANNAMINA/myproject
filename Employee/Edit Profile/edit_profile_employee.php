<?php 
/*
 *	Edit profile functionality gives to employee the opportunity to process his/her personal information.
 *  So employee can edit his/her password, phone, emergency phone, country, address and gender and
 *  he/she can see his/her username, ID, SSN, first and last name, role, department, number of annual   
 *  leave, working country, salary and salary type, email and date of birth.
 */
session_start();
// include php file that contains the connection with database
include ('db.php');
// include php file that contains the main functionality of edit profile employee
include('update_profile_employee.php'); 

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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="edit_profile_employee.css">
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    </head>
    <body>
	   <!-- Header -->
		<div class="header"> 
			<!-- Logout button-->
			<form action="logout_employee.php" method="post" id="logout_button">	 	
				<button onclick="logout_function()" name="LogOutButton" id="LogOutButton" class="logout">LogOut</button>
			</form>  
		
			<!-- Statare image -->	
			<div class="logo">
				<a href="EmployeeDashboard.html">
					<img src="statare.png" alt="Statare logo" width="50%" height="50%">
				</a>
			
				<!-- Menu -->
				<ul>
					<label class="nav">
					<li><a href="EmployeeDashboard.html">Home</a></li>
					<li><a href="edit_profile_employee.php"  style="color:orange;text-decoration: underline">Profile</a></li>
					<li><a href="view_hours_employee.php">View Hours</a></li>	
					<li><a href="employee_view_request.php" >View Requests</a></li> 
					<li><a href="leave_request_employee.php">Leave Request</a></li>
					<li class="dropdown">
						<a href="javascript:void(0)" class="dropbtn">Language</a>
						<div class="dropdown-content">
							<a href="#">Ελληνικά</a>
							<a href="#">English</a>
							
						</div>
					</li>
					</label>
				</ul>
			</div>
		</div>
	 
	<!-- Title --> 	 
	<div class="title">
		<p><b>Edit Profile</b></p>
    </div>

	<form method="post" class="margin_label" name="form_id" id="form_id" action="<?php $_SERVER['PHP_SELF']; ?>">
	
		<!-- PHP code -->
	  	<?php 
			include_once 'db.php'; 
			$Username=$_SESSION['username'];
			$Password=$_SESSION['password'];
			
			/* get data of the selected employee to show them in the screen */
			$sql_select = "SELECT  Username, ID, Name, Surname, Password, Birthdate, Gender, Address, Country, Phone, EmergencyPhone, Role, Salary, SalaryType, SSN, Email, AnnualLeaves, CharactersPassword FROM Employee WHERE Username LIKE '$Username' ";
			
			/* get data of the selected employee related to Department table to show them in the screen*/
			$sql_depart = "SELECT  Username, NumDept, CountryNumber, Department.NameDept, Department.CountryNum, Department.NumberDept, CorporateHeadquarter.CountryNum, CorporateHeadquarter.Name FROM Employee, Department, CorporateHeadquarter WHERE Department.NumberDept = Employee.NumDept && Department.CountryNum = CorporateHeadquarter.CountryNum && Department.CountryNum = Employee.CountryNumber && Username LIKE '$Username' ";

			$result_select = mysqli_query($conn, $sql_select);
			$result_depart = mysqli_query($conn, $sql_depart);
			
			if(!$result_select){
				echo '<script type="text/javascript">
					window.alert("ERROR CONNECTION WITH DATABASE");
					</script>';
				exit();
			}else{
				if($row = mysqli_fetch_array($result_select)){	
					$Gender = $row['Gender'];
					$Char_password = $row['CharactersPassword'];
					$Role = $row['Role'];
					$ID = $row['ID'];
					$SSN = $row['SSN'];
					$Name = $row['Name'];
					$Surname = $row['Surname'];
					$Salary = $row['Salary'];
					$Salary_Type = $row['SalaryType'];
					$Annual_Leaves = $row['AnnualLeaves'];
					$Phone = $row['Phone'];
					$Emergency_Phone = $row['EmergencyPhone'];
					$Email = $row['Email'];
					$Country = $row['Country'];
					$Address = $row['Address'];
					$Birthdate = $row['Birthdate'];
				}
			}	
			if(!$result_depart){
				echo '<script type="text/javascript">
					window.alert("ERROR CONNECTION WITH DATABASE");
					</script>';
				exit();
			}else{
				if($row1 = mysqli_fetch_array($result_depart)){	
					 $Dept_Name = $row1['NameDept'];
					 $Working_Country = $row1['Name'];
				}
			}		
		
		?>	  
	  
	<!-- Start of container -->	
	<div class="container">
		<!-- Start of profile section -->
		<div class="profile">
			<!-- Profile image -->
			<div class="profile-image">
				<img src="https://www.buira.org/assets/images/shared/default-profile.png" alt = "this image shows employee's photo" width="60%" height="60%">
			</div>
			<!-- Username of Employee -->
			<div class="profile_user_name">
				<label class="profile-user-name"><b><?php echo $Username; ?></b> </label>	
			</div>
			<!-- Role of Employee -->
			<div class="profile_role">
				<label class="profile-role"><b><?php echo $Role; ?></b></label>
			</div>
			<!-- Department of Employee -->
			<div class="profile_department_name">
				<label class="profile-department-name"><b><?php echo $Dept_Name; ?></b></label>
			</div>
		</div>
		<!-- End of profile section -->
	</div>
	<!-- End of container -->
	
	  <br>
	  <br>
	  
	  <!-- Username & Password fields -->
 	  <label><b><label style="color:red">*</label>Username : </b></label> 
	  <input class="input_username" name="Username" id="Username" type="text" value="<?php echo $Username; ?>" readonly>
	  <label class="sec_column"><b><label style="color:red">*</label>Password : </b></label> 
	  <input class="input_password" name="word" id="Password" type="password" 
		value="<?php
					for($x=0; $x < $Char_password; $x++){
						echo "*"; 
					} 
				?>">
	  <br>
	  
	  <span class="span_scolumn" style="color:red"><?php echo "$password_error"; ?></span>
	  
	  <br>
	  <br>	
	  
	  <!-- ID & SSN fields -->
 	  <label><b><label style="color:red">*</label>ID : </b></label> 
	  <input class="input_id" name="ID" id="ID" type="text" value="<?php echo $ID; ?>" readonly>
	  <label class="sec_column"><b><label style="color:red">*</label>SSN : </b></label> 
	  <input class="input_ssn" name="SSN" id="SSN" type="text" value="<?php echo $SSN; ?>" readonly>
	  <br>
	  <br>
	  <br>
	  
	  <!-- First Name & Last Name fields -->
	  <label><b><label style="color:red">*</label>First Name : </b></label> 
	  <input class="input_first_name" name="FirstName" id="FirstName" type="text" value="<?php echo $Name; ?>"readonly>
	  <label class="sec_column"><b><label style="color:red">*</label>Last Name : </b></label> 
	  <input class="input_last_name" name="LastName" id="LastName" type="text" value="<?php echo $Surname; ?>" readonly>
	  <br>
	  <br>
	  <br>
	 	
	  <!-- Role & Department fields -->	
	  <label><b><label style="color:red">*</label>Role : </b></label> 
	  <input class="input_role" name="Role" id="Role" type="text" value="<?php echo $Role; ?>" readonly>
	  <label class="sec_column"><b><label style="color:red">*</label>Department : </b></label>
      <input class="input_dept" name="DepartmentNum" id="DepartmentNum" type="text" value="<?php echo $Dept_Name; ?>" readonly>
	  <br>
	  <br>
	  <br>
	 
	  <!-- Annual Leaves & Working Country fields -->
	  <label><b><label style="color:red">*</label>Annual Leaves : </b></label>
      <input class="input_leaves" name="Leaves" id="Leaves" type="text" value="<?php echo $Annual_Leaves; ?>" readonly>
	  <label class="sec_column"><b><label style="color:red">*</label>Working Country : </b></label>
      <input class="input_workCountry" name="CountryNumber" id="CountryNumber" type="text" value="<?php echo $Working_Country; ?>" readonly>
      <br>
      <br>
      <br>
	  
	  <!-- Salary & Salary Type fields -->
	  <label><b><label style="color:red">*</label>Salary : </b></label> 
	  <input class="input_salary" name="Salary" id="Salary" type="text" value="<?php echo $Salary; ?>" readonly>
	  <label class="sec_column"><b><label style="color:red">*</label>Salary Type : </b></label>
      <input class="input_salaryType" name="SalaryType" id="SalaryType" type="text" value="<?php if ($Salary_Type == 'F'){echo Fixed; }else{ if($Salary_Type == 'FO'){echo Fixed_with_Overtime; } else {echo Part_time;}} ?>" readonly>
	  <br>
	  <br>
	  <br>
	   
	  <!-- Phone & Emergency Phone fields --> 
	  <label><b><label style="color:red">*</label>Phone : </b></label> 
	  <input class="input_phone" name="Phone" id="Phone" value="<?php echo $Phone; ?>" type="text">
	  <label class="sec_column"><b><label style="color:red">*</label>Emergency Phone : </b></label> 
	  <input class="input_em_phone" name="EmergencyPhone" id="EmergencyPhone" value="<?php echo $Emergency_Phone; ?>" type="text">
	  <br>
	  
	  <span class="span_fcolumn" style="color:red"><?php echo "$phone_error"; ?></span>
	  <span class="span_scolumn" style="color:red"><?php echo "$emergency_phone_error"; ?></span>
	  
	  <br>
	  <br>
	  
	  <!-- Email field -->
	  <label><b><label style="color:red">*</label>Email : </b></label> 
	  <input class="input_email" name="Email" id="Email" type="text" value="<?php echo $Email; ?>" readonly>
	  <br>
	  <br>
	  <br>
	
	  <!-- Country & Address fields -->
	  <label><b>Country : </b></label> 
	  <input class="input_country" name="Country" id="Country" value="<?php echo $Country; ?>" type="text">
	  <label class="sec_column"><b>Address : </b></label> 
	  <input class="input_address" name="Address" id="Address" value="<?php echo $Address; ?>" type="text">
	  <br>
	  
	  <span class="span_fcolumn" style="color:red"><?php echo "$country_error"; ?></span>
	  <span class="span_scolumn" style="color:red"><?php echo "$address_error"; ?></span>
	 
	  <br>
	  <br>
	  
	  <!-- Date of Birth field --> 	
	  <label><b><label style="color:red">*</label>Date of Birth : </b></label> 
	  <input class="input_date" name="DateofBirth" id="DateofBirth" type="text" value="<?php echo $Birthdate; ?>" readonly>  
	  <br>
	  <br>
	  <br>
 
	  <!-- Gender field -->	
	  <label><b>Gender : </b></label>
	  
	  <!-- PHP code -->
	   <?php 
			$Female = "F";
			$Male = "M";
			$Other = "O";
			
			/* create a dropdown list of gender typs and make the selected option be the gender type of the selected employee where at this case is Female */
			if (strcmp($Gender, $Female) == 0){
				echo "<select class='sel_gender' name='G1' id='G1'>
				   <option value='F' selected='selected'>Female</option>
				   <option value='M'>Male</option>
				   <option value='O'>Other..</option>
				   </select>";
				$_SESSION['OldGender'] = "F";
			/* create a dropdown list of gender typs and make the selected option be the gender type of the selected employee where at this case is Male */  
			} else if (strcmp($Gender, $Male) == 0) {
				echo "<select  class='sel_gender' name='G2' id='G2'>
					<option value='F'>Female</option>
					<option value='M' selected='selected'>Male</option>
					<option value='O'>Other..</option>
					</select>";
				$_SESSION['OldGender'] = "M";
			/* create a dropdown list of gender typs and make the selected option be the gender type of the selected employee where at this case is Other */
			} else if (strcmp($Gender, $Other) == 0) {
				echo "<select  class='sel_gender' name='G3' id='G3'>
					<option value='F'>Female</option>
					<option value='M' >Male</option>
					<option value='O' selected='selected'>Other..</option>
					</select>";
				$_SESSION['OldGender'] = "O";
			}
        ?>	
		
          <br>
          <br>
		  
		<!-- Cancel & OK buttons -->    
        <button class="cancel_style" name="cancel" id="cancel">Cancel</button>
        <button class="save_style" name="OK" id="OK">OK</button>
		 
    
	</form>
<!--pop up window -->
<div id="OKDiv" style="display:none" class="confirm_box">
    <div class="overlay"></div>
    <div class="confirm_model">
        <div class="model">
            <div class="header">
                <h1 class="title">
                   Are you sure about your changes?
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

<div id="cancelDiv" style="display:none" class="confirm_box">
    <div class="overlay"></div>
    <div class="confirm_model">
        <div class="model">
            <div class="header">
                <h1 class="title">
                    Do you want to leave this page?
                </h1>
            </div>
            <div class="content">
                <div class="buttons_container">
                    <button class="confirm button" id="yes_cancel" name="yes_cancel">Yes</button>
                    <button class="deny button" id="no_cancel" name="no_cancel">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
	
	<script>
    /*
If save button is clicked, wait for user to click yes or no button of the pop up window. If user click yes
submit form otherwise go to manager_dashboard.html page
 */
    $("#OK").click(function (event) {
        event.preventDefault();
        document.getElementById('OKDiv').style.display = "block";
        $("#yes").click(function (event) {
            document.getElementById('OKDiv').style.display = "none";
            document.getElementById('form_id').submit();
        });
        $("#no").click(function (event) {
            document.getElementById('OKDiv').style.display = "none";
        });
    });

    /*
    If cancel button is clicked, wait for user to click yes or no button of the pop up window. If user click no
    submit form otherwise go to manager_dashboard.html page
    */
    $("#cancel").click(function (event) {
        event.preventDefault();
        document.getElementById('cancelDiv').style.display = "block";
        $("#yes_cancel").click(function (event) {
            document.getElementById('cancelDiv').style.display = "none";
            window.location.replace("manager_dashboard.html");
        });
        $("#no_cancel").click(function (event) {
            document.getElementById('cancelDiv').style.display = "none";
        });
    });

	/*
		Logout function - Exit
	*/
    function logout_function() {
        document.getElementById("logout_button").submit();
    }
	</script>
	</body>
</html>
