<!doctype html>
<html lang="eng">
  <link rel="shortcut icon" href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
  <link rel="apple-touch-icon" href="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png">
  <head>
    <title>Statare LTD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	
			<style>
			head{
				text-align: center;
			}
			
			body {
			  margin: 0;
			  text-align: center;
			 
			}
			
			.header {
				background-color: #31333F;
				padding: 5%;
				text-align: left;
				color: #ffffff;
				font-family: sans-serif, Arial;
				
				
			}
			
			.password, .username{
				text-align: center;
				font-size: 20pt;
			}
				
			label companyname{
				left: 90%;
			}
			
			.login_style{
					background-color: #31333F; 
					border: 2px solid #31333F;
					color: white;
					box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
					padding: 1%;
					border-radius: 8px;
					text-align: center;
					text-decoration: none;
					display: inline-block;
					font-size: 20px;
					font-weight: bold;
					position: absolute;
					top: 600px;
					left: 620px;
					font-size: 18pt;
					font-family: sans-serif, Arial;
					cursor:pointer;
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
	  
			</style>
	
	
	
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
  
	<div class="header">
	  <img src="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png" width="283" height="250">  
	  <label for="companyname"  style="font-size: 50pt;"> <b>Statare Brands LTD </b></label>
	</div>
			<form action="functionLoginEmployee.php" method="post">
				<br>
				<div class="username">
					<label  for="textinput" ><b>Username :</b></label> 
					<input style="margin-left:20px" name="name" type="text" placeholder=""  required="">
				
				</div>  
			
				<br>
			
				<div class="password">
					<label for="passwordinput" > <b>Password :  </b></label>
					<input style="margin-left:27px" id="userPassword" name="word" type="password" placeholder=""  required="">
				</div>
				
				<br>	

					<button type="submit" name="login" class="login_style">Login</button>
			</form>
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>