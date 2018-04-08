
<?php
include('db.php');

   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


session_start();


  
        $source = $_COOKIE['source']; // Outputs : Hi John Doe
      
 
        $destination = $_COOKIE['destination']; // Outputs : Hi John Doe
      

 
    $distance = $_COOKIE['distance']; // Outputs : Hi John Doe
    
   $user_check = $_SESSION['username'];

   $car_model = $_SESSION['car_model'];

   $payment = $_SESSION['payment'] ;

   $seats = $_SESSION['seats'] ;

   $registration_number = $_SESSION['registration_number'] ;

   $ID = $_SESSION['ID'] ;

   $First_Name = $_SESSION['First_Name'] ;

   $Last_Name = $_SESSION['Last_Name'] ;

   $price = $_SESSION['price'] ;

   $time = $_SESSION['time'] ;

   $zero = $_SESSION['zero'] ;

   $Payment_id = $_SESSION['Payment_id'] ;

   $max_seats = $_SESSION['max_seats'] ;

   $count = $_SESSION['count'] ;
   
   
   $ses_sql = mysqli_query($db,"select First_Name from customer where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['First_Name'];
   

//    $msg =      "hello asdasdasdasdasd";

// // use wordwrap() if lines are longer than 70 characters
//               $msg = wordwrap($msg,70);
//               mail("f20150133@hyderabad.bits-pilani.ac.in", "SE", $msg);
   

?>

<!DOCTYPE html>
<html>
<head>
  <title>BITS Taxi Hailing Application</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 -->
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

#div1 {
    position: absolute;
    top: 30px;
    right: 0px;
    width: 85%;
    color: white;
    height: 550px;
    background-color: rgba(0,0,0,0.6);
    box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.3);
    border-radius: 8px;
    transition: margin-left .3s;
    border: 2px solid white;
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

    #return
    {
      position: relative;
      top: 15px;
      left: 10px;
      bottom: 100px;
      margin: 20px;
      margin-bottom: 70px;
      font-size: 1.4em;
      font-weight: bold;
      width: 1100px;
      height: 40px;
      background-color: #2EC563;
      border-radius: 8px;
      border: 2px solid #2EC563;
      text-decoration: none;

    }

    .floatleft
    {
      float: left;
      background-color: #cfcfcf;
      border-radius: 8px;
      width: 43%;
      margin: 5px;
      margin-right: 10px;
      margin-left: 40px;
      color: black;
      padding: -10px;
      padding-left: 20px;
    }

    input:active
    {
      outline: none;
    }

</style>
</head>
<body scroll="no"; style="background-color: #fff175; margin: 0px; overflow: hidden;">

<div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="text-decoration: none;">&times;</a>
      <h2 style="color: white; float: left; font-size: 1.7em; margin-left: 30px; margin-top: 0px; margin-bottom: 20px; ">   <?php echo $login_session; ?>'s Dashboard</h2> <br>
      <br><a  id="myBtn1" onclick="document.getElementById('about').style.display='block'">About</a>
      <a  id="myBtn2" onclick="document.getElementById('team').style.display='block'">Team</a>
      <a  id="myBtn3" onclick="document.getElementById('logout').style.display='block'">Log out</a>
      <a  id="myBtn4" onclick="document.getElementById('help').style.display='block'">Help</a>
    </div>

<div id="main">
  
                <span style="font-size:40px; cursor:pointer; z-index: 200; position: fixed;"  onclick="openNav()">&#9776;</span>

                <div  style="position: absolute; top: 40px;" class="w3-container  w3-animate-opacity " id="div1">
                  
                <h4 style="position: relative; left: 500px; margin-bottom: 10px; margin-top: 20px; font-size: 1.4em; font-weight: bold; text-shadow: 2px 2px 4px #000000;" >Trip Details</h4>


                <div>
                    <div class="floatleft">
                      <h4> Source : <?php echo $source; ?></h4>
                    </div>
                      
                    <div class="floatleft">
                      <h4> Destination : <?php echo $destination; ?> </h4>
                    </div>      

                    <div class="floatleft">
                       <h4>Payment Id : <?php echo $Payment_id; ?> km</h4>
                    </div>

                    <div class="floatleft">
                       <h4>ETA : <?php echo number_format((float)$time, 2, '.', '');; ?> minutes</h4>
                    </div>          
                    
                    <h4 style="position: relative; left: 500px; top: 10px; margin-bottom: 20px; margin-top: 20px; font-size: 1.4em; font-weight: bold; text-shadow: 2px 2px 4px #000000;" >Ride Details</h4>

                    <div class="floatleft">
                       <h4>Car Type : <?php echo $car_model; ?></h4>
                    </div>

                    <div class="floatleft">
                       <h4>Registration Number : <?php echo $registration_number; ?></h4>
                    </div>

                    <h4 style="position: relative; left: 420px; top: 10px; margin-bottom: 20px; margin-top: 20px; font-size: 1.4em; font-weight: bold; text-shadow: 2px 2px 4px #000000;" >Driver and Payment Details</h4>
                    
                    
                    <div class="floatleft">
                       <h4> Driver name : <?php echo $First_Name ?> <?php echo $Last_Name; ?> </h4>
                    </div>

                    
                    <div class="floatleft">
                       <h4>Rs <?php echo $price ?> by <?php echo $payment ?></h4>
                    </div>

                </div>

                        <!-- <h2> <?php echo $source; ?> is the source</h2>
                        <h2> <?php echo $destination; ?> is the destination</h2>
                        <h2> <?php echo $distance; ?> is the distance</h2>
                        <h2> <?php echo $car_model; ?> is the car_model</h2>
                        <h2> <?php echo $seats; ?> is the seats</h2>
                        <h2> <?php echo $payment; ?> is the payment</h2>
                        <h2> <?php echo $registration_number; ?> is the registration_number</h2>
                        <h2> <?php echo $ID; ?> is the ID</h2>
                        <h2> <?php echo $First_Name; ?> is the First_Name of the driver</h2>
                        <h2> <?php echo $Last_Name; ?> is the Last_Name of the driver</h2>
                        <h2> <?php echo $price; ?> is the price</h2>
                        <h2> <?php echo $time; ?> is the time</h2>
                        <h2> <?php echo $Payment_id; ?> is the Payment_id</h2>
                        <h2> <?php echo $max_seats; ?> is the max_seats</h2>
                        <h2> <?php echo $count; ?> is the count</h2>
                         -->

                        <form method="post" action="end_trip.php">
                          <button id="return" type="submit">Finish Trip</button>
                        </form>
                </div>
                  
    
      
      
                    <!-- <div style="position: absolute; top: 40px;" class="w3-container  w3-animate-opacity " id="div4">    

                      <h4 style="position: relative; left: 500px; margin-bottom: 30px; font-size: 1.7em; font-weight: bold;" >Trip Details</h4>

                  <h2> <?php echo $source; ?> is the source</h2>
                  <h2> <?php echo $destination; ?> is the destination</h2>
                  <h2> <?php echo $distance; ?> is the distance</h2>

                  <form method="post" action="directions.php">
                    <button id="return" type="submit">Return to Trip</button>
                  </form>
                  </div>

</div> -->



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
    document.getElementById("div1").style.border = " 2px solid black";
$("#div1").animate({'right':($('body').innerWidth()-$('#div1').width())}, 'slow');
});

// function slide_div2(){
//   document.getElementById("div2").style.display = "block";
//   $("#div2").animate({'left':100}, "slowest");
// $("#div2").animate({'right':-$('#div2').width()}, 'slow');
// }

// function slide_div3(){
//   document.getElementById("div3").style.display = "block";
//   $("#div3").animate({'left':100}, "slow");
//   document.getElementById("div1").style.backgroundColor = "rgba(0,0,0,0.6)";
//   document.getElementById("div1").style.color = "white";
//   document.getElementById("div3").style.border = " 2px solid black";
//   document.getElementById("div1").style.border = " 2px solid white";
//   document.getElementsByClassName("cartype_labels").style.color = "white";
//   //document.body.style.backgroundColor = "rgba(0,0,0,0.5)";
// $("#div3").animate({'right':($('body').innerWidth()-$('#div3').width())}, 'slow');
// }

// function slide_div4(){
//   // document.getElementById("div4").style.display = "block";
//   // document.getElementById("div1").style.display = "none";

//   // document.getElementsByClassName("payment").style.display = "none";
//   // document.getElementById("button3").style.display = "block";

//   // document.getElementById("div2").style.display = "none";
//   // document.getElementById("div3").style.display = "none";
// //   $("#div4").animate({'left':100}, "slow");
// //   document.body.style.backgroundColor = "white";
// // $("#div4").animate({'right':($('body').innerWidth()-$('#div4').width())}, 'slow');
// }





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
    // document.getElementById("div2").style.marginLeft = "250px";
    document.getElementById("div3").style.marginLeft = "250px";
    document.getElementById("div4").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(255,191,0,0.6)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("div1").style.marginLeft = "0px";
    // document.getElementById("div2").style.marginLeft = "0px";
    document.getElementById("div3").style.marginLeft = "0px";
    document.getElementById("div4").style.marginLeft = "0px";
    document.body.style.backgroundColor = "#ffbf00";
}
      
</script>
     
</body>
</html> 
