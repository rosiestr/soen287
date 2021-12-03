<?php 
$xml =simplexml_load_file("action\xml\orders.xml") or die("Error: Cannot create object");
// Output one line until end-of-file

foreach($xml->orders->order as $order) {
    $orderID = $order['id'];  
    $username = $order->username; 
    $orderItems = $order->cartItems; 
    $orderTotal = $order->cartTotal; 
    $shippingAddress = $order->shippingAddress;
    $orderArray = json_decode($orderItems, true);  
    
    $email = "jackie23@gmail.com"; 
    $address = "111 Guy Street"; 

    if ($orderArray != null) {
    echo 
    "<tr>
            <input type = 'hidden' class = 'editOrderID' value = $orderID id = 'itemOrderID'> 
            <td><input type='checkbox'/></td>
            <td>
                <img src='images/KMicon.ico' width='70' height='50'/>
                $username
            </td>
            <td>". count($orderArray)."</td>
            <td>$orderTotal</td>
            <td>$address</td>
            <td>**** **** **** 1111</td>
            <td>$email</td>
            <td>
                <button class='button button1 editOrderButton' type = 'submit' form = 'editOrder'>
                Edit <i class='fas fa-edit'></i>
                </button>
            </td>
    </tr>";  
    }
    else {
        echo "<p>No orders have been made. </p>"; 
    }
}


