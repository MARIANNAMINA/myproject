<?php
session_start();
if (isset($_POST['ClockOutButton'])) {
    include 'db.php';
    $_SESSION['clockedin'] = 'NOW()';
    $Username = $_SESSION['username'];
    $sqlClockedIn = "SELECT AttendanceTime.* FROM (SELECT MAX(AttendanceTime.ClockIn) AS ClockInMax,AttendanceTime.Date,AttendanceTime.Username FROM AttendanceTime WHERE AttendanceTime.Date = curdate() GROUP BY AttendanceTime.Date,AttendanceTime.Username) AS A INNER JOIN AttendanceTime ON (A.Date=AttendanceTime.Date AND A.ClockInMax=AttendanceTime.ClockIn AND A.Username=AttendanceTime.Username) WHERE AttendanceTime.Username LIKE '$Username'";
    $sql = mysqli_query($conn, $sqlClockedIn);
    $flag = true;

    if (!$sql) {
        echo '<script type="text/javascript">
        window.alert("ERROR CONNECTING WITH DATABASE1");
        window.location.replace("clock_in_employee.html");
        </script>';
    } else {
        while ($row = mysqli_fetch_array($sql)) {
            $flag = false;
            if (strcmp($row['ClockOut'], "00:00:00") != 0) {
                echo '<script type="text/javascript">alert("You can not press Clock out without pressing first Clock in!");
					window.location.replace("clock_in_employee.html");
					</script>';
			}elseif($row['Break']>$row['ReturnBreak']){
				echo '<script type="text/javascript">alert("You can not press Clock out without pressing first Return From Break!");
				window.location.replace("clock_in_employee.html");
				</script>';		
            } else {
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

