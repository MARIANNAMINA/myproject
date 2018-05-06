<?php
/*
 * Employee Status screen gives the opportunity to managers to see the state of their employees.
 * State of an employee can be either on leave, clocked in, clocked out or on break.
 * Manager can also see how much time each of his/her employees were on break from the last time that were clocked in
 * and the time that they pressed the button Clock in.
 */
session_start();

/**
 * Print employees who are on leave
 * @param $leave DB's row for the current employee
 */
function onLeave($leave) {
	foreach ($leave as $key => $rowLeave) {
		echo "<tr>";
		echo "<td>" . $rowLeave['Username'] . "</td>";
		echo "<td>" . $rowLeave['Name'] . "</td>";
		echo "<td>" . $rowLeave['Surname'] . "</td>";
		echo "<td>Leave</td>";
		echo "<td>-</td>";
		echo "<td>-</td>";
		echo "</tr>";
	}
}

/**
 * Print employees who are clocked in
 * @param $row  DB's row for the current employee
 */
function clockedIn($row){
	echo "<tr>";
    echo "<td>" . $row['Username'] . "</td>";
    echo "<td>" . $row['Name'] . "</td>";
    echo "<td>" . $row['Surname'] . "</td>";
    echo "<td>Clocked in</td>";
    echo "<td>" . $row['ClockIn'] . "</td>";
    echo "<td>" . $row['BreakLength'] . "</td>";
    echo "</tr>";
}

/**
 * Print employees who are clocked out
 * @param $row DB's row for the current employee
 */
function clockedOut($row){
	echo "<tr>";
    echo "<td>" . $row['Username'] . "</td>";
    echo "<td>" . $row['Name'] . "</td>";
    echo "<td>" . $row['Surname'] . "</td>";
    echo "<td>Clocked out</td>";
    echo "<td>-</td>";
    echo "<td>-</td>";
    echo "</tr>";
}

/**
 * Print employees who are on break
 * @param $row DB's row for the current employee
 */
function onBreak($row){
	echo "<tr>";
    echo "<td>" . $row['Username'] . "</td>";
    echo "<td>" . $row['Name'] . "</td>";
    echo "<td>" . $row['Surname'] . "</td>";
    echo "<td>On Break</td>";
    echo "<td>" . $row['ClockIn'] . "</td>";
    echo "<td>" . $row['BreakLength'] . "</td>";
    echo "</tr>";
}

/**
 * Print employees who are clocked out, at the case that they did not pressed Clock in button for the current date
 * @param $conClockedOut Manager's employees
 * @param $in DB's row for employees that have pressed any of the buttons Clock in, Clock out, Break, Return from Break for the current date or they have already been clocked in or on break from a previous date
 * @param $leave DB's row for employees that are on leave
 */
function findClockOut($conClockedOut,$in,$leave){
	while ($rowEmpl = mysqli_fetch_array($conClockedOut)) {
		// used to check if an employee is on leave
	    $flag1=false;
	    // used to check if an employee has already pressed a button for the current date or has already been clocked in or on break from a previous date
		$flag2=false;

		// check if an employee is on leave
		foreach ($leave as $key => $rowLeave) {
			if(strcmp($rowLeave['Username'],$rowEmpl['Username'])==0){
				$flag1=true;
				break;
			}
		}

		// check if an employee is on leave continue with the next one
		if($flag1){
			continue;
		}

		// check if an employee has already been on any state for the current date
		foreach ($in as $key => $rowState) {
			if(strcmp($rowState['Username'],$rowEmpl['Username'])==0){
				$flag2=true;
				break;
			}
		}

		// check if an employee has already been on any state for the current date continue with the next one
		if($flag2){
			continue;
		}

		// used in case an employee has not been on any state (has not clicked any of the buttons) on the current date and he/she has not already been in any state(clocked in or on break)
		clockedOut($rowEmpl);
		
	}
}

/**
 * Print error message related to error connecting with database
 */
function printError(){
	echo '<script type="text/javascript">
		  window.alert("ERROR!");
		  window.location.replace("employee_status_manager.php");
		  </script>';
	exit();
}

/**
 * Print employees' username,surname,name of the current manager
 * (who is logged in) that are either clocked in,clocked out or on break
 * @param $in DB's row for the current employee
 */
