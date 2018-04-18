<?php
session_start();

if(empty($_SESSION['clockedin_clicked'])){//if is not clocked in
	session_unset();//can do logout
		echo '<script type="text/javascript">
			window.location.replace("index.html");
			</script>';
}else{
	
	if(empty($_SESSION['break_clicked'])){//if is clocked in and not in break
		if(empty($_SESSION['clockedout_clicked'])){//if is not clocked out
			echo '<script type="text/javascript">alert("You can not press Log out without pressing first Clock out!");  
				 window.location.replace("clock_in_employee.html");
				 </script>';//can't press logout
		}else{//if is clocked out
			session_unset();//can do logout
			echo '<script type="text/javascript">
				window.location.replace("index.html");
				</script>';
		}
		
	}else{//if is clocked in and is in break
		if(empty($_SESSION['returnFromBreak_clicked'])){//if is not returned from break
			echo '<script type="text/javascript">alert("You can not press Log out without pressing first returned from break!");  
				 window.location.replace("clock_in_employee.html");
				 </script>';//can't press logout
		}else{//if is returned from break
			if(empty($_SESSION['clockedout_clicked'])){//if is not clocked out
				echo '<script type="text/javascript">alert("You can not press Log out without pressing first Clock out!");  
					window.location.replace("clock_in_employee.html");
					</script>';//can't press logout
			}else{//if is clocked out
				session_unset();//can do logout
				echo '<script type="text/javascript">
					window.location.replace("index.html");
					</script>';
			}
		}
	}
}

?>
