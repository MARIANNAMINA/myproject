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

$sql = "INSERT INTO leavereq (username,DateTo,DateFrom,Days,Description,Status) VALUES ('$username','$DateTo','$DateFrom',DATEDIFF('$DateTo','$DateFrom'),'$Desc','Waiting')";

if(!mysqli_query($conn,$sql)){
	echo '<script type="text/javascript">
	window.alert("NOT INSERTED"); 
	window.location.replace("Leave Request_css.html");
	</script>';
}
else{echo '<script type="text/javascript">
	window.alert("INSERTED CORRECTLY"); 
	window.location.replace("EmployeeDashboard.html");
	</script>';}

}

else {echo '<script type="text/javascript">alert("NOT FOUND"); 
	window.location.replace("Leave Request_css.html");
	</script>';
exit();}
?>