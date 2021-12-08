<?php   
    if (isset($_POST['products'])) {
        $products = $_POST['products']; 
        $deleteIDs = json_decode($_POST['products']);
        $file = "json/productDB.json";
        $json =file_get_contents(".\json\productDB.json") or die("Error: Cannot create object");
        $array = json_decode($json,true);
    
        foreach($deleteIDs as $value){
            foreach($array['productTable'] as $product) {
                if ((strcmp(trim($product['name']), trim($value)) == 0)){
                    $dom = dom_import_simplexml($order); 
                    $dom->parentNode->removeChild($dom);
                }      
            }
        }
        $xml->asXML($file);
    }
    header("Location:" . $_SERVER['HTTP_REFERER']);
    