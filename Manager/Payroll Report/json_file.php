<?php
/*
* A manager can export a report of the working hours of his employees. The manager gives the range of dates in which he
* wants to export the report and the name of the report. If the export button clicked, then a report with the working hours of employees 
* has been exported in the form of manager's decision(XML or JSON). 
*/
session_start();
include ('db.php');
// get the values of text box
$From=$_SESSION['fromDate'];
$To=$_SESSION['toDate'];
$file_name=$_SESSION['file_name'];
$Username=$_SESSION['username'];
$employee_data = array(); 

		//select data from database
		$getData="SELECT SUM(TIME_TO_SEC(TIMEDIFF(AttendanceTime.ClockOut,AttendanceTime.ClockIn))-(AttendanceTime.BreakLength*60)) AS SecWorked,AttendanceTime.Username,AttendanceTime.BreakLength,Employee.ID,Employee.Name,Employee.Surname FROM AttendanceTime INNER JOIN Employee ON (AttendanceTime.Username=Employee.Username) WHERE (Date >= '$From' AND Date <= '$To') AND Employee.UsernameManager LIKE '$Username' GROUP BY AttendanceTime.Username";
		
		$sql_con=mysqli_query($conn,$getData);
		$employee_data = array();  
		if(!$sql_con){
			echo '<script type="text/javascript">
				window.alert("ERROR CONNECTION WITH DATABASE");
				window.location.replace("payroll_report.php");
				</script>';
			exit();
		}else{
			while($row=mysqli_fetch_array($sql_con)){
				$employee_data[] = array('Username'=> $row['Username'],'ID' => $row['ID'],'Name' => $row['Name'],'Surname' => $row['Surname'],'SecWorked' => $row['SecWorked']);
			}
			echo json_encode($employee_data);	
		}
?>