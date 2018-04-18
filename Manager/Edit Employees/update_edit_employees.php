<?php
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
    $role_error = $salary_error = "";
    $Role = $Salary = "";
    $DeptNum = $_POST['selDept'];
    $flag = true;
    $SalaryType = $_SESSION['SalaryType'];
    $WorkC = $_POST['selCountry'];
    $flag = true;
    if (empty($_POST['Role'])) {
        $role_error = "*Role is required";
    } else {
        $Role = $_POST['Role'];
    }

    if (empty($_POST['Salary'])) {
        $salary_error = "*Salary is required";
    } else {
        $S = $_POST['Salary'];
        $Salary = $_POST['Salary'];
        if (!is_numeric($S)) {
            $S = "";
            $salary_error = "*Only numbers allowed";
        }
    }

    if (empty($role_error) && empty($salary_error)) {

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
            if ($rowsDeptNum == 0) {
                $flag = false;
                echo '<script>
					alert("DEPARTMENT IN THE GIVEN COUNTRY DOES NOT EXIST IN DATABASE");
					</script>';
            } else {
                $increaseEmployees = "UPDATE Department SET NumEmployees=(NumEmployees+1) WHERE NumberDept={$DeptNum} AND CountryNum={$WorkC}";
                if (!mysqli_query($conn, $increaseEmployees)) {
                    echo '<script type="text/javascript">
					window.alert("ERROR CONNECTING WITH DATABASE");
					</script>';
                    exit();
                }
            }
        }
        if ($flag) {

            $emplUsername = $_SESSION['edit_Empl_Username'];

            $sqlUpdate = "UPDATE Employee SET Role='$Role',Salary='$Salary',SalaryType='$SalaryType' WHERE Username LIKE '$emplUsername'";
            $result = mysqli_query($conn, $sqlUpdate);
            if (!$result) {
                echo '<script>
				window.alert("ERROR CONNECTING WITH DATABASE");
				</script>';
            } else {
                echo '<script>
				window.alert("UPDATED CORRECTLY!");
				</script>';
            }
        }

    }
}

?>

