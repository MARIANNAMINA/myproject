<?php session_start();
/**
 * Created by PhpStorm.
 * User: ELENI
 * Date: 30/4/2018
 * Time: 2:32 μμ
 */
include_once 'db.php';

if (isset($_GET['datatable'])) {
    $Username = $_SESSION['username'];
    $sql = "SELECT  Employee.`Name`, Employee.`Surname`, `Leave`.`FromDate`, `Leave`.`ToDate`,  `Leave`.`Reason`, `Leave`.`State`, `Employee`.`Username`, `Leave`.`LeaveID` FROM `Leave` INNER JOIN `Employee` ON (`Leave`.`Username`=`Employee`.`Username`) WHERE `Employee`.`Username` IN ( SELECT  `Username` FROM  `Employee` WHERE  `UsernameManager` LIKE  '$Username') AND  `Leave`.`State` = 'p'";
    $result = mysqli_query($conn, $sql);

    $results = array();
    $employees = array();
    while ($row = mysqli_fetch_array($result)) {
        //save all data in a array
        array_push($employees, array('LeaveID' => $row['LeaveID'], 'Username' => $row['Username'], 'Name' => $row['Name'], 'Surname' => $row['Surname'], 'FromDate' => $row['FromDate'], 'ToDate' => $row['ToDate'], 'Reason' => $row['Reason'],
            'State' => '<button name="Reject" id="changeReject(' . $row['LeaveID'] . ')">R</button>
                        <button name="Pending" id="changePending(' . $row['LeaveID'] . ')">P</button>
                        <button name="Accept" id="changeAccept(' . $row['LeaveID'] . ')">A</button>'));
    }
    $results['data'] = $employees;
    $results['recordsTotal'] = mysqli_num_rows($result);
    $results['recordsFiltered'] = mysqli_num_rows($result);
    echo json_encode($results);
}
if (isset($_GET['reject'])) {
    if (isset ($_POST['id'])) {
        $id = $_POST['id'];
        //Update

        /* $sqlUpdate = "UPDATE `Leave` SET `Leave`.`State`='r' WHERE `Leave`.`LeaveID` = '$array[$row]'";
         if (!mysqli_query($conn, $sqlUpdate)) {
             echo '<script type="text/javascript">
             window.alert("Your change not insert in Database!" );
             window.location.replace("manager_view_request.php");
             </script>';
             exit();
         } else {
             echo '<script type="text/javascript">
             window.alert("INSERTED CORRECTLY!");
             window.location.replace("manager_view_request.php");
             </script>';
         }*/
    }
}
