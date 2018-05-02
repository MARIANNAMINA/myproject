<?php
/*
 * Contains main functionality of add_employee.php file
 */
session_start();
include('password.php');
?><!doctype html>
<html lang="en">
<link rel="shortcut icon"
      href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // initialize error messages
    $username_error = $password_error = $id_error = $ssn_error = $first_name_error = $last_name_error = $role_error = $salary_error = $phone_error = $emergency_phone_error = $email_error = $country_num_error = $address_error = $birthdate_error = $leaves_error = "";

    // initialize values of each given data
    $ST = $FN = $LN = $S = $P = $EP = $E = $C = $A = $DOB = $Username = $Password = $ID = $SSN = $FirstName = $LastName = $Role = $Salary = $Phone = $EmergencyPhone = $Email = $Country = $Address = $DateofBirth = $Leaves = "";

    $flag = true;

    // check if Username text box is empty
    if (empty($_POST['Username'])) {
        $username_error = "*Username is required";
    } else {
        $Username = mysqli_real_escape_string($conn,$_POST['Username']);
		$Username = strip_tags($Username);
    }

    // check if Password text box is empty
    if (empty($_POST['Password'])) {
        $password_error = "*Password is required";
    } else {
        $Password = mysqli_real_escape_string($conn,$_POST['Password']);
		$Password = strip_tags($Password);
        // save the length of password to store it in the DB
        $Password_len = strlen($Password);
        // encrypt the given password
        $Hashed = password_hash($Password, PASSWORD_DEFAULT);
    }

    // check if ID text box is empty
    if (empty($_POST['ID'])) {
        $id_error = "*ID is required";
    } else {
        $ID = mysqli_real_escape_string($conn,$_POST['ID']);
		$ID = strip_tags($ID);
        // check if only integer numbers are inserted
        if (!preg_match("/^\d+$/", $ID)) {
            $ID = "";
            $id_error = "*Only numbers allowed";
        }
    }

    // check if SSN text box is empty
    if (empty($_POST['SSN'])) {
        $ssn_error = "*SSN is required";
    } else {
        $SSN = mysqli_real_escape_string($conn,$_POST['SSN']);
		$SSN = strip_tags($SSN);
        // check if only integer numbers are inserted
        if (!preg_match("/^\d+$/", $SSN)) {
            $SSN = "";
            $ssn_error = "*Only numbers allowed";
        }
    }

    // check if First Name text box is empty
    if (empty($_POST['FirstName'])) {
        $name_error = "*First Name is required";
    } else {
        $FN = $FirstName = mysqli_real_escape_string($conn,$_POST['FirstName']);
		$FirstName = strip_tags($FirstName);
        // check if only characters are inserted
        if (!preg_match("/^[a-zA-Z ]*$/", $FN)) {
            $FN = "";
            $name_error = "*Only letters and white space allowed";
        }
    }

    // check if Last Name text box is empty
    if (empty($_POST['LastName'])) {
        $last_name_error = "*Last Name is required";
    } else {
        $LN = $LastName = mysqli_real_escape_string($conn,$_POST['LastName']);
		$LastName = strip_tags($LastName);
        // check if only characters are inserted
        if (!preg_match("/^[a-zA-Z ]*$/", $LN)) {
            $LN = "";
            $last_name_error = "*Only letters and white space allowed";
        }
    }

    // check if Role text box is empty
    if (empty($_POST['Role'])) {
        $role_error = "*Role is required";
    } else {
        $Role = mysqli_real_escape_string($conn,$_POST['Role']);
		$Role = strip_tags($Role);
    }

    // check if Salary text box is empty
    if (empty($_POST['Salary'])) {
        $salary_error = "*Salary is required";
    } else {
        $S = $Salary = mysqli_real_escape_string($conn,$_POST['Salary']);
		$Salary = strip_tags($Salary);
        // check if integer or double value is inserted
        if (!is_numeric($S)) {
            $S = "";
            $salary_error = "*Only numbers allowed";
        }
    }

    // check if Phone text box is empty
    if (empty($_POST['Phone'])) {
        $phone_error = "*Phone number is required";
    } else {
        $P = $Phone = mysqli_real_escape_string($conn,$_POST['Phone']);
		$Phone = strip_tags($Phone);
        // check if only integer numbers are inserted
        if (!preg_match("/^\d+$/", $Phone)) {
            $P = "";
            $phone_error = "*Invalid phone number";
        }
    }

    // check if Emergency Phone text box is empty
    if (empty($_POST['EmergencyPhone'])) {
        $emergency_phone_error = "*Emergency phone number is required";
    } else {
        $EP = $EmergencyPhone = mysqli_real_escape_string($conn,$_POST['EmergencyPhone']);
		$EmergencyPhone = strip_tags($EmergencyPhone);
        // check if only integer numbers are inserted
        if (!preg_match("/^\d+$/", $EmergencyPhone)) {
            $EP = "";
            $emergency_phone_error = "*Invalid phone number";
        }
    }

    // check if Email text box is empty
    if (empty($_POST['Email'])) {
        $email_error = "*Email is required";
    } else {
        $E = $Email = mysqli_real_escape_string($conn,$_POST['Email']);
		$Email = strip_tags($Email);
        // check if the given email is in the correct format
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            $E = "";
            $email_error = "*Invalid email format";
        }
    }

    // check if Country text box is empty
    if (empty($_POST['Country'])) {
        $C = "";
        $Country = " ";
    } else {
        $C = $Country = mysqli_real_escape_string($conn,$_POST['Country']);
		$Country = strip_tags($Country);
        // check if only characters are inserted
        if (!preg_match("/^[a-zA-Z ]*$/", $C)) {
            $C = "";
            $country_error = "*Only letters and white space allowed";
        }
    }

    // check if Annual Leaves text box is empty
    if (empty($_POST['Leaves'])) {
        $leaves_error = "*Number of Annual Leaves is required";
    } else {
        $Leaves = mysqli_real_escape_string($conn,$_POST['Leaves']);
		$Leaves = strip_tags($Leaves);
        // check if only integer number is inserted
        if (!preg_match("/^\d+$/", $Leaves)) {
            $Leaves = "";
            $leaves_error = "*Only numbers allowed";
        }
    }

    if (empty($_POST['Address'])) {
        $A = "";
        $Address = " ";
    } else {
        $A=$Address = mysqli_real_escape_string($conn,$_POST['Address']);
		$Address = strip_tags($Address);
    }

    if (empty($_POST['DateofBirth'])) {
        $DOB = "";
        $DateofBirth = "0000-00-00";
    } else {
        $DOB = $DateofBirth = mysqli_real_escape_string($conn,$_POST['DateofBirth']);
		$DateofBirth = strip_tags($DateofBirth);
        // check if Date of Birth is given in the following format: YYY-MM-DD
        list($y, $m, $d) = explode('-', $DOB);
        if (!checkdate($m, $d, $y)) {
            $DOB = "";
            $birthdate_error = "*Date of birth should be in the following format YYY-MM-DD";
        }
    }

    $SalaryType = $_POST['SalaryType'];
    $Gender = $_POST['Gender'];
    $UsernameManager = $_SESSION['username'];
    $Manager = 0;
    if (isset($_POST['Manager'])) {
        $Manager = 1;
    }

    if (strcmp($Gender, "Female") == 0) {
        $Gender = "F";
    } else if (strcmp($Gender, "Male") == 0) {
        $Gender = "M";
    } else {
        $Gender = "O";
    }

    if (strcmp($SalaryType, "Fixed") == 0) {
        $SalaryType = "F";
		$ST="Fixed";
    } else if (strcmp($SalaryType, "Part Time") == 0) {
        $SalaryType = "P";
		$ST="Part Time";
    } else {
        $SalaryType = "FO";
		$ST="Fixed with Overtime";
    }

    // get the given number of Department (NumDept) to store it to the DB
    $Dept = mysqli_real_escape_string($conn,$_POST['selDept']);
    $DepartmentNum = explode(" -", $Dept);
    $DeptNum = (int)$DepartmentNum[0];
    $WorkedCountry = mysqli_real_escape_string($conn,$_POST['selCountry']);

    // get the given number of Country (CountryNum) to store it to the DB
    $WorkCountry = explode(" -", $WorkedCountry);
    $WorkC = (int)$WorkCountry[0];

    // check if required fields are not empty and if all data are inserted correctly
    if (empty($username_error) && empty($password_error) && empty($id_error) && empty($ssn_error) && empty($first_name_error) && empty($last_name_error) && empty($dept_error) && empty($role_error) && empty($country_error) && empty($salary_error) && empty($phone_error) && empty($emergency_phone_error) && empty($email_error) && empty($country_num_error) && empty($address_error) && empty($birthdate_error) && empty($leaves_error)) {

        // check if the given Department is in the given Country
        $sqlDeptNum = "SELECT NumberDept FROM Department WHERE NumberDept={$DeptNum} AND CountryNum={$WorkC}";
        $resultDeptNum = mysqli_query($conn, $sqlDeptNum);
        $flag = true;
        if (!($resultDeptNum)) {
            print_error_replace();
        } else {
            $rowsDeptNum = mysqli_num_rows($resultDeptNum);
			
            if ($rowsDeptNum == 0) {
                $flag = false;
                print_error_dept();
            } else {
                // increase the number of employees of the given department  by one
                $increaseEmployees = "UPDATE Department SET NumEmployees=(NumEmployees+1) WHERE NumberDept={$DeptNum} AND CountryNum={$WorkC}";
                if (!mysqli_query($conn,$increaseEmployees)) {
                    print_error();
                }
            }
        }
		
        // check if the above checks are completed successfully to insert the given employee in the DB
        if ($flag) {
			// insert the given data of an employee in the DB
			$sqlEmpl = "INSERT INTO Employee (CountryNumber,Email,NumDept,IsManager,Username,Password,ID,SSN,Name,Surname,Role,Salary,SalaryType,Phone,EmergencyPhone,Country,Address,Birthdate,Gender,UsernameManager,CharactersPassword,AnnualLeaves) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$stmt=mysqli_stmt_init($conn);
            
			if(!mysqli_stmt_prepare($stmt,$sqlEmpl)){
                print_error_username();
                $Username = "";
            } else {
				mysqli_stmt_bind_param($stmt,"isiissiisssdsiisssssii",$WorkCountry[0],$Email,$DepartmentNum[0],$Manager,$Username,$Hashed,$ID,$SSN,$FirstName,$LastName,$Role,$Salary,$SalaryType,$Phone,$EmergencyPhone,$Country,$Address,$DateofBirth,$Gender,$UsernameManager,$Password_len,$Leaves);
				mysqli_stmt_execute($stmt);
                print_success();
            }
        }
    }
}

function print_success(){
	 echo '<script type="text/javascript">
		   window.alert("INSERTED CORRECTLY"); 
		   window.location.replace("manager_dashboard.html");
		   </script>';
}

function print_error(){
	echo '<script type="text/javascript">
		  window.alert("ERROR CONNECTING WITH DATABASE");
		  </script>';
}

function print_error_replace(){
	echo '<script type="text/javascript">
		  window.alert("ERROR CONNECTION WITH DATABASE");
		  window.location.replace("add_employee.php");
		  </script>';
}

function print_error_dept(){
	 echo '<script>
			alert("DEPARTMENT IN THE GIVEN COUNTRY DOES NOT EXIST IN DATABASE");
			</script>';
}

function print_error_username(){
	echo '<script>
		  window.alert("ERROR!YOU MAY INSERT A USERNAME THAT ALREADY EXISTS IN THE DATABASE");
		  </script>';
}
?>

