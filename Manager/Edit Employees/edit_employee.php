<?php
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

<h1 style="text-align:center"><b>Edit Employee</b></h1>
<Img class="parent" src="https://www.buira.org/assets/images/shared/default-profile.png"
     alt="this image shows employee's photo" height="100" width="100">
<br>
<br>


<form method="post" class="username" name="form_id" id="form_id" action="<?php $_SERVER['PHP_SELF']; ?>">


    <?php
    include_once 'db.php';
    $Username = $_SESSION['edit_Empl_Username'];

    $sql = "SELECT  Username, ID, Name, Surname, Password, Birthdate, Gender, Address, Country, Phone, EmergencyPhone, Role, Salary, SalaryType, SSN, Email FROM Employee WHERE Username LIKE '$Username' ";
    $sqlD = "SELECT Department.NameDept,Department.NumberDept,Department.CountryNum FROM Department INNER JOIN Employee ON (Department.NumberDept=Employee.NumDept) WHERE Username LIKE '$Username'  ";
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

        }

        if ($row2 = mysqli_fetch_array($resultC)) {
            $CountryName = $row2['Name'];
            $CountryNum = $row2['CountryNum'];

        }
    }


    ?>

    <label class="right"><b><?php echo $field1; ?></b> </label><br>
    <label class="right1"><b><?php echo $row['Role']; ?></b></label>
    <label class="right2"><b><?php echo $DeptName; ?></b></label>
    <div style="margin-left:59px">


        <label><b><label style="color:red">*</label>Username : </b></label>
        <input style="margin-left:116px" name="Username" id="Username" value="<?php echo $field1; ?>" type="text"
               readonly>
        <br>
        <br>

        <label><b><label style="color:red">*</label>ID : </b></label>
        <input style="margin-left:175px" name="ID" id="ID" value="<?php echo $row['ID']; ?>" type="text" readonly>
        <label style="margin-left:56px"><b><label style="color:red">*</label>SSN : </b></label>
        <input style="margin-left:154px" name="SSN" id="SSN" value="<?php echo $row['SSN']; ?>" type="text" readonly>
        <br>

        <br>
        <br>

        <label><b><label style="color:red">*</label>First Name : </b></label>
        <input style="margin-left:110px" name="FirstName" id="FirstName" value="<?php echo $row['Name']; ?>" type="text"
               readonly>
        <label style="margin-left:56px"><b><label style="color:red">*</label>Last Name : </b></label>
        <input style="margin-left:107px" name="LastName" id="LastName" value="<?php echo $row['Surname']; ?>"
               type="text" readonly>
        <br>

        <br>
        <br>

        <label><b><label style="color:red">*</label>Department : </b></label>
        <select style="margin-left:105px" name='selDept' id='selDept'>
            <?php
            $select_query_Dept = "SELECT NumberDept,NameDept,CountryNum FROM Department";
            $select_query_run = mysqli_query($conn, $select_query_Dept);
            while ($select_query_array = mysqli_fetch_array($select_query_run)) {
                if (strcmp($select_query_array["NameDept"], $DeptName) == 0 && $select_query_array['NumberDept'] == $DeptNum) {
                    echo "<option value='" . $select_query_array['NumberDept'] . "' selected='selected'>" . $select_query_array["NumberDept"] . " - " . $select_query_array["NameDept"] . "</option>";

                } else
                    echo "<option value='" . $select_query_array['NumberDept'] . "'>" . $select_query_array["NumberDept"] . " - " . $select_query_array["NameDept"] . "</option>";
            }
            ?>
        </select>
        <label style="margin-left:158px"><b><label style="color:red">*</label>Role : </b></label>
        <input style="margin-left:152px" name="Role" id="Role" value="<?php echo $row['Role']; ?>" type="text">
        <br>
        <span style="margin-left:214px" class="error"><?php echo "$role_error"; ?></span>
        <br>
        <br>

        <label><b><label style="color:red">*</label>Working Country : </b></label>
        <select style="margin-left:65px" name='selCountry' id='selCountry'>
            <?php $select_query_Country = "SELECT * FROM `CorporateHeadquarter`";
            $select_query_run2 = mysqli_query($conn, $select_query_Country);
            if (!$select_query_run2) {
                echo '<script>
			window.alert("ERROR connecting with database!");
			</script>';

            } else {

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

        <br>
        <br>

        <label><b><label style="color:red">*</label>Salary : </b></label>
        <input style="margin-left:150px" name="Salary" id="Salary" type="text" value="<?php echo $row['Salary']; ?>">
        <label style="margin-left:56px"><b><label style="color:red">*</label>Salary Type : </b></label>
        <label style="margin-left:92px"></label>
        <?php //style="margin-left:65px"
        $Fixed = "F";
        $Fixed_With_Overtime = "FO";
        $Part_Time = "P";

        if (strcmp($SalaryType, $Fixed) == 0) {
            echo "<select name='salaryT1' id='salaryT1'>
			<option value='Fixed' selected='selected'>Fixed</option>
               <option value='Fixed With Overtime'>Fixed With Overtime</option>
	           <option value='Part Time'>Part Time</option>
			   </select>";
            $_SESSION['SalaryType'] = "F";
        } else if (strcmp($SalaryType, $Fixed_With_Overtime) == 0) {
            echo "<select  name='salaryT2' id='salaryT2'>
				<option value='Fixed'>Fixed</option>
                <option value='Fixed With Overtime' selected='selected'>Fixed With Overtime</option>
	            <option value='Part Time'>Part Time</option>
				</select>";
            $_SESSION['SalaryType'] = "FO";
        } else if (strcmp($SalaryType, $Part_Time) == 0) {
            echo "<select  name='salaryT3' id='salaryT3'>
				<option value='Fixed'>Fixed</option>
                <option value='Fixed With Overtime' >Fixed With Overtime</option>
	            <option value='Part Time' selected='selected'>Part Time</option>
				</select>";
            $_SESSION['SalaryType'] = "P";
        }
        ?>

        <br>
        <span style="margin-left:214px" class="error"><?php echo "$salary_error"; ?></span>
        <br>
        <br>

        <label><b><label style="color:red">*</label>Phone : </b></label>
        <input style="margin-left:150px" name="Phone" id="Phone" value="<?php echo $row['Phone']; ?>" type="text"
               readonly>
        <label style="margin-left:56px"><b><label style="color:red">*</label>Emergency Phone : </b></label>
        <input style="margin-left:48px" name="EmergencyPhone" id="EmergencyPhone"
               value="<?php echo $row['EmergencyPhone']; ?>" type="text" readonly>

        <br>
        <br>

        <label><b><label style="color:red">*</label>Email: </b></label>
        <input style="margin-left:160px" name="Email" id="Email" value="<?php echo $row['Email']; ?>" type="text"
               readonly>
        <br>


        <br>
        <br>

        <button onclick="myFunction1()" class="save_style" name="save">Save</button>
        <button onclick="myFunction2()" class="cancel_style" name="cancel">Cancel</button>


    </div>


</form>

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

    function myFunction4() {
        document.getElementById("form_id4").submit();
    }

</script>
</body>
</html>