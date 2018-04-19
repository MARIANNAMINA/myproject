<!--
- Author: Maria Kouppi
-
- This is a php file for leave request functionality that a manager can do. If the managers click the sumbit button
- first of all, it does the check for the dates if they are correct and after then the date of leave, the date when
- leave is over and the reason submit on database.
-->
<?php
session_start();
if (isset($_POST['continue'])) {
    include 'db.php';

    $username = $_SESSION['username'];
// get the values of text box
    $DateFrom = $_POST['From'];
    $DateTo = $_POST['To'];

    $Desc = $_POST['desc'];

    $DateFrom = date("Y-m-d", strtotime($DateFrom));
    $DateTo = date("Y-m-d", strtotime($DateTo));

    if (strtotime($DateFrom) <= strtotime('now')) {
        echo '<script type="text/javascript">
	var d = new Date();
	window.alert("The date must be after " + d.getDate() + "/" + d.getMonth() + "/"  + d.getFullYear()); 
	window.location.replace("leave_request_employee.html");
	</script>';
    } else if (strtotime($DateTo) <= strtotime('now')) {

        echo '<script type="text/javascript">
		var d = new Date();
		window.alert("The date must be after " + d.getDate() + "/" + d.getMonth() + "/"  + d.getFullYear() + "! Try again please!"); 
		window.location.replace("leave_request_employee.html");
		</script>';

    } else if (strtotime($DateTo) < strtotime($DateFrom)) {
        //the date which the leave starts should be before the date which the leave finishes
        echo '<script type="text/javascript">
			window.alert("The date on which the leave will end is after the date it starts! Try again please!");
			window.location.replace("leave_request_employee.html");
			</script>';
    } else {

        $sql2 = "SELECT Username FROM Employee WHERE Username='$username'";
        $resultCheck = mysqli_num_rows(mysqli_query($conn, $sql2));

        // insert to the database
        $sql = "INSERT INTO `Leave`(`Reason`, `ToDate`, `FromDate`, `Username`) VALUES ('$Desc','$DateTo','$DateFrom','$username')";

        if (!mysqli_query($conn, $sql)) {
            echo '<script type="text/javascript">
		window.alert("NOT INSERTED"); 
		window.location.replace("leave_request_manager.html");
		</script>';
        } else {
            echo '<script type="text/javascript">
		window.alert("INSERTED CORRECTLY"); 
		window.location.replace("manager_dashboard.html");
		</script>';
        }
    }
} else {
    echo '<script type="text/javascript">alert("SUCH FILE DOES NOT EXIST"); 
	window.location.replace("delete_employee.html");
	</script>';


    exit();
}

?>