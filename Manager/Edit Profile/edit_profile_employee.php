<?php 
session_start();
// include php file that contains the connection with database
include ('db.php');
// include php file that contains the main functionality of edit profile employee
include('update_profile_employee.php'); 
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="edit_profile_employee.css">
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    </head>
    <body>
	   
	 <div class="header"> 

		<form action="logout_employee.php" method="post" id=form_id4>	 	
			<button onclick="myFunction4()" name="LogOutButton" id="LogOutButton" class="logout">LogOut</button>
	 	</form>  
    <div class="logo">
        <a href="EmployeeDashboard.html">
            <img src="statare.png" alt="Statare logo" width="50%" height="50%">
        </a>
		<ul>
		<label class="nav">
		<li><a href="EmployeeDashboard.html">Home</a></li>
		<li><a href="edit_profile_employee.php"  style="color:orange;text-decoration: underline">Profile</a></li>
		<li><a href="view_hours_employee.php">View Hours</a></li>	
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
	 
	<div class="title">
		<p><b>Edit Profile</b></p>
    </div>
	
      <Img class="parent" src = "https://www.buira.org/assets/images/shared/default-profile.png" alt = "this image shows employee's photo" height = "100" width = "100"  >  
	  <br>
	  <br>
	<form method="post" class="username" name="form_id" id="form_id" action="<?php $_SERVER['PHP_SELF']; ?>">
	

	  		<?php 
		include_once 'db.php'; 
 		$Username=$_SESSION['username'];
		
		
		$sql = "SELECT  Username, ID, Name, Surname, Password, Birthdate, Gender, Address, Country, Phone, EmergencyPhone, Role, Salary, SalaryType, SSN, Email, AnnualLeaves, CharactersPassword FROM Employee WHERE Username LIKE '$Username' ";
		$sqlD = "SELECT  Username, NumDept, CountryNumber, Department.NameDept, Department.CountryNum, Department.NumberDept, CorporateHeadquarter.CountryNum, CorporateHeadquarter.Name FROM Employee, Department, CorporateHeadquarter WHERE Department.NumberDept = Employee.NumDept && Department.CountryNum = CorporateHeadquarter.CountryNum && Department.CountryNum = Employee.CountryNumber && Username LIKE '$Username' ";

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
				$Gender = $row['Gender'];
				
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
	  
	  <label class="right" ><b><?php echo $field1; ?></b> </label><br>
	  <label class="right1"><b><?php echo $row['Role']; ?></b></label>
	  <label class="right2"><b><?php echo  $row1['NameDept'];?></b></label>
	  <div style="margin-left:59px">
	 
 	  <label><b><label style="color:red">*</label>Username : </b></label> 
	  <input style="margin-left:116px" name="Username" id="Username" value="<?php echo $field1; ?>" type="text" readonly>
	  <label style="margin-left:56px"><b><label style="color:red">*</label>Password : </b></label> 
	  <input style="margin-left:116px" name="word" id="Password" type="password" 
		value="<?php 
					for($x=0; $x < $row['CharactersPassword']; $x++){
						echo "*"; 
					}
				?>">
		
	  <br>
	  
	  <span style="margin-left:715px" class="error"><?php echo "$password_error"; ?></span>
	 
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
        <label style="margin-left:56px"><b><label style="color:red">*</label>Allowed Annual Leaves : </b></label>
        <input style="margin-left:15px" name="Leaves" id="Leaves" value="<?php echo $row['AnnualLeaves']; ?>" type="text" readonly>
        <br>
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
       <label style="margin-left:143px"></label>
	   <?php 
		$Female = "F";
		$Male = "M";
		$Other = "O";
		// create a dropdown list of salary types and make the selected option be the salary type of the selected employee where at this case is Fixed
		if (strcmp($Gender, $Female) == 0){
		    echo "<select name='G1' id='G1'>
			<option value='F' selected='selected'>Female</option>
               <option value='M'>Male</option>
	           <option value='O'>Other..</option>
			   </select>";
            $_SESSION['OldGender'] = "F";
		// create a dropdown list of salary types and make the selected option be the salary type of the selected employee where at this case is Fixed with overtime
        } else if (strcmp($Gender, $Male) == 0) {
            echo "<select  name='G2' id='G2'>
				<option value='F'>Female</option>
                <option value='M' selected='selected'>Male</option>
	            <option value='O'>Other..</option>
				</select>";
            $_SESSION['OldGender'] = "M";
		// create a dropdown list of salary types and make the selected option be the salary type of the selected employee where at this case is Part time
        } else if (strcmp($Gender, $Other) == 0) {
            echo "<select  name='G3' id='G3'>
				<option value='F'>Female</option>
                <option value='M' >Male</option>
	            <option value='O' selected='selected'>Other</option>
				</select>";
            $_SESSION['OldGender'] = "O";
        }
        ?>		
		
		
          <br>
          <br>
        <button class="cancel_style" name="cancel" id="cancel">Cancel</button>
        <button class="save_style" name="OK" id="OK">OK</button>
		 
     </div>
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

    function myFunction4() {
        document.getElementById("form_id4").submit();
    }
	</script>
  </body>
</html>
