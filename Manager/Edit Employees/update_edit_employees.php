<?php
/*
 * Contains main functionality of edit_employee.php file
 */
session_start();
include('password.php');
include 'db.php';
?><!doctype html>
<html lang="en">
<link rel="shortcut icon"
      href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role_error = $salary_error = $leaves_error = "";
    $Role = $Salary = "";
    $DeptNum = $_POST['selDept'];
    $flag = true;
    $SalaryType = $_SESSION['OldSalaryType'];
	$Leaves = $_POST['Leaves'];
	
	 // check if Annual Leaves text box is empty
    if (empty($_POST['Leaves'])) {
        $leaves_error = "*Number of Annual Leaves is required";
    } else {
        $Leaves = $_POST['Leaves'];
        // check if only integer number is inserted
        if (!preg_match("/^\d+$/", $Leaves)) {
            $Leaves = "";
            $leaves_error = "*Only numbers allowed";
        }
    }
	
	if (strcmp($SalaryType, "F") == 0) {
        $SalaryType = $_POST['salaryT1'];
    } else if (strcmp($SalaryType, "P") == 0) {
        $SalaryType = $_POST['salaryT3'];
    } else {
        $SalaryType = $_POST['salaryT2'];
    }
	
    $WorkC = $_POST['selCountry'];
	$UsernameManager=$_SESSION['username'];
	// to check if the depatment that manager gave exists in the country that manager also gave 
    $flag = true;
	
	// print an error message in case Role input is empty
    if (empty($_POST['Role'])) {
        $role_error = "*Role is required";
    } else {
        $Role = $_POST['Role'];
    }

	// print an error message in case Salary input is empty
    if (empty($_POST['Salary'])) {
        $salary_error = "*Salary is required";
    } else {
        $S = $_POST['Salary'];
        $Salary = $_POST['Salary'];
		// print an error message in case Salary input is not an number
        if (!is_numeric($S)) {
            $S = "";
            $salary_error = "*Only numbers allowed";
        }
    }

	// check if role and salary inputs inserted correctly to update given employee's data
    if (empty($role_error) && empty($salary_error) && empty($leaves_error)) {
		// select number of depatment from DB according to which country and to which department the given employee works to to check if the depatment that manager gave exists in the country that manager also gave 
        $sqlDeptNum = "SELECT NumberDept FROM Department WHERE NumberDept={$DeptNum} AND CountryNum={$WorkC}";
		$resultDeptNum = mysqli_query($conn, $sqlDeptNum);
        $flag = true;
        if (!($resultDeptNum)) {
            echo '<script type="text/javascript">
				window.alert("ERROR CONNECTION WITH DATABASE");
				window.location.replace("add_employee.php");
				</script>';
        } else {
            $rowsDeptNum = mysqli_num_rows($resultDeptNum);
			// check if the above query not gives result, if so manager gave a wrong input of department and country of where the given employee works
            if ($rowsDeptNum == 0) {
                $flag = false;
                echo '<script>
					alert("DEPARTMENT IN THE GIVEN COUNTRY DOES NOT EXIST IN DATABASE");
					</script>';
            } else {
				$OldDeptNum=$_SESSION['old_DeptNum'];
				$OldCountryNum=$_SESSION['old_CountryNum'];
				// check if the department that employee belongs to changed
				if ($DeptNum != $OldDeptNum || $OldCountryNum != $WorkC){
				// decrease number of employees of the department that employee was because manager changed employee's department
				$decreaseEmployees = "UPDATE Department SET NumEmployees=(NumEmployees-1) WHERE NumberDept={$OldDeptNum} AND CountryNum={$OldCountryNum}";
				// increase number of employees of the department that employee will belong to, because manager changed employee's department
				$increaseEmployees = "UPDATE Department SET NumEmployees=(NumEmployees+1) WHERE NumberDept={$DeptNum} AND CountryNum={$WorkC}";
					if (!mysqli_query($conn, $increaseEmployees) || !mysqli_query($conn, $decreaseEmployees)) {
						echo '<script type="text/javascript">
						window.alert("ERROR CONNECTING WITH DATABASE");
						</script>';
						exit();
					}
				}
            }
        }
		
		// check if the above checks were successfully, if so update data of the given employee
        if ($flag) {

            $emplUsername = $_SESSION['edit_Empl_Username'];
			// update data of the given employee
            $sqlUpdate = "UPDATE Employee SET AnnualLeaves='$Leaves',CountryNumber='$WorkC',NumDept='$DeptNum',Role='$Role',Salary='$Salary',SalaryType='$SalaryType' WHERE Username LIKE '$emplUsername'";
            $result = mysqli_query($conn, $sqlUpdate);
            if (!$result) {
                echo '<script>
				window.alert("ERROR CONNECTING WITH DATABASE");
				</script>';
            } else {
                echo '<script>
				window.alert("UPDATED SUCCESSFULLY!");
				window.location.replace("manager_dashboard.html");
				</script>';
            }
        }

    }
}

?>

