<?php 
if (isset($_POST['productID'])) {
        $existingOrder = false; 
        $updateId = $_POST['productID'];
        $image = $_POST['productImage'];   
        $name = $_POST['productName']; 
        $price = $_POST['productPrice']; 
        $inventory = $_POST['productInventory']; 
        $size = $_POST['productSize'];
        $type = $_POST['productType'];  

    $file = 'json/productDB.json';
    $json =file_get_contents("json\productDB.json") or die("Error: Cannot create object");
    $array = json_decode($json,true);
    foreach($array['productTable'] as $product){
        if($product['productID'] == $updateId){
            $product['productImage'] = $image;  
            $product['productName']=$name; 
            $product['productPrice'] =$price; 
            $product['productInventory']  = $inventory; 
            $product['productSize'] = $size ;
            $product['productType'] =$type;  
            $existingOrder = true; 
            break;
        }
    }
    if ($existingOrder == true){
        $updatedJson = json_encode($array);
        file_put_contents('json/productDB.json', $updatedJson);
    }
    else {
        $productID = uniqid('#');
        $array['productTable'][] = array(
            'productID' =>$productID,
            'productImage'=>$image, 
            'productName'=>$name,
            'productPrice'=>$price,
            'productInventory'=>$inventory,
            'productSize'=>$size,
            'productType'=>$type
        );
        file_put_contents('json/productDB.json', json_encode($array));
 
    }

    
    header("location: ../products.php");
}