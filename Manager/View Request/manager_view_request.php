<?php session_start();
include('changeState_viewRequest.php');
?>
<!doctype html>
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


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="view_request_manager.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
</head>

<body>
<div class="header">
    <form action="logout_manager.php" method="post" id=form_id4>
        <button onclick="myFunction4()" name="LogOutButton" id="LogOutButton" class="logout">LogOut</button>
    </form>


    <div class="logo">
        <a href="manager_dashboard.html">
            <img src="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png"
                 width="100" height="100">
        </a>
        <ul>
            <label class="nav">
                <li><a href="manager_dashboard.html">Home</a></li>
                <li><a href="edit_profile_manager.php">Profile</a></li>
                <li><a href="view_hours_manager.php">View Hours</a></li>
                <li><a href="leave_request_manager.html">Leave Request</a></li>
                <li><a href="average_per_week.html">Average per week</a></li>
                <li><a href="payroll_report.php">Payroll Report</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn" style="color:orange;text-decoration: underline">My
                        Employees</a>
                    <div class="dropdown-content">
                        <a href="add_employee.php">Add Employee</a>
                        <a href="employee_status_manager.php">Employee Status</a>
                        <a href="choose_employee.php">Delete Employee</a>
                        <a href="manager_view_request.php" style="color:orange;text-decoration: underline">View
                            Requests</a>
                        <a href="delete_employee_.php">Delete Employee</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Language</a>
                    <div class="dropdown-content">
                        <a href="#">Ελληνικά</a>
                        <a href="#">English</a>
                        <a href="#">Norsk</a>
                        <a href="#">Polski</a>
                        <a href="#">Deutsch</a>
                        <a href="#">Svenska</a>
                    </div>
                </li>
            </label>
        </ul>

    </div>
</div>


<div class="paragraph">

    <p class="title_class"><b>View Requests</b></p>

    <br>
    <hr>
    <div style="overflow-x:auto;">

        <table style="width:90%" name="table" id="table">

            <tr style="text-align:center">
                <th>Leave ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Surname</th>
                <th>From</th>
                <th>To</th>
                <th>Reason</th>
                <th>State</th>

            </tr>
            <?php
            include_once 'db.php';

            $Username = $_SESSION['username'];


            $sql = "SELECT  Employee.`Name`, Employee.`Surname`, `Leave`.`FromDate`, `Leave`.`ToDate`,  `Leave`.`Reason`, `Leave`.`State`, `Employee`.`Username`, `Leave`.`LeaveID` FROM `Leave` INNER JOIN `Employee` ON (`Leave`.`Username`=`Employee`.`Username`) WHERE `Employee`.`Username` IN ( SELECT  `Username` FROM  `Employee` WHERE  `UsernameManager` LIKE  '$Username') AND  `Leave`.`State` = 'p'";
            $result = mysqli_query($conn, $sql);


            if (!$result) {
                echo $Username;
                echo '<script type="text/javascript">
				window.alert("ERROR CONNECTION WITH DATABASE");
				</script>';
                exit();
            } else {
            ?>

            <form method="post" id="status" action="<?php $_SERVER['PHP_SELF']; ?>">
                <?php

                while ($row = mysqli_fetch_array($result)) {
                    //save all leaveid in a array
                    $leave_data[] = array('LeaveID' => $row['LeaveID']);

                    //print the data to the table
                    echo "<tr><td>" . $row['LeaveID'] . "</td><td>" . $row['Username'] . "</td><td>" . $row['Name'] . "</td><td>" . $row['Surname'] . "</td><td>" . $row['FromDate'] . "</td><td>" . $row['ToDate'] . "</td><td>" . $row['Reason'] . "</td>";

                    ?>

                    <td>

                        <!--  <select name="selectbasic" onchange="myFunction()" class="form-control" id="selectbasic">
                              <option value='Pending' selected="selected">Pending</option>
                              <option value='Reject'>Reject</option>
                              <option value='Accept'>Accept</option>
                          </select>-->


                        <button name="Reject" onclick="stateReject()" id="Reject">R</button>
                        <button name="Pending" onclick="statePending()" id="Pending">P</button>
                        <button name="Accept" onclick="stateAccept()" id="Accept">A</button>
                    </td>
                    </tr>

                    <?php

                }
                $_SESSION['LeaveID'] = '<script type="text/javascript">stateReject()</script>';
                '<script type="text/javascript">myFunction()</script>';
                }
                ?>

            </form>
        </table>

        <!-- <div class="paragraph2"><!-- the buttons-->
        <!-- <label onclick="cancelButton()" class="buttonstyle1">Cancel</label>
        <button type="submit" name="continue" class="buttonstyle">Save</button>
    </div> -->


    </div>
    <script>
        var choice ;
        /*  $("selectbasic").change(function () {
              var str = "";
              $("select option:selected").each(function () {
                  str += $(this).text() + " ";
              });
          }).change();

          $("selectbasic").change(function () {
              var str = "";
              $(document).on('click', '#table tr', function () {
                  var row = $(this).index();  // jQuery way
                  $("select option:selected").each(function () {
                      str += $(this).text() + " ";
                  });
              );
          });
          document.getElementById('status').submit();
          });*/


        function myfunction() {
            document.getelementbyid("status").submit();
        }

        function statePending() {
            choice = document.getElementById("Pending").name;
            window.location = "changeStage_viewRequest.php?choice="+choice;
        }

        function stateAccept() {
            choice = document.getElementById("Accept").name;
        }

        function stateReject() {
            choice = document.getElementById("Reject").name;
        }

        //alert(choice);
        function cancelbutton() {
            if (confirm('do you want to leave this page?')) {
                window.location.replace("manager_dashboard.html");
            }
            else {
                window.location.replace("manager_view_request.php");
            }
        }

        function myfunction4() {
            document.getelementbyid("form_id4").submit();
        }
    </script>


</div>
<!--   </form> -->
</body>
</html>
