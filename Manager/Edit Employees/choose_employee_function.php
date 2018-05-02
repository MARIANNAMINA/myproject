<?php
/*
 * Contains main functionality of choose_employee.php file
 */
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'db.php';
    $Username = $_POST['Username'];
    $UsernameManager = $_SESSION['username'];
	// username that is selected from the dropdown list
    $_SESSION['edit_Empl_Username'] = $_POST['Username'];
	// get selected employee's username to edit  
    $sql2 = "SELECT Username, UsernameManager FROM Employee WHERE Username LIKE '$Username' AND UsernameManager LIKE '$UsernameManager'";
    if (!mysqli_query($conn, $sql2)) {
        print_error();
    } else {
        print_success();
    }    
}

function print_error(){
	echo '<script type="text/javascript">window.alert("ERROR CONNECTING WITH DATABASE"); 
		  window.location.replace("choose_employee.php");
		 </script>';
	exit();
}

function print_success(){
	echo '<script type="text/javascript">
		window.alert("SELECT SUCCESSFULLY"); 
		window.location.replace("edit_employee.php");
		</script>';
	exit();
}	
?>