<!doctype html> 
  <html lang="en"> 
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

			 table {
				 border-collapse: collapse;
				 width: 100%;
			  }

			 th {
				 text-align: left;
				 padding: 8px;
				 background-color:#31333F;
				 color:white;
				 border:2px solid #31333F;
			  }
			  
			  td {
				 text-align: left;
				 padding: 8px;
				 background-color:white;
				 color:black;	 
				 border:2px solid #31333F;
			  }

			 tr:nth-child(even){
			  background-color: white;
			  color:black;
			  border:2px solid #31333F;
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
				min-width: 120%;
				padding: 14px 16px;
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

			.logout_style{
					background-color: #31333F; 
					border: 2px solid white;
					color: white;
					box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
					padding: 0.8%;
					border-radius: 8px;
					text-align: center;
					text-decoration: none;
					display: inline-block;
					font-size: 20px;
					font-weight: bold;
					position: fixed;
					top: 4%;
					right: 1%;
					
					font-size: 18pt;
					font-family: sans-serif;
					cursor:pointer;
			}

		   .logout{
				position:absolute;
				color: orange;
				left: 94%;
				bottom:95%;
				font-size: 14pt;
				font-weight: bold;
		   }
		   
		   label a:hover {
			  color: orange;
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
		   

 </style>
  
  
     <!-- Bootstrap CSS --> 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> 
    </head>
    
    <body> 
    
    <!--image-->
     <div class="header"> 		
		<label ><a href="Login_Manager.php" class="logout">Log out</a></label>
	 	<div class="logo">
		<a href="ManagerDS_css.html">
			<img src="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAgWAAAAJDhlYjE0YzE2LWVjOTItNGU1OS04N2M2LWI3YTZkNzIzNTljMw.png" width="100" height="100"> 
		</a>
		
	<ul >
		<label class="nav" >
		<li><a href="ManagerDS_css.html">Home</a></li>		
		<li><a href="EditProfileManager.html" >Profile</a></li>
		<li><a href="view%20hours.html">View Hours</a></li>
		<li><a href="view%20schedule%20manager.html" >View Schedule</a></li>
		<li><a href="Leave_Request_Manager.html" >Request For Leave</a></li> 
		<li><a href="AveragerPerWeek_CSS.html">Average per week</a></li>
		<li><a href="IPrange_css.html">IP Range</a></li>
		<li><a href="Payrol%20Report.html">Payroll Report</a></li>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn" style="color:orange;text-decoration: underline">My Employees</a>
			<div class="dropdown-content">
				<a href="add%20Employee.php">Add Employee</a>
				<a href="EmployeeStatus_Manager.html" style="color:orange;text-decoration: underline">Employee Status</a>
				<a href="ViewRequest_manager.html">View Requests</a>
				<a href="Delete%20Employee.html">Delete Employee</a>
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
  
	<h1 align="center"><b>Employee Status</b><h1>
	
	<br>
		
   <h2>Page 1</h2>
    <button class="buttonstyle"> < </button> 
    <button class="buttonstyle"> > </button> 
   
   <br>
   
   <label style="margin-left:15px"> Prev </label>
   <label style="margin-left:40px"> Next </label>

  <hr>
   
   <div style="overflow-x:auto;">
   
    <table style="width:100%"> 
      
     <tr> 
     
      <th>ID</th> 
      <th>First Name</th>  
      <th>Last Name</th>  
      <th>Status</th>  
      <th>Time in</th>  
      
     </tr> 
      
     <tr> 
     
	  <td>999999</td>
      <td>John</td> 
      <td>Smith</td>  
      <td>Clocked in</td> 
      <td>20/11/2017 9:00 AM</td> 
       
     </tr> 
	 
	 <tr> 
     
	  <td>987654</td>
      <td>Daniel</td> 
      <td>Cruz</td>  
      <td>Out</td> 
      <td>-</td> 
       
     </tr> 
      
    </table>  
    
   </div>
   
  </div>
     
    </body> 
  </html> 