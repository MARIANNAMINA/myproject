<?php
session_start();
include('password.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	include 'db.php';
$username_error = $password_error = $id_error = $ssn_error = $first_name_error= $last_name_error = $dept_error = $role_error = $country_error = $salary_error = $phone_error = $emergency_phone_error = $email_error = $country_num_error = $address_error = $birthdate_error = "";
$FN = $LN = $DN = $CN = $S = $P = $EP = $E = $C = $A = $DOB = $CountryNumber = $DepartmentNum = $Username = $Password = $ID = $SSN = $FirstName = $LastName = $Role = $Salary = $Phone = $EmergencyPhone = $Email = $Country = $Address = $DateofBirth = "";

if(empty($_POST['Username'])){
	$username_error="*Username is required";
}else{
	$Username=$_POST['Username'];
}

if(empty($_POST['Password'])){
	$password_error="*Password is required";
}else{
	$Password = $_POST['Password'];
	$Hashed = password_hash($Password, PASSWORD_DEFAULT);
}

if(empty($_POST['ID'])){
	$id_error="*ID is required";
}else{
	$ID=$_POST['ID'];
}

if(empty($_POST['SSN'])){
	$ssn_error="*SSN is required";
}else{
	$SSN=$_POST['SSN'];
	if(!preg_match("/^\d+$/",$SSN)){
		$SSN="";
		$ssn_error="*Only numbers allowed";
	}
}

if(empty($_POST['FirstName'])){
	$FN="";
	$FirstName="NULL";
}else{
	$FN=$FirstName=$_POST['FirstName'];
	$FirstName="'$FirstName'";
	if(!preg_match("/^[a-zA-Z ]*$/",$FN)){
		$FN="";
		$name_error="*Only letters and white space allowed";
	}
}

if(empty($_POST['LastName'])){
	$LN="";
	$LastName="NULL";
}else{
	$LN=$LastName=$_POST['LastName'];
	$LastName="'$LastName'";
	if(!preg_match("/^[a-zA-Z ]*$/",$LN)){
		$LN="";
		$last_name_error="*Only letters and white space allowed";
	}
}

if(empty($_POST['DepartmentNum'])){
	$DN="";
	$DepartmentNum="NULL";
}else{
	$DN=$DepartmentNum = $_POST['DepartmentNum'];
	$DepartmentNum="'$DepartmentNum'";
	if(!preg_match("/^\d+$/",$DN)){
		$DN="";
		$dept_error="*Only numbers allowed";
	}
}

if(empty($_POST['CountryNumber'])){
	$CN="";
	$CountryNumber="NULL";
}else{
	$CN=$CountryNumber = $_POST['CountryNumber'];
	$CountryNumber="'$CountryNumber'";
	if(!preg_match("/^\d+$/",$CN)){
		$CN="";
		$country_num_error="*Only numbers allowed";
	}
}

if(empty($_POST['Role'])){
	$role_error="*Role is required";
}else{
	$Role=$_POST['Role'];
}

if(empty($_POST['Salary'])){
	$S="";
	$Salary="NULL";
}else{
	$S=$Salary=$_POST['Salary'];
	$Salary="'$Salary'";
	if(!is_numeric($S)){
		$S="";
		$salary_error="*Only numbers allowed";
	}
}

if(empty($_POST['Phone'])){
	$P="";
	$Phone="NULL";
}else{
	$Phone=$_POST['Phone'];
	$Phone="'$Phone'";
}

if(empty($_POST['EmergencyPhone'])){
	$EP="";
	$EmergencyPhone="NULL";
}else{
	$EmergencyPhone=$_POST['EmergencyPhone'];
	$EmergencyPhone="'$EmergencyPhone'";
}

if(empty($_POST['Email'])){
	$E="";
	$Email="NULL";
}else{
	$Email=$_POST['Email'];
	$Email="'$Email'";
}

if(empty($_POST['Country'])){
	$C="";
	$Country="NULL";
}else{
	$C=$Country=$_POST['Country'];
	$Country="'$Country'";
	if(!preg_match("/^[a-zA-Z ]*$/",$C)){
		$C="";
		$country_error="*Only letters and white space allowed";
	}
}

if(empty($_POST['Address'])){
	$A="";
	$Address="NULL";
}else{
	$Address=$_POST['Address'];
	$Address="'$Address'";
}

if(empty($_POST['DateofBirth'])){
	$DOB="";
	$DateofBirth="NULL";
}else{
	$DOB=$DateofBirth=$_POST['DateofBirth'];
	$DateofBirth="'$DateofBirth'";
	list($y, $m, $d) = explode('-', $DOB);
    if(!checkdate($m, $d, $y)){
		$DOB="";
		$birthdate_error="*Date of birth should be in the following format YYY-MM-DD";
	}
}

$SalaryType=$_POST['SalaryType'];
$Gender=$_POST['Gender'];
$UsernameManager=$_SESSION['username'];
$Manager=0;
if(isset($_POST['Manager'])){
$Manager=1;
}

if(strcmp($Gender,"Female")==0){
	$Gender="F";
}else{
	$Gender="M";
}

if(strcmp($SalaryType,"Fixed")==0){
        $SalaryType="F";
}else if(strcmp($SalaryType,"Part Time")==0){
        $SalaryType="P";
}else{
        $SalaryType="FO";
}

	if(empty($username_error) && empty($password_error) && empty($id_error) && empty($ssn_error) && empty($first_name_error) && empty($last_name_error) && empty($dept_error) && empty($role_error) && empty($country_error) && empty($salary_error) && empty($phone_error) && empty($emergency_phone_error) && empty($email_error) && empty($country_num_error) && empty($address_error) && empty($birthdate_error)){
		if(!empty($DN)){
			$sqlDeptNum="SELECT NumberDept FROM Department WHERE NumberDept={$DepartmentNum}";
			$resultDeptNum=mysqli_query($conn,$sqlDeptNum);
			if(!($resultDeptNum)){
				echo '<script type="text/javascript">
				window.alert("ERROR CONNECTION WITH DATABASE");
				window.location.replace("add_employee.php");
				</script>';
			}else{
				$rowsDeptNum = mysqli_num_rows($resultDeptNum);
				if($rowsDeptNum==0){
					echo '<script type="text/javascript">
					window.alert("DEPARTMENT NUMBER DOES NOT EXIST IN DATABASE");
					window.location.replace("add_employee.php");
					</script>';
					exit();
				}else{
					$increaseEmployees="UPDATE Department SET NumEmployees=(NumEmployees+1) WHERE NumberDept={$DepartmentNum}";
					if(!mysqli_query($conn,$increaseEmployees)){
					echo '<script type="text/javascript">
					window.alert("ERROR CONNECTING WITH DATABASE");
					window.location.replace("add_employee.php");
					</script>';
					exit();
					}
				}
			}
		}
		
		if(!empty($CN)){
			$sqlCountryNum="SELECT CountryNum FROM CorporateHeadquarter WHERE CountryNum={$CountryNumber}";
			$resultCountryNum=mysqli_query($conn,$sqlCountryNum);
			if(!($resultCountryNum)){
				echo '<script type="text/javascript">
				window.alert("ERROR CONNECTION WITH DATABASE");
				window.location.replace("add_employee.php");
				</script>';
				exit();
			}else{
				$rowsCountryNum = mysqli_num_rows($resultCountryNum);
				if($rowsCountryNum==0){
					echo '<script type="text/javascript">
					window.alert("COUNTRY NUMBER DOES NOT EXIST IN DATABASE");
					window.location.replace("add_employee.php");
					</script>';
					exit();
				}
			}
		}

		$sqlEmpl = "INSERT INTO Employee (CountryNumber,Email,NumDept,IsManager,Username,Password,ID,SSN,Name,Surname,Role,Salary,SalaryType,Phone,EmergencyPhone,Country,Address,Birthdate,Gender,UsernameManager) VALUES ($CountryNumber,$Email,$DepartmentNum,'$Manager','$Username','$Hashed','$ID','$SSN',$FirstName,$LastName,'$Role',$Salary,'$SalaryType',$Phone,$EmergencyPhone,$Country,$Address,$DateofBirth,'$Gender','$UsernameManager')";
		if(!mysqli_query($conn,$sqlEmpl)){
			echo '<script type="text/javascript">
			window.alert("ERROR!YOU MAY INSERT A USERNAME THAT ALREADY EXISTS IN THE DATABASE");
			window.location.replace("add_employee.php");
			</script>';
			exit();
		}else{
			echo '<script type="text/javascript">
			window.alert("INSERTED CORRECTLY"); 
			window.location.replace("manager_dashboard.html");
			</script>';
		}
		unset($_POST['form_id']);		
	}	
}

?>

