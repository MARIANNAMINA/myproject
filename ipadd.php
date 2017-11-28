<?php
session_start();
if (isset($_POST['ok'])){
	include 'db.php';
	
$username=$_POST['username'];
$ip=$_POST['ip'];



$sql = "INSERT INTO staff (IPrange) VALUES ('$ip')";

if(!mysqli_query($conn,$sql)){
	echo '<script type="text/javascript">window.alert("NOT INSERTED"); 
	window.location.replace("IPrange_css.html");
	</script>';
}
else{echo '<script type="text/javascript">window.alert("INSERTED IP"); 
	window.location.replace("EmployeeDashboard.html");
	</script>';}

}
else {echo '<script type="text/javascript">alert("NOT FOUND"); 
	window.location.replace("IPrange_css.html");
	</script>';
exit();}
?>