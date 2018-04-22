<?php
/*
 * Employee Status screen gives the opportunity to managers to see the status of their employees.
 * Status of an employee can be either on leave, clocked in, clocked out or on break.
 * Manager can also see how much time each of his/her employees were on break from the last time that were clocked in.
 */
session_start();
?><!DOCTYPE HTML>
<html lang="en">
<link rel="shortcut icon"
      href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
<link rel="apple-touch-icon"
      href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
<head>
    <title>Statare LTD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--include style of employee status screen-->
    <link rel="stylesheet" type="text/css" href="employee_status.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
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
                <li><a href="Leave_Request_Manager.html">Leave Request</a></li>
                <li><a href="Average_per_Week.html">Average Report</a></li>
                <li><a href="payroll_report.html">Payroll Report</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn" style="color:orange;text-decoration: underline">My
                        Employees</a>
                    <div class="dropdown-content">
                        <a href="add_employee.php">Add Employee</a>
                        <a href="choose_employee.php">Edit Employee</a>
                        <a href="delete_employee_.php">Delete Employee</a>
                        <a href="employee_status_manager.php" style="color:orange;text-decoration: underline">Employee
                            Status</a>
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



    <p class="title_class"><b>Employee Status</b></p>

    <br>
    <hr>
    <form class="username" method="POST">

        <div style="overflow-x:auto;">
            <?php
            include_once 'db.php';
            $Username = $_SESSION['username'];

            // select employees of the current manager(who is logged in) that are on leave
            $sql = "SELECT `Leave`.LeaveID,Employee.Username,Employee.Name,Employee.Surname FROM `Leave` INNER JOIN Employee ON (`Leave`.Username=Employee.Username) WHERE `Leave`.FromDate <= curdate() AND `Leave`.ToDate >= curdate() AND (`Leave`.State='A' OR `Leave`.State='a') AND Employee.UsernameManager LIKE '$Username'";

            $leaveSql = mysqli_query($conn, $sql);
            if (!($leaveSql)){
                echo '<script type="text/javascript">
		        window.alert("ERROR CONNECTION WITH DATABASE");
		        window.location.replace("employee_status_manager.php");
		        </script>';
                exit();
            }else{
                // select employees of the current manager(who is logged in) that are either clocked in,clocked out or on break by selecting the last time they clicked to the corresponding button
                $sqlClockedIn = "SELECT AttendanceTime.*,Employee.Name,Employee.Surname,Employee.ID FROM (SELECT MAX(AttendanceTime.ClockIn) AS ClockInMax,AttendanceTime.Date,AttendanceTime.Username FROM AttendanceTime WHERE AttendanceTime.Date = curdate() GROUP BY AttendanceTime.Date,AttendanceTime.Username) AS A INNER JOIN AttendanceTime ON (A.Date=AttendanceTime.Date AND A.ClockInMax=AttendanceTime.ClockIn AND A.Username=AttendanceTime.Username) INNER JOIN Employee ON Employee.Username=A.Username WHERE Employee.UsernameManager LIKE '$Username'";
                $conClockedIn = mysqli_query($conn, $sqlClockedIn);
                if (!$conClockedIn){
                    echo '<script type="text/javascript">
                    window.alert("ERROR CONNECTION WITH DATABASE");
                    window.location.replace("employee_status_manager.php");
                    </script>';
                    exit();
            }else{
            ?>
            <table name="table" id="table">
                <tr>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Status</th>
                    <th>Time in</th>
                    <th>Break Length</th>
                </tr>
                <?php
                // print employees' username,surname,name of the current manager(who is logged in) that are on leave
                while ($rowLeave = mysqli_fetch_array($leaveSql)) {
                    echo "<tr>";
                    echo "<td>" . $rowLeave['Username'] . "</td>";
                    echo "<td>" . $rowLeave['Name'] . "</td>";
                    echo "<td>" . $rowLeave['Surname'] . "</td>";
                    echo "<td>Leave</td>";
                    echo "<td>-</td>";
                    echo "<td>-</td>";
                    echo "</tr>";
                }
                // print employees' username,surname,name of the current manager(who is logged in) that are either clocked in,clocked out or on break
                while ($row = mysqli_fetch_array($conClockedIn)) {
					// check if ClockOut,Break,ReturnBreak columns have their default value, if yes employee is clocked in 
                    if (strcmp($row['ClockOut'], "00:00:00") == 0 && strcmp($row['Break'], "00:00:00") == 0 && strcmp($row['ReturnBreak'], "00:00:00") == 0) {
                        echo "<tr>";
                        echo "<td>" . $row['Username'] . "</td>";
                        echo "<td>" . $row['Name'] . "</td>";
                        echo "<td>" . $row['Surname'] . "</td>";
                        echo "<td>Clocked in</td>";
                        echo "<td>" . $row['ClockIn'] . "</td>";
                        echo "<td>" . $row['BreakLength'] . "</td>";
                        echo "</tr>";
					// check if Break and ReturnBreak columns have their default value and ClockOut column don't has its default value, employee is clocked out 
                    } elseif (strcmp($row['ClockOut'], "00:00:00") != 0 && strcmp($row['Break'], "00:00:00") == 0 && strcmp($row['ReturnBreak'], "00:00:00") == 0) {
                        echo "<tr>";
                        echo "<td>" . $row['Username'] . "</td>";
                        echo "<td>" . $row['Name'] . "</td>";
                        echo "<td>" . $row['Surname'] . "</td>";
                        echo "<td>Clocked out</td>";
                        echo "<td>-</td>";
                        echo "<td>" . $row['BreakLength'] . "</td>";
                        echo "</tr>";
					// check if ClockOut and ReturnBreak columns have their default value and Break column don't has its default value, employee is on break
                    } elseif (strcmp($row['ClockOut'], "00:00:00") == 0 && strcmp($row['Break'], "00:00:00") != 0 && strcmp($row['ReturnBreak'], "00:00:00") == 0) {
                        echo "<tr>";
                        echo "<td>" . $row['Username'] . "</td>";
                        echo "<td>" . $row['Name'] . "</td>";
                        echo "<td>" . $row['Surname'] . "</td>";
                        echo "<td>On Break</td>";
                        echo "<td>" . $row['ClockIn'] . "</td>";
                        echo "<td>" . $row['BreakLength'] . "</td>";
                        echo "</tr>";
					// check if Break and ReturnBreak columns have not their default value and ClockOut column has its default value, employee is either on break or clocked in
                    } elseif (strcmp($row['ClockOut'], "00:00:00") == 0 && strcmp($row['Break'], "00:00:00") != 0 && strcmp($row['ReturnBreak'], "00:00:00") != 0) {
						// check if Break value is greater than ReturnBreak value, employee is on break
                        if ($row['Break'] > $row['ReturnBreak']) {
                            echo "<tr>";
                            echo "<td>" . $row['Username'] . "</td>";
                            echo "<td>" . $row['Name'] . "</td>";
                            echo "<td>" . $row['Surname'] . "</td>";
                            echo "<td>On Break</td>";
                            echo "<td>" . $row['ClockIn'] . "</td>";
                            echo "<td>" . $row['BreakLength'] . "</td>";
                            echo "</tr>";
						// check if ReturnBreak value is greater than Break value, employee is clocked in
                        } elseif ($row['Break'] < $row['ReturnBreak']) {
                            echo "<tr>";
                            echo "<td>" . $row['Username'] . "</td>";
                            echo "<td>" . $row['Name'] . "</td>";
                            echo "<td>" . $row['Surname'] . "</td>";
                            echo "<td>Clocked in</td>";
                            echo "<td>" . $row['ClockIn'] . "</td>";
                            echo "<td>" . $row['BreakLength'] . "</td>";
                            echo "</tr>";
                        } else {
                             echo '<script type="text/javascript">
							 window.alert("ERROR!");
							 window.location.replace("employee_status_manager.php");
		                     </script>';
							 exit();
                        }
					// check if ClockOut,Break and ReturnBreak columns have not their default value employee is either clocked out, on break or clocked in
                    } elseif (strcmp($row['ClockOut'], "00:00:00") != 0 && strcmp($row['Break'], "00:00:00") != 0 && strcmp($row['ReturnBreak'], "00:00:00") != 0) {
						// check if ClockOut value is greater than Break and ReturnBreak values, employee is clocked out
                        if ($row['ClockOut'] > $row['Break'] && $row['ClockOut'] > $row['ReturnBreak']) {
                            echo "<tr>";
                            echo "<td>" . $row['Username'] . "</td>";
                            echo "<td>" . $row['Name'] . "</td>";
                            echo "<td>" . $row['Surname'] . "</td>";
                            echo "<td>Clocked out</td>";
                            echo "<td>-</td>";
                            echo "<td>" . $row['BreakLength'] . "</td>";
                            echo "</tr>";
						// check if Break value is greater than ClockOut and ReturnBreak values, employee is on break
                        } elseif ($row['Break'] > $row['ClockOut'] && $row['Break'] > $row['ReturnBreak']) {
                            echo "<tr>";
                            echo "<td>" . $row['Username'] . "</td>";
                            echo "<td>" . $row['Name'] . "</td>";
                            echo "<td>" . $row['Surname'] . "</td>";
                            echo "<td>On Break</td>";
                            echo "<td>" . $row['ClockIn'] . "</td>";
                            echo "<td>" . $row['BreakLength'] . "</td>";
                            echo "</tr>";
						// check if ReturnBreak value is greater than ClockOut and Break values, employee is clocked in
                        } elseif ($row['ReturnBreak'] > $row['ClockOut'] && $row['ReturnBreak'] > $row['Break']) {
                            echo "<tr>";
                            echo "<td>" . $row['Username'] . "</td>";
                            echo "<td>" . $row['Name'] . "</td>";
                            echo "<td>" . $row['Surname'] . "</td>";
                            echo "<td>Clock in</td>";
                            echo "<td>" . $row['ClockIn'] . "</td>";
                            echo "<td>" . $row['BreakLength'] . "</td>";
                            echo "</tr>";
                        } else {
                            echo '<script type="text/javascript">
							window.alert("ERROR!");
							window.location.replace("employee_status_manager.php");
		                    </script>';
							exit();
                        }
                    } else {
                            echo '<script type="text/javascript">
							window.alert("ERROR!");
							window.location.replace("employee_status_manager.php");
		                    </script>';
							exit();
                    }
                }
                }
                }
                ?>
            </table>
        </div>
    </form>

<script>
    function myFunction4() {
        document.getElementById("form_id4").submit();
    }
</script>
</body>
</html>
