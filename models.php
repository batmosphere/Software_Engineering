<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'xxxx');
   define('DB_DATABASE', 'taxi');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
  	    $username = $_POST['username'];
    		$mypassword = $_POST['password'];
        $password = md5($mypassword);
        $number = $_POST['number'];
        $address = $_POST['address'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

      
     

       $sql = "SELECT model from car WHERE availibility = 1";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      
         $_SESSION['username'] = $username;
         
         header("location: directions.php");
      

  }
?>