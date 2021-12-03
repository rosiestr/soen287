<?php 
    include_once 'dbh.inc.php'; 

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']); 
    $billing_address = mysqli_real_escape_string($conn, $_POST['billingAddress']);   
    $full_name = explode(" ", mysqli_real_escape_string($conn, $_POST['name'])); 
    $first_name = mysqli_real_escape_string($conn, $full_name[0]); 
    $last_name = mysqli_real_escape_string($conn, $full_name[1]); 
    $order_total = mysqli_real_escape_string($conn, $_POST['total']); 
    $pwd = "ADMIN";
    $username = "ANONYMOUS";  
    $user_id = 1; 

    if (isset($_POST['sameAddress'])) {
        $shipping_address = $billing_address; 
    }
    else if (isset($_POST['pickup'])) {
        $shipping_address = "ORDER FOR PICKUP"; 
    }
    else { 
        $shipping_address = mysqli_real_escape_string($conn, $_POST['shippingAddress']);
    }


    $sql = "UPDATE users SET email = '$email', phone = '$phone', billing_address = '$billing_address', first_name = '$first_name', last_name = '$last_name' 
        WHERE user_id = '$user_id';"; 
    $result = mysqli_query($conn, $sql); 
    
    $sql = "INSERT INTO orders(user_id, shipping_address, order_total) 
    VALUES ('$user_id', '$shipping_address', '$order_total');";
    $result = mysqli_query($conn, $sql);

