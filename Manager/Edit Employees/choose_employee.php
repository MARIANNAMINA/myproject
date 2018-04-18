<?php
session_start();
include 'db.php';
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
<br>
<br>
<br>
<br>

<form action="choose_employee_function.php" method="post" class="username" id="form_id">
    <div style="text-align:center">
        <label style="font-size: 20px"><b>Username:</b> </label>
        <select style="margin-left:20px" name='Username' id='Username'>
            <?php
            $UsernameManager = $_SESSION['username'];
            $select_query_Country = "SELECT Username,Name,Surname FROM Employee WHERE UsernameManager LIKE '$UsernameManager'";
            $select_query_run = mysqli_query($conn, $select_query_Country);
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

        <button onclick="myFunction2()" class="cancel_style">Cancel</button>
        <button onclick="myFunction1()" class="save_style" name="OK">OK</button>


    </div>
</form>

<script>
    function myFunction1() {
        if (confirm('Are you sure you want to choose this employee?')) {
            document.getElementById("form_id").submit();
            return true;
        }
        else {
            window.location.replace("choose_employee.html");
        }
    }

    function myFunction2() {
        if (confirm('Do you want to leave this page?')) {
            window.location.replace("manager_dashboard.html");
            return true;
        }
        else {
            window.location.replace("choose_employee.html");
        }
    }

    function myFunction4() {
        document.getElementById("form_id4").submit();
    }
</script>
</body>
</html>
