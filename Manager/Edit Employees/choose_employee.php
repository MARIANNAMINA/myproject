<?php
/*
 * Edit Employee page gives the opportunity to a manager to choose an employee from a dropdown list
 * that contains the Username, Name and Surname of manager’s employees to edit employee’s data.
 * By selecting the button 'OK' the page is replaced with the page edit_employee.php that contains the
 * data of the chosen employee.
 */
session_start();
include 'db.php';
include('choose_employee_function.php');
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
	 <link rel="stylesheet" type="text/css" href="choose_employee.css">
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
                <li><a href="leave_request_manager.php">Leave Request</a></li>
                <li><a href="average_per_week.php">Average Report</a></li>
                <li><a href="payroll_report.php">Payroll Report</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn" style="color:orange;text-decoration: underline">My
                        Employees</a>
                    <div class="dropdown-content">
                        <a href="add_employee.php">Add Employee</a>
                        <a href="choose_employee.php" style="color:orange;text-decoration: underline">Edit Employee</a>
                        <a href="delete_employee_.php">Delete Employee</a>
                        <a href="employee_status_manager.php">Employee Status</a>
                        <a href="leaveRequest.html">View Requests</a>

                    </div>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Language</a>
                    <div class="dropdown-content">
                        <a href="#">Ελληνικά</a>
                        <a href="#">English</a>
                    </div>
                </li>
            </div>
        </ul>

    </div>
</div>

<p class="title_class"><b>Edit Employee</b></p>
<br>
<br>
<br>
<br>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="select_class" id="form_id">
    <div style="text-align:center">
        <label><b>Username:</b> </label>
        <select style='margin-left:2%' name='Username' id='Username'>
            <?php
            $UsernameManager = $_SESSION['username'];
            // select employees' data of the manager who is logged in
            $select_query_Country = "SELECT Username,Name,Surname FROM Employee WHERE UsernameManager LIKE '$UsernameManager'";
            $select_query_run = mysqli_query($conn, $select_query_Country);
            // insert the data of employees in a dropdown list
            while ($select_query_array = mysqli_fetch_array($select_query_run)) {
                echo "<option value='" . $select_query_array['Username'] . "'>" . $select_query_array["Username"] . " - " . $select_query_array["Name"] . " " . $select_query_array["Surname"] . "</option>";
            }

            ?>
        </select>
        <br>
        <br>
        <br>
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
                   Are you sure about your option?
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
