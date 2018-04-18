<?php
session_start();

if (isset($_POST['EmployeeStatus_href'])) {
    include 'db.php';

    $UsernameManager = $_SESSION['username'];

    $sql = "SELECT Username FROM Employee WHERE UsernameManager LIKE {$UsernameManager}";
    $resultSql = mysqli_query($conn, $sql);
    if (!$resultSql) {
        echo '<script type="text/javascript">
        window.alert("ERROR CONNECTING WITH DATABASE");
        window.location.replace("manager_dashboard.html");
        </script>';
        exit();
    } else {
        $rowsEmployee = mysqli_num_rows($resultSql);
        if ($rowsEmployee != 0) {
            $rows = mysql_fetch_assoc($sql);
            $sqlLeave = "SELECT Username FROM Leave WHERE Username IN {$sql['Username']} AND FromDate<=curdate() AND ToDate>=curdate()";
            $resultSqlLeave = mysqli_query($conn, $sqlLeave);
            if (!$resultSqlLeave) {
                echo '<script type="text/javascript">
				window.alert("ERROR CONNECTING WITH DATABASE");
				window.location.replace("manager_dashboard.html");
				</script>';
                exit();
            } else {
                echo "<table style="width:100 % ">
				<tr>
				 <th>ID</th> 
				 <th>First Name</th>  
				 <th>Last Name</th>  
                 <th>Status</th>  
                 <th>Time in</th>  
				</tr>";

				while ($row = mysqli_fetch_array($resultSqlLeave)) {
                    echo "<tr>";
                    echo "<td>" . $row['Username'] . "</td>";
                    echo "</tr>";
                }
				echo "</table>";
				
			}

        }
    }

} else {
    echo '<script type="text/javascript">
    window.alert("NOT FOUND"); 
	window.location.replace("manager_dashboard.html");
	</script>';
    exit();

}
?>