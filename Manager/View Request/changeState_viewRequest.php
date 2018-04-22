<?php
session_start();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'db.php';

    $choice = $_POST['choice'];
    echo '<script type="text/javascript">
			window.alert("MARIA KOUPPi"); 
			
			</script>';
    $array[] = $_SESSION['leave_data'];

   // $row = $_GET['row'];


    $sqlUpdate = "UPDATE `Leave` SET `Leave`.`State`='$State' WHERE `Leave`.`LeaveID` = '$array[$row]'";
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

?>
