<?php
if(!isset($_SERVER['HTTP_REFERER'])){   // redirect unwanted user to the front store even if they enter the URL manually
    header('Location: index.php');
    exit;
}

session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags for Bootstrap, provided by https.getbootstrap.com-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
    <!-- FontAwesome CSS - for icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
    <!-- Link to icon for title -->
    <link rel="shortcut icon" href="images/KMicon.ico" />
    <!-- css for backstore.html -->
    <link rel="stylesheet" href="backstoreStyles.css" />
    <!--title to appear in tab-->
    <title>Kalamari Market: Orders List</title>
    <script type = "text/javascript" src="orderHandler/orderListener.js" async></script>
</head>

<body>
    <!--NAVIGATION BAR -->
    <nav class="nav-top" id="topbar">
        <!--first row of navigation bar-->
        <section>
            <div><a href="products.php">Products</a></div>
            <div><a href="ordersList.php">Orders</a></div>
            <div><a href="UserList.php">Users</a></div>
            <img src="images/KMicon.ico" />
        </section>
    </nav>
    <!--end of html for first row of topbar -->
    <h1>Orders List</h1>
    <?php
    if ($_SESSION['backFirstName']) {
      echo "<h6>Hello, ".$_SESSION['backFirstName']." </h6>";
    }
     ?>
    <article class="container-fluid">
        <div style="overflow-x: auto">
            <table class="product-table no-over-table" id="orders-table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Email</th>
                        <th># of Products</th>
                        <th>Total</th>
                        <th>Shipping Address</th>
                        <th>Payment Information</th>
                        <th>Change Order</th>
                    </tr>
                </thead>
                <tbody>
                <?php include 'orderHandler/loadOrders.php' ?>
                </tbody>
            </table>
        </div>

        <a href="action/loadOrderToEdit.php">
            <button class="button button1">
                Add
                <i class="fas fa-plus-square"></i>
            </button>
        </a>

        <button class="button button1" id="deleteOrderButton" type = "submit" form = "toDelete">
            Delete <i class="fas fa-trash-alt"></i>
        </button>

        <a href="#top">
            <button class="button button1">
                <i class="fas fa-arrow-up"></i>
            </button>
        </a>
    </article>

    <form id = "toDelete" method = "post" action = "action/deleteOrders.php">
        <input type = "hidden" id = "deleteIDs" name = "orders"></input>
    </form>
    <form method = 'POST' action = 'action/loadOrderToEdit.php' id = 'editOrder'>
        <input type = "hidden" id = "orderToEdit" name = "orderToEdit"></input>
    </form>
    <footer><a href="index.html">Back to Front Store</a></footer>


</body>

</html>
