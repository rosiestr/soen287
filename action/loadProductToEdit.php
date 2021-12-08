<?php 

if (isset($_POST['productToEdit'])){
    $productName = $_POST['productToEdit'];  
    $json =file_get_contents(".\json\productDB.json") or die("Error: Cannot create object");
    $array = json_decode($json,true);
    foreach($array['productTable'] as $product) {
        if ((strcmp(trim($product['productName']), trim($productName)) == 0)){
            $image = $product['productImage'];   
            $name = $product['productName']; 
            $price = $product['productPrice']; 
            $inventory = $product['productInventory']; 
            $size = $product['productSize'];
            $type = $product['productType']; 
            break; 
        }
    } 
}
else {
    $image = "";   
    $name = ""; 
    $price = 0.00; 
    $inventory = 0; 
    $size = [];
    $type = []; 
}

echo "<!DOCTYPE html>
<html lang='en'>

<head>
  <!-- Required meta tags for Bootstrap, provided by https.getbootstrap.com-->
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>

  <!-- Bootstrap CSS -->
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU' crossorigin='anonymous'>
  <!-- FontAwesome CSS - for icons -->
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <!-- Link to icon for title -->
  <link rel='shortcut icon' href='images/KMicon.ico' />
  <!-- css for backstore.html -->
  <link rel='stylesheet' href='../backstoreStyles.css'>
  <!--title to appear in tab-->
  <title>Kalamari Market</title>
</head>
<body>
  <!--NAVIGATION BAR -->
  <nav class='nav-top' id = 'topbar'>
    <!--first row of navigation bar-->
    <section>
        <div><a href='products.php'>Products</a></div>
        <div><a href='ordersList.html'>Orders</a></div>
        <div><a href='UserList.html'>Users</a></div>
        <img src='images/KMicon.ico'>
    </section>
  </nav>
    <!--end of html for first row of topbar -->
<main>
    <h1>Edit Product</h1>
    <main>

        <form class='product-form'>
            <div>
                <label>Product Name</label>
                <input type='text' name='productName' value=$name>
            </div>

            <div>
                <label>Price</label>
                <input type='text' name='productPrice' value= $price>
            </div>

            <div>
                <label>Inventory</label>
                <input type='text' name='productInventory' value= $inventory>
            </div>
        
        
            <div>
                <label>Types (comma separated)</label>
                <input type='text' name='productType' value=$name>
            </div>
        

            <div>
                <label>Sizes (comma separated)</label>
                <input type='text' name='productSize' value=$name>
            </div>
        
            <div >
                <label>Product Description</label>
                <textarea></textarea>
            </div>

            <div>
                <label>Add Image</label>
                <input type='file'>
                </div>
        
            <div>
            <input type='submit' value='Save'>
            </div>
    </form>

</main>

<footer><a href='index.html'>Back to Front Store</a></footer>
</body>
</html>";