<?php
session_start();
if (isset($_POST['save'])){
	include 'db.php';
	
$Username=$_POST['Username'];
$Password = $_POST['Password'];
//$Hashed_Password = password_hash($Password, PASSWORD_DEFAULT);
$ID=$_POST['ID'];
$SSN=$_POST['SSN'];
$FirstName=$_POST['FirstName'];
$LastName=$_POST['LastName'];
$DepartmentNum=$_POST['DepartmentNum'];
$Role=$_POST['Role'];
$Salary=$_POST['Salary'];
$SalaryType=$_POST['SalaryType'];
$Phone=$_POST['Phone'];
$EmergencyPhone=$_POST['EmergencyPhone'];
$Email=$_POST['Email'];
$Country=$_POST['Country'];
$Address=$_POST['Address'];
$DateofBirth=$_POST['DateofBirth'];
$Gender=$_POST['Gender'];
$Manager=$_POST['Manager'];
$UsernameManager=$_POST['name'];

$sql = "INSERT INTO Employee (Username,Password,ID,SSN,Name,Surname,NumDept,Role,Salary,SalaryType,Phone,EmergencyPhone,Country,Address,Birthdate,Gender,IsManager,UsernameManager) VALUES ('$Username','$Password','$ID','$SSN','$FirstName','$LastName','$DepartmentNum','$Role','$Salary','$SalaryType','$Phone','$EmergencyPhone','$Country','$Address','$DateofBirth','$Gender','$Manager','$UsernameManager')";


if(!mysqli_query($conn,$sql)){
	echo '<script type="text/javascript">
	window.alert("NOT INSERTED"); 
	window.location.replace("add_employee.html");
	</script>';
}
else{echo '<script type="text/javascript">
	window.alert("INSERTED CORRECTLY"); 
	window.location.replace("manager_dashboard.html");
	</script>';}

}
else {echo '<script type="text/javascript">
    window.alert("NOT FOUND"); 
	window.location.replace("manager_dashboard.html");
	</script>';
exit();}
?>