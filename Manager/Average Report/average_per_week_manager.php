<?php
/**
 * Author: Maria Kouppi
 *
 * A manager can export a report of the working hours of his employees. The manager gives the range of dates in which he
 * wants to export the report and the name of the report. If the export button clicked, then a report with the working hours of employees
 * has been exported in the form of manager's decision(XML or JSON).
 */
session_start();
include('db.php');

// get the values of text box
$From = $_POST['from_date'];
$_SESSION['fromDate'] = $From;
$To = $_POST['to_date'];
$_SESSION['toDate'] = $_POST['to_date'];
$file_name = $_POST['file_name'];
$Username = $_SESSION['username'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $DateFrom = date("Y-m-d", strtotime($From));
    $DateTo = date("Y-m-d", strtotime($To));

    $DateFrom = date("Y-m-d", strtotime($From));
    $DateTo = date("Y-m-d", strtotime($To));

    if (strtotime($DateTo) < strtotime($DateFrom)) {
        echo '<script type="text/javascript">
			window.alert("The To field has to be after the From field!");
			window.location.replace("average_per_week.php");
			</script>';
    } else if (strtotime($DateFrom) >= strtotime('now')) {
        echo '<script type="text/javascript">
			var d = new Date();
			window.alert("The date must be before " + d.getDate() + "/" + d.getMonth()+1 + "/"  + d.getFullYear()); 
			window.location.replace("average_per_week.php");
			</script>';
    } else if (strtotime($DateTo) >= strtotime('now')) {
        echo '<script type="text/javascript">
			var d = new Date();
			window.alert("The date must be before " + d.getDate() + "/" + d.getMonth()+1 + "/"  + d.getFullYear()); 
			window.location.replace("average_per_week.php");
			</script>';

    } else {
        //if format which the manager select is XML
        if (strcmp($_POST['format_export'], "XML") == 0) {
            echo '<script type="text/javascript">
			window.open("xml_file.php","_blank");
			window.location.replace("manager_dashboard.html");
			</script>';
            exit();
            //if format which the manager select is JSON
        } else {
            echo '<script type="text/javascript">
			window.open("json_file.php","_blank");
			window.location.replace("manager_dashboard.html");
			</script>';
            exit();
        }
    }
}
?>