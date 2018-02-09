<?php
session_start();
if (isset($_POST['save'])){
	include 'db.php';
	
$username=$_POST['username'];


$sql2= "SELECT username FROM staff WHERE username='$username'";
$resultCheck=mysqli_num_rows(mysqli_query($conn,$sql2));

$sql = "DELETE FROM staff WHERE username='$username' ";


$result=mysqli_query($conn,$sql);



if(!mysqli_query($conn,$sql) || $resultCheck<1 ){
	echo '<script type="text/javascript">window.alert("NOT USER FOUND"); 
	window.location.replace("delete_employee.html");
	</script>';
}
else{echo '<script type="text/javascript">window.alert("DELETED SUCCESSFULLY"); 
	window.location.replace("manager_dashboard.html");
	</script>';
}

}




else {echo '<script type="text/javascript">alert("SUCH FILE DOES NOT EXIST"); 
	window.location.replace("Delete Employee.html");
	</script>';
exit();}
?>