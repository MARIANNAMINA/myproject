<?php
session_start();

if (isset($_POST['save'])){
        include 'db.php';

//$Hashed_Password = password_hash($Password, PASSWORD_DEFAULT);

$Username=$_POST['Username'];
$Password = $_POST['Password'];
//$Hashed_Password = password_hash($Password, PASSWORD_DEFAULT);
$ID=$_POST['ID'];
$SSN=$_POST['SSN'];
$FirstName=$_POST['FirstName'];
$LastName=$_POST['LastName'];
$DepartmentNum = $_POST['DepartmentNum'];
$CountryNumber = $_POST['CountryNumber'];
$Role=$_POST['Role'];
$Salary= $_POST['Salary'];
$SalaryType=$_POST['SalaryType'];
$Phone=$_POST['Phone'];
$EmergencyPhone=$_POST['EmergencyPhone'];
$Email=$_POST['Email'];
$Country=$_POST['Country'];
$Address=$_POST['Address'];
$DateofBirth=$_POST['DateofBirth'];
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
list($y, $m, $d) = explode('-', $DateofBirth);
if(!checkdate($m, $d, $y)) {
         echo '<script type="text/javascript">
        window.alert("NOT CORRECT DATE OF BIRTH FORMAT");
        window.location.replace("add_employee.html");
        </script>';
        exit();
}

if(!is_numeric($DepartmentNum)){
   echo '<script type="text/javascript">
        window.alert("DEPARTMENT NUMBER MUST BE AN INTEGER NUMBER!");
        window.location.replace("add_employee.html");
        </script>';
        exit();
}

if(!is_numeric($CountryNumber)){
   echo '<script type="text/javascript">
        window.alert("COUNTRY NUMBER MUST BE AN INTEGER NUMBER!");
        window.location.replace("add_employee.html");
        </script>';
        exit();
}

if(!is_numeric($Salary)){
   echo '<script type="text/javascript">
        window.alert("SALARY MUST BE A NUMBER!");
        window.location.replace("add_employee.html");
        </script>';
        exit();
}


$sqlDeptNum="SELECT NumberDept FROM Department WHERE NumberDept={$DepartmentNum}";
$sqlCountryNum="SELECT CountryNum FROM CorporateHeadquarter WHERE CountryNum={$CountryNumber}";
$resultCountryNum=mysqli_query($conn,$sqlCountryNum);
$resultDeptNum=mysqli_query($conn,$sqlDeptNum);
if((!($resultDeptNum))||(!($resultCountryNum))){
        echo '<script type="text/javascript">
        window.alert("ERROR CONNECTION WITH DATABASE");
        window.location.replace("add_employee.html");
        </script>';


}else{
$rowsDeptNum = mysqli_num_rows($resultDeptNum);
$rowsCountryNum = mysqli_num_rows($resultCountryNum);
if($rowsCountryNum==0){
   echo '<script type="text/javascript">
        window.alert("COUNTRY NUMBER DOES NOT EXIST IN DATABASE");
        window.location.replace("add_employee.html");
        </script>';
}
else if($rowsDeptNum==0){
         echo '<script type="text/javascript">
        window.alert("DEPARTMENT NUMBER DOES NOT EXIST IN DATABASE");
        window.location.replace("add_employee.html");
        </script>';

}else if(($rowsCountryNum!=0) && ($rowsDeptNum!=0)){
$increaseEmployees="UPDATE Department SET NumEmployees=(NumEmployees+1) WHERE NumberDept={$DepartmentNum}";
if(!mysqli_query($conn,$increaseEmployees)){
        echo '<script type="text/javascript">
        window.alert("ERROR CONNECTING WITH DATABASE");
        window.location.replace("add_employee.html");
        </script>';
}else{
$sql = "INSERT INTO Employee (CountryNumber,Email,NumDept,IsManager,Username,Password,ID,SSN,Name,Surname,Role,Salary,SalaryType,Phone,EmergencyPhone,Country,Address,Birthdate,Gender,UsernameManager) VALUES ('$CountryNumber','$Email','$DepartmentNum','$Manager','$Username','$Password','$ID','$SSN','$FirstName','$LastName','$Role','$Salary','$SalaryType','$Phone','$EmergencyPhone','$Country','$Address','$DateofBirth','$Gender','$UsernameManager')";

if(!mysqli_query($conn,$sql)){
 echo '<script type="text/javascript">
        window.alert("ERROR CONNECTING WITH DATABASE");
        window.location.replace("add_employee.html");
        </script>';

}
else{echo '<script type="text/javascript">
        window.alert("INSERTED CORRECTLY");
        window.location.replace("manager_dashboard.html");
        </script>';}
}
}
}
}
else {echo '<script type="text/javascript">
    window.alert("NOT FOUND");
        window.location.replace("manager_dashboard.html");
        </script>';
exit();}
?>

