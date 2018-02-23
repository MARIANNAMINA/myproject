<?php
session_start();
if (isset($_POST['save'])){
	include 'db.php';
	
$Username=$_POST['Username'];


$sql2= "SELECT Username FROM Employee WHERE Username='$Username'";
$resultCheck=mysqli_num_rows(mysqli_query($conn,$sql2));

$sql = "DELETE FROM Employee WHERE Username='$Username' ";


$result=mysqli_query($conn,$sql);


if(!mysqli_query($conn,$sql) || $resultCheck<1 ){
	echo '<script type="text/javascript">window.alert("NOT USER FOUND"); 
	window.location.replace("delete_employee.html");
	</script>';
}
else{echo '<script type="text/javascript">window.alert("DELETED SUCCESSFULLY"); 
	window.location.replace("manager_dashboard.html");
	</script>';
//	$sql3 = "SELECT * FROM Employee WHERE Username='$Username'";
//	$sql4 = "INSERT INTO DeletedEmployee (Username,Password,ID,SSN,Name,Surname,NumDept,Role,Salary,SalaryType,Phone,EmergencyPhone,Country,Address,Birthdate,Gender,IsManager,UsernameManager) VALUES ('$Username','$Password','$ID','$SSN','$FirstName','$LastName','$DepartmentNum','$Role','$Salary','$SalaryType','$Phone','$EmergencyPhone','$Country','$Address','$DateofBirth','$Gender','$Manager','$UsernameManager')";
//	$result1 = mysql_query($conn,$sql4);
}

}

else {echo '<script type="text/javascript">alert("SUCH FILE DOES NOT EXIST"); 
	window.location.replace("delete_employee.html");
	</script>';
	

exit();}

?>