<?php
/*session_start();
if (isset($_POST['delete'])){
	include 'db.php';
	
$Username=$_POST['Username'];
$UsernameManager=$_SESSION['username'];
*/
//$username = '';
$loggedin = retrieve_logged_in_session_status();
if($loggedin = null) {
    show_error_message();
} else



	
	
	
/*
if($Username == null){
	echo '<script type="text/javascript">window.alert("No Username Found. Please try again"); 
	window.location.replace("delete_employee.html");
	</script>';
}
else{
*/

$sql2= "SELECT Username, UsernameManager FROM Employee WHERE Username LIKE '$Username' AND UsernameManager LIKE '$UsernameManager'";
$resultCheck=mysqli_num_rows(mysqli_query($conn,$sql2));
if($resultCheck<1 ||!mysqli_query($conn,$sql2)){	
	echo '<script type="text/javascript">window.alert("Given Username not found. Please try again."); 
	window.location.replace("delete_employee.html");
	</script>';
}
else{
	$sql3 = "INSERT INTO DeletedEmployee (Username,ID,Name,Surname,Birthdate,Gender,Address,Country,Phone,EmergencyPhone,Role,Salary,SalaryType,SSN,Email) (SELECT Username,ID,Name,Surname,Birthdate,Gender,Address,Country,Phone,EmergencyPhone,Role,Salary,SalaryType,SSN,Email FROM Employee WHERE Username LIKE '$Username' AND UsernameManager LIKE '$UsernameManager')";
	if(!mysqli_query($conn,$sql3)){
		echo '<script type="text/javascript"> window.alert("ERROR! You may insert a username that already exists in the database. Please try again.");
		window.location.replace("delete_employee.html");
		</script>';
	}
	$sql = "DELETE FROM Employee WHERE Username LIKE '$Username' AND UsernameManager LIKE '$UsernameManager'";
	if(!mysqli_query($conn,$sql)){
		echo '<script type="text/javascript">window.alert("ERROR! You may insert a username that already exists in the database. Please try again."); 
		window.location.replace("delete_employee.html");
		</script>';
	}
	else{echo '<script type="text/javascript">window.alert("Employee has been deleted successfully."); 
	window.location.replace("manager_dashboard.html");
	</script>';
	}
}
}
}




function retrieve_logged_in_session_status() {
    session_start();
    if(isset($_POST['delete'])) {
		include 'db.php';
        $Username = $_POST['Username'];
		$UsernameManager=$_SESSION['username'];
        return true;
    }
    return false;  
}
function show_welcome_page() {
    echo '<script type="text/javascript">window.alert("No Username Found. Please try again"); 
	window.location.replace("delete_employee.html");
	</script>';
}
//alert("SUCH FILE DOES NOT EXIST");
/*else {
	if (txt == true){
		echo '<script type="text/javascript"> 
		window.location.replace("manager_dashboard.html");
		</script>';
	}
	else {
		echo '<script type="text/javascript"> 
		window.location.replace("delete_employee.html");
		</script>';	
	}

exit();
}
*/
?>