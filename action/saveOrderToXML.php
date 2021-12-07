<?php
setcookie('logged-in', 'true', time() + (86400 * 30), "/"); 
setcookie('username', 'true', time() + (86400 * 30), "/" ); 
if (!isset($_COOKIE['username'])) {
    setcookie('logged-in', 'true',  time() - 1, "/");
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
else {  
    $email = 'testUsername@gmail.com'; 
    $name = 'Test Name'; 
    $userAddress = 'Default St., Montreal, QC, T8A5P5';
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