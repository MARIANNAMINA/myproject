<?php
/*
 * Contains main functionality of delete_employee_.php file
 */

	
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'db.php';
    $Username = $_POST['Username'];
    $UsernameManager = $_SESSION['username'];
	
	/* get selected employee's username and manager’s username */
	$sql_select= "SELECT Username, UsernameManager FROM Employee WHERE Username LIKE '$Username' AND UsernameManager LIKE '$UsernameManager'";

	if(!mysqli_query($conn,$sql_select)){	
		print_error();
	}
	else{
		/* insert selected employee's record into DeletedEmployee table because in case of error we don't want to lose the deleted employee's record */
		$sql_insert = "INSERT INTO DeletedEmployee (Username,ID,Name,Surname,Birthdate,Gender,Address,Country,Phone,EmergencyPhone,Role,Salary,SalaryType,SSN,Email) (SELECT Username,ID,Name,Surname,Birthdate,Gender,Address,Country,Phone,EmergencyPhone,Role,Salary,SalaryType,SSN,Email FROM Employee WHERE Username LIKE '$Username' AND UsernameManager LIKE '$UsernameManager')";
		if(!mysqli_query($conn,$sql_insert)){
			print_error();
		}
		
		/* delete selected employee from Employee database's table  */
		$sql_delete = "DELETE FROM Employee WHERE Username LIKE '$Username' AND UsernameManager LIKE '$UsernameManager'";
		if(!mysqli_query($conn,$sql_delete)){
			print_error();
		} else {
			print_success();
		}
	}
}

	function print_error(){
		echo '<script type="text/javascript">window.alert("ERROR! Please check your connection with database."); 
			  window.location.replace("delete_employee_.php");
			 </script>';
		exit();
	}

	function print_success(){
		echo '<script type="text/javascript">
			window.alert("Employee has been deleted successfully."); 
			window.location.replace("manager_dashboard.html");
			</script>';
		exit();
	}


?>