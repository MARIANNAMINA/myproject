<?php session_start();
/**
 * Author: Maria Kouppi
 *
 * If a manager click the "view request" button in his/her dashboard, then in a page, appear a table with all
 * requests which are pended in database. Click one of the button, "reject" or "accept" or "pending" and the
 * state of request change in database.
 *
 */
include_once 'db.php';

if (isset($_GET['datatable'])) {
    $Username = $_SESSION['username'];
    $sql = "SELECT  Employee.`Name`, Employee.`Surname`, `Leave`.`FromDate`, `Leave`.`ToDate`,  `Leave`.`Reason`, `Leave`.`State`, `Employee`.`Username`, `Leave`.`LeaveID` FROM `Leave` INNER JOIN `Employee` ON (`Leave`.`Username`=`Employee`.`Username`) WHERE `Employee`.`Username` IN 
            ( SELECT  `Username` FROM  `Employee` WHERE  `UsernameManager` LIKE  '$Username' OR `Username` LIKE '$Username') AND  `Leave`.`State` = 'p'";
    $result = mysqli_query($conn, $sql);

    $results = array();
    $employees = array();
    while ($row = mysqli_fetch_array($result)) {
        //save all data in a array
        array_push($employees, array('LeaveID' => $row['LeaveID'], 'Username' => $row['Username'], 'Name' => $row['Name'], 'Surname' => $row['Surname'], 'FromDate' => $row['FromDate'], 'ToDate' => $row['ToDate'], 'Reason' => $row['Reason'],
            'State' => '<button name="Reject" id="Reject" onclick="changeReject(' . $row['LeaveID'] . ')">R</button>
                        <button name="Pending" id="Pending" onclick="changePending(' . $row['LeaveID'] . ')">P</button>
                        <button name="Accept" id="Accept" onclick="changeAccept(' . $row['LeaveID'] . ')">A</button>'));
    }
    $results['data'] = $employees;
    $results['recordsTotal'] = mysqli_num_rows($result);
    $results['recordsFiltered'] = mysqli_num_rows($result);
    echo json_encode($results);
}
if (isset($_GET['reject'])) {
    if (isset ($_POST['id'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);


        //check if is in if
        $result = array();
        //Update
        $state = "r";

        $sqlUpdate = "UPDATE `Leave` SET `Leave`.`State`=? WHERE `Leave`.`LeaveID` = '$id'";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlUpdate)) {
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $state);
            mysqli_stmt_execute($stmt);
        }
        $result["status"] = "OK";
        $result["message"] = "State updated";

        echo json_encode($result);
    }
}
if (isset($_GET['accept'])) {
    if (isset ($_POST['id'])) {
        $id = $_POST['id'];

        $result = array();
        //Update

        $state = "a";

        $sqlUpdate = "UPDATE `Leave` SET `Leave`.`State`=? WHERE `Leave`.`LeaveID` = '$id'";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlUpdate)) {
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $state);
            $sqlUsername = "SELECT `Username` FROM `Leave` WHERE `Leave`.`LeaveID` = '$id'";
            $resultSql = mysqli_query($conn, $sqlUsername);
            $row = mysqli_fetch_array($resultSql);
            $username = $row['Username'];

            //decrease the annual leave which a employee has.
            $sqlAnnual = "UPDATE `Employee` SET `AnnualLeaves`= `AnnualLeaves` - (SELECT DATEDIFF(`Leave`.`ToDate`, `Leave`.`FromDate`) AS dif FROM `Leave` WHERE `Leave`.`LeaveID` = '$id' ) WHERE `Username` = '$username'";
            if (!mysqli_query($conn, $sqlAnnual)) {
                exit();
            }


            mysqli_stmt_execute($stmt);
        }


        $result["status"] = "OK";
        $result["message"] = "State updated";

        echo json_encode($result);
    }
}
if (isset($_GET['pending'])) {
    if (isset ($_POST['id'])) {
        $id = $_POST['id'];
        //check if is in if
        $result = array();
        //Update

        $state = "p";

        $sqlUpdate = "UPDATE `Leave` SET `Leave`.`State`=? WHERE `Leave`.`LeaveID` = '$id'";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlUpdate)) {
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $state);
            mysqli_stmt_execute($stmt);
        }
        $result["status"] = "OK";
        $result["message"] = "State updated";

        echo json_encode($result);
    }
}

