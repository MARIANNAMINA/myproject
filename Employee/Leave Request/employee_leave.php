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
                window.location.replace("leave_request_employee.php");
                </script>';

}

/**
 *
 * Click the submit button and check if the dates are correct. If they are correct,then the leave request submit
 * in database.
 *
 */
//function leaveRequest()
//{
// click the submit button
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'db.php';

    $error_desc = "";
    $Desc = "";

    // check if description text box is empty
    if (empty($_POST['desc'])) {
        $error_desc = "*Description is required";
    } else {
        $Desc = mysqli_real_escape_string($conn, $_POST['desc']);
        // check if only characters are inserted
        if (!preg_match("/^[a-zA-Z ]*$/", $Desc)) {
            $d = "";
            $error_desc = "*Invalid description";
        } else {

            $username = $_SESSION['username'];

            $DateFrom = mysqli_real_escape_string($conn, $_POST['From']);
            $DateTo = mysqli_real_escape_string($conn, $_POST['To']);

            $DateFrom = date("Y-m-d", strtotime($DateFrom));
            $DateTo = date("Y-m-d", strtotime($DateTo));

            if (empty($error_desc)) {
                /*
                 *  Check if the fields of dates are correct. For example if the date when he/she want to start
                 *  the leave is after the date when he/she return from leaves,and if the date when he/she want
                 *  to start the leave and  the date when he/she return from leaves is before thecurrent date,
                 * then he/she can not do a leave request before the current date.
                 *
                 */
                if (strtotime($DateFrom) < strtotime('now')) {
                    printError();
                } else if (strtotime($DateTo) < strtotime('now')) {
                    printError();
                } else if (strtotime($DateTo) < strtotime($DateFrom)) {
                    //the date which the leave starts should be before the date which the leave finishes
                    echo '<script type="text/javascript">
			window.alert("The date on which the leave will end is after the date it starts! Try again please!");
			window.location.replace("leave_request_employee.php");
			</script>';
                } else {

                    $sql2 = "SELECT Username FROM Employee WHERE Username='$username'";

                    $resultCheck = mysqli_num_rows(mysqli_query($conn, $sql2));


                    /*
                     * Insert the employee’s or manager’s leave request in database. Insert the date when he/she
                     * will start the leave, the date when he/she return from leave, the reason for his/her leave
                     * (e.g holiday, doctor appointment) and his/her username because his/her manager should be
                     * accept his/her request.
                     */
                    $sql = "INSERT INTO `Leave`(`Reason`, `ToDate`, `FromDate`, `Username`) 
                    VALUES (?,?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo '<script type="text/javascript">
                    window.alert("NOT INSERTED"); 
                    window.location.replace("leave_request_employee.html");
                    </script>';
                    } else {
                        mysqli_stmt_bind_param($stmt, "ssss", $Desc, $DateTo, $DateFrom, $username);
                        mysqli_stmt_execute($stmt);
                        echo '<script type="text/javascript">
                    window.alert("INSERTED CORRECTLY"); 
                    window.location.replace("EmployeeDashboard.html");
                    </script>';
                    }

                }
            }
        }
    }
}
//}

//call function
//leaveRequest();

?>
