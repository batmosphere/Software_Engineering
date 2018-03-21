<?php

         $_SESSION['source'] = $_POST['source'];
         $_SESSION['destination'] = $_POST['destination'];


         $source = $_POST['source_name'];
         $destination = $_POST['destination_name'];
         $distance = $_POST['distance'];

         $_SESSION['source'] = $source;
         $_SESSION['destination'] = $destination;
         header("location: cab_options.php");
     
?>