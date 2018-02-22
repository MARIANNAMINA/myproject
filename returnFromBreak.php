<?php
session_start();

if (isset($_POST['returnFromBreak'])){
include 'db.php';

$Username=$_SESSION['username'];
//$Username="grrtter";
//$query = "INSERT INTO AttendanceTime (Username,Date,ReturnBreak) VALUES ('$Username',NOW(),NOW())";
//$query = "INSERT INTO WorkingHours (Username) VALUES ('$Username')";
$query = "UPDATE  AttendanceTime SET ReturnBreak = NOW() WHERE Username = '$Username' AND Date = curdate()";

if(!mysqli_query($conn,$query)){
 echo '<script type="text/javascript">
        window.alert("ERROR CONNECTING WITH DATABASE");
        window.location.replace("clock_in_manager.html");
        </script>';
}else{

 echo '<script type="text/javascript">alert("RETURN FROM BREAK!");
        window.location.replace("clock_in_manager.html");
        </script>';

}

}else {echo '<script type="text/javascript">alert("NOT FOUND");
        window.location.replace("clock_in_manager.html");
        </script>';
exit();}
?>

