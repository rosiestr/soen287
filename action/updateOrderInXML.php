<?php 
if (isset($_POST['orderID'])) {
        $existingOrder = false; 
        $updateID = $_POST['orderID'];
        $cartItems = $_POST['cart-items-saved']; 
        $orderDiscount = $_POST['orderDiscount']; 
        $cartTotal = $_POST['cart-total'];  
        $name = $_POST['name']; 
        $email = $_POST['email']; 
        $billingAddress = $_POST['billingAddress']; 
        echo $billingAddress; 
        $shippingAddress = $_POST['shippingAddress']; 
        echo $shippingAddress; 
    $file = 'xml/orders.xml';
    $xml = simplexml_load_file($file);
    foreach($xml->orders->order as $order){
        if($order['id'] == $updateID){
            $order->cartItems = $cartItems;
            $order->orderDiscount = $orderDiscount; 
            $order->cartTotal = $cartTotal;
            $order->shippingAddress = $shippingAddress;
            $existingOrder = true; 
            break;
        }
    }
    if ($existingOrder == true){
        file_put_contents('xml/orders.xml', $xml->asXML());
    }
    else {
        $orderID = uniqid('#'); 
        $username = $email; 

        $orders = $xml->orders; 
        $order= $orders->addChild('order');
        $order->addAttribute('id', $orderID);
        $order->addChild('username', $username);
        $order->addChild('cartItems', $cartItems);
        $order->addChild('orderDiscount', $orderDiscount);
        $order->addChild('cartTotal', $cartTotal);
        $order->addChild('shippingAddress', $shippingAddress); 

        $xml->asXML($file);
    }

    
    header("location: ../orderslist.php");
}
