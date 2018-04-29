<?php
session_start();

include 'db.php';

/**
 * Manager click one of the buttons, and change the state in database for leave request
 *
 */
function changeState()
{
    if (isset($_POST['Reject'])) {
        $state = "r";

        echo '<script type="text/javascript">
			window.alert("' . $state . '"); 
			</script>';
        //$array[] = $_SESSION['leave_data'];

        $row = $_SESSION['row'];
        // This will evaluate to TRUE so the text will be printed.
        if ($row == 0) {
            echo '<script type="text/javascript">
			window.alert("Empty!!"); 
			
			</script>';
        } else {
            echo '<script type="text/javascript">
			window.alert("' . $row . '"); 
			
			</script>';

            $sqlUpdate = "UPDATE `Leave` SET `Leave`.`State`='$state' WHERE `Leave`.`LeaveID` = 598";
            if (!mysqli_query($conn, $sqlUpdate)) {
                echo '<script type="text/javascript">
			window.alert("Your change not insert in Database!" );		
			window.location.replace("manager_view_request.php");
			</script>';
                exit();
            } else {
                echo '<script type="text/javascript">
			window.alert("INSERTED CORRECTLY!"); 
			window.location.replace("manager_view_request.php");
			</script>';
            }

        }
    } else if (isset($_POST['Accept'])) {


        $state = "a";


        echo '<script type="text/javascript">
			window.alert("' . $state . '"); 
			
			</script>';
        $array[] = $_SESSION['leave_data'];

        // $row = $_GET['row'];


        $sqlUpdate = "UPDATE `Leave` SET `Leave`.`State`='$state' WHERE `Leave`.`LeaveID` = '$array[$row]'";
        if (!mysqli_query($conn, $sqlUpdate)) {
            echo '<script type="text/javascript">
			window.alert("Your change not insert in Database!" );		
			window.location.replace("manager_view_request.php");
			</script>';
            exit();
        } else {
            echo '<script type="text/javascript">
			window.alert("INSERTED CORRECTLY!"); 
			window.location.replace("manager_view_request.php");
			</script>';
        }


    } else if (isset($_POST['Pending'])) {


        $state = "p";


        echo '<script type="text/javascript">
			window.alert("' . $state . '"); 
			
			</script>';
        $array[] = $_SESSION['leave_data'];

        // $row = $_GET['row'];


        $sqlUpdate = "UPDATE `Leave` SET `Leave`.`State`='$state' WHERE `Leave`.`LeaveID` = '$array[$row]'";
        if (!mysqli_query($conn, $sqlUpdate)) {
            echo '<script type="text/javascript">
			window.alert("Your change not insert in Database!" );		
			window.location.replace("manager_view_request.php");
			</script>';
            exit();
        } else {
            echo '<script type="text/javascript">
			window.alert("INSERTED CORRECTLY!"); 
			window.location.replace("manager_view_request.php");
			</script>';
        }


    }
}

changeState();
?>
