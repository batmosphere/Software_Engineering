<?php


define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'xxxx');
   define('DB_DATABASE', 'taxi');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
session_start();


$sql="SELECT Payment_id from payment where available_seats >= 3;";

if (($result=mysqli_query($db,$sql)))
  {
  // Return the number of rows in result set
  // $rowcount=mysqli_num_rows($result);
  // printf("Result set has %d rows.\n",$rowcount);
  // // Free result set
  // mysqli_free_result($result);




  $sql = "SELECT registration_number FROM car WHERE availability = 1 LIMIT 1;";
                        $result = mysqli_query($db,$sql);
                        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                        $registration_number = $row['registration_number'];
                        $_SESSION['registration_number'] = $registration_number;

                        printf("Result set has %d registration_number                       .\n",$registration_number);
                        
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


                       

                        $sql10 = "SELECT max_seats from car_model  where model = (select model from car where registration_number = '$registration_number');";
                        $result10 = mysqli_query($db,$sql10);
                        $row10 = mysqli_fetch_array($result10,MYSQLI_ASSOC);
                        $max_seats = $row10['max_seats'];

                        printf("Result set has %d seats max.\n",$max_seats);

                        $sql34 = "SELECT price FROM car_type WHERE model = '$car_model';";
                        $result34 = mysqli_query($db,$sql34);
                        $row34 = mysqli_fetch_array($result34,MYSQLI_ASSOC);
                        $price = $row34['price'];

                        printf("Result set has %d price.\n",$price);



                        $sql6 = "select speed from car_type where model= '$car_model';";
                        $result6 = mysqli_query($db,$sql6);
                        $row6 = mysqli_fetch_array($result6,MYSQLI_ASSOC);
                        $speed = $row6['speed'];

                        printf("Result set has %d speed.\n",$speed);


                        $time = $distance/$speed;
                        $_SESSION['time'] = $time;

                        printf("Result set has %d time.\n",$time);

                        
                         $zero = 0;

                         $_SESSION['zero'] = $zero;


                        $totalprice = $distance*$price;
                        $_SESSION['price'] = $totalprice;

                        printf("Result set has %d totalprice.\n",$totalprice);

                        $avail = $max_seats - $seats;

                        printf("Result set has %d avail.\n",$avail);

                        
  }

// mysqli_close($con);
?> 