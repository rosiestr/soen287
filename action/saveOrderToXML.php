<?php
setcookie('logged-in', 'true', time() + (86400 * 30), "/"); 
setcookie('user-email', 'marouakrim@outlook.com', time() + (86400 * 30), "/" ); 
if (!isset($_COOKIE['user-email'])) {
    setcookie('logged-in', 'true',  time() - 1, "/");
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
else {  
    $email = $_COOKIE['user-email']; 
    $file = "../users.xml"; 
    $simplexml = simplexml_load_file($file) or die("Unable to open file"); 
    $name = "Default Name"; $userAddress = "Default Address"; 
    foreach($simplexml->users->user as $user){
        if ((strcmp(trim($user->useremail), trim($email)) == 0)) {
            $fullname = $user->firstName . " " . $user->lastName; 
            $name = $fullname; 
            $fullAddress = $user->street . ", " . $user->city . ", ". $user->province . ", " . $user->zipcode;  
            $userAddress = $fullAddress;
            break; 
        }
    } 
    $cartItems = $_POST["order-items"]; 
    $cartTotal = $_POST["order-total"];
    $orderID = uniqid("#"); 
    $orderShippingAddress = ""; 
    $orderDiscount = 0; 
    $file = "xml/orders.xml";
    $simplexml = simplexml_load_file($file);
    $orders = $simplexml->orders; 
    $order= $orders->addChild('order');
    $order->addAttribute('id', $orderID);
    $order->addChild('email', $email);
    $order->addChild('name', $name);
    $order->addChild('cartItems', $cartItems);
    $order->addChild('orderDiscount', $orderDiscount);
    $order->addChild('cartTotal', $cartTotal);
    $order->addChild('shippingAddress', $orderShippingAddress); 
    $order->addChild('billingAddress', $userAddress); 

    $simplexml->asXML($file);
}
header("Location:" . $_SERVER['HTTP_REFERER']);
?>