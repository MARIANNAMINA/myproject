<?php
session_start();
include ('employee_leave.php');
?>
<!--
- Author: Maria Kouppi
- 
- This file is a ph file for leave request functionality that an employee can do. At the top of the page you will see
- the menu with the other features you can do on this web page. The employees give the date which the employees want to
- start the leave, the date which the employees want to return from leave and the reason which want to leave. For
- example, summer holidays, doctor appointment etc. When the three fields are complete, pressing the button 'Submit’,
- an alert box will appears and pressing the button ‘OK’ the  request will be submit to the database. At the alert box
- pressing the button ‘Cancel’, the request will not be submit and you will stay on the same screen (Leave Request
- screen). If the employees press the button ‘Cancel’ which is on the screen, an alert box will appears and pressing
- the button ‘OK’,  the request will not be submit and the screen now will be your Dashboard (employee). At
- the alert box pressing the button ‘Cancel’, you will stay on the same screen (Leave Request screen).
-
-->
<!doctype html>

<html lang="eng">
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
    <link rel="stylesheet" type="text/css" href="leave_request.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<!-- Header with the other features-->
<div class="header">
    <form action="logout_employee.php" method="post" id="logout_button">
        <button onclick="logout_function()" name="LogOutButton" id="LogOutButton" class="logout">LogOut</button>
    </form>
    <div class="logo">
        <a href="EmployeeDashboard.html">
            <img src="statare.png" alt="Statare logo" width="50%" height="50%">
        </a>

        <ul>
            <label class="nav">
                <li><a href="EmployeeDashboard.html">Home</a></li>
                <li><a href="edit_profile_employee.php">Profile</a></li>
                <li><a href="view_hours_employee.php">View Hours</a></li>
                <li><a href="employee_view_request.php">View Requests</a></li>
                <li><a href="leave_request_employee.php" style="color:orange; text-decoration: underline">Leave
                    Request</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Language</a>
                    <div class="dropdown-content">
                        <a href="#">Ελληνικά</a>
                        <a href="#">English</a>
                    </div>
                </li>
            </label>
        </ul>

    </div>
</div>

<p class="title_class"><b>Leave Request</b></p>

<br>
<div>

    <form class="username" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" id="form_id">
        <div class="aligncenter">


            <label  for="textinput2"><b>REQUEST DAYS FROM:</b></label>
            <!-- the date which want to start the leave -->
            <input id="textinput2" name="From" type="date" placeholder="" required="">

            <br>
            <br>

            <label  for="textinput3"><b>REQUEST DAYS TO:</b></label>
            <!-- the date which want to return from leave -->
            <input id="textinput3" name="To" type="date" placeholder="" required="">

            <br>
            <br>

            <label  for="textinput4"><b><label style="color:red">*</label>Description :</b></label>
            <!-- and the reason which want to leave-->
            <input id="textinput4" name="desc" type="text" value="<?php echo "$Desc"; ?>">
            <br>
            <span class="span_fcolumn"><?php echo "$error_desc"; ?></span>

            <br>
            <br>
            <br>
            <button class="cancel" id="cancel" name="cancel">Cancel</button>
            <button type="submit" name="save" class="submit" id="save">Submit</button>

        </div>
    </form>
</div>

<!--pop up window -->
<div id="saveDiv" style="display:none" class="confirm_box">
    <div class="overlay"></div>
    <div class="confirm_model">
        <div class="model">
            <div class="header">
                <h1 class="title">
                    Do you want to save the changes you made?
                </h1>
            </div>
            <div class="content">
                <div class="buttons_container">
                    <button class="confirm button" id="yes" name="yes">Yes</button>
                    <button class="deny button" id="no" name="no">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="cancelDiv" style="display:none" class="confirm_box">
    <div class="overlay"></div>
    <div class="confirm_model">
        <div class="model">
            <div class="header">
                <h1 class="title">
                    Do you want to leave this page?
                </h1>
            </div>
            <div class="content">
                <div class="buttons_container">
                    <button class="confirm button" id="yes_cancel" name="yes_cancel">Yes</button>
                    <button class="deny button" id="no_cancel" name="no_cancel">No</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    /*
    If save button is clicked, wait for user to click yes or no button of the pop up window. If user click yes
    submit form otherwise go to employee's dashboard
     */
    $("#save").click(function (event) {
        event.preventDefault();
        document.getElementById('saveDiv').style.display = "block";
        $("#yes").click(function (event) {
            document.getElementById('saveDiv').style.display = "none";
            document.getElementById('form_id').submit();
        });
        $("#no").click(function (event) {
            document.getElementById('saveDiv').style.display = "none";
        });
    });


    /*
    If cancel button is clicked, wait for user to click yes or no button of the pop up window. If user click no
    submit form otherwise go to employee's dashboard
    */
    $("#cancel").click(function (event) {
        event.preventDefault();
        document.getElementById('cancelDiv').style.display = "block";
        $("#yes_cancel").click(function (event) {
            document.getElementById('cancelDiv').style.display = "none";
            window.location.replace("EmployeeDashboard.html");
        });
        $("#no_cancel").click(function (event) {
            document.getElementById('cancelDiv').style.display = "none";
        });
    });

    function logout_function() {
        document.getElementById("logout_button").submit();
    }
</script>

</body>
</html>
