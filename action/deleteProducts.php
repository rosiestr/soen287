<?php   
    if (isset($_POST['products'])) {
        $products = $_POST['products']; 
        $deleteIDs = json_decode($_POST['products']);
        $file = "json/productDB.json";
        $json =file_get_contents($file) or die("Error: Cannot create object");
        $array = json_decode($json,true);
        $modifiedJSON = array();
    
        foreach($deleteIDs as $value){
            foreach($array['productTable'] as $product) {
                if ((strcmp(trim($product['productID']), trim($value)) == 0)){
                    unset ($array['productTable'][$product]);
                    $save = json_encode(array_values($array), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                    file_put_contents($file, $save);
                    break;
                }      
            }
        }
    }
    header("Location:" . $_SERVER['HTTP_REFERER']);
    