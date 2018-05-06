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
<link rel="apple-touch-icon"
      href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Statare LTD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="edit_employee.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role_error = $salary_error = $leaves_error = "";
    $S=$Role = $Salary = "";
    // used to prevent SQL injection
    $DeptNum = mysqli_real_escape_string($conn, $_POST['selDept']);
	// used to prevent Javascript injection
    $DeptNum = strip_tags($DeptNum);
    $flag = true;
    // used to prevent SQL injection
    $SalaryType = mysqli_real_escape_string($conn, $_SESSION['OldSalaryType']);
    // used to prevent Javascript injection
	$SalaryType = strip_tags($SalaryType);
	$Leaves="";
	
	 // check if Annual Leaves text box is empty
    if (empty($_POST['Leaves'])) {
        $leaves_error = "*Number of Annual Leaves is required";
    } else {
        // used to prevent SQL injection
        $Leaves = mysqli_real_escape_string($conn, $_POST['Leaves']);
        // used to prevent Javascript injection
        $Leaves = strip_tags($Leaves);
        // check if only integer number is inserted
        if (!preg_match("/^\d+$/", $Leaves)) {
            $Leaves = "";
            $leaves_error = "*Only numbers allowed";
        }
    }

    // check which Salary Type is selected
	if (strcmp($SalaryType, "F") == 0) {
        // used to prevent SQL injection
        $SalaryType = mysqli_real_escape_string($conn, $_POST['salaryT1']);
        // used to prevent Javascript injection
		$SalaryType = strip_tags($SalaryType);
    } else if (strcmp($SalaryType, "P") == 0) {
        // used to prevent SQL injection
        $SalaryType = mysqli_real_escape_string($conn, $_POST['salaryT3']);
        // used to prevent Javascript injection
        $SalaryType = strip_tags($SalaryType);
    } else {
        // used to prevent SQL injection
        $SalaryType = mysqli_real_escape_string($conn, $_POST['salaryT2']);
        // used to prevent Javascript injection
        $SalaryType = strip_tags($SalaryType);
    }

    // used to prevent SQL injection
    $WorkC = mysqli_real_escape_string($conn, $_POST['selCountry']);
    // used to prevent Javascript injection
    $WorkC = strip_tags($WorkC);
    // the username of the manager
	$UsernameManager=$_SESSION['username'];

	// used to check if the depatment that manager gave exists in the country that manager also gave
    $flag = true;
	
	// print an error message in case Role input is empty
    if (empty($_POST['Role'])) {
        $role_error = "*Role is required";
    } else {
        // used to prevent SQL injection
        $Role = mysqli_real_escape_string($conn, $_POST['Role']);
        // used to prevent Javascript injection
        $Role = strip_tags($Role);
    }

	// print an error message in case Salary input is empty
    if (empty($_POST['Salary'])) {
        $salary_error = "*Salary is required";
    } else {
        // used to prevent SQL injection
        $S=$Salary = mysqli_real_escape_string($conn, $_POST['Salary']);
        // used to prevent Javascript injection
        $S=$Salary = strip_tags($Salary);
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
            print_error();
        } else {
            $rowsDeptNum = mysqli_num_rows($resultDeptNum);
			// check if the above query not gives result, if so manager gave a wrong input of department and country of where the given employee works
            if ($rowsDeptNum == 0) {
                $flag = false;
                print_error_dept_country();
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
                        print_error();
					}
				}
            }
        }
		
		// check if the above checks were successfully, if so update data of the given employee
        if ($flag) {
            // the username of the selected employee
            $emplUsername = $_SESSION['edit_Empl_Username'];
			// update data of the given employee
            $sqlUpdate = "UPDATE Employee SET AnnualLeaves=?,CountryNumber=?,NumDept=?,Role=?,Salary=?,SalaryType=? WHERE Username LIKE '$emplUsername'";
            $stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sqlUpdate)){
                print_error();
			}else{
			    // used to prevent SQL injection (prepared statement)
				mysqli_stmt_bind_param($stmt, "isssis", $Leaves, $WorkC, $DeptNum, $Role, $Salary, $SalaryType);
				mysqli_stmt_execute($stmt);
				print_success();
			}

        }

    }
}

/**
 * Prints error message related to a problem of the used queries
 */
function print_error(){
    echo '<script type="text/javascript">
		  window.alert("ERROR CONNECTING WITH DATABASE");
		  </script>';
}

/**
 *  Prints error message related to given department and country
 */
function print_error_dept_country(){
    echo '<script type="text/javascript">
		  alert("DEPARTMENT IN THE GIVEN COUNTRY DOES NOT EXIST IN DATABASE");
		  </script>';
}

/**
 * Prints successful message related to data updated correctly in the database
 */
function print_success(){
    echo '<script type="text/javascript">
		  alert("DATA UPDATED SUCCESSFULLY");
		  window.location.replace("manager_dashboard.html");
		  </script>';
}
?>

