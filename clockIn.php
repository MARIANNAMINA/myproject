<?php
session_start();

if (isset($_POST['ClockInButton'])){
include 'db.php';

$_SESSION['clockedin'] = 'NOW()'; 
$Username=$_SESSION['username'];
//$Username="grrtter";
$query = "INSERT INTO AttendanceTime (Username,Date,ClockIn) VALUES ('$Username',NOW(),NOW())";
//$query = "INSERT INTO WorkingHours (Username) VALUES ('$Username')";

if(!mysqli_query($conn,$query)){
 echo '<script type="text/javascript">
        window.alert("ERROR CONNECTING WITH DATABASE");
        window.location.replace("clock_in_manager.html");
        </script>';
}else{

 echo '<script type="text/javascript">alert("CLOCKED IN!");
        window.location.replace("clock_in_manager.html");
        </script>';

}

}else {echo '<script type="text/javascript">alert("NOT FOUND");
        window.location.replace("clock_in_manager.html");
        </script>';
exit();}
?>

