<?php

session_start();

if (isset($_POST['ClockOutButton'])){
include 'db.php';
$Username=$_SESSION['username'];
//$Username="grrtter";
//$query = "INSERT INTO AttendanceTime (Username,Date,ClockOut) VALUES ('$Username',NOW(),NOW())";
//$query = "INSERT INTO WorkingHours (Username) VALUES ('$Username')";
$query = "UPDATE  AttendanceTime SET ClockOut = NOW() WHERE Username = '$Username' AND Date = curdate()";
if(!mysqli_query($conn,$query)){
 echo '<script type="text/javascript">
        window.alert("ERROR CONNECTING WITH DATABASE");
        window.location.replace("clock_in_manager.html");
        </script>';
}else{

 echo '<script type="text/javascript">alert("CLOCKED OUT!");
        window.location.replace("clock_in_manager.html");
        </script>';

}

}else {echo '<script type="text/javascript">alert("NOT FOUND");
        window.location.replace("clock_in_manager.html");
        </script>';
exit();}
?>

