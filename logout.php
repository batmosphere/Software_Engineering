<?php
   session_start();
   if(!isset($_SESSION['username']) && !isset($_SESSION['password']))
   {	
   	session_destroy();
   	session_unset();
      setcookie('source', '', time()-60*60*24*365, '', '');
      setcookie('destination', '', time()-60*60*24*365, '', '');
      setcookie('distance', '', time()-60*60*24*365, '', '');
   	header("Location: index.php");
   }
   else
   {
   
   	session_destroy();
   	session_unset();
      setcookie('source', '', time()-60*60*24*365, '', '');
      setcookie('destination', '', time()-60*60*24*365, '', '');
      setcookie('distance', '', time()-60*60*24*365, '', '');
   	header("Location: index.php");
   }

   
   
   

    
   
?>