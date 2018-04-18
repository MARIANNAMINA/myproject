<?php
session_start();

if (isset($_POST['login'])){
include 'db.php';
$username=$_POST['name'];
$password=$_POST['word'];

$sql = "SELECT * FROM Employee WHERE username='$username' AND password='$password'";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_num_rows($result);

if ($resultCheck < 1){
        echo '<script type="text/javascript">alert("WRONG PASSWORD OR USERNAME");
        window.location.replace("index.html");
        </script>';
exit();}
else { if ($row=mysqli_fetch_assoc($result)){
        $man = mysqli_query($conn,"SELECT IsManager FROM Employee WHERE username='$username' AND password='$password'");
        $manager = mysqli_fetch_row($man);
        if($manager[0] == 1){
                echo '<script type="text/javascript">window.alert("LOGIN SUCCESSFULLY");
                window.location.replace("clock_in_manager.html");
                </script>';
        }else{
                echo '<script type="text/javascript">window.alert("LOGIN SUCCESSFULLY");
                window.location.replace("clock_in_employee.html");
                </script>';
        }
}
        else {
echo "wrong password";}
        $pwscheck=password_verify($password,$row['password']);

}
}
else {echo '<script type="text/javascript">alert("NOT FOUND");
        window.location.replace("index.html");
        </script>';
exit();}
