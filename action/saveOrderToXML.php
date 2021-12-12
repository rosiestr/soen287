<?php
if ($_POST["user-email"] == "NONE") {
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
else { 
    setcookie('logged-in', 'true',  time() + (86400 * 30), "/"); 
    $email = $_POST["user-email"]; 
    $file = "../users.xml"; 
    $simplexml = simplexml_load_file($file) or die("Unable to open file"); 
    $name = "Default Name"; $userAddress = "Default Address"; 
    foreach($simplexml->user as $user){ 
        if ((strcmp(trim($user->userEmail), trim($email)) == 0)) {
            $fullname = $user->userFirstName . " " . $user->userLastName; 
            $name = $fullname; 
            $userAddress = $user->userAddress;
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