<?php
/*
 * Contains the functionality of the button Return from break of the file clock_in_manager.html.
 */
session_start();
if (isset($_POST['returnFromBreak'])) {
    include 'db.php';
    $Username = $_SESSION['username'];
    // select the row that contains the last time a manager clicked Clock in button at the current date
    $sqlClockedIn = "SELECT AttendanceTime.* FROM (SELECT MAX(AttendanceTime.ClockIn) AS ClockInMax,AttendanceTime.Date,AttendanceTime.Username FROM AttendanceTime WHERE AttendanceTime.Date = curdate() GROUP BY AttendanceTime.Date,AttendanceTime.Username) AS A INNER JOIN AttendanceTime ON (A.Date=AttendanceTime.Date AND A.ClockInMax=AttendanceTime.ClockIn AND A.Username=AttendanceTime.Username) WHERE AttendanceTime.Username LIKE '$Username'";
    $sql = mysqli_query($conn, $sqlClockedIn);
	
	// used to check if manager attempts to click the button Return from break without pressing first the button Clock in for the current date
    $flag = true;

    if (!$sql) {
        echo '<script type="text/javascript">
        window.alert("ERROR CONNECTING WITH DATABASE1");
        window.location.replace("clock_in_manager.html");
        </script>';
    } else {
        while ($row = mysqli_fetch_array($sql)) {
            $flag = false;
			// check if the result of the above query, specifically ClockOut column has not its default value, manager attempts to click Return from break button without pressing first the button Clock in
            if (strcmp($row['ClockOut'], "00:00:00") != 0) {
                echo '<script type="text/javascript">alert("You can not press Return From Break without pressing first Clock in!");
					window.location.replace("clock_in_manager.html");
					</script>';
			// check if the result of the above query, specifically if value of Return from break column is greater than the value of Break column, manager attempts to click Return from break button as he/she is clocked in   
            } elseif ($row['Break'] < $row['ReturnBreak']) {
                echo '<script type="text/javascript">alert("You have already clicked the button Return From Break!");
					window.location.replace("clock_in_manager.html");
					</script>';
			// check if the result of the above query, specifically if value of Break column has its default value, manager attempts to click Return from break button without pressing the Break button   		
            } elseif (strcmp($row['Break'], "00:00:00") == 0) {
                echo '<script type="text/javascript">alert("You can not press Return From Break without pressing first Break!");
					window.location.replace("clock_in_manager.html");
					</script>';
            } else {
				// update the time that manager clicked the button Return from break with the current one
                $query = "UPDATE  AttendanceTime SET ReturnBreak = NOW() WHERE ClockIn=(SELECT maxClockIn FROM (SELECT MAX(ClockIn) AS maxClockIn,Date,Username FROM AttendanceTime WHERE Date = curdate() AND Username LIKE '$Username' GROUP BY Date,Username) AS Tmp)";
                if (!mysqli_query($conn, $query)) {
                    echo '<script type="text/javascript">
						window.alert("ERROR CONNECTING WITH DATABASE!");
						window.location.replace("clock_in_manager.html");
						</script>';
                } else {
                    echo '<script type="text/javascript">alert("RETURN FROM BREAK!");
						window.location.replace("clock_in_manager.html");
						</script>';
                }
            }
        }
		
		// check if $flag is true, manager attempts to click the button Return from break without pressing first the button Clock in for the current date
        if ($flag) {
            echo '<script type="text/javascript">alert("You can not press Return From Break without pressing first Clock in!");
			window.location.replace("clock_in_manager.html");
			</script>';
        }
    }
} else {
    echo '<script type="text/javascript">alert("NOT FOUND");
	window.location.replace("clock_in_manager.html");
	</script>';
    exit();
}
?>

