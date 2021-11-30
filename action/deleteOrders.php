<?php 
    if (isset($_POST['orders'])) {
        $orders = $_POST['orders']; 
        $deleteIDs = json_decode($_POST['orders']);
        echo $deleteIDs[0]; 
        $file = "orderData.txt";
    
        $arr = file($file);

        foreach($deleteIDs as $value){
            foreach ($arr as $key=> $line) {
                //removing the line
                if(stristr($line,$value)!== false){
                    array_splice($arr, $key, $key + 3); 
                break;}
            }
        }
        //writing to file
        file_put_contents($file, implode($arr));
    }
    header("Location:" . $_SERVER['HTTP_REFERER']);
