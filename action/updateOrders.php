<?php   
    if (isset($_POST['orders'])) {
        $updateID = $_POST['orderID'];
        $username = $_POST['username']; 
        $cartItems = $_POST['cart-items']; 
        $cartTotal = $_POST['cart-total'];  
        $name = $_POST['name']; 
        $email = $_POST['email']; 
        $billingAddress = $_POST['billingAddress']; 
        $shippingAddress = $_POST['shippingAddress']; 

        $file = "orderData.txt";
        
        $arr = file($file);
        $newOrder = [$cartItems, $cartTotal, $shippingAddress]; 
        foreach($deleteIDs as $value){
            foreach ($arr as $key=> $line) {
                //removing the line
                if(stristr($line,$updateID)!== false){
                    array_splice($arr, $key + 2, $key + 4, $newOrder); 
                break;}
            }
        }
        //writing to file
        file_put_contents($file, implode($arr));
    }
    header("Location:" . $_SERVER['HTTP_REFERER']);
