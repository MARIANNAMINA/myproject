<?php
/**
 *
 * Author: Maria Kouppi
 * This is a php file for leave request functionality that an employee can do. If the employees click the sumbit button
 * first of all, it does the check for the dates if they are correct and after then the date of leave, the date when
 * leave is over and the reason submit on database.
 *
 */
session_start();

/**
 * Print the error message in alert box if employee give wrong date for leave request
 */
function printError()
{
    echo '<script type="text/javascript">
                var d = new Date();
                var month = d.getMonth()+1;
                window.alert("The date must be after " + d.getDate() + "/" + month + "/"  + d.getFullYear()); 
                window.location.replace("leave_request_employee.html");
                </script>';

}

function leaveRequest()
{
// click the submit button
    if (isset($_POST['continue'])) {
        include 'db.php';

        $username = $_SESSION['username'];


        $DateFrom = $_POST['From'];
        $DateTo = $_POST['To'];

        $Desc = $_POST['desc'];

        $DateFrom = date("Y-m-d", strtotime($DateFrom));
        $DateTo = date("Y-m-d", strtotime($DateTo));


        // if function returns false, print error message
        if (strtotime($DateFrom) < strtotime('now')) {
            printError();
        } else if (strtotime($DateTo) < strtotime('now')) {
            printError();
        } else if (strtotime($DateTo) < strtotime($DateFrom)) { //the date which the leave starts should be before the date which the leave finishes
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
		window.location.replace("leave_request_employee.html");
		</script>';
            } else {
                echo '<script type="text/javascript">
		window.alert("INSERTED CORRECTLY"); 
		window.location.replace("EmployeeDashboard.html");
		</script>';
            }

        }
    } else {
        echo '<script type="text/javascript">alert("NOT FOUND"); 
	window.location.replace("leave_request_employee.html");
	</script>';
        exit();
    }
}

leaveRequest();

?>
