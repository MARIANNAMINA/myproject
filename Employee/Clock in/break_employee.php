<?php
/*
 * Contains the functionality of the button Break of the file clock_in_employee.php.
 */
session_start();

// the username of the employee that is logged in
$Username = $_SESSION['username'];
if (isset($_POST['Break'])) {
    include 'db.php';
    // select the row that contains the last time a employee clicked Clock in button at the current date
    $sqlClockedIn = "SELECT AttendanceTime.* FROM (SELECT MAX(AttendanceTime.ClockIn) AS ClockInMax,AttendanceTime.Date,AttendanceTime.Username FROM AttendanceTime WHERE AttendanceTime.Date = curdate() GROUP BY AttendanceTime.Date,AttendanceTime.Username) AS A INNER JOIN AttendanceTime ON (A.Date=AttendanceTime.Date AND A.ClockInMax=AttendanceTime.ClockIn AND A.Username=AttendanceTime.Username) WHERE AttendanceTime.Username LIKE '$Username'";
	
	$clockOut="00:00:00";
	// select employee who is not clocked out in the case that the date is changed and employee did not clicked Clock Out button
	$sqlClockedIn2="SELECT * FROM AttendanceTime WHERE ClockOut='$clockOut' AND Username LIKE '$Username'";
    $sql = mysqli_query($conn, $sqlClockedIn);
	$sql2 = mysqli_query($conn, $sqlClockedIn2);
	
	// used to check if employee attempts to click the button Break without pressing first the button Clock in for the current date
    $flag = true;
	// used to check if employee did not clicked Clock Out button in case the date has changed 
	$flag2 = false;
	
	// check if query has a problem
    if (!$sql || !$sql2) {
       print_error();
    } else {
		// check if employee did not clicked Clock Out button in case the date has changed  
		if(mysqli_num_rows($sql2)!=0){
			$sql=$sql2;
			$flag2 = true;
		}
		
        while ($row = mysqli_fetch_array($sql)) {
            $flag = false;
			// check if the result of the above query, specifically ClockOut column has not its default value, employee attempts to click Break button without pressing first the button Clock in
            if (strcmp($row['ClockOut'], "00:00:00") != 0) {
                print_error_clockIn_break();
			// check if the result of the above query, specifically if value of Break column is greater than the value of ReturnBreak column, employee attempts to click Break button as he/she is on break  
            } elseif ($row['Break'] > $row['ReturnBreak']) {
                print_error_break_ret();
            } else {
				
				if(!$flag2){
					// update the time that employee clicked the button Break with the current one
					$query = "UPDATE  AttendanceTime SET Break = NOW() WHERE ClockIn=(SELECT maxClockIn FROM (SELECT MAX(ClockIn) AS maxClockIn,Date,Username FROM AttendanceTime WHERE Date = curdate() AND Username LIKE '$Username' GROUP BY Date,Username) AS Tmp)";
				}else{
					// update the time that employee clicked the button Clock out with the current one
					$query = "UPDATE  AttendanceTime SET Break = NOW() WHERE ClockOut='$clockOut'";
				}
				
				// check if query has a problem
                if (!mysqli_query($conn, $query)) {
                    print_error();
                } else {
                   $c_state="B";
				   
				    // change the state of employee
				   $update_state = "UPDATE Employee SET State='$c_state' WHERE Username LIKE '$Username'";

					// check if query has a problem				   
				   if (!mysqli_query($conn, $update_state)) {
						print_error();
					}
                }
            }
        }
		
		// check if $flag is true, employee attempts to click the button Break without pressing first the button Clock in for the current date
        if ($flag) {
            print_error_break_in();
        }
    }
} 

function print_error_break_in(){
	echo '<script type="text/javascript">alert("You can not press Break without pressing first Clock in!");
		  window.location.replace("clock_in_employee.php");
		  </script>';
	exit();
}

function print_error_break_ret(){
	echo '<script type="text/javascript">alert("You have already clicked the button Break!");
		  window.location.replace("clock_in_employee.php");
		  </script>';
	exit();
}

function print_error_clockIn_break(){
	echo '<script type="text/javascript">alert("You can not press Break without pressing first Clock in!");
		  window.location.replace("clock_in_employee.php");
		  </script>';
}
?>

