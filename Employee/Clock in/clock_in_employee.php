<?php
/*
 * This page gives the opportunity to an employee to make one of the following actions (depending
 * on what state he/she is): clock in, clock out, break, return from break. According of what action he/she does
 * the appropriate column is initialized in the database with the current time and date. Also despite these actions,
 * an employee  * can also log on his/her dashboard.
 */

/**
 * Find the current state of employee. employee can be either clocked in,
 * clocked out or on break
 * @param $conState DB's row that represents the last time that employee clicked a button
 * @return string The current state of employee
 */
function findState($conState){
    // used for the current state of the employee
    $state="";
    while($row = mysqli_fetch_array($conState)){
        // check if employee is on break
        if($row['State']=="B" || $row['State']=="b"){
            $state="BREAK";
        // check if employee is clocked in
        }else if($row['State']=="I" || $row['State']=="i"){
            $state="CLOCKED IN";
        // employee is clocked out
        }else {
            $state = "CLOCKED OUT";
        }
    }
    return $state;
}

/**
 * Prints an error message that is related to error connecting with database
 */
function printError(){
    echo '<script type="text/javascript">
		window.alert("ERROR CONNECTING WITH DATABASE!");
		window.location.replace("clock_in_employee.php");
		</script>';
    exit();
}

session_start();
include('db.php');
include('clockIn_employee.php');
include('clockOut_employee.php');
include('break_employee.php');
include('returnFromBreak_employee.php');

// the state of the employee (clocked in,clocked out, break)
$state="";

// the username of the employee
$Username = $_SESSION['username'];

// select the current state of the employee
$sqlState="SELECT Username,State FROM Employee WHERE Username LIKE '$Username'";
$conState=mysqli_query($conn, $sqlState);
	if (!$conState) {
        printError();
	}else{
        $_SESSION['prev_state']=$state=findState($conState);
	}
?>

<!doctype html>
<html lang="eng">
<link rel="shortcut icon"
      href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
<link rel="apple-touch-icon"
      href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
<head>
    <title>Statare LTD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="clock_in_employee.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body onload="show();">

<div class="header">

    <form action="logout_manager.php" method="post" id="logout_button">	 	
		<button onclick="logout_function()" name="LogOutButton" id="LogOutButton" class="logout">LogOut</button>
	</form>

	 
    <div class="logo">
        <a href="manager_dashboard.html">
            <img class="image_statare" src="statare.png" alt="Statare logo" width="34.65%" height="34.65%"/>
        </a>
			<ul class="nav" style="margin-top:15%;float:left;">
                <li><a href="contact_employee.php">Contact Us</a></li>
			</ul>
	</div>
</div>


<div class="date">
    <b><p id="date"></p></b>
</div>
<div class="msg">
<span><p><b><?php echo "$state"; ?></b></p></span>
</div>

    <!-- Print the current date -->
    <script>
        n = new Date();
        y = n.getFullYear();
        m = n.getMonth() + 1;
        d = n.getDate();
        document.getElementById("date").innerHTML = d + "/" + m + "/" + y;
    </script>

    <p/>
    <p/>
	<div class="align_center">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="form_id">
        <button onclick="myFunction()" name="ClockInButton" id="ClockInButton" class="clockbutton">Clock in</button>
		</p>
        <button onclick="myFunction()" name="ClockOutButton" id="ClockOutButton" class="clockbutton">Clock out</button>
        </p>
        <button onclick="myFunction()" name="Break" id="Break" class="clockbutton">Break</button>
        </p>
        <button onclick="myFunction()" name="returnFromBreak" id="returnFromBreak" class="clockbutton">Return from
            Break
        </button>
        </p>
    </form>
	<button onclick="dashboard()" id="DashBoard" name="DashBoard" class="clockbutton">Log on to Dashboard</button>
	</p>
	<script>

        /**
         * Calls the current php file again
         */
        function myFunction() {
            document.getElementById("form_id").submit();
        }

        /**
         * Goes to logout_employee.php file
         */
        function logout_function() {
            document.getElementById("logout_button").submit();
            window.location.replace("index.html");
        }

        /**
         * Goes to clock_in_employee.php file
         */
        function dashboard(){
		    window.location.replace("clock_in_employee.php");
	    }
		
    </script>
	</div>
</body>

</html>

