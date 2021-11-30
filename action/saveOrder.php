<?php 
setcookie('logged-in', 'true', time() + (86400 * 30), "/"); 
setcookie('username', 'true', time() + (86400 * 30), "/" ); 
if (!isset($_COOKIE['username'])) {
    setcookie('logged-in', 'true',  time() - 1, "/");
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
else {  
    $username = 'testUsername'; 
    $cartItems = $_POST["order-items"]; 
    $cartTotal = $_POST["order-total"];
    $orderID = uniqid("#"); 
    
    $file = fopen("orderData.txt", "a+"); 
    fwrite($file, $orderID . "\n" );   
    fwrite($file, $username . "\n");
    fwrite($file, $cartItems . "\n"); 
    fwrite($file, $cartTotal . "\n"); 
    fclose($file);
}
header("Location:" . $_SERVER['HTTP_REFERER']);
