<?php 

    if ( ! empty( $_COOKIE['username'] ) ) {
    	$name = "Hi " . $_COOKIE['username']; // Outputs : Hi John Doe
    }


 ?><!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery.post demo</title>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
 
<!-- the result of the search will be rendered inside this div -->
<div id="result"> <?php echo $name; ?></div>

</body>
</html>