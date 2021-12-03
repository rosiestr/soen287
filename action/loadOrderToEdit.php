<?php 
$orderID; 
if (isset($_POST['orderToEdit'])){
    $orderID = $_POST['orderToEdit'];  
    $orderData = fopen("orderData.txt", "r") or die("Unable to open file!");
    // Output one line until end-of-file
    while(!feof($orderData)) {
        $line = fgets($orderData);  
        if (strcmp(trim($line), trim($orderID)) == 0) {
            break; 
        }
    }
    $username = fgets($orderData); 
    $orderItems = fgets($orderData); 
    $orderTotal = fgets($orderData); 
    $orderArray = json_decode($orderItems, true); 
    $name = 'testName'; 
    $lastName = 'lastName';
    $email = "jackie23@gmail.com"; 
    $address = "111 Guy Street";
    fclose($orderData);
} 
else {
    $name = ""; 
    $email = ""; 
    $address = ""; 
    $orderID = uniqid("#"); 
    $orderTotal = 0.00;
    $orderArray = []; 
}

echo "<!DOCTYPE HTML>
    <html>
    <head>
        <!-- Required meta tags for Bootstrap, provided by https.getbootstrap.com-->
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>

        <!-- Bootstrap CSS -->
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU' crossorigin='anonymous'>
        <!-- FontAwesome CSS - for icons -->
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
        <!-- Link to icon for title -->
        <link rel='shortcut icon' href='../images/KMicon.ico' />
        <!-- css for index.html -->
        <link rel='stylesheet' href='../backstoreStyles.css'>
        <script src='../orderHandler/editOrder.js' async></script>
        <!--title to appear in tab-->
        <title>Edit Order</title> 
        </head>
        <body id = 'editOrder'>

        <!--NAVIGATION BAR -->
        <nav class='nav-top pb-2' id = 'topbar'>
            <!--first row of navigation bar-->
            <section>
                <div><a href='products.php'>Products</a></div>
                <div><a href='/ordersList.php'>Orders</a></div>
                <div><a href='UserList.php'>Users</a></div>
                <img src='images/KMicon.ico'>
            </section>
        </nav>
        <!--HEADER-->
        <h1>Edit Order</h1>
        <!--MAIN-->
        <section class = 'container d-flex justify-content-center py-3 bluebg'>
            <!--CUSTOMER INFO AND SHIPPING FIELDS-->
            <form> 

    <input type = 'hidden' name = 'orderID' value = '$orderID'>
<div class = 'row'>
    <!--CUSTOMER NAME, EMAIL, PHONE -->
    <div class = 'col-sm-4 d-flex flex-column'>
        <label for='name'><b>Customer Name</b></label>
        <input type='text' id='name' name='name' value = '$name' class = 'editOrder'> 
        <label for='email'><b>Email</b></label>
        <input type = 'email' id='email' name='email' value = '$email' class = 'editOrder'> 
    </div>
    <!--CUSTOMER BILLING ADDRESS-->
    <div class = 'col-sm-4 d-flex flex-column'>
        <label for= 'billingAddress'><b>Billing Address</b></label>
        <textarea id = 'billingAddress' name = 'billingAddress' cols = '20' rows='6'
        >$address</textarea>
    </div> 
    <!--CUSTOMER SHIPPING ADDRESS-->
    <div class = 'col-sm-4 d-flex flex-column'>
        <label for='shippingAddress'><b>Shipping Address</b></label>
        <textarea id = 'shippingAddress' cols ='20' rows='6'
        >$address
        </textarea>              
        <span class = 'd-flex align-items-center'>
            <input type = 'checkbox' id = 'sameBillingAddress' name = 'sameAddress'>
            <label for='sameAddress'>Same as billing address</label>
        </span>                         
        <span class = 'd-flex align-items-center'>
            <input type = 'checkbox' id = 'forPickup' name = 'pickup'>
            <label for='pickup'>Order for pickup</label>
        </span>      
    </div> 
</div>
</form>
</section> 
<section class = 'container pb-3'>  
<!--TABLE WITH ORDER ITEMS AND COST-->
<form>
    <div class = 'table-responsive row'>
            <table class = 'product-table order-table table col'>
                <thead>
                    <tr>
                        <th scope = 'col'>Item</th>
                        <th scope = 'col'>Cost</th>
                        <th scope = 'col'>Quantity</th>
                        <th scope = 'col'>Discount (%)</th>
                        <th scope = 'col'></th>
                        <th scope = 'col'>Total</th>
                    </tr>
                </thead>
    <tbody>"; 
    if ($orderArray != null){
        foreach($orderArray as $key => $value) {
            $itemName = $orderArray[$key]["name"]; 
            $price = $orderArray[$key]["price"]; 
            $quantity = $orderArray[$key]["quantity"]; 

            echo "<tr class = 'item'>
            <td scope = 'row'>$itemName</td>
            <td class = 'price'>$price</td>
            <td>
                <input type='number' id ='quantity' name = 'quantity' value = $quantity class = 'quantity'>
            </td>
            <td>
                <input type='number' id ='discount' name = 'discount' value = 10 class = 'discount'>
            </td>
            <td>
                <input type ='button' id = 'apply' name = 'apply' value = 'APPLY' class = 'apply'>
            </td>
            <td class = 'item-total'>
                $5.84
            </td> 
            </tr> ";
        }
    }

echo "      </tbody>
        <tfoot>
            <tr>
                <td scope = 'row' colspan='3'></td>
                <td>Total before tax: </td>
                <td id = 'totalBeforeTax'>$21.20</td>
                <td></td>
            </tr>
            <tr>
                <td scope ='row' colspan='3'></td>
                <td>Delivery fee: </td>
                <td>$5.00</td>
                <td></td>
            </tr>
            <tr>
                <td scope = 'row' colspan='3'></td>
                <td>Discount (%): </td>
                <td>
                    <input type='number' id ='discount' name = 'discount'>
                </td>
                <td>
                    <input type ='button' id = 'apply' name = 'apply' value = 'APPLY'>
                </td>
            </tr>
            <tr>
                <td scope = 'row' colspan='3'></td>
                <td>Total discounts: </td>
                <td id = 'discountTotal'>-$0.65</td>
                <td></td>
            </tr>
            <tr>
                <td scope = 'row' colspan='3'></td>
                <td>Tax: </td>
                <td id = 'tax'>$3.93</td>
                <td></td>
            </tr>
            <tr>
            </tr>
            <tr>
                <td scope = 'row' colspan='3'></td>
                <th>Order Total: </th>
                <th id = 'orderTotal'>$<?php $orderTotal ?></b></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>

<!--SAVE BUTTON-->
<div class = 'd-flex justify-content-end row'> 
    <input type ='submit' id = 'save' name = 'save' value='SAVE CHANGES'>
</div>
</form>
</section>
<!--FOOTER-->
<footer><a href='index.html'>Back to Front Store</a></footer>


<!-- Bootstrap Bundle with Popper - provided by https.getbootstrap.com -->
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js' integrity='sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ' crossorigin='anonymous'></script>
</body>

</html>"; 