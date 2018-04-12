<?php session_start();


if (isset($_POST['continue'])){
	include 'db.php';
		
		
$Username=$_SESSION['username'];

$DateFrom=$_POST['From'];
$DateTo=$_POST['To'];

$DateFrom=date("Y-m-d", strtotime($DateFrom));
$DateTo=date("Y-m-d", strtotime($DateTo));


if (strtotime($DateFrom) > strtotime('now')) {
		echo '<script type="text/javascript">
			window.alert("The date on which export report should be before today! Try again please!");
			window.location.replace("average_per_week.html");
			</script>';
} else if (strtotime($DateTo) > strtotime('now')) {
		echo '<script type="text/javascript">
			window.alert("The date on which export report should be before today! Try again please!");
			window.location.replace("average_per_week.html");
			</script>';
} else if (strtotime($DateTo) <= strtotime($DateFrom)) {
		echo '<script type="text/javascript">
			window.alert("The date on which the leave will end is after the date it starts! Try again please!");
			window.location.replace("average_per_week.html");
			</script>';
} else {
	
	//header("Content-Type: application/json; charset=UTF-8");
	//$obj = json_decode($_POST["x"], false);
	
	//$sql= "SELECT `Date`, `ClockIn`, `ClockOut`, `Break`, `ReturnBreak`, `Username`, `BreakLength` FROM `AttendanceTime` WHERE (`Date` BETWEEN '$DateFrom' AND '$DateTo')";
	$sql= "SELECT SUM(AttendanceTime.ClockOut-AttendanceTime.ClockIn) AS HoursWorked,AttendanceTime.Username,AttendanceTime.BreakLength,Employee.ID,Employee.Name,Employee.Surname FROM AttendanceTime INNER JOIN Employee ON (AttendanceTime.Username=Employee.Username) WHERE (Date >= '$DateFrom' AND Date <= '$DateTo') AND Employee.UsernameManager LIKE '$Username' GROUP BY AttendanceTime.Username";

	$result=mysqli_query($conn,$sql);
	
	$json_array = array();
	
	while($row = mysqli_fetch_assoc($result)){	
		$json_array[] = $row;
	
	}
	echo json_encode($json_array);
/*	$file = fopen('hoursReport.json','w');
	fwrite($file,json_encode($json_array));*/
	
	
	
	
	
	/*$sql= "SELECT `Name`, `Surname`, `Date`, `ClockIn`, `ClockOut`, `Break`, `ReturnBreak`, `AttendanceTime`.`Username`, `BreakLength` FROM `Employee`, `AttendanceTime` WHERE `Employee`.`Username` = `AttendanceTime`.`Username` AND (`Date` BETWEEN $DateFrom AND $DateTo)";

	$result=mysqli_query($conn,$sql);
	
	if(!$result){
			echo '<script type="text/javascript">
				window.alert("ERROR CONNECTION WITH DATABASE");
				</script>';
			exit();
	}else{
		$json_data=array();//create the array 
		while($row = mysqli_fetch_array($result)){ 	
			$json_data->Name = $row['Name'];
			$json_data->Surname = $row['Surname'];
			$json_data->Username = $row['Username'];
			$json_data-> "Date" = $row['Date'];
			$json_data->ClockIn = $row['ClockIn'];
			$json_data->ClockOut = $row['ClockOut'];
			$json_data->"Break" = $row['Break'];
			$json_data->ReturnBreak = $row['ReturnBreak'];
			$json_data->BreakLength = $row['BreakLength'];
			//built in PHP function to encode the data in to JSON format 
			echo json_encode($json_data); 
		}
	}*/
	 
	
		//here pushing the values in to an array  
	//	$json_data = $result->fetch_all(MYSQLI_ASSOC);
		//echo $Username;
		//array_push($json_data,$json_array);  
  
	//}
	 
	
	
/*	if(!mysqli_query($conn,$sql)){
		echo '<script type="text/javascript">
		window.alert("ERROR"); 
		window.location.replace("average_per_week.html");
		</script>';
	}
	else{echo '<script type="text/javascript">
		window.alert("OK!"); 
		window.location.replace("manager_dashboard.html");
		</script>';
		}*/
	 

}
} else {
	echo '<script type="text/javascript">alert("NOT FOUND"); 
		window.location.replace("average_per_week.html");
		</script>';
	exit();
	}

?>