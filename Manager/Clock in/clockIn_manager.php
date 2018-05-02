<?php
/*
 * Contains the functionality of the button Clock in of the file clock_in_manager.php.
 */
$Username = $_SESSION['username'];
if (isset($_POST['ClockInButton'])) {
	include 'db.php';
    // select the row that contains the last time a manager clicked Clock in button at the current date
    $sqlClockedIn = "SELECT AttendanceTime.* FROM (SELECT MAX(AttendanceTime.ClockIn) AS ClockInMax,AttendanceTime.Date,AttendanceTime.Username FROM AttendanceTime WHERE AttendanceTime.Date = curdate() GROUP BY AttendanceTime.Date,AttendanceTime.Username) AS A INNER JOIN AttendanceTime ON (A.Date=AttendanceTime.Date AND A.ClockInMax=AttendanceTime.ClockIn AND A.Username=AttendanceTime.Username) WHERE AttendanceTime.Username LIKE '$Username'";

    $sql = mysqli_query($conn, $sqlClockedIn);
    $flag = true;
	// check if query has a problem
    if (!$sql) {
        print_error();
    } else {	
        while ($row = mysqli_fetch_array($sql)) {
            $flag = false;
            // check if the result of the above query, specifically ClockOut column has its default value, manager attempts to click Clock in button more than once, without click Clock out button
            if (strcmp($row['ClockOut'], "00:00:00") == 0) {
               print_error_clockIn();
            } else {
                // insert into DB the current time and date that manager clicked the button Clock in
                $query = "INSERT INTO AttendanceTime (Username,Date,ClockIn) VALUES ('$Username',NOW(),NOW())";
                // check if query has a problem
				if (!mysqli_query($conn, $query)) {
                   print_error();
                } else {
                   $c_state="I";
				   // change the state of employee
				   $update_state = "UPDATE Employee SET State='$c_state' WHERE Username LIKE '$Username'"; 
				   // check if query has a problem
				   if (!mysqli_query($conn, $update_state)) {
						print_error();
					}
                }
            }
        }

        // if $flag is true that means that manager attempts to click the button Clock in for the first time at the current data
        if ($flag) {
            // insert into DB the current time and date that manager clicked the button Clock in
            $query = "INSERT INTO AttendanceTime (Username,Date,ClockIn) VALUES ('$Username',NOW(),NOW())";
            // check if query has a problem
			if (!mysqli_query($conn, $query)) {
               print_error();
            }else{
				$c_state="I";
				// change the state of employee
				$update_state = "UPDATE Employee SET State='$c_state' WHERE Username LIKE '$Username'"; 
				// check if query has a problem
				if (!mysqli_query($conn, $update_state)) {
					print_error();
				}
			}			
        }
    }
}

function print_error(){
	echo '<script type="text/javascript">
		  window.alert("ERROR CONNECTING WITH DATABASE!");
		  window.location.replace("clock_in_manager.php");
		  </script>';
	exit();
}

function print_error_clockIn(){
	echo '<script type="text/javascript">
		  alert("You have already clicked the button Clock in!");
		  window.location.replace("clock_in_manager.php");
		  </script>';
    exit();
}
?>

