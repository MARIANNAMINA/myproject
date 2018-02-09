<?php
session_start();
if (isset($_POST['continue'])){
	include 'db.php';
	
$username=$_POST['username'];
$DateFrom=$_POST['From'];
$DateTo=$_POST['To'];

$Desc=$_POST['desc'];

$DateFrom=date("Y-m-d", strtotime($DateFrom));
$DateTo=date("Y-m-d", strtotime($DateTo));

$sql2= "SELECT username FROM staff WHERE username='$username'";
$resultCheck=mysqli_num_rows(mysqli_query($conn,$sql2));
if ( $resultCheck>0){
$sql = "INSERT INTO leavereq (username,DateTo,DateFrom,Days,Description,Status) VALUES ('$username','$DateTo','$DateFrom',DATEDIFF('$DateTo','$DateFrom'),'$Desc','Waiting')";

if(!mysqli_query($conn,$sql)){
	echo '<script type="text/javascript">
	window.alert("NOT INSERTED"); 
	window.location.replace("leave_request_employee.html");
	</script>';
}
else{echo '<script type="text/javascript">
	window.alert("INSERTED CORRECTLY"); 
	window.location.replace("employee_dashboard.html");
	</script>';}

}
else {
	echo '<script type="text/javascript">
	window.alert("NOT INSERTED"); 
	window.location.replace("leave_request_employee.html");
	</script>';
}
}

else {echo '<script type="text/javascript">alert("NOT FOUND"); 
	window.location.replace("leave_request_employee.html");
	</script>';
exit();}
?>