<!doctype html>
<?php session_start();
	  include('contact.php'); 
?>
<html lang="eng">
  <link rel="shortcut icon" href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
  <link rel="apple-touch-icon" href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
  <head>
    <title>Statare LTD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

			<style>
			
			.header {
				   background-color: #31333F;
				   color: white;
				   margin-bottom: 1.1%;    
			  } 
			  .paragraph {
				 
				 padding: 0px 0px 0px 40px;
			  
			  }
			  .logo{
				   margin-top: 1.6%;
				   margin-bottom: 0.1%;
				   margin-left: 1.3%;
				   display:inline-block;
				  }
			  .nav{
					 position: absolute;
					 top: 9%;
					 left: 8%;
					 font-weight: bold;
			  }
					
			.buttonstyle {
					  
				background-color: #31333F; 
				border: 2px solid #31333F;
				box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
				color: #ffffff ;
				padding: 10px 24px;
				border-radius: 3px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 20px;
				font-weight: bold;
					   
			}			   
			.buttonstyle1 {
					  
				background-color: #ffffff; 
				border: 2px solid #31333F;
				box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
				color: #31333F ;
				padding: 10px 24px;
				border-radius: 3px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 20px;
				font-weight: bold;
					   
			}

			li {
				float: left;
			}
			li a, .dropbtn {
				display: inline-block;
				color: white;
				text-align: center;
				padding: 14px 16px;
				text-decoration: none;
			}
			li a:hover, .dropdown:hover .dropbtn {
				background-color: #31333F;
				color: orange;
				background-color: transparent;
				text-decoration: underline;
			}
			li.dropdown {
				display: inline-block;
			}
			.dropdown-content {
				display: none;
				position: absolute;
				background-color: #31333F ;
				min-width: 160px;
				box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
				z-index: 1;
			}
			.dropdown-content a {
				color: white;
				padding: 12px 16px;
				text-decoration: none;
				display: block;
				text-align: left;
			}
			.dropdown-content a:hover {background-color: #31333F}
			.dropdown:hover .dropdown-content {
				display: block;
			}

			 .logout{
					position:absolute;
					color: orange;
					left: 94%;
					bottom:95%;
					font-size: 14pt;
					font-weight: bold;
			   }
			
			#textinput {
					padding:0 5px 150px;
					width:400px;
					margin-left:17px;
			}
			  input{
				background-color: #f1f1f1;
				color: black;
				padding: 10px 24px;
				border-radius: 8px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
			  }
			#label {
					margin-left:360px;
			}

			#textinput1 {
					margin-left: 31px;
					font-size:20px;
			}

			#textinput2 {
					margin-left: 50px;
					font-size:20px;
			}
			#textinput3 {
					margin-left: 75px;
					font-size:20px;
			}
			.username{
					margin-left: 100px;
			}	
			.paragraph2 {
			 
				padding: 10px 0px 0px 360px;
			
			}
			label a:hover {
					color: orange;
			}	
			
			.input1{
					
				padding: 0px 0px 0px 360px;
			
			}
			
			.input2{
					
				padding: 0px 0px 0px 355px;
			
			}
			
			body{
				height:100%;
			   width:100%;
			   background-image:url("statare3.jpg");  
			   background-repeat:no-repeat;  
			   background-size:cover;   
			   filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='statare3.jpg',sizingMethod='scale');
			   -ms-filter:"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='statare3.jpg',sizingMethod='scale')";
			}			
			
			.error{
				color:red;
				position:absolute;
			}
	</style>
	

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
		
		<div class="header">

                <form action"logout.php">
                <label ><a href="index.html" class="logout"><b>Log out</b></a></label>
                </form>



		<div class="logo">
		<a href="clock_in_manager.html">
			<img src="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png" width="100" height="100"> 
		</a>
		
		<ul>
		<label class="nav">
		<li><a href="clock_in_manager.html">Home</a></li>
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
		<li><a href="contact_manager.php" style="color:orange;text-decoration: underline">Contact Us</a></li>
		</label>
	</ul>


	</div> 
		</div>
	<br>
<div>

		<form method="post" class="username" id="form_id" onsubmit="return redirect()" action="<?php $_SERVER['PHP_SELF']; ?>">
				
				<label  id="label" for="textinput3" ><b><label style="color:red">*</label>TO :</b></label> 
				<div class = "input1">
					<input name="To" id="To" type="text" value="<?php echo "$TO"; ?>" placeholder=""  required="">
				</div> 
				<span style="margin-left:360px" class="error"><?php echo "$to_error"; ?></span>
				
				<br>
				<label  id="label" for="textinput3" ><b><label style="color:red">*</label>SUBJECT :</b></label> 
				<div class = "input1">
					<input name="Subject" id="Subject" type="text" value="<?php echo "$SUBJECT"; ?>" placeholder=""  required="">
				</div>  
				<span style="margin-left:360px" class="error"><?php echo "$subject_error"; ?></span>
				
				<br>
				<label id="label" for="textinput3"><b><label style="color:red">*</label>Description :</b></label>  
				<div class = "input1">
					<input name="Description" id="Description" type="text" value="<?php echo "$DESCRIPTION"; ?>" placeholder=""  required="">
				</div>
				<span style="margin-left:360px" class="error"><?php echo "$descripiton_error"; ?></span>

  <div>
  <br>
  	<div class="paragraph2">
			<label onclick="myFunction1()" class="buttonstyle1">Cancel</label>
			<button onclick="myFunction2()" class="buttonstyle" name="Send">Send</button>
			</form>
	</div>		
			
			<script>
function myFunction1() {
    if(confirm('Do you want to leave this page?')){
		window.location.replace("manager_dashboard.html");
		return true;
	}

}
function myFunction2() {
	if(confirm('Do you want to send the message?')){
		document.getElementById("form_id").submit();
	}
	
}

function redirect() {
  window.location.replace("manager_dashboard.html");
  return false;
}
	
</script>
		</div>


   </div>

  
  </form>
  </body>
  </html>
