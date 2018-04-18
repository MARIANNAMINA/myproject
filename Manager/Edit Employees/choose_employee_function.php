<?php
session_start();
if (isset($_POST['OK'])) {

    include 'db.php';

    $Username = $_POST['Username'];
    $UsernameManager = $_SESSION['username'];
    $_SESSION['edit_Empl_Username'] = $_POST['Username'];

    if ($Username == null) {
        echo '<script type="text/javascript">window.alert("No Username Found. Please try again"); 
		window.location.replace("choose_employee.php");
		</script>';
    } else {
        $sql2 = "SELECT Username, UsernameManager FROM Employee WHERE Username LIKE '$Username' AND UsernameManager LIKE '$UsernameManager'";
        $resultCheck = mysqli_num_rows(mysqli_query($conn, $sql2));
        if ($resultCheck < 1 || !mysqli_query($conn, $sql2)) {
            echo '<script type="text/javascript">window.alert("Given Username not found. Please try again."); 
			window.location.replace("choose_employee.php");
			</script>';
        } else {
            echo '<script type="text/javascript">
			window.alert("Correct"); 
			window.location.replace("edit_employee.php");
			</script>';

        }
    }
}
?>