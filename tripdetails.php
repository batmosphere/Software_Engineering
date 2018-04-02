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

                    $sql = "SELECT registration_no FROM car WHERE c_model='$car_model' and availability = 1 LIMIT 1;";
                    $result = mysqli_query($db,$sql);
                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                    $registration_no = $row['registration_no'];
                    $_SESSION['registration_no'] = $registration_no;
                    
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

                    $sql34 = "select Last_Name from driver where ID='$ID'";
                    $result34 = mysqli_query($db,$sql34);
                    $row34 = mysqli_fetch_array($result34,MYSQLI_ASSOC);
                    $Last_Name = $row34['Last_Name'];
                    $_SESSION['Last_Name'] = $Last_Name;


                    $sql3 = "UPDATE car set availability = 0 WHERE registration_no = '$registration_no';";
                    $result3 = mysqli_query($db,$sql3);


                    $sql4 = "UPDATE driver set availability = 0 WHERE ID = '$ID';";
                    $result4 = mysqli_query($db,$sql4);


                    $new_T = mt_rand(1,1000000);
                    $sql5 = "INSERT into trip values($new_T,'$user_check','$ID',NULL,NULL,'$source','$destination',0,0,'$registration_no','$distance',0,0);";
                    $result5 = mysqli_query($db,$sql5);
                    
                    
                    $sql6 = "UPDATE trip set est_time = '$distance' / (select speed from car_type where model=(select model from car where registration_number = '$registration_number'));";
                    $result6 = mysqli_query($db,$sql6);

                    $sql7 = "UPDATE trip set est_price = '$distance' * (select price from car_type where model=(select model from car where registration_number = '$registration_number'));";
                    $result7 = mysqli_query($db,$sql7);

                    $sql8 = "UPDATE trip set driver_first = (select First_Name from driver where ID='$ID');";
                    $result8 = mysqli_query($db,$sql8);

                    $sql9 = "UPDATE trip set driver_last = (select Last_Name from driver where ID='$ID');";
                    $result9 = mysqli_query($db,$sql9);


      }
      elseif ($payment == "Cab Sharing") 
      {
                $sql = "SELECT trip_id from trip where available_seats >= '$seats' limit 1;";
                $result = mysqli_query($db,$sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $trip = $row['trip_id'];

                $count = mysqli_num_rows($result);

                if($count == 0)
                {
                        $sql = "SELECT registration_no FROM car WHERE c_model='$car_model' and availability = 1 LIMIT 1;";
                        $result = mysqli_query($db,$sql);
                        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                        $registration_no = $row['registration_no'];
                        $_SESSION['registration_no'] = $registration_no;
                        
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

                        $sql34 = "select Last_Name from driver where ID='$ID'";
                        $result34 = mysqli_query($db,$sql34);
                        $row34 = mysqli_fetch_array($result34,MYSQLI_ASSOC);
                        $Last_Name = $row34['Last_Name'];
                        $_SESSION['Last_Name'] = $Last_Name;


                        $sql3 = "UPDATE car set availability = 0 WHERE registration_no = '$registration_no';";
                        $result3 = mysqli_query($db,$sql3);


                        $sql4 = "UPDATE driver set availability = 0 WHERE ID = '$ID';";
                        $result4 = mysqli_query($db,$sql4);

                        $sql10 = "SELECT max-seats from car_model  where model = (select model from car where registration_number = '$registration_number');";
                        $result10 = mysqli_query($db,$sql10);
                        $row10 = mysqli_fetch_array($result10,MYSQLI_ASSOC);
                        $max-seats = $row10['max-seats'];



                        $new_T = mt_rand(1,1000000);
                    $sql5 = "INSERT into trip values($new_T,'$user_check','$ID',NULL,NULL,'$source','$destination',0,0,'$registration_no','$distance',0,0);";
                    $result5 = mysqli_query($db,$sql5);
                    
                    
                    $sql6 = "UPDATE trip set est_time = '$distance' / (select speed from car_type where model=(select model from car where registration_number = '$registration_number'));";
                    $result6 = mysqli_query($db,$sql6);

                    $sql7 = "UPDATE trip set est_price = '$distance' * (select price from car_type where model=(select model from car where registration_number = '$registration_number'));";
                    $result7 = mysqli_query($db,$sql7);

                    $sql8 = "UPDATE trip set driver_first = (select First_Name from driver where ID='$ID');";
                    $result8 = mysqli_query($db,$sql8);

                    $sql9 = "UPDATE trip set driver_last = (select Last_Name from driver where ID='$ID');";
                    $result9 = mysqli_query($db,$sql9);
                }
                else
                {
                        $sql = "SELECT car_reg, driver_id, driver_first, driver_last, available_seats from trip where trip_id = '$trip_id';";
                        $result = mysqli_query($db,$sql);
                        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                        $car_reg = $row['car_reg'];
                        $_SESSION['registration_no'] = $car_reg;

                        $driver_id = $row['driver_id'];
                        $_SESSION['ID'] = $driver_id;

                        $driver_first = $row['driver_first'];
                        $driver_last = $row['driver_last'];
                        $available_seats = $row['available_seats'];


                        $sql22 = "SELECT First_Name from driver where ID='$ID';";
                        $result22 = mysqli_query($db,$sql22);
                        $row22 = mysqli_fetch_array($result22,MYSQLI_ASSOC);
                        $First_Name = $row22['First_Name'];
                        $_SESSION['First_Name'] = $First_Name;

                        $sql34 = "select Last_Name from driver where ID='$ID'";
                        $result34 = mysqli_query($db,$sql34);
                        $row34 = mysqli_fetch_array($result34,MYSQLI_ASSOC);
                        $Last_Name = $row34['Last_Name'];
                        $_SESSION['Last_Name'] = $Last_Name;


                        $sql10 = "SELECT max-seats from car_model  where model = (select model from car where registration_number = '$registration_number');";
                        $result10 = mysqli_query($db,$sql10);
                        $row10 = mysqli_fetch_array($result10,MYSQLI_ASSOC);
                        $max-seats = $row10['max-seats'];


                        $new_T = mt_rand(1,1000000);
                    $sql5 = "INSERT into trip values($new_T,'$user_check','$driver_id','$driver_first','$driver_last','$source','$destination',0,0,'$car_reg','$max-seats - $seats', $distance',0,0);";
                    $result5 = mysqli_query($db,$sql5);
                    
                    
                    $sql6 = "UPDATE trip set est_time = '$distance' / (select speed from car_type where model=(select model from car where registration_number = '$registration_number'));";
                    $result6 = mysqli_query($db,$sql6);

                    $sql7 = "UPDATE trip set est_price = '$distance' * (select price from car_type where model=(select model from car where registration_number = '$registration_number'));";
                    $result7 = mysqli_query($db,$sql7);

                    $sql8 = "UPDATE trip set driver_first = (select First_Name from driver where ID='$ID');";
                    $result8 = mysqli_query($db,$sql8);

                    $sql9 = "UPDATE trip set driver_last = (select Last_Name from driver where ID='$ID');";
                    $result9 = mysqli_query($db,$sql9);


                }
      }         
         header("location: calculatetrip.php");
      

  }
?>