<?php
/*
 * Contains main functionality of delete_employee_.php file
 */

	session_start();
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		include 'db.php';
		/* Selected employee's Username */
		$Username = $_POST['Username'];
		/* Manager's Username */
		$UsernameManager = $_SESSION['username'];
		
		
		/**
		 * Prints error message related to connection with database
		 */	
		function print_error(){
			echo '<script type="text/javascript">window.alert("ERROR! Please check your connection with database."); 
				  window.location.replace("delete_employee_.php");
				 </script>';
			exit();
		}

		/**
		 * Prints successful message related to data updated correctly in the database
		 */
		function print_success(){
			echo '<script type="text/javascript">
				window.alert("Employee has been deleted successfully."); 
				window.location.replace("manager_dashboard.html");
				</script>';
			exit();
		}		
		
		/**
		 * 	
		 */			
		function delete_query($conn){
			/* Selected employee's Username */
			$Username = $_POST['Username'];
			/* Manager's Username */
			$UsernameManager = $_SESSION['username'];
			
			/* delete selected employee from Employee database's table  */
			$sql_delete = "DELETE FROM Employee WHERE Username LIKE '$Username' AND UsernameManager LIKE '$UsernameManager'";
			/* check if query is successful */
			if(!mysqli_query($conn,$sql_delete)){
				/* Call function */
				print_error();
			} else {
				/* Call function */
				print_success();
			}
		}
		
		/**
		 * 
		 */			
		function insert_query($conn){
			/* Selected employee's Username */
			$Username = $_POST['Username'];
			/* Manager's Username */
			$UsernameManager = $_SESSION['username'];
			
			/* insert selected employee's record into DeletedEmployee table because in case of error we don't want to lose the deleted employee's record */
			$sql_insert = "INSERT INTO DeletedEmployee (Username,ID,Name,Surname,Birthdate,Gender,Address,Country,Phone,EmergencyPhone,Role,Salary,SalaryType,SSN,Email)
												(SELECT Username,ID,Name,Surname,Birthdate,Gender,Address,Country,Phone,EmergencyPhone,Role,Salary,SalaryType,SSN,Email FROM Employee WHERE Username LIKE '$Username' AND UsernameManager LIKE '$UsernameManager')";
			/* check if query is successful */
			if(!mysqli_query($conn,$sql_insert)){
				/* Call function */
				print_error();
			} else {
				/* Call function */
				delete_query($conn);
			}
		}
	

		/**
		 * Arguments
		 */			
		function get_usernames($conn){
			/* Selected employee's Username */
			$Username = $_POST['Username'];
			/* Manager's Username */
			$UsernameManager = $_SESSION['username'];
		
			/* get selected employee's username and manager’s username */
			$sql_select= "SELECT Username, UsernameManager FROM Employee WHERE Username LIKE '$Username' AND UsernameManager LIKE '$UsernameManager'";

			/* check if query is successful */
			if(!mysqli_query($conn,$sql_select)){	
				/* Call function */
				print_error();
			}
			else{
				/* Call function */
				insert_query($conn);
			}
		}
		
		
		/* Call function */
		get_usernames($conn);
		
	}

?>