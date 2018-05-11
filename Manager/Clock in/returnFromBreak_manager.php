<?php
/*
 * Contains the functionality of the button Return from break of the file clock_in_manager.php.
 */
session_start();

// the username of the manager that is logged in
$Username = $_SESSION['username'];

// check if the button Return from Break is clicked
if (isset($_POST['returnFromBreak'])) {
    include 'db.php';
    // select the row that contains the last time a manager clicked Clock in button at the current date
    $sqlClockedIn = "SELECT AttendanceTime.* FROM (SELECT MAX(AttendanceTime.ClockIn) AS ClockInMax,AttendanceTime.Date,AttendanceTime.Username FROM AttendanceTime WHERE AttendanceTime.Date = curdate() GROUP BY AttendanceTime.Date,AttendanceTime.Username) AS A INNER JOIN AttendanceTime ON (A.Date=AttendanceTime.Date AND A.ClockInMax=AttendanceTime.ClockIn AND A.Username=AttendanceTime.Username) WHERE AttendanceTime.Username LIKE '$Username'";
	
	$clockOut="00:00:00";
	// select manager who is not clocked out in the case that the date is changed and manager did not clicked Clock Out button
	$sqlClockedIn2="SELECT * FROM AttendanceTime WHERE ClockOut='$clockOut' AND Username LIKE '$Username'";
    $sql = mysqli_query($conn, $sqlClockedIn);
	$sql2 = mysqli_query($conn, $sqlClockedIn2);
	
	// used to check if manager attempts to click the button Return from break without pressing first the button Clock in for the current date
    $flag = true;

	// used to check if manager did not clicked Clock Out button in case the date has changed 
	$flag2 = false;
	
	// check if queries have a problem
    if (!$sql || !$sql2) {
         print_error();
    } else {
		// check if manager did not clicked Clock Out button in case the date has changed  
		if(mysqli_num_rows($sql2)!=0){
			$sql=$sql2;
			$flag2 = true;
		}
		
        while ($row = mysqli_fetch_array($sql)) {
            $flag = false;
			// check if the result of the above query, specifically ClockOut column has not its default value, manager attempts to click Return from break button without pressing first the button Clock in
            if (strcmp($row['ClockOut'], "00:00:00") != 0) {
               print_error_retbreak_in();
			// check if the result of the above query, specifically if value of Return from break column is greater than the value of Break column, manager attempts to click Return from break button as he/she is clocked in   
            } elseif ($row['Break'] < $row['ReturnBreak']) {
                print_error_retBreak();
			// check if the result of the above query, specifically if value of Break column has its default value, manager attempts to click Return from break button without pressing the Break button   		
            } elseif (strcmp($row['Break'], "00:00:00") == 0) {
              print_error_ret_break();
            } else {
				$query="";
				if(!$flag2){
					// update the time that manager clicked the button Return from break with the current one
					$query = "SELECT ReturnBreak,Break,ClockIn,Date,Username FROM AttendanceTime WHERE ClockIn=(SELECT maxClockIn FROM (SELECT MAX(ClockIn) AS maxClockIn,Date,Username FROM AttendanceTime WHERE Date = curdate() AND Username LIKE '$Username' GROUP BY Date,Username) AS Tmp)";
					// update the time that manager clicked the button Return from break with the current one
					$queryUpdate = "UPDATE  AttendanceTime SET ReturnBreak = NOW() WHERE ClockIn=(SELECT maxClockIn FROM (SELECT MAX(ClockIn) AS maxClockIn,Date,Username FROM AttendanceTime WHERE Date = curdate() AND Username LIKE '$Username' GROUP BY Date,Username) AS Tmp)";
				}else{
					// update the time that manager clicked the button Clock out with the current one
					$query = "SELECT ReturnBreak,Break,ClockIn,Date,Username FROM AttendanceTime WHERE ClockOut='$clockOut'";
					// update the time that manager clicked the button Clock out with the current one
					$queryUpdate = "UPDATE  AttendanceTime SET ReturnBreak = NOW() WHERE ClockOut='$clockOut'";
				}
				// check if queries have a problem
                if (!mysqli_query($conn, $query) || !mysqli_query($conn, $queryUpdate)) {
                     print_error();
                } else {
				   $conBreakLen=mysqli_query($conn, $query);
				   $row_break_len = mysqli_fetch_array($conBreakLen);
				   $break=calculate_break_length($row_break_len);
				   insert_breakLength($conn,$break,$flag2,$Username,$clockOut);
				   update_retFromBreak($conn,$flag2,$break,$Username,$clockOut);
                }
            }
        }
		
		// check if $flag is true, manager attempts to click the button Return from break without pressing first the button Clock in for the current date
        if ($flag) {
            print_error_retbreak_in();
        }
    }
}

/**
 * Prints an error message related to that a manager tries to click the button Return from Break without press the button *Clock in first 
 */
function print_error_retbreak_in(){
	 echo '<script type="text/javascript">alert("You can not press Return From Break without pressing first Clock in!");
			window.location.replace("clock_in_manager.php");	
			</script>';
	exit();
}

/**
 * Prints an error message related to that a manager tries to click the button Return from Break up to one time without pressing first the button Break
 */
function print_error_retBreak(){
	echo '<script type="text/javascript">alert("You have already clicked the button Return From Break!");
				window.location.replace("clock_in_manager.php");	
				</script>';
	exit();
}

/**
 * Prints an error message related to that a manager tries to click the button Return from Break without pressing first the button Break
 */
function print_error_ret_break(){
	echo '<script type="text/javascript">alert("You can not press Return From Break without pressing first Break!");
		  window.location.replace("clock_in_manager.php");	
		  </script>';
	exit();
}

/**
 * Calculates the last break length of the manager
 * @param $row_break_len Contains the time that manager clicks the button Return from Break and the time that manager pressed the button Break
 * @return int Returns how much time manager was in break
 */
function calculate_break_length($row_break_len){
	//calculate in seconds the time in which employee press the button return from break
	$endTime = ($row_break_len['ReturnBreak']{0} . $row_break_len['ReturnBreak']{1})*60*60 + ($row_break_len['ReturnBreak']{3} . $row_break_len['ReturnBreak']{4})*60 + ($row_break_len['ReturnBreak']{6} . $row_break_len['ReturnBreak']{7})*1;
	//calculate in seconds the time in which employee press the button break
	$startTime = ($row_break_len['Break']{0} . $row_break_len['Break']{1})*60*60 + ($row_break_len['Break']{3} . $row_break_len['Break']{4})*60 + ($row_break_len['Break']{6} . $row_break_len['Break']{7})*1;
	//break length in seconds
	$newTime = $endTime-$startTime;
	//break length in minutes
	$break = (int)($newTime/60);
	return $break;
}

/**
 * Insert in the database how much time manager was on break for the last time that he/she did a break
 * @param $conn The connection with the database
 * @param $break The length of the break
 * @param $flag2 Used to check if manager is clocked in from a previous date or not
 * @param $Username The username of the manager
 * @param $clockOut The default value of column ClockOut in the database
 */
function insert_breakLength($conn,$break,$flag2,$Username,$clockOut){
	if(!$flag2){
		// update the time that manager clicked the button Return from break with the current one
		$queryBreak = "UPDATE  AttendanceTime SET BreakLength = '$break' WHERE ClockIn=(SELECT maxClockIn FROM (SELECT MAX(ClockIn) AS maxClockIn,Date,Username FROM AttendanceTime WHERE Date = curdate() AND Username LIKE '$Username' GROUP BY Date,Username) AS Tmp)";
	}else{
		// update the time that manager clicked the button Clock out with the current one
		$queryBreak = "UPDATE  AttendanceTime SET BreakLength = '$break' WHERE ClockOut='$clockOut'";
	}
	
	// check if query has a problem
	if (!mysqli_query($conn, $queryBreak)) {
		print_error();
	}
}

/**
 * @param $conn The connection of the database
 * @param $flag2 Used to check if manager is clocked in from a previous date or not
 * @param $break The length of the break
 * @param $Username The username of the manager
 * @param $clockOut The default value of column ClockOut in the database
 */
function update_retFromBreak($conn,$flag2,$break,$Username,$clockOut){				   
	$c_state="I";
				   
	// change the state of employee
	$update_state = "UPDATE Employee SET State='$c_state' WHERE Username LIKE '$Username'";
				   
	// check if query has a problem
	if (!mysqli_query($conn, $update_state)) {
		print_error();
	}	
}
?>

