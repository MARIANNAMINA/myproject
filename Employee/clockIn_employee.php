<?php
/*
 * Contains the functionality of the button Clock in of the file clock_in_employee.php.
 */

// the username of the employee
$Username = $_SESSION['username'];

// check if the button clock in is clicked
if (isset($_POST['ClockInButton'])) {
	include 'db.php';

	// check if the button clock in is clicked as the employee was on break
	if(strcmp($_SESSION['prev_state'],"BREAK")==0){
       print_error_clockIn_retBreak();
	// check if the button clock in is clicked as the employee was clocked in
    }else if(strcmp($_SESSION['prev_state'],"CLOCKED IN")==0){
        print_error_clockIn();
    }

    // select the row that contains the last time an employee clicked Clock in button at the current date
    $sqlClockedIn = "SELECT AttendanceTime.* FROM (SELECT MAX(AttendanceTime.ClockIn) AS ClockInMax,AttendanceTime.Date,AttendanceTime.Username FROM AttendanceTime WHERE AttendanceTime.Date = curdate() GROUP BY AttendanceTime.Date,AttendanceTime.Username) AS A INNER JOIN AttendanceTime ON (A.Date=AttendanceTime.Date AND A.ClockInMax=AttendanceTime.ClockIn AND A.Username=AttendanceTime.Username) WHERE AttendanceTime.Username LIKE '$Username'";

    $sql = mysqli_query($conn, $sqlClockedIn);
    $flag = true;

	// check if query has a problem
    if (!$sql) {
        print_error();
    } else {	
        while ($row = mysqli_fetch_array($sql)) {
            $flag = false;
			insert_clockin($conn,$Username,$c_state);
        }

        // if $flag is true that means that employee attempts to click the button Clock in for the first time at the current date
        if ($flag) {
           insert_clockin($conn,$Username,$c_state);
        }
    }
}

/**
 * Prints an error message related to a problem with the used queries
 */
function print_error(){
	echo '<script type="text/javascript">
		  window.alert("ERROR CONNECTING WITH DATABASE!");
		  window.location.replace("clock_in_employee.php");
		  </script>';
	exit();
}

/**
 * Prints an error message related to the constraint that an employee can not press Clock in button if he/she has already been * clocked in 
 */
function print_error_clockIn(){
	echo '<script type="text/javascript">
		  alert("You have already clicked the button Clock in!");
		  window.location.replace("clock_in_employee.php");
		  </script>';
    exit();
}

/**
 * Prints an error message related to the constraint that an employee can not press Clock in button if he/she is on break, without pressing first the button Return from Break
 */
function print_error_clockIn_retBreak(){
	echo '<script type="text/javascript">
		  alert("You can not press the button Clock in without pressing first the button Return from Break");
		  window.location.replace("clock_in_employee.php");
		  </script>';
    exit();
}

/**
 * Update the state of the employee to clock in
 * @param $conn The connection with the database
 * @param $Username The username of the employee
 * @param $c_state The new state of the employee, which is clocked in
 */
function insert_clockin($conn,$Username,$c_state){
	// insert into DB the current time and date that employee clicked the button Clock in
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
?>

