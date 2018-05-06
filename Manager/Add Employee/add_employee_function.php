<?php
/*
 * Contains main functionality of add_employee.php file
 */
session_start();
include('password.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // initialize error messages
    $username_error = $password_error = $id_error = $ssn_error = $first_name_error = $last_name_error = $role_error = $salary_error = $phone_error = $emergency_phone_error = $email_error = $country_num_error = $address_error = $birthdate_error = $leaves_error = "";

    // initialize values of each given data
    $ST = $FN = $LN = $S = $P = $EP = $E = $C = $A = $DOB = $Username = $Password = $ID = $SSN = $FirstName = $LastName = $Role = $Salary = $Phone = $EmergencyPhone = $Email = $Country = $Address = $DateofBirth = $Leaves = "";

    // used to check if data had been inserted correctly in the database or not
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
		// used to prevent SQL injection
        $Password = mysqli_real_escape_string($conn,$_POST['Password']);
		// used to prevent Javascript injection
		$Password = strip_tags($Password);
        // save the length of password to store it in the DB
        $Password_len = strlen($Password);
        // encrypt/hash the given password
        $Hashed = password_hash($Password, PASSWORD_DEFAULT);
    }

    // check if ID text box is empty
    if (empty($_POST['ID'])) {
        $id_error = "*ID is required";
    } else {
		// used to prevent SQL injection
        $ID = mysqli_real_escape_string($conn,$_POST['ID']);
		// used to prevent Javascript injection
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
		// used to prevent SQL injection
        $SSN = mysqli_real_escape_string($conn,$_POST['SSN']);
		// used to prevent Javascript injection
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
		// used to prevent SQL injection
        $FN = $FirstName = mysqli_real_escape_string($conn,$_POST['FirstName']);
		// used to prevent Javascript injection
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
		// used to prevent SQL injection
        $LN = $LastName = mysqli_real_escape_string($conn,$_POST['LastName']);
		// used to prevent Javascript injection
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
		// used to prevent SQL injection
        $Role = mysqli_real_escape_string($conn,$_POST['Role']);
		// used to prevent Javascript injection
		$Role = strip_tags($Role);
    }

    // check if Salary text box is empty
    if (empty($_POST['Salary'])) {
        $salary_error = "*Salary is required";
    } else {
		// used to prevent SQL injection
        $S = $Salary = mysqli_real_escape_string($conn,$_POST['Salary']);
		// used to prevent Javascript injection
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
		// used to prevent SQL injection
        $P = $Phone = mysqli_real_escape_string($conn,$_POST['Phone']);
		// used to prevent Javascript injection
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
		// used to prevent SQL injection
        $EP = $EmergencyPhone = mysqli_real_escape_string($conn,$_POST['EmergencyPhone']);
		// used to prevent Javascript injection
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
		// used to prevent SQL injection
        $E = $Email = mysqli_real_escape_string($conn,$_POST['Email']);
		// used to prevent Javascript injection
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
		// used to prevent SQL injection
        $C = $Country = mysqli_real_escape_string($conn,$_POST['Country']);
		// used to prevent Javascript injection
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
		// used to prevent SQL injection
        $Leaves = mysqli_real_escape_string($conn,$_POST['Leaves']);
		// used to prevent Javascript injection
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
		// used to prevent SQL injection
        $A=$Address = mysqli_real_escape_string($conn,$_POST['Address']);
		// used to prevent Javascript injection
		$Address = strip_tags($Address);
    }

    if (empty($_POST['DateofBirth'])) {
        $DOB = "";
        $DateofBirth = "0000-00-00";
    } else {
		// used to prevent SQL injection
        $DOB = $DateofBirth = mysqli_real_escape_string($conn,$_POST['DateofBirth']);
		// used to prevent Javascript injection
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
	// check if checkbox is clicked
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

    // get the given number of Department (NumDept) to store it to the DB, used to prevent SQL injection
    $Dept = mysqli_real_escape_string($conn,$_POST['selDept']);
    $DepartmentNum = explode(" -", $Dept);
    $DeptNum = (int)$DepartmentNum[0];
	// used to prevent SQL injection
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
            print_error();
        } else {
            $rowsDeptNum = mysqli_num_rows($resultDeptNum);
			// check if the department that manager gave exists in the given country
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
		
		// select the usernames of manager's employees to check if he/she enters a username that already exists in the database
		$sqlUsername = "SELECT Username FROM Employee WHERE Username LIKE '$Username' AND UsernameManager LIKE '$UsernameManager'";
        $resultUsername= mysqli_query($conn, $sqlUsername);
        if (!($resultUsername)) {
            print_error_username();
			$Username="";
        } else {
            $rowsUsername = mysqli_num_rows($resultUsername);
			// check if the username of an employee already exists in the database
            if ($rowsUsername != 0) {
                $flag = false;
				print_error_username();
				$Username="";
            }
		}
		
        // check if the above checks are completed successfully to insert the given employee in the DB
        if ($flag) {
			// insert the given data of an employee in the DB
			$sqlEmpl = "INSERT INTO Employee (CountryNumber,Email,NumDept,IsManager,Username,Password,ID,SSN,Name,Surname,Role,Salary,SalaryType,Phone,EmergencyPhone,Country,Address,Birthdate,Gender,UsernameManager,CharactersPassword,AnnualLeaves) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			
			// used to prevent SQL injection (prepared statements)
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

/**
 * Prints successfully message related to data inserted correctly in the database
 */
function print_success(){
	 echo '<script type="text/javascript">
		   window.alert("INSERTED CORRECTLY"); 
		   window.location.replace("manager_dashboard.html");
		   </script>';
}

/**
 * Prints error message related to if is something wrong with the used queries
 */
function print_error(){
	echo '<script type="text/javascript">
		  window.alert("ERROR CONNECTING WITH DATABASE");
		  </script>';
}

/**
 * Prints an error message related to that the given department does not exist in the given country
 */
function print_error_dept(){
	 echo '<script>
			alert("DEPARTMENT IN THE GIVEN COUNTRY DOES NOT EXIST IN DATABASE");
			</script>';
}

/**
 * Prints an error message related to that the given username already exists in the database
 */
function print_error_username(){
	echo '<script>
		  window.alert("ERROR!YOU MAY INSERT A USERNAME THAT ALREADY EXISTS IN THE DATABASE");
		  </script>';
	
}
?>

