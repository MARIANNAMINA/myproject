<?php
/*
 * Add employee screen gives the opportunity to managers to add an employee. 
 * A manager must give the username, password, ID, SSN, First Name, Last Name, 
 * Department, Role, Working Country(in which country the current Department 
 * that manager gave is at), Salary, Salary Type(Fixed, Part Time,etc), phone, 
 * emergency phone, email and if employee is a manager or not (field Manager). 
 * Despite the required data that a manager must give, he/she can also give the 
 * country, address and date of birth of employee. After inserting correctly 
 * the above data, manager can save the changes he/she made by clicking the 
 * button Save (and at the pop confirmation window, by clicking ok) or he/she cancel 
 * his/her action either by clicking the button Save(and at the pop confirmation
 * window, by clicking cancel) or by clicking the button Cancel(and at the 
 * pop confirmation window, by clicking ok or cancel).
 */
session_start();
include('db.php');
// include php file that contains the main functionality of add employee
include('add_employee_function.php');
$_SESSION['flag_clicked'] = false;
?><!doctype html>
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="add_employee.css">
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
            <div class="nav">
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
                        <a href="add_employee.php" style="color:orange;text-decoration: underline">Add Employee</a>
                        <a href="choose_employee.php">Edit Employee</a>
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
            </div>
        </ul>

    </div>
</div>


    <p class="title_class"><b>Add Employee</b></p>
    
    <hr>
	
	<form method="post" class="margin_label" name="form_id" id="form_id" action="<?php $_SERVER['PHP_SELF']; ?>">

        <label><b><label style="color:red">*</label>Username : </b></label>
        <input class="input_username" name="Username" id="Username" type="text" value="<?php echo "$Username"; ?>"
               placeholder="">
        <label class="sec_column"><b><label style="color:red">*</label>Password : </b></label>
        <input class="input_password" name="Password" id="Password" value="<?php echo "$Password"; ?>" type="text"
               placeholder="">
        <br>
        <span class="span_fcolumn"><?php echo "$username_error"; ?></span>
        <span class="span_scolumn"><?php echo "$password_error"; ?></span>
		
        <br>
        <br>

        <label><b><label style="color:red">*</label>ID : </b></label>
        <input class="input_id" name="ID" id="ID" value="<?php echo "$ID"; ?>" type="text" placeholder="">
        <label class="sec_column"><b><label style="color:red">*</label>SSN : </b></label>
        <input class="input_ssn" name="SSN" id="SSN" value="<?php echo "$SSN"; ?>" type="text" placeholder="">
        <br>
        <span class="span_fcolumn"><?php echo "$id_error"; ?></span>
        <span class="span_scolumn"><?php echo "$ssn_error"; ?></span>

        <br>
        <br>

        <label style="color:red"><b>*</b></label><label><b>First Name : </b></label>
        <input class="input_fn" name="FirstName" id="FirstName" value="<?php echo "$FN"; ?>" type="text"
               placeholder="">
        <label class="sec_column"><label style="color:red"><b>*</b></label><b>Last Name : </b></label>
        <input class="input_ln" name="LastName" id="LastName" value="<?php echo "$LN"; ?>" type="text"
               placeholder="">
        <br>
        <span class="span_fcolumn"><?php echo "$name_error"; ?></span>
        <span class="span_scolumn"><?php echo "$last_name_error"; ?></span>

        <br>
        <br>

        <label style="color:red"><b>*</b></label><label><b>Department : </b></label>
        <select class="sel_dept" name='selDept' id='selDept'>
            <?php
            // find the departments that are in the DB
            $select_query_Dept = "SELECT NumberDept,NameDept,CountryNum FROM Department";
            $select_query_run = mysqli_query($conn, $select_query_Dept);
            while ($select_query_array = mysqli_fetch_array($select_query_run)) {
                echo "<option value='" . $select_query_array['NumberDept'] . "'>" . $select_query_array["NumberDept"] . " - " . $select_query_array["NameDept"] . "</option>";
            }
            ?>
        </select>

        <label class="l_role"><b><label style="color:red">*</label>Role : </b></label>
        <input class="input_role" name="Role" id="Role" value="<?php echo "$Role"; ?>" type="text" placeholder="">
        <br>
        <span class="span_fcolumn"><?php echo "$dept_error"; ?></span>
        <span class="span_scolumn"><?php echo "$role_error"; ?></span>

        <br>
        <br>

        <label style="color:red"><b>*</b></label><label><b>Working Country : </b></label>
        <select class="sel_workCountry" name='selCountry' id='selCountry'>
            <?php
            // find in which countries departments are (get data from the DB)
            $select_query_Country = "SELECT CountryNum,Name FROM CorporateHeadquarter";
            $select_query_run = mysqli_query($conn, $select_query_Country);
            while ($select_query_array = mysqli_fetch_array($select_query_run)) {
                echo "<option value='" . $select_query_array['CountryNum'] . "'>" . $select_query_array["CountryNum"] . " - " . $select_query_array["Name"] . "</option>";
            }

            ?>
        </select>
        <label class="l_leaves"><b><label style="color:red">*</label>Annual Leaves : </b></label>
        <input class="input_leaves" name="Leaves" id="Leaves" value="<?php echo "$Leaves"; ?>" type="text" placeholder="">
        <br>
        <span class="span_scolumn"><?php echo "$leaves_error"; ?></span>
        <br>
        <br>
        <br>

        <label style="color:red"><b>*</b></label><label><b>Salary : </b></label>
        <input class="input_salary" name="Salary" id="Salary" type="text" value="<?php echo "$S"; ?>"
               placeholder="">
        <label class="sec_column"><label style="color:red"><b>*</b></label><b>Salary Type : </b></label>
        <select class="sel_stype" name="SalaryType" id="SalaryType">
            <option value="Fixed">Fixed</option>
            <option value="FixedWithOvertime">Fixed With Overtime</option>
            <option value="PartTime">Part Time</option>
        </select>
        <br>
        <span class="span_fcolumn"><?php echo "$salary_error"; ?></span>
        <br>
        <br>

        <label style="color:red"><b>*</b></label><label><b>Phone : </b></label>
        <input class="input_phone" name="Phone" id="Phone" value="<?php echo "$P"; ?>" type="text" placeholder="">
        <label class="sec_column"><label style="color:red"><b>*</b></label><label><b>Emergency Phone
                    : </b></label></label>
        <input class="input_em_phone" name="EmergencyPhone" id="EmergencyPhone" value="<?php echo "$EP"; ?>"
               type="text" placeholder="">
        <br>
        <span class="span_fcolumn"><?php echo "$phone_error"; ?></span>
        <span class="span_scolumn"><?php echo "$emergency_phone_error"; ?></span>

        <br>
        <br>

        <label style="color:red"><b>*</b></label><label><b>Email : </b></label>
        <input class="input_email" name="Email" id="Email" value="<?php echo "$E"; ?>" type="text" placeholder="">
        <br>
        <span class="span_fcolumn"><?php echo "$email_error"; ?></span>

        <br>
        <br>

        <label><b>Country : </b></label>
        <input class="input_country" name="Country" id="Country" value="<?php echo "$C"; ?>" type="text" placeholder="">
        <label class="sec_column"><b>Address : </b></label>
        <input class="input_address" name="Address" id="Address" value="<?php echo "$A"; ?>" type="text" placeholder="">
        <br>
        <span class="span_fcolumn"><?php echo "$country_error"; ?></span>
        <span class="span_scolumn"><?php echo "$address_error"; ?></span>

        <br>
        <br>

        <label><b>Date of Birth : </b></label>
        <input class="input_date" name="DateofBirth" id="DateofBirth" value="<?php echo "$DOB"; ?>" placeholder="YYYY-MM-DD">
        <br>
        <span class="span_fcolumn"><?php echo "$birthdate_error"; ?></span>

        <br>
        <br>
		
        <label style="color:red"><b>*</b></label><label><b>Manager : </b></label>
        <input class="checkbox_manager" type="checkbox" name="Manager" id="Manager">

		<br>
        <br>
        <br>

        <label><b>Gender : </b></label>
        <select class="sel_gender" name="Gender" id="Gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other...</option>
        </select>
        <br>
        <br>
        <button class="save_style" id="save" name="save">Save</button>
        <button class="cancel_style" id="cancel" name="cancel">Cancel</button>
		
	</form>
	
<!--pop up window -->
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

