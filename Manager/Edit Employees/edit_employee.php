<?php
/*
 * Edit Employee page gives the opportunity to a manager to edit employee’s data.
 * The data of an employee,that a manager can edit are Department, Working Country,
 * Role, Salary and Salary Type
 */
session_start();
include('db.php');
include('update_edit_employees.php');
$_SESSION['flag_clicked'] = false;

?>
<!doctype html>
<html lang="en">
<link rel="shortcut icon"
      href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
<link rel="apple-touch-icon"
      href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Statare LTD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="edit_employee.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>

<div class="header">
    <form action="logout_manager.php" method="post" id="form_id4">
        <button onclick="myFunction4()" name="LogOutButton" id="LogOutButton" class="logout">LogOut</button>
    </form>
    <div class="logo">
        <a href="manager_dashboard.html">
            <img src="statare.png" alt="Statare logo" width="50%" height="50%">
        </a>
        <ul>
            <label class="nav">
                <li><a href="manager_dashboard.html">Home</a></li>
                <li><a href="edit_profile_manager.php">Profile</a></li>
                <li><a href="view_hours_manager.php">View Hours</a></li>
                <li><a href="leave_request_manager.html">Leave Request</a></li>
                <li><a href="average_per_week.html">Average Report</a></li>
                <li><a href="payroll_report.html">Payroll Report</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn" style="color:orange;text-decoration: underline">My
                        Employees</a>
                    <div class="dropdown-content">
                        <a href="add_employee.php">Add Employee</a>
                        <a href="choose_employee.php" style="color:orange;text-decoration: underline">Edit Employee</a>
                        <a href="delete_employee_.php">Delete Employee</a>
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

<div class="title">
	<p><b>Edit Employee</b></p>
</div>
	


<form method="post" class="margin_label" name="form_id" id="form_id" action="<?php $_SERVER['PHP_SELF']; ?>">


    <?php
    include_once 'db.php';
    $Username = $_SESSION['edit_Empl_Username'];
    // get the data of the selected employee
    $sql = "SELECT  Username, ID, Name, Surname, Password, Birthdate, Gender, Address, Country, Phone, EmergencyPhone, Role, Salary, SalaryType, SSN, Email, AnnualLeaves FROM Employee WHERE Username LIKE '$Username'";
	// get the department of the selected employee 
    $sqlD = "SELECT Department.NameDept,Department.NumberDept,Department.CountryNum FROM Department INNER JOIN Employee ON (Department.NumberDept=Employee.NumDept) WHERE Username LIKE '$Username'";
	// get the country where the selected employee works
    $sqlC = "SELECT CorporateHeadquarter.CountryNum,CorporateHeadquarter.Name FROM `CorporateHeadquarter` INNER JOIN Employee ON (CorporateHeadquarter.CountryNum=Employee.CountryNumber) WHERE Employee.Username LIKE '$Username'";
    $result = mysqli_query($conn, $sql);
    $resultD = mysqli_query($conn, $sqlD);
    $resultC = mysqli_query($conn, $sqlC);

    if (!$result) {
        echo '<script type="text/javascript">
				window.alert("ERROR CONNECTION WITH DATABASE");
				</script>';
        exit();
    } else {
        if ($row = mysqli_fetch_array($result)) {
            $field1 = $Username;
            $SalaryType = $row['SalaryType'];
			$Role = $row['Role'];
        }
    }
    if (!$resultD || !$resultC) {
        echo '<script type="text/javascript">
				window.alert("ERROR CONNECTION WITH DATABASE1");
				</script>';
        exit();
    } else {
        if ($row1 = mysqli_fetch_array($resultD)) {
            $DeptName = $row1['NameDept'];
            $DeptNum = $row1['NumberDept'];
			$_SESSION['old_DeptNum']=$DeptNum;
        }

        if ($row2 = mysqli_fetch_array($resultC)) {
            $CountryName = $row2['Name'];
            $CountryNum = $row2['CountryNum'];
			$_SESSION['old_CountryNum']=$CountryNum;
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
				<label class="profile-department-name"><b><?php echo $DeptName ; ?></b></label>
			</div>
		</div>
		<!-- End of profile section -->
	</div>
	<!-- End of container -->
	
	    <br>
        <br>
	
	
        <label><b><label style="color:red">*</label>Username : </b></label>
        <!--<input style="margin-left:116px" name="Username" id="Username" value="<?php echo $field1; ?>" type="text"
               readonly>-->
		<input class="input_username" name="Username" id="Username" type="text" value="<?php echo $field1; ?>" readonly>
        <br>
        <br>

		<label><b><label style="color:red">*</label>ID : </b></label> 
		<input class="input_id" name="ID" id="ID" type="text" value="<?php echo $row['ID']; ?>" readonly>
		<label class="sec_column"><b><label style="color:red">*</label>SSN : </b></label> 
		<input class="input_ssn" name="SSN" id="SSN" type="text" value="<?php echo $row['SSN']; ?>" readonly>
        <br>
        <br>
        <br>

		<label><b><label style="color:red">*</label>First Name : </b></label> 
		<input class="input_first_name" name="FirstName" id="FirstName" type="text" value="<?php echo $row['Name']; ?>"readonly>
		<label class="sec_column"><b><label style="color:red">*</label>Last Name : </b></label> 
		<input class="input_last_name" name="LastName" id="LastName" type="text" value="<?php echo $row['Surname']; ?>" readonly>
        <br>
        <br>
        <br>

		<label><b><label style="color:red">*</label>Role : </b></label>
        <input class="input_role" name="Role" id="Role" type="text" value="<?php echo $row['Role']; ?>">
        <label class="sec_column"><b><label style="color:red">*</label>Department : </b></label>
        <select class="sel_dept" name='selDept' id='selDept'>
            <?php
			// select the departments from DB
            $select_query_Dept = "SELECT NumberDept,NameDept,CountryNum FROM Department";
            $select_query_run = mysqli_query($conn, $select_query_Dept);
			// create a dropdown list of the departments that an employee belongs and make the selected option be the department that the selected employee belongs to
            while ($select_query_array = mysqli_fetch_array($select_query_run)) {
                if (strcmp($select_query_array["NameDept"], $DeptName) == 0 && $select_query_array['NumberDept'] == $DeptNum) {
                    echo "<option value='" . $select_query_array['NumberDept'] . "' selected='selected'>" . $select_query_array["NumberDept"] . " - " . $select_query_array["NameDept"] . "</option>";

                } else
                    echo "<option value='" . $select_query_array['NumberDept'] . "'>" . $select_query_array["NumberDept"] . " - " . $select_query_array["NameDept"] . "</option>";
            }
            ?>
        </select>
        <br>
        <span class="span_fcolumn"><?php echo "$role_error"; ?></span>
        <br>
        <br>
		
		<label><b><label style="color:red">*</label>Annual Leaves : </b></label>
        <input class="input_leaves" name="Leaves" id="Leaves" value="<?php echo $row['AnnualLeaves']; ?>" type="text" placeholder="">
		
        <label class="sec_column"><b><label style="color:red">*</label>Working Country : </b></label>
        <select class="sel_workCountry" name='selCountry' id='selCountry'>
            <?php 
			// select the countries that an employee can work from DB
			$select_query_Country = "SELECT * FROM `CorporateHeadquarter`";
            $select_query_run2 = mysqli_query($conn, $select_query_Country);
            if (!$select_query_run2) {
                echo '<script>
			window.alert("ERROR connecting with database!");
			</script>';
            } else {
				// create a dropdown list of the countries that an employee can work and make the selected option be the country that the selected employee works
                while ($select_query_array2 = mysqli_fetch_array($select_query_run2)) {
                    if (strcmp($select_query_array2['Name'], $CountryName) == 0 && $select_query_array2['CountryNum'] == $CountryNum) {
                        echo "<option value='" . $select_query_array2['CountryNum'] . "' selected='selected'>" . $select_query_array2["CountryNum"] . " - " . $select_query_array2["Name"] . "</option>";

                    } else {
                        echo "<option value='" . $select_query_array2['CountryNum'] . "'>" . $select_query_array2["CountryNum"] . " - " . $select_query_array2["Name"] . "</option>";
                    }


                }
            }

            ?>
        </select>
		 <br>
        <span class="span_fcolumn"><?php echo "$leaves_error"; ?></span>
        <br>

        <br>
        <br>

        <label><b><label style="color:red">*</label>Salary : </b></label>
        <input class="input_salary" name="Salary" id="Salary" type="text" value="<?php echo $row['Salary']; ?>">
        <label class="sec_column"><b><label style="color:red">*</label>Salary Type : </b></label>
        <?php
        $Fixed = "F";
        $Fixed_With_Overtime = "FO";
        $Part_Time = "P";
		// create a dropdown list of salary types and make the selected option be the salary type of the selected employee where at this case is Fixed
        if (strcmp($SalaryType, $Fixed) == 0) {
            echo "<select class='sel_stype' name='salaryT1' id='salaryT1'>
			<option value='F' selected='selected'>Fixed</option>
               <option value='FO'>Fixed With Overtime</option>
	           <option value='P'>Part Time</option>
			   </select>";
            $_SESSION['OldSalaryType'] = "F";
		// create a dropdown list of salary types and make the selected option be the salary type of the selected employee where at this case is Fixed with overtime
        } else if (strcmp($SalaryType, $Fixed_With_Overtime) == 0) {
            echo "<select class='sel_stype' name='salaryT2' id='salaryT2'>
				<option value='F'>Fixed</option>
                <option value='FO' selected='selected'>Fixed With Overtime</option>
	            <option value='P'>Part Time</option>
				</select>";
            $_SESSION['OldSalaryType'] = "FO";
		// create a dropdown list of salary types and make the selected option be the salary type of the selected employee where at this case is Part time
        } else if (strcmp($SalaryType, $Part_Time) == 0) {
            echo "<select class='sel_stype' name='salaryT3' id='salaryT3'>
				<option value='F'>Fixed</option>
                <option value='FO' >Fixed With Overtime</option>
	            <option value='P' selected='selected'>Part Time</option>
				</select>";
            $_SESSION['OldSalaryType'] = "P";
        }
        ?>

        <br>
        <span class="span_fcolumn"><?php echo "$salary_error"; ?></span>
        <br>
        <br>

		<label><b><label style="color:red">*</label>Phone : </b></label> 
		<input class="input_phone" name="Phone" id="Phone" value="<?php echo $row['Phone']; ?>" type="text" readonly>
		<label class="sec_column"><b><label style="color:red">*</label>Emergency Phone : </b></label> 
		<input class="input_em_phone" name="EmergencyPhone" id="EmergencyPhone" value="<?php echo $row['EmergencyPhone']; ?>" type="text" readonly>

        <br>
        <br>

		<label><b><label style="color:red">*</label>Email : </b></label> 
		<input class="input_email" name="Email" id="Email" type="text" value="<?php echo $row['Email']; ?>" readonly>
        <br>


        <br>
        <br>

        <button class="save_style" name="save" id="save">Save</button>
        <button class="cancel_style" name="cancel" id="cancel">Cancel</button>



</form>

<div id="saveDiv" style="display:none" class="confirm_box">
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
    $("#save").click(function (event) {
        event.preventDefault();
        document.getElementById('saveDiv').style.display = "block";
        $("#yes").click(function (event) {
            document.getElementById('saveDiv').style.display = "none";
            document.getElementById('form_id').submit();
        });
        $("#no").click(function (event) {
           document.getElementById('saveDiv').style.display = "none";
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