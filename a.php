<?php

// database connection & data insert above

//email registeration confirmation

$mysite = "SC Sports";
$webmaster = "Webmaster @ SC Sports";
$myemail = webmaster+(myrealemail).com;

$subject = "Weekly Sports Updates from $mysite";
$email = "mukundkothari172@gmail.com";
$message = "<html><body><br>


Thank you for your interest in our weekly updates. You will now be receiving them by email.<br><br>

If you no longer wish to receive these emails, please send an email to webmaster @ SC sports.com.<br><br>

Have Fun!<br><br>

$webmaster

</body></html>";


$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: SC SPORTS <DONOTREPLY@example.com>' . "\r\n";

mail($email, $subject, $message, $headers);

echo "A confirmation has been sent to your email address.";

?>