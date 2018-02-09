<?php
session_start();
if (isset($_POST['ok'])){
	include 'db.php';
	
$username=$_POST['username'];
$ip=$_POST['ip'];

$sql2= "SELECT username FROM staff WHERE username='$username'";
$resultCheck=mysqli_num_rows(mysqli_query($conn,$sql2));
$row=mysqli_fetch_row(mysqli_query($conn,$sql2));
$ans=$row[0];
if ( $resultCheck>0){
$sql = "UPDATE staff SET IPRange='$ip' WHERE username='$ans'";

if(!mysqli_query($conn,$sql)){
	echo '<script type="text/javascript">window.alert("NOT INSERTE"); 
	window.location.replace("ip_range.html");
	</script>';
}
else{echo '<script type="text/javascript">window.alert("INSERTED IP"); 
	window.location.replace("employee_dashboard.html");
	</script>';}

}
else{
	echo '<script type="text/javascript">window.alert("NOT INSERTED"); 
	window.location.replace("ip_range.html");
	</script>';
}
}
else {echo '<script type="text/javascript">alert("NOT FOUND"); 
	window.location.replace("ip_range.html");
	</script>';
exit();}
?>