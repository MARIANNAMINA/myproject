<?php
session_start();
if (isset($_POST['continue'])){
	include 'db.php';


$username=$_SESSION['username'];

$DateFrom=$_POST['From'];
$DateTo=$_POST['To'];
$Desc=$_POST['desc'];

$DateFrom=date("Y-m-d", strtotime($DateFrom));
$DateTo=date("Y-m-d", strtotime($DateTo));

$sql2= "SELECT Username FROM Employee WHERE Username='$username'";
$resultCheck=mysqli_num_rows(mysqli_query($conn,$sql2));

$sql = "INSERT INTO `Leave`(`Reason`, `ToDate`, `FromDate`, `Username`) VALUES ('$Desc','$DateTo','$DateFrom','$username')";

if(!mysqli_query($conn,$sql)){
	echo '<script type="text/javascript">
	window.alert("NOT INSERTED"); 
	window.location.replace("leave_request_manager.html");
	</script>';
}
else{echo '<script type="text/javascript">
	window.alert("INSERTED CORRECTLY"); 
	window.location.replace("manager_dashboard.html");
	</script>';}

}


else {echo '<script type="text/javascript">alert("SUCH FILE DOES NOT EXIST"); 
	window.location.replace("delete_employee.html");
	</script>';
	

exit();}

?>
