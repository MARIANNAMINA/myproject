<?php
/*
 * Contains the functionality of the button Clock out of the file clock_in_employee.html.
 */
session_start();
if (isset($_POST['ClockOutButton'])) {
    include 'db.php';
    $_SESSION['clockedin'] = 'NOW()';
    $Username = $_SESSION['username'];
	// select the row that contains the last time a employee clicked Clock in button at the current date
    $sqlClockedIn = "SELECT AttendanceTime.* FROM (SELECT MAX(AttendanceTime.ClockIn) AS ClockInMax,AttendanceTime.Date,AttendanceTime.Username FROM AttendanceTime WHERE AttendanceTime.Date = curdate() GROUP BY AttendanceTime.Date,AttendanceTime.Username) AS A INNER JOIN AttendanceTime ON (A.Date=AttendanceTime.Date AND A.ClockInMax=AttendanceTime.ClockIn AND A.Username=AttendanceTime.Username) WHERE AttendanceTime.Username LIKE '$Username'";
    $sql = mysqli_query($conn, $sqlClockedIn);
	
	// used to check if employee attempts to click the button Clock out without pressing first the button Clock in for the current date
    $flag = true;

    if (!$sql) {
        echo '<script type="text/javascript">
        window.alert("ERROR CONNECTING WITH DATABASE1");
        window.location.replace("clock_in_employee.html");
        </script>';
    } else {
        while ($row = mysqli_fetch_array($sql)) {
            $flag = false;
			// check if the result of the above query, specifically ClockOut column has not its default value, employee attempts to click Clock out button without pressing first the button Clock in
            if (strcmp($row['ClockOut'], "00:00:00") != 0) {
                echo '<script type="text/javascript">alert("You can not press Clock out without pressing first Clock in!");
					window.location.replace("clock_in_employee.html");
					</script>';
			// check if the result of the above query, specifically if value of Break column is greater than the value of ReturnBreak column, employee attempts to click Clock out button as he/she is on break 
			}elseif($row['Break']>$row['ReturnBreak']){
				echo '<script type="text/javascript">alert("You can not press Clock out without pressing first Return From Break!");
				window.location.replace("clock_in_employee.html");
				</script>';		
            } else {
				// update the time that employee clicked the button Clock out with the current one
                $query = "UPDATE  AttendanceTime SET ClockOut = NOW() WHERE ClockIn=(SELECT maxClockIn FROM (SELECT MAX(ClockIn) AS maxClockIn,Date,Username FROM AttendanceTime WHERE Date = curdate() AND Username LIKE '$Username' GROUP BY Date,Username) AS Tmp)";
                if (!mysqli_query($conn, $query)) {
                    echo '<script type="text/javascript">
						window.alert("ERROR CONNECTING WITH DATABASE!");
						window.location.replace("clock_in_employee.html");
						</script>';
                } else {
                    echo '<script type="text/javascript">alert("CLOCKED OUT!");
						window.location.replace("clock_in_employee.html");
						</script>';
                }
            }
        }

		// check if $flag is true, employee attempts to click the button Clock out without pressing first the button Clock in for the current date
        if ($flag) {
            echo '<script type="text/javascript">alert("You can not press Clock out without pressing first Clock in!");
			window.location.replace("clock_in_employee.html");
			</script>';
        }
    }
} else {
    echo '<script type="text/javascript">alert("NOT FOUND");
	window.location.replace("clock_in_employee.html");
	</script>';
    exit();
}
?>

