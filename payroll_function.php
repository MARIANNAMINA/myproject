<?php
session_start();
ini_set('display_errors',1);
error_reporting(E_ALL);
include ('db.php');

$From=$_POST['from_date'];
$From= date("Y-m-d", strtotime($From));
$To=$_POST['to_date'];
$To=date("Y-m-d", strtotime($To));
$file_name=$_POST['file_name'];
$Username=$_SESSION['username'];



if(isset($_POST['export_btn'])){


	$getData="SELECT SUM(AttendanceTime.ClockOut-AttendanceTime.ClockIn) AS HoursWorked,AttendanceTime.Username,AttendanceTime.BreakLength,Employee.ID,Employee.Name,Employee.Surname FROM AttendanceTime INNER JOIN Employee ON (AttendanceTime.Username=Employee.Username) WHERE (Date >= '$From' AND Date <= '$To') AND Employee.UsernameManager LIKE '$Username' GROUP BY AttendanceTime.Username";
	$sql_con=mysqli_query($conn,$getData);
	$employee_data = array();  
	if(!$sql_con){
	echo '<script type="text/javascript">
	window.alert("ERROR CONNECTION WITH DATABASE");
	window.location.replace("payroll_report.html");
	</script>';
	exit();
	}else{
		while($row=mysqli_fetch_array($sql_con)){
			$employee_data['HoursWorked']=$row['HoursWorked'];
			$employee_data['Username']=$row['Username'];
			$employee_data['ID']=$row['ID'];
			$employee_data['Name']=$row['Name'];
			$employee_data['Surname']=$row['Surname'];
			
		}
	//echo json_encode($employee_data);
$myfile = fopen('newfile.txt', 'w') or die("can't open file");
	fwrite($myfile,json_encode($employee_data));
	fclose($myfile);
	
	if(file_exists("newfile.txt")){
	echo '<script type="text/javascript">
	window.alert("Exported successfully");
	window.location.replace("payroll_report.html");
	</script>';}
}
}
?>