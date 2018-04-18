<?php
//takes the user out of the system
session_unset();
echo '<script type="text/javascript">
	window.location.replace("index.html");
	</script>';//replace the screen with the login screen

?>
