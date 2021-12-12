<?php
session_start();
session_destroy();
//Added delete cookies 
setcookie('logged-in', 'true',  time() - 1, "/");
setcookie('loggedFirstName', "", time() - 1, "/");
setcookie('loggedEmail', "", time() - 1, "/");
header('Location: index.html');
 ?>
