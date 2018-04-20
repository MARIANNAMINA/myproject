<?php session_start(); ?>
<!--
- Author: Maria Kouppi
-
- This file is a html file for view request functionality. At the top of the page you will see
- the menu with the other features you can do on this web page. On the page, a table appears with all leave request
- which he does. The last column of table is state. The employee will can see if his manager, accept or not his request.
-
-->
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


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="view_request_employee.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>

<body>
<!-- Header with the other features-->
<div class="header">

    <form action="logout_employee.php" method="post" id=form_id4>
        <button onclick="myFunction4()" name="LogOutButton" id="LogOutButton" class="logout">LogOut</button>
    </form>

    <div class="logo">
        <a href="EmployeeDashboard.html">
            <img src="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png"
                 width="100" height="100">
        </a>
        <ul>
            <label class="nav">
                <li><a href="EmployeeDashboard.html">Home</a></li>
                <li><a href="edit_profile_employee.php">Profile</a></li>
                <li><a href="view_hours_employee.php">View Hours</a></li>
                <li><a href="employee_view_request.php" style="color:orange; text-decoration: underline">View
                        Requests</a></li>
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

<div class="paragraph">

    <h1 align="center"><b>View Requests</b></h1>

    <br>
    <!-- Table with employee's data for his leave requests-->
    <div style="overflow-x:auto;">

        <table style="width:97.5%" name="table" id="table">

            <tr style="text-align:center">

                <th>From</th>
                <th>To</th>
                <th>Description</th>
                <th>State</th>

            </tr>
            <?php
            include_once 'db.php';
            $Username = $_SESSION['username'];

            // Select from database
            $sql = "SELECT  `FromDate`, `ToDate`,  `Reason`, `State` FROM `Leave` WHERE `Username` LIKE '$Username'";
            $result = mysqli_query($conn, $sql);


            if (!$result) {
                echo '<script type="text/javascript">
				window.alert("ERROR CONNECTION WITH DATABASE");
				</script>';
                exit();
            } else {
                // print the data
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['State'] == 'p') {
                        echo "<tr><td>" . $row['FromDate'] . "</td><td>" . $row['ToDate'] . "</td><td>" . $row['Reason'] . "</td><td> Pending </td></tr>";
                    } else if ($row['State'] == 'a') {
                        echo "<tr><td>" . $row['FromDate'] . "</td><td>" . $row['ToDate'] . "</td><td>" . $row['Reason'] . "</td><td> Accepted </td></tr>";
                    } else if ($row['State'] == 'r') {
                        echo "<tr><td>" . $row['FromDate'] . "</td><td>" . $row['ToDate'] . "</td><td>" . $row['Reason'] . "</td><td> Rejected </td></tr>";
                    }

                }
            }

            ?>

        </table>

    </div>
</div>
<script>
    function myFunction4() {
        document.getElementById("form_id4").submit();
    }
</script>
</body>
</html>
