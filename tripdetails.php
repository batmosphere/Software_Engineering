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
     

   
   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
      // username and password sent from form 

      $_SESSION['payment']  = $_POST['payment'];
      
      $payment = $_SESSION['payment'];

      


      if($car_model === "Cab Sharing")
      {


               $sql = "SELECT Payment_id from payment where available_seats >= '$seats';";
                  $result = mysqli_query($db,$sql);
                  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                  $Payment_id = $row['Payment_id'];
                  

                  $count = mysqli_num_rows($result);
                  $_SESSION['count'] = $count;


                if($count == 0)
                {       

                        $sql2 = "SELECT ID FROM driver WHERE availability = 1 LIMIT 1;";
                        $result2 = mysqli_query($db,$sql2);
                        $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                        $ID = $row2['ID'];
                        $_SESSION['ID'] = $ID;


                        $sql22 = "SELECT First_Name from driver where ID='$ID';";
                        $result22 = mysqli_query($db,$sql22);
                        $row22 = mysqli_fetch_array($result22,MYSQLI_ASSOC);
                        $First_Name = $row22['First_Name'];
                        $_SESSION['First_Name'] = $First_Name;

                        $sql34 = "SELECT Last_Name from driver where ID='$ID'";
                        $result34 = mysqli_query($db,$sql34);
                        $row34 = mysqli_fetch_array($result34,MYSQLI_ASSOC);
                        $Last_Name = $row34['Last_Name'];
                        $_SESSION['Last_Name'] = $Last_Name;
                        
                        $sql = "SELECT registration_number, available_seats FROM car WHERE availability = 1 LIMIT 1;";
                        $result = mysqli_query($db,$sql);
                        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                        $registration_number = $row['registration_number'];
                        $available_seats = $row['available_seats'];
                        $_SESSION['registration_number'] = $registration_number;
                        
                        
                        $sql4 = "UPDATE driver set availability = 0 WHERE ID = '$ID';";
                        $result4 = mysqli_query($db,$sql4);


                        $sql3 = "UPDATE car set availability = 0 WHERE registration_number = '$registration_number';";
                        $result3 = mysqli_query($db,$sql3);


                        $sql34 = "SELECT price FROM car_type WHERE model = (SELECT model from car WHERE registration_number = '$registration_number');";
                        $result34 = mysqli_query($db,$sql34);
                        $row34 = mysqli_fetch_array($result34,MYSQLI_ASSOC);
                        $price = $row34['price'];



                        $sql6 = "SELECT speed from car_type where model= (SELECT model from car WHERE registration_number = '$registration_number');";
                        $result6 = mysqli_query($db,$sql6);
                        $row6 = mysqli_fetch_array($result6,MYSQLI_ASSOC);
                        $speed = $row6['speed'];


                        $time = $distance/$speed;
                        $_SESSION['time'] = $time;

                        
                         $zero = 0;

                         $_SESSION['zero'] = $zero;


                        $totalprice = $distance*$price;
                        $_SESSION['price'] = $totalprice;

                        $avail = $available_seats - $seats;
                        $_SESSION['max_seats'] = $avail;

                        $sql7 = "INSERT into payment (mode_of_payment, amount, username, driver_id, driver_first, driver_last,source,destination, distance, est_time,  available_seats, registration_number) VALUES ('$payment', '$totalprice','$user_check', '$ID', '$First_Name', '$Last_Name','$source','$destination', '$distance', '$time', '$avail', '$registration_number') ;";
                        $result7 = mysqli_query($db,$sql7);

                        // echo "$result7";

                }
                elseif($count > 0)
                {
                        $sql = "SELECT Payment_id, registration_number, driver_id, driver_first, driver_last, available_seats from payment where Payment_id = '$Payment_id' limit 1;";
                        $result = mysqli_query($db,$sql);
                        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                        $Payment_id = $row['Payment_id'];
                        $registration_number = $row['registration_number'];

                        $_SESSION['registration_number'] = $registration_number;
                        $_SESSION['Payment_id'] = $Payment_id;
                        $driver_id = $row['driver_id'];
                        $_SESSION['ID'] = $driver_id;


                        $sql4 = "UPDATE payment set available_seats = 0 WHERE Payment_id = '$Payment_id';";
                        $result4 = mysqli_query($db,$sql4);

                        $driver_first = $row['driver_first'];
                        $driver_last = $row['driver_last'];
                        $available_seats = $row['available_seats'];
                        $avail = $available_seats - $seats;

                        $sql22 = "SELECT First_Name from driver where ID='$driver_id';";
                        $result22 = mysqli_query($db,$sql22);
                        $row22 = mysqli_fetch_array($result22,MYSQLI_ASSOC);
                        $First_Name = $row22['First_Name'];
                        $_SESSION['First_Name'] = $First_Name;

                        $sql34 = "select Last_Name from driver where ID='$driver_id'";
                        $result34 = mysqli_query($db,$sql34);
                        $row34 = mysqli_fetch_array($result34,MYSQLI_ASSOC);
                        $Last_Name = $row34['Last_Name'];
                        $_SESSION['Last_Name'] = $Last_Name;


                        // $sql10 = "SELECT max_seats from car_model  where model = (select model from car where registration_number = '$registration_number');";
                        // $result10 = mysqli_query($db,$sql10);
                        // $row10 = mysqli_fetch_array($result10,MYSQLI_ASSOC);
                        // $max_seats = $row10['max_seats'];


                        $sql34 = "SELECT price FROM car_type WHERE model = (SELECT model from car WHERE registration_number = '$registration_number');";
                        $result34 = mysqli_query($db,$sql34);
                        $row34 = mysqli_fetch_array($result34,MYSQLI_ASSOC);
                        $price = $row34['price'];



                        $sql6 = "SELECT speed from car_type where model= (SELECT model from car WHERE registration_number = '$registration_number');";
                        $result6 = mysqli_query($db,$sql6);
                        $row6 = mysqli_fetch_array($result6,MYSQLI_ASSOC);
                        $speed = $row6['speed'];


                        $time = $distance/$speed;
                        $_SESSION['time'] = $time;

                        
                         $zero = 0;

                         $_SESSION['zero'] = $zero;


                        $totalprice = $distance*$price;
                        $_SESSION['price'] = $totalprice;

                        
                        
                     $sql7 = "INSERT into payment (mode_of_payment, amount, username, driver_id, driver_first, driver_last,source,destination, distance, est_time,  available_seats, registration_number) VALUES ('$payment', '$totalprice','$user_check', '$driver_id', '$First_Name', '$Last_Name','$source','$destination', '$distance', '$time', '$avail', '$registration_number') ;";
                        $result7 = mysqli_query($db,$sql7);
                    
                    
                }





      }
      elseif($car_model !=  "Cab_Sharing")
      {
                
                    $sql = "SELECT registration_number FROM car WHERE c_model='$car_model' and availability = 1 LIMIT 1";
                    $result = mysqli_query($db,$sql);
                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                    $registration_number = $row['registration_number'];
                    $_SESSION['registration_number'] = $registration_number;

                    if(!$result)
                    {
                      echo "NO cars available";
                    }
                    
                    $sql2 = "SELECT ID FROM driver WHERE availability = 1 LIMIT 1";
                    $result2 = mysqli_query($db,$sql2);
                    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                    $ID = $row2['ID'];
                    $_SESSION['ID'] = $ID;

                    $sql34 = "SELECT First_Name from driver where ID='$ID'";
                    $result34 = mysqli_query($db,$sql34);
                    $row34 = mysqli_fetch_array($result34,MYSQLI_ASSOC);
                    $First_Name = $row34['First_Name'];
                    $_SESSION['First_Name'] = $First_Name;

                    $sql34 = "SELECT Last_Name from driver where ID='$ID'";
                    $result34 = mysqli_query($db,$sql34);
                    $row34 = mysqli_fetch_array($result34,MYSQLI_ASSOC);
                    $Last_Name = $row34['Last_Name'];
                    $_SESSION['Last_Name'] = $Last_Name;


                    $sql3 = "UPDATE car set availability = 0 WHERE registration_number = '$registration_number'";
                    $result3 = mysqli_query($db,$sql3);


                    $sql4 = "UPDATE driver set availability = 0 WHERE ID = '$ID';";
                    $result4 = mysqli_query($db,$sql4);


                    $sql34 = "SELECT price FROM car_type WHERE model = '$car_model';";
                    $result34 = mysqli_query($db,$sql34);
                    $row34 = mysqli_fetch_array($result34,MYSQLI_ASSOC);
                    $price = $row34['price'];



                    $sql6 = "select speed from car_type where model= '$car_model';";
                    $result6 = mysqli_query($db,$sql6);
                    $row6 = mysqli_fetch_array($result6,MYSQLI_ASSOC);
                    $speed = $row6['speed'];


                    $time = $distance/$speed;
                    $_SESSION['time'] = $time;

                    
                     $zero = 0;

                     $_SESSION['zero'] = $zero;


                    $totalprice = $distance*$price;
                    $_SESSION['price'] = $totalprice;

                    $sql7 = "INSERT into payment (mode_of_payment, amount, username, driver_id, driver_first, driver_last,source,destination, distance, est_time,  available_seats, registration_number) VALUES ('$payment', '$totalprice','$user_check', '$ID', '$First_Name', '$Last_Name','$source','$destination', '$distance', '$time', '$zero', '$registration_number') ;";
                    $result7 = mysqli_query($db,$sql7);

                    
      }         
         
      

  }



  header("location: calculatetrip.php");
?>