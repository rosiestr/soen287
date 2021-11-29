<?php 
if (!isset($_COOKIE[$cookie_name])) {
    echo "Please login or register before making your purchase!"; 
}
else { 
    if(isset($_POST['submit'])){
        $username = $cookie_name; 
        $cartItems = $_POST['order-items']; 
        $cartTotal = $_POST['cart-total'];
        echo $cartItems; 

        $file = fopen('orderData.txt', 'a+');
        $lastOrderID = 1; 
        while(!feof($myfile)) {
            $lastOrderID = fgets($myfile); 
        }
        $lastOrderID = (int) $lastOrderID+1; 

        fwrite($file, $username);
        fwrite($file, $cartItems); 
        fwrite($file, $cartTotal); 
        fwrite($file, $lastOrderID); 
        fclose($file);
        
    }
}