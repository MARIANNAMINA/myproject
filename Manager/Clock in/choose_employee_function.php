<?php
/*
 * Contains main functionality of choose_employee.php file
 */
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'db.php';
    // used to prevent SQL injection
    $Username = mysqli_real_escape_string($conn, $_POST['Username']);
	// used to prevent Javascript injection
    $Username = strip_tags($Username);
    // the username of the manager who is logged in
    $UsernameManager = $_SESSION['username'];
	// the username that is selected from the dropdown list, used to prevent SQL injection
    $_SESSION['edit_Empl_Username'] = mysqli_real_escape_string($conn, $_POST['Username']);
    // the username that is selected from the dropdown list, used to prevent Javascript injection
	$_SESSION['edit_Empl_Username'] = strip_tags($_SESSION['edit_Empl_Username']);
	// get selected employee's username to edit  
    $sql2 = "SELECT Username, UsernameManager FROM Employee WHERE Username LIKE '$Username' AND UsernameManager LIKE '$UsernameManager'";
    if (!mysqli_query($conn, $sql2)) {
        print_error();
    } else {
        print_success();
    }    
}

/**
 * Prints successful message related to employee selected successfully. Also goes to page edit_employee.php where the data of the selected employee appear on the page
 */
function print_success(){
    echo '<script type="text/javascript">
		window.alert("SELECT SUCCESSFULLY"); 
		window.location.replace("edit_employee.php");
		</script>';
}

/**
 * Prints an error message related to a problem with the used query
 */
function print_error(){
    echo '<script type="text/javascript">window.alert("ERROR CONNECTING WITH DATABASE"); 
		window.location.replace("choose_employee.php");
		</script>';
}
?>