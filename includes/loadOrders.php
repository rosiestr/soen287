<?php 
$orderData = fopen("action/orderData.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($orderData)) {
    $line = fgets($orderData); 
    if ($line == "" || $line == null || $line == "\n") { 
        continue; 
    }
    $orderID = $line; 
    $username = fgets($orderData); 
    $orderItems = fgets($orderData); 
    $orderTotal = fgets($orderData); 
    $orderArray = json_decode($orderItems, true); 
    
    $email = "jackie23@gmail.com"; 
    $address = "111 Guy Street"; 

    if ($orderArray != null) {
    echo 
    "<tr>
        <input type = 'hidden' id = '$orderID' class = 'orderID' value = '$orderID'></input> 
        <td><input type='checkbox' /></td>
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
        <a href='/editOrder.html'>
            <button class='button button1' id='OrdersButton'>
            Edit <i class='fas fa-edit'></i>
            </button>
        </a>
        </td>
    </tr>"; 
    }
    else {
        echo "<p>No orders have been made. </p>"; 
    }
}
fclose($orderData);

