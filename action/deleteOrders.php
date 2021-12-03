<?php   
    if (isset($_POST['orders'])) {
        $orders = $_POST['orders']; 
        $deleteIDs = json_decode($_POST['orders']);
        $file = "xml/orders.xml";
        $xml =simplexml_load_file($file) or die("Error: Cannot create object");
    
        foreach($deleteIDs as $value){
            foreach($xml->orders->order as $order) {
                if ((strcmp(trim($order['id']), trim($value)) == 0)){
                    $dom = dom_import_simplexml($order); 
                    $dom->parentNode->removeChild($dom);
                }      
            }
        }
        $xml->asXML($file);
    }
    header("Location:" . $_SERVER['HTTP_REFERER']);
    
    
    
