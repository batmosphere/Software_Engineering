<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['id']);
	unset($_SESSION['username']);
    unset($_SESSION['source']);
    unset($_SESSION['destination']);
	
?>


<!DOCTYPE html>
<html>

<head>
    <title>Taxi Hailing Application</title>
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet"> 

    <style type="text/css">

    	body
    	{
    		margin: auto;
    		padding: auto;
    		font-family: 'Fira Sans', sans-serif;
    	}
        
        
       
    	#top
    	{	
    		color: white;
    		width: 100%;
    		height: 70px;
    		float: left;
    		background-color: #ffbf00;
    		/*margin-left: 110px;*/
    		margin-right: 110px;
    		padding-top: 10px;
    	}

    	#bottom
    	{
    		float: left;
    		width: 1130px;
    		height: 577px;
    		/*background-color: red;*/
    		margin-left: 110px;
    		margin-right: 110px;

    	}

    	#taxi_image
    	{
    		height: 400px;
    		width: 500px;
    		position: relative;
    		left: 50px;
    		bottom: 10px;
    	}


    	#name
    	{
    		float: left;
    		margin-left: 140px;

    	}

    	#inputs
    	{
    		float: right;
    		margin-right:260px;
    		position: relative;
    		top:  4px;
    		left: 100px;
    		/*background-color: yellow;*/
    		
    	}

    	#inputs input
    	{
    		width: 150px;
    		margin: 10px;
    	}
    	#inputs label
    	{	text-align: center;
    		color: white;
    		margin: 30px;
    		margin-top: 100px;
    		font-size: 0.9em;
    		/*background-color: yellow;*/
    	}
    	.floatright
    	{
    		float: right;
    	}

    	.sub{
    		position: relative;
    		top: 19px;
    		left: 10px;
    	}

    	#info
    	{
    		float: left;
    		width: 565px;
    	}

    	#signup
    	{
    		margin-left: 500px;
    		margin-top: 30px;
    		padding: 10px;
    	}

    	#signup h2
    	{
    		position: relative;
    		left: 90px;
    	}

    	#signup input
    	{
    		height: 35px;
    		font-size: 1.1em;
    		margin: 10px;
    		width: 375px;
    		position: relative;
    		left: 60px;
    	}
    </style>

</head>


<body>


	<div id="top">
		<div id="name">
			<h2 style="position: relative; bottom: 5px; font-size: 1.6em;">Taxi Hailing Application</h2>
		</div>	


		<div id="inputs">
				

			  
			<form method="post" action="employeelogin.php">
			  <div class="floatright">
			      <input class="sub" name="submit" type="submit" style="margin-right: 50px; margin-left: 0px; width: 80px;" value="Log In" />		
			  </div>

			  <div class="floatright">
			      <label style="font-size: 1em;">Password</label><br>
			      <input type="password" placeholder="Enter Password" name="password" required>
			  </div>      

			  <div class="floatright">
			<label style="font-size: 1em;">Username</label><br>
			      <input type="text" placeholder="Enter Username" name="username" required>
			  </div>

			  </form>
			 </div>


	</div>

	

	<div id="bottom">
		<div id="info">
			<p style="margin: 30px; font-size: 1.05em;">Welcome to taxi Hailing ApplicationWelcome to taxi Hailing ApplicationWelcome to taxi Hailing ApplicationWelcome to taxi Hailing ApplicationWelcome to taxi  </p>
			
			<img id="taxi_image" src="images/taxi.png">
		</div>

		<div id="signup">


			<h2 style="font-size: 1.6em; position: relative; left: 120px;">Create a New Account</h2>
			
			<form method="post" action="createaccount.php">
			<input style="position: relative;  width: 170px;" type="text" name="firstname" placeholder="Enter First Name" >
			<input style="position: relative;  width: 170px;" type="text" name="lastname" placeholder="Enter Last Name" >
            <input  type="text" name="number" placeholder="Enter Contact No." >
            <input type="text" name="address" placeholder="Enter Address" >
			<input  type="text" name="username" placeholder="Enter BITS ID" >
			<input type="password" name="password" placeholder="Enter Password">
			<input style="height: 40px; margin-top: -5px; width: 384px;" class="sub" name="submit" type="submit" value="Create Account" style="margin-left: 0px;" />
        </form>
		</div>
	</div>


	<!-- <div id="page" style="background-color: #efefef;" >
		  
        
		<h2 style="color: black;">Welcome to Inventory Management System</h2>

        
		<button id="button1" onclick="document.getElementById('adminlogin').style.display='block'" style="width: 200px; margin-left: 170px ; font-weight: bolder;" >Admin Login</button>
		<button id="button2" onclick="document.getElementById('employeelogin').style.display='block'" style="width: 200px; font-weight: bolder;" >Employee Login</button>


	</div>
	



    <div id="adminlogin" class="blur modal" >
			  
			  <form class="modal-content animate" method="post" action="adminlogin.php">
			    <div class="imgcontainer">
			      <span onclick="document.getElementById('adminlogin').style.display='none'" class="close" title="Close Modal">&times;</span>
			      
			    </div>

			    <div class="container">
			      <label style="font-size: 1.2em;">Username</label>
			      <input type="text" placeholder="Enter Username" name="username" required>

			      <label style="font-size: 1.2em;">Password</label>
			      <input type="password" placeholder="Enter Password" name="password" required>
			        
			      <input class="sub" name="submit" type="submit" style="margin-left: 0px;" />		      
			    </div>

			    <div class="container" style="background-color:#f1f1f1">
			      <button type="button" onclick="document.getElementById('adminlogin').style.display='none'" class="cancelbtn">Cancel</button>
			      
			    </div>
			  </form>
	</div>




	<div id="employeelogin" class="blur modal">
			  
			  <form class="modal-content animate" method="post" action="employeelogin.php">
			    <div class="imgcontainer">
			      <span onclick="document.getElementById('employeelogin').style.display='none'" class="close" title="Close Modal">&times;</span>
			      
			    </div>

			    <div class="container">
			      <label style="font-size: 1.2em;">Username</label>
			      <input type="text" placeholder="Enter Username" name="username" required>

			      <label style="font-size: 1.2em;">Password</label>
			      <input type="password" placeholder="Enter Password" name="password" required>
			        
			      <input class="sub" name="submit" type="submit" style="margin-left: 0px;" />
			      
			    </div>

			    <div class="container" style="background-color:#f1f1f1">
			      <button type="button" onclick="document.getElementById('employeelogin').style.display='none'" class="cancelbtn">Cancel</button>
			      
			    </div>
			  </form>
	</div>

 -->

<script>
// Get the modal
var modal = document.getElementById('adminlogin');
var modal1 = document.getElementById('employeelogin');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal ) {
        modal.style.display = "none";
    }

     if (event.target == modal1 ) {
        modal1.style.display = "none";
    }
}


</script>


</body>
</html>