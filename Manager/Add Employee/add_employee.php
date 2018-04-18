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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="add_employee.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>

<body>

<div class="header">

    <form action
    "logout.php">
    <label><a href="index.html" class="logout"><b>Log out</b></a></label>
    </form>


    <div class="logo">
        <a href="manager_dashboard.html">
            <img src="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png"
                 width="100" height="100">
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
            </label>
        </ul>

    </div>
</div>

<div class="paragraph">
    <h1 align=center><b>Add Employee</b>
        <h1>
            <br>
</div>

<form method="post" class="username" name="form_id" id="form_id" action="<?php $_SERVER['PHP_SELF']; ?>">

    <div style="margin-left:59px">

        <label><b><label style="color:red">*</label>Username : </b></label>
        <input style="margin-left:116px" name="Username" id="Username" type="text" value="<?php echo "$Username"; ?>"
               placeholder="">
        <label style="margin-left:56px"><b><label style="color:red">*</label>Password : </b></label>
        <input style="margin-left:116px" name="Password" id="Password" value="<?php echo "$Password"; ?>" type="text"
               placeholder="">
        <br>
        <span style="margin-left:214px" class="error"><?php echo "$username_error"; ?></span>
        <span style="margin-left:715px" class="error"><?php echo "$password_error"; ?></span>

        <br>
        <br>

        <label><b><label style="color:red">*</label>ID : </b></label>
        <input style="margin-left:174px" name="ID" id="ID" value="<?php echo "$ID"; ?>" type="text" placeholder="">
        <label style="margin-left:56px"><b><label style="color:red">*</label>SSN : </b></label>
        <input style="margin-left:156px" name="SSN" id="SSN" value="<?php echo "$SSN"; ?>" type="text" placeholder="">
        <br>
        <span style="margin-left:214px" class="error"><?php echo "$id_error"; ?></span>
        <span style="margin-left:715px" class="error"><?php echo "$ssn_error"; ?></span>

        <br>
        <br>

        <label style="color:red"><b>*</b></label><label><b>First Name : </b></label>
        <input style="margin-left:110px" name="FirstName" id="FirstName" value="<?php echo "$FN"; ?>" type="text"
               placeholder="">
        <label style="margin-left:56px"><label style="color:red"><b>*</b></label><b>Last Name : </b></label>
        <input style="margin-left:107px" name="LastName" id="LastName" value="<?php echo "$LN"; ?>" type="text"
               placeholder="">
        <br>
        <span style="margin-left:214px" class="error"><?php echo "$name_error"; ?></span>
        <span style="margin-left:715px" class="error"><?php echo "$last_name_error"; ?></span>

        <br>
        <br>

        <label style="color:red"><b>*</b></label><label><b>Department : </b></label>
        <select style="margin-left:105px" name='selDept' id='selDept'>
            <?php
            // find the departments that are in the DB
            $select_query_Dept = "SELECT NumberDept,NameDept,CountryNum FROM Department";
            $select_query_run = mysqli_query($conn, $select_query_Dept);
            while ($select_query_array = mysqli_fetch_array($select_query_run)) {
                echo "<option value='" . $select_query_array['NumberDept'] . "'>" . $select_query_array["NumberDept"] . " - " . $select_query_array["NameDept"] . "</option>";
            }
            ?>
        </select>

        <label style="margin-left:183px"><b><label style="color:red">*</label>Role : </b></label>
        <input style="margin-left:155px" name="Role" id="Role" value="<?php echo "$Role"; ?>" type="text"
               placeholder="">
        <br>
        <span style="margin-left:214px" class="error"><?php echo "$dept_error"; ?></span>
        <span style="margin-left:715px" class="error"><?php echo "$role_error"; ?></span>

        <br>
        <br>

        <label style="color:red"><b>*</b></label><label><b>Working Country : </b></label>
        <select style="margin-left:65px" name='selCountry' id='selCountry'>
            <?php
            // find in which countries departments are (get data from the DB)
            $select_query_Country = "SELECT CountryNum,Name FROM CorporateHeadquarter";
            $select_query_run = mysqli_query($conn, $select_query_Country);
            while ($select_query_array = mysqli_fetch_array($select_query_run)) {
                echo "<option value='" . $select_query_array['CountryNum'] . "'>" . $select_query_array["CountryNum"] . " - " . $select_query_array["Name"] . "</option>";
            }

            ?>
        </select>
        <label style="margin-left:177px"><b><label style="color:red">*</label>Allowed Annual Leaves : </b></label>
        <input style="margin-left:15px" name="Leaves" id="Leaves" value="<?php echo "$Leaves"; ?>" type="text"
               placeholder="">
        <br>
        <span style="margin-left:717px" class="error"><?php echo "$leaves_error"; ?></span>
        <br>
        <br>
        <br>

        <label style="color:red"><b>*</b></label><label><b>Salary : </b></label>
        <input style="margin-left:142px" name="Salary" id="Salary" type="text" value="<?php echo "$S"; ?>"
               placeholder="">
        <label style="margin-left:56px"><label style="color:red"><b>*</b></label><b>Salary Type : </b></label>
        <select style="margin-left:110px" name="SalaryType" id="SalaryType">
            <option value="Fixed">Fixed</option>
            <option value="FixedWithOvertime">Fixed With Overtime</option>
            <option value="PartTime">Part Time</option>
        </select>
        <br>
        <span style="margin-left:214px" class="error"><?php echo "$salary_error"; ?></span>
        <br>
        <br>

        <label style="color:red"><b>*</b></label><label><b>Phone : </b></label>
        <input style="margin-left:142px" name="Phone" id="Phone" value="<?php echo "$P"; ?>" type="text" placeholder="">
        <label style="margin-left:56px"><label style="color:red"><b>*</b></label><label><b>Emergency Phone
                    : </b></label></label>
        <input style="margin-left:58px" name="EmergencyPhone" id="EmergencyPhone" value="<?php echo "$EP"; ?>"
               type="text" placeholder="">
        <br>
        <span style="margin-left:214px" class="error"><?php echo "$phone_error"; ?></span>
        <span style="margin-left:715px" class="error"><?php echo "$emergency_phone_error"; ?></span>

        <br>
        <br>

        <label style="color:red"><b>*</b></label><label><b>Email : </b></label>
        <input style="margin-left:149px" name="Email" id="Email" value="<?php echo "$E"; ?>" type="text" placeholder="">
        <br>
        <span style="margin-left:214px" class="error"><?php echo "$email_error"; ?></span>

        <br>
        <br>

        <label><b>Country : </b></label>
        <input style="margin-left:138px" name="Country" id="Country" value="<?php echo "$C"; ?>" type="text"
               placeholder="">
        <label style="margin-left:56px"><b>Address : </b></label>
        <input style="margin-left:134px" name="Address" id="Address" value="<?php echo "$A"; ?>" type="text"
               placeholder="">
        <br>
        <span style="margin-left:214px" class="error"><?php echo "$country_error"; ?></span>
        <span style="margin-left:715px" class="error"><?php echo "$address_error"; ?></span>

        <br>
        <br>

        <label><b>Date of Birth : </b></label>
        <input style="margin-left:100px" name="DateofBirth" id="DateofBirth" value="<?php echo "$DOB"; ?>"
               placeholder="YYYY-MM-DD">
        <br>
        <span style="margin-left:214px" class="error"><?php echo "$birthdate_error"; ?></span>

        <br>
        <br>

        <label style="color:red"><b>*</b></label><label><b>Manager : </b></label>
        <input style="margin-left:131px" type="checkbox" name="Manager" id="Manager">

        <br>
        <br>

        <label><b>Gender : </b></label>
        <select style="margin-left:143px" name="Gender" id="Gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other...</option>
        </select>
        <br>
        <br>
        <button class="save_style" id="save" name="save">Save</button>
        <button class="cancel_style" id="cancel" name="cancel">Cancel</button>

    </div>
    </div>

</form>
<!--pop up window -->
<div id="welcomeDiv" style="display:none" class="confirm_box">
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
    // buttons of pop up window
    $("#save").click(function (event) {
        event.preventDefault();
        document.getElementById('welcomeDiv').style.display = "block";
        $("#yes").click(function (event) {
            document.getElementById('welcomeDiv').style.display = "none";
            document.getElementById('form_id').submit();
        });
        $("#no").click(function (event) {
            document.getElementById('welcomeDiv').style.display = "none";
            window.location.replace("manager_dashboard.html");
        });
    });

    $("#cancel").click(function (event) {
        event.preventDefault();
        document.getElementById('welcomeDiv').style.display = "block";
        $("#yes").click(function (event) {
            document.getElementById('welcomeDiv').style.display = "none";
            window.location.replace("manager_dashboard.html");
        });
        $("#no").click(function (event) {
            document.getElementById('welcomeDiv').style.display = "none";
            document.getElementById('form_id').submit();
        });
    });

</script>
</body>
</html>