function findState($in){

    // find the state of an employee
    foreach ($in as $key => $row) {
		
		if(is_null($row['BreakLength'])){
			$row['BreakLength']="-";
	    }
		
		// check if employee is clocked in
		if ($row['State']=="I" || $row['State']=="i" ) {
			clockedIn($row);
		// check if employee is clocked out
		}else if ($row['State']=="o" || $row['State']=="O" ) {
			clockedOut($row);
		// check if employee is on break
		}else if ($row['State']=="B" || $row['State']=="b" ) {
			onBreak($row);
		} else {
			printError();
		}
    }	
}

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
                <li><a href="leave_request_manager.php">Leave Request</a></li>
                <li><a href="average_per_week.php">Average Report</a></li>
                <li><a href="payroll_report.php">Payroll Report</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn" style="color:orange;text-decoration: underline">My
                        Employees</a>
                    <div class="dropdown-content">
                        <a href="add_employee.php">Add Employee</a>
                        <a href="choose_employee.php">Edit Employee</a>
                        <a href="delete_employee_.php">Delete Employee</a>
                        <a href="employee_status_manager.php" style="color:orange;text-decoration: underline">Employee
                            Status</a>
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
            </label>
        </ul>
    </div>

</div>



    <p class="title_class"><b>Employee Status</b></p>

    <br>
    <form class="username" method="POST">

        <div style="overflow-x:auto;">
        <?php
            include_once 'db.php';

            $Username = $_SESSION['username'];

            // select employees of the current manager(who is logged in) that are on leave
            $sql = "SELECT `Leave`.LeaveID,Employee.Username,Employee.Name,Employee.Surname FROM `Leave` INNER JOIN Employee ON (`Leave`.Username=Employee.Username) WHERE `Leave`.FromDate <= curdate() AND `Leave`.ToDate >= curdate() AND (`Leave`.State='A' OR `Leave`.State='a') AND Employee.UsernameManager LIKE '$Username'";

            $leaveSql = mysqli_query($conn, $sql);
            if (!($leaveSql)){
               printError();
            }else{
				$clockOut="00:00:00";
                // select employees of the current manager(who is logged in) that are either clocked in,clocked out or on break by selecting the last time they clicked to the corresponding button
                $sqlClockedIn = "SELECT AttendanceTime.*,Employee.Username,Employee.State,Employee.Name,Employee.Surname,Employee.ID FROM (SELECT MAX(AttendanceTime.ClockIn) AS ClockIn,AttendanceTime.Date,AttendanceTime.Username FROM AttendanceTime WHERE AttendanceTime.Date = curdate() GROUP BY AttendanceTime.Date,AttendanceTime.Username) AS A INNER JOIN AttendanceTime ON (A.Date=AttendanceTime.Date AND A.ClockIn=AttendanceTime.ClockIn AND A.Username=AttendanceTime.Username) LEFT JOIN Employee ON Employee.Username=A.Username WHERE Employee.UsernameManager LIKE '$Username' UNION SELECT AttendanceTime.*,Employee.Username,Employee.State,Employee.Name,Employee.Surname,Employee.ID FROM (SELECT AttendanceTime.ClockOut,AttendanceTime.ClockIn,AttendanceTime.Date,AttendanceTime.Username FROM AttendanceTime WHERE AttendanceTime.ClockOut = '$clockOut' AND AttendanceTime.Date != curdate()) AS A1 INNER JOIN AttendanceTime ON (A1.Date=AttendanceTime.Date AND A1.ClockOut=AttendanceTime.ClockOut AND A1.Username=AttendanceTime.Username) LEFT JOIN Employee ON Employee.Username=A1.Username WHERE Employee.UsernameManager LIKE '$Username'";

                // select employee's of the manager
				$sql_empl="SELECT Employee.Username,Employee.State,Employee.Name,Employee.Surname FROM Employee WHERE Employee.UsernameManager LIKE '$Username'";
				
                $conClockedIn = mysqli_query($conn, $sqlClockedIn);
				$conClockedOut = mysqli_query($conn, $sql_empl);
                if (!$conClockedIn || !$conClockedOut){
                   printError();
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
                // used to save employees who are on leave in a table
				$leave = array();
				// used to save employees who pressed a button (Clocked in, Clocked out, Break, Return from Break) on the current date or they were already clocked in or on break from a previous date
				$in = array();

				while ($rowLeave = mysqli_fetch_array($leaveSql)) {
					$leave[]=$rowLeave;
				}
				while ($rowIn = mysqli_fetch_array($conClockedIn)) {
					$in[]=$rowIn;
				}
				onLeave($leave);
				findState($in);
				findClockOut($conClockedOut,$in,$leave);

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
