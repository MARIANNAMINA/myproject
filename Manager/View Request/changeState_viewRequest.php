<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
	include 'db.php';

	
	if(isset($_POST['selectbasic'])){
		
		$State = $_POST['selectbasic'];
		
		if(strcmp($State,"Reject")==0){
			$State='r';
			}else if(strcmp($State,"Accept")==0){
				$State='a';		
				}else {
					$State='p';
					}
					
					$sqlUpdate = "UPDATE `Leave` SET `State`=['$State'] WHERE `Username` LIKE '$UsernameEmp'";
					if(!mysqli_query($conn,$sqlUpdate)){
						echo "<script type='text/javascript'>
							window.alert('Your change not insert in Database!' );
							window.location.replace('manager_view_request.php');
							</script>";
						exit();
					}else{
						echo '<script type="text/javascript">
							window.alert("INSERTED CORRECTLY"); 
							window.location.replace("manager_dashboard.html");
							</script>';
					} 
				} else {
					echo $UsernameEmp;
				}
}
?>
