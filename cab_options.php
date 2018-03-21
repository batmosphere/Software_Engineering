
<?php
include('db.php');

   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


session_start();


  
        $source = $_COOKIE['source']; // Outputs : Hi John Doe
      
 
        $destination = $_COOKIE['destination']; // Outputs : Hi John Doe
      

 
    $distance = $_COOKIE['distance']; // Outputs : Hi John Doe
    
   $user_check = $_SESSION['username'];

    $_SESSION['source']  = $source;

    $_SESSION['destination'] = $destination ;
   
   $ses_sql = mysqli_query($db,"select First_Name from customer where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['First_Name'];
   
   

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>

<style>
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 300;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    box-shadow: 20px 20px 20px rgba(0, 0, 0, 0.3);
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

#div1,#div2,#div3,#div4 {
    position: absolute;
    top: 30px;
    right: 0px;
    width: 85%;
    height: 180px;
    background-color: #ccc;
    box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.3);
}
#div1{
  
  transition: margin-left .3s;
    padding: 16px;
}
#div2{
  display: none;
  transition: margin-left .3s;
    padding: 16px;
}
#div3{
  display: none;
  transition: margin-left .3s;
    padding: 16px;
}
#div4{
  display: none;
  transition: margin-left .3s;
    padding: 16px;
    height: 550px;
}






.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 300; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */

}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 70%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s;
    margin-left: 320px;
    margin-right: 100px;
    margin-top: 30px;
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #ffbf00;
    color: white;
}

.modal-body {padding: 2px 16px;
background-color: white;}

.modal-footer {
    padding: 2px 16px;
    background-color: #ffbf00;
    color: white;
}

 #logoutbutton
      { text-decoration: none;
        color: white;
        background-color: #ff8e8e;
        display: block;
        position: relative;
        z-index: 200;
        float: left;
        margin: 0px;
       border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 35px;
        outline: none;
        font-size: 1.2em;
        width: 910px;
        text-decoration: none;
        margin-top: 30px;
        border-radius: 8px;
        font-weight: bolder;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
      }


      a:link {
    text-decoration: none;
    color: white;
}

a:visited {
    text-decoration: none;
    color: white;
}

a:hover {
    text-decoration: none;
    color: white;
}

a:active {
    text-decoration: none;
    color: white;
}

</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <h2 style="color: white; float: left; font-size: 1.7em; margin-left: 30px; margin-top: 0px; margin-bottom: 20px; ">   <?php echo $login_session; ?>'s Dashboard</h2> <br>
      <br><a  id="myBtn1" onclick="document.getElementById('about').style.display='block'">About</a>
      <a  id="myBtn2" onclick="document.getElementById('team').style.display='block'">Team</a>
      <a  id="myBtn3" onclick="document.getElementById('logout').style.display='block'">Log out</a>
      <a  id="myBtn4" onclick="document.getElementById('help').style.display='block'">Help</a>
    </div>

<div id="main">
  
  <span style="font-size:40px; cursor:pointer; z-index: 200; position: fixed;"  onclick="openNav()">&#9776;</span>

  <div style="" class="w3-container  w3-animate-opacity " id="div1">
    
    <p>Available Cab opions</p> 
    <h2> <?php echo $source; ?> is the source</h2>
    <h2> <?php echo $destination; ?> is the destination</h2>
    <h2> <?php echo $distance; ?> is the distance</h2>
      <button id="button1" onclick="slide_div2()">Continue</button>
    </div>
    
    <div style="position: absolute; top: 230px;" class="w3-container  w3-animate-opacity " id="div2">    <p>Want to share or not</p>

      <button id="button2" onclick="slide_div3()">Continue</button>
    </div>
    
      <div style="position: absolute; top: 435px;" class="w3-container  w3-animate-opacity " id="div3">    <p>payment options</p>

      <button id="button3" onclick="slide_div4()">Continue</button>
    </div>
    
      <div style="position: absolute; top: 30px;" class="w3-container  w3-animate-opacity " id="div4">    <p>Receipt and mail</p>

      <button id="button4">Proceed</button>
    </div>

</div>



 <!-- The Modal -->
<div id="about" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>About</h2>
    </div>
    <div class="modal-body">
      <p>Some text in the Modal Body</p>
      <p>Some other text...</p>
    </div>
   <!--  <div class="modal-footer">
      <h3>Modal Footer</h3>
    </div> -->
  </div>

</div>


  <!-- The Modal -->
                <div id="team" class="modal">

                  <!-- Modal content -->
                  <div class="modal-content">
                    <div class="modal-header">
                      <span class="close">&times;</span>
                      <h2>Team Members</h2>
                    </div>
                    <div class="modal-body">
                      <p>Some text in the Modal Body</p>
                      <p>Some other text...</p>
                    </div>
                   <!--  <div class="modal-footer">
                      <h3>Modal Footer</h3>
                    </div> -->
                  </div>

                </div>


                  <!-- The Modal -->
<div id="logout" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Logout</h2>
    </div>
    <div class="modal-body">
      <p>If you want to logout, click this button, else click anywhere outside the box or the close button above.</p> 
       <form method="post" action="logout.php">
      <input  id="logoutbutton"  value="Log Out" name="submit" type="submit"> 
      </form>
    </div>
    <!-- <div class="modal-footer">
      
    </div> -->
  </div>

</div>


      <!-- The Modal -->
          <div id="help" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
              <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Help</h2>
              </div>
              <div class="modal-body">
                <p>Some text in the Modal Body</p>
                <p>Some other text...</p>
              </div>
             <!--  <div class="modal-footer">
                <h3>Modal Footer</h3>
              </div> -->
            </div>

          </div>

<script>

$(document).ready(function() {
    $("#div1").animate({'left':100}, "slow");
$("#div1").animate({'right':($('body').innerWidth()-$('#div1').width())}, 'slow');
});

function slide_div2(){
  document.getElementById("div2").style.display = "block";
  $("#div2").animate({'left':100}, "slowest");
$("#div2").animate({'right':-$('#div2').width()}, 'slow');
}

function slide_div3(){
  document.getElementById("div3").style.display = "block";
  $("#div3").animate({'left':100}, "slow");
$("#div3").animate({'right':($('body').innerWidth()-$('#div3').width())}, 'slow');
}

function slide_div4(){
  document.getElementById("div4").style.display = "block";
  document.getElementById("div1").style.display = "none";
  document.getElementById("div2").style.display = "none";
  document.getElementById("div3").style.display = "none";
  $("#div4").animate({'left':100}, "slow");
$("#div4").animate({'right':($('body').innerWidth()-$('#div4').width())}, 'slow');
}





 var modal1 = document.getElementById('about');
 var modal2 = document.getElementById('team');
 var modal3 = document.getElementById('logout');
 var modal4 = document.getElementById('help');



// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal1.style.display = "none";
    modal2.style.display = "none";
    modal3.style.display = "none";
    modal4.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
    if (event.target == modal3) {
        modal3.style.display = "none";
    }
    if (event.target == modal4) {
        modal4.style.display = "none";
    }
    
}

 
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("div1").style.marginLeft = "250px";
    document.getElementById("div2").style.marginLeft = "250px";
    document.getElementById("div3").style.marginLeft = "250px";
    document.getElementById("div4").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("div1").style.marginLeft = "0px";
    document.getElementById("div2").style.marginLeft = "0px";
    document.getElementById("div3").style.marginLeft = "0px";
    document.getElementById("div4").style.marginLeft = "0px";
    document.body.style.backgroundColor = "white";
}
      
</script>
     
</body>
</html> 
