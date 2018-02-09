<?php
session_start();
if (isset($_POST['save'])){
	include 'db.php';
	
$username=$_POST['username'];
$password=$_POST['password'];
$Name=$_POST['name'];
$Surname=$_POST['surname'];
$Date=$_POST['birthday'];


$sql = "INSERT INTO staff (username,password,Name,Surname,birthdate) VALUES ('$username','$password','$Name','$Surname','$Date')";

if(!mysqli_query($conn,$sql)){
	echo '<script type="text/javascript">window.alert("NOT INSERTED"); 
	window.location.replace("add_employee.php");
	</script>';
}
else{echo '<script type="text/javascript">window.alert("NSERTED CORRECTLY"); 
	window.location.replace("manager_dashboard.html");
	</script>';}

}
else {echo '<script type="text/javascript">alert("NOT FOUND"); 
	window.location.replace("add_employee.html");
	</script>';
exit();}
?>