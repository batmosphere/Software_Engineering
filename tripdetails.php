<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'xxxx');
   define('DB_DATABASE', 'taxi');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
session_start();

    $source = $_COOKIE['source']; // Outputs : Hi John Doe
      
    $destination = $_COOKIE['destination']; // Outputs : Hi John Doe
       
    $distance = $_COOKIE['distance']; // Outputs : Hi John Doe
    
    $user_check = $_SESSION['username'];

    $car_model = $_SESSION['car_model'];

    $seats = $_SESSION['seats'];


    // if(isset($_POST['submit'])){
    //     $payment = $_POST['payment'];

    //     $_SESSION['payment']  = $payment;
    // }
     

   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 

      $_SESSION['payment']  = $_POST['payment'];
      
      $payment = $_SESSION['payment'];

      if($payment != "Cab Sharing")
      {

      $sql = "SELECT username FROM customer WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);

      }
      elseif ($payment == "Cab Sharing") 
      {
                
      }         
         header("location: calculatetrip.php");
      

  }
?>