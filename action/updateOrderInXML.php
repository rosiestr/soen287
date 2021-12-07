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
        $shippingAddress = $_POST['shippingAddress']; 

    $file = 'xml/orders.xml';
    $xml = simplexml_load_file($file);
    foreach($xml->orders->order as $order){
        if($order['id'] == $updateID){
            $order->cartItems = $cartItems;
            $order->orderDiscount = $orderDiscount; 
            $order->cartTotal = $cartTotal;
            $order->shippingAddress = $shippingAddress;
            $order->email = $email; 
            $order->name = $name; 
            $order->billingAddress = $billingAddress; 
            $existingOrder = true; 
            break;
        }
    }
    if ($existingOrder == true){
        file_put_contents('xml/orders.xml', $xml->asXML());
    }
    else {
        $orderID = uniqid('#'); 
        $orders = $xml->orders; 
        $order= $orders->addChild('order');
        $order->addAttribute('id', $orderID);
        $order->addChild('email', $email);
        $order->addChild('name', $name); 
        $order->addChild('cartItems', $cartItems);
        $order->addChild('orderDiscount', $orderDiscount);
        $order->addChild('cartTotal', $cartTotal);
        $order->addChild('shippingAddress', $shippingAddress); 
        $order->addChild('billingAddress', $billingAddress);

        $xml->asXML($file);
    }

    
    header("location: ../orderslist.php");
}
