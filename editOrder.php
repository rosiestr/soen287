<!DOCTYPE HTML>
<html>
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
    <!-- css for index.html -->
    <link rel="stylesheet" href="backstoreStyles.css">
    <script src="orderHandler/editOrder.js" async></script>
    <!--title to appear in tab-->
    <title>Edit Order</title> 
</head>
<body id = "editOrder">

    <!--NAVIGATION BAR -->
    <nav class="nav-top pb-2" id = "topbar">
        <!--first row of navigation bar-->
        <section>
            <div><a href="products.php">Products</a></div>
            <div><a href="/ordersList.php">Orders</a></div>
            <div><a href="UserList.php">Users</a></div>
            <img src="images/KMicon.ico">
        </section>
    </nav>
    <!--HEADER-->
    <h1>Edit Order</h1>
    <!--MAIN-->
    <section class = "container d-flex justify-content-center py-3 bluebg">
        <!--CUSTOMER INFO AND SHIPPING FIELDS-->
        <form> 
            <?php include 'action/loadOrderToEdit.php' ?> 
            
            <!--SAVE BUTTON-->
            <div class = "d-flex justify-content-end row"> 
                <input type ="submit" id = "save" name = "save" value="SAVE CHANGES">
            </div>
        </form>
    </section>
    <!--FOOTER-->
    <footer><a href="index.html">Back to Front Store</a></footer>
    

    <!-- Bootstrap Bundle with Popper - provided by https.getbootstrap.com -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>
