
<?php
session_start();

if (isset($_POST['login'])){
include 'db.php';
$username=$_POST['name'];
$password=$_POST['word'];



$sql = "SELECT * FROM manager WHERE username='$username' AND password='$password'";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_num_rows($result);

if ($resultCheck < 1){
	echo '<script type="text/javascript">alert("WRONG PASSWORD OR USERNAME"); 
	window.location.replace("Login_Manager.php");
	</script>';
exit();}
else { if ($row=mysqli_fetch_assoc($result)){
echo '<script type="text/javascript">window.alert("LOGIN SUCCESSFULLY"); 
	window.location.replace("clock in manager.html");
	</script>';
}

	else {
echo "wrong password";}
	$pwscheck=password_verify($password,$row['password']);
	


}
}
else {echo '<script type="text/javascript">alert("NOT FOUND"); 
	window.location.replace("Login_Manager.php");
	</script>';
exit();}
?>

