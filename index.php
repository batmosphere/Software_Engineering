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
    <title>BITS Taxi Hailing Application</title>
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet"> 

    <style type="text/css">

    	body
    	{   background-color: #dfdfdf; 
    		margin: auto;
            overflow: hidden;
    		padding: auto;
            text-overflow: ellipsis;
    		font-family: 'Fira Sans', sans-serif;
    	}
        
        
       
    	#top
    	{	box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
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
            margin-top: 15px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            text-align: center;
    	}
    	#inputs label
    	{	text-align: center;
    		color: white;
    		margin: 30px;
    		margin-top: -20px;
    		font-size: 0.9em;
            font-weight: bold;
    		/*background-color: yellow;*/
    	}
    	.floatright
    	{
    		float: left;
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
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            text-align: center;
    	}
    </style>

</head>


<body scroll="no">


	<div id="top">
		<div id="name">
			<h2 style="position: relative; bottom: 8px; font-size: 1.7em; text-shadow: 0.5px 0.5px 0.5px #1d1d1d;">BITS Taxi Hailing Application</h2>
		</div>	


		<div id="inputs">
				

			  
			<form method="post" action="employeelogin.php" >
			  

              <div class="floatright">
            <!-- <label style="font-size: 1em;">Username</label><br> -->
                  <input type="text" placeholder="Enter BITS ID" name="username" required autofocus>
              </div>

			  <div class="floatright">
			      <!-- <label style="font-size: 1em;">Password</label><br> -->
			      <input type="password" placeholder="Enter Password" name="password" required>
			  </div>     

              <div class="floatright">
                  <input class="sub" name="submit" type="submit" style="margin-top: -30px; margin-right: 50px; margin-left: 0px; width: 80px; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);" value="Log In" />      
              </div>
 
              </form>
			 </div>


             <!-- <a type="text" style="color: black; width: 250px; position: relative; top: 40px; left: 350px;" name="submit" onclick="forgotpassword()">Forgot password</a> -->


	</div>

	

	<div id="bottom">
		<div id="info">
			<p style="margin: 30px; font-size: 1.05em;">Welcome to BITS Taxi Hailing Application developed as a part of the course Software Engineering (IS F341). 
                <br> Enter Username / Password to login or create an account</p>
			
			<img id="taxi_image" src="images/taxi.png">
		</div>

		<div id="signup">


			<h2 style="font-size: 1.6em; position: relative; left: 120px;">Create a New Account</h2>
			
			<form method="post" action="createaccount.php">
			<input style="position: relative;  width: 170px;" type="text" name="firstname" placeholder="Enter First Name" required>
			<input style="position: relative;  width: 170px;" type="text" name="lastname" placeholder="Enter Last Name" required>
            <input  type="tele" name="number" placeholder="Enter Contact No."  required>
            <input type="e-mail" name="address" placeholder="Enter BITS e-mail Address"  required>
			<input  type="text" name="username" placeholder="Enter BITS ID"  required>
			<input type="password" name="password" placeholder="Enter Password" required>
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