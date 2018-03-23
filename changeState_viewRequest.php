<?php
session_start();
include('password.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	include 'db.php';

$Username = $_POST['username'];
$State=$_POST['form-control'];

}

if(strcmp($State,"Reject")==0){
	$State="r";
}else if(strcmp($State,"Accept")==0){
	$State="a";
	}else {
		$State="p";
	}

}



		$sql = "UPDATE `Leave` SET `State`=[$State] WHERE `Username` LIKE '$Username'";
		if(!mysqli_query($conn,$sql)){
			echo '<script type="text/javascript">
			window.location.replace("manager_view_request.php");
			</script>';
			exit();
		}else{
			echo '<script type="text/javascript">
			window.alert("INSERTED CORRECTLY"); 
			window.location.replace("manager_dashboard.html");
			</script>';
		}
		unset($_POST['form_id']);		
	}	
}

?>

