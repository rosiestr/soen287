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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <!-- FontAwesome CSS - for icons -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <!-- Link to icon for title -->
  <link rel="shortcut icon" href="images/KMicon.ico" />
  <!-- css for backstore.html -->
  <link rel="stylesheet" href="backstoreStyles.css">
  <!--title to appear in tab-->
  <title>Kalamari Market</title>
</head>
<body>
  <!--NAVIGATION BAR -->
  <nav class="nav-top" id = "topbar">
    <!--first row of navigation bar-->
    <section>
        <div><a href="products.php">Products</a></div>
        <div><a href="ordersList.php">Orders</a></div>
        <div><a href="UserList.php">Users</a></div>
        <img src="images/KMicon.ico">
    </section>
  </nav>
    <!--end of html for first row of topbar -->
<main>
    <h1>Edit Product</h1>
    <?php
    if ($_SESSION['backFirstName']) {
      echo "<h6>Hello, ".$_SESSION['backFirstName']." </h6>";
    }
     ?>
        <form class="product-form" method = 'post' action = 'updateProductInJSON.php' name = 'updateProductInfo'>
            <?php include 'action/loadOrderToEdit.php' ?>
    </form>
    <div class="button-bar">
        <a href="#">
            <button class="button button1">Save <i class="far fa-save"></i></button>  
    </div>
</main>

<footer><a href="index.html">Back to Front Store</a></footer>
</body>
</html>
