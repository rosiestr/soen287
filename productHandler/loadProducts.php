<?php 
$json =file_get_contents("action\json\productDB.json") or die("Error: Cannot create object");
$array = json_decode($json,true);

foreach($array['productTable'] as $product) {
    $image = $product['productImage'];   
    $name = $product['productName']; 
    $price = $product['productPrice']; 
    $inventory = $product['productInventory']; 
    $size = $product['productSize'];
    $type = $product['productType'];  
    
    echo 
    "<tr>
    <input type = 'hidden' class = 'editProductName' value = $name id = 'itemProductName'> 
    <td><input type='checkbox' /></td>
    <td>
      <img src='$image' width='70' height='50' />
    </td>
    <td>$name</td>
    <td>$price</td>
    <td>$inventory</td>
    <td>              
    <select name='sizes' class='selects'>
        <option value='none'>Select Size</option>";
    foreach($size as $sizeType){
        echo"<option value='$sizeType'>$sizeType</option>";
    } 
    echo
    "</select></td>
    <td>
        <select name='types' class='selects'>
            <option value='none'>Select Type</option>";
        foreach($type as $kind){
            echo"<option value='$kind' >$kind</option>";
        }
    echo
    "</select></td>
    <td>
      <div class=button-table>
        <button class='button-t button-t-1'id='deleteProductButton' type = 'submit' form = 'toDelete'>
          Delete <i class='fas fa-trash-alt'></i>
        </button>
        <button class='button-t button-t-1' type = 'submit' form = 'editProduct'>
          Edit <i class='as fa-edit'></i>
        </button>
      </div>
    </td>
  </tr>";

 

}

