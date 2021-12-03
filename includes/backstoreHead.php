<?php 
echo "<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset='UTF-8' />
    <meta http-equiv="X-UA-Compatible" content='IE=edge' />
    <meta name='viewport' content="width=device-width, initial-scale=1.0' />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel='stylesheet'
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
      crossorigin="anonymous"
    />
    <!-- FontAwesome CSS - for icons -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
      integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
      crossorigin="anonymous"
    />
    <!-- Link to icon for title -->
    <link rel="shortcut icon" href="images/KMicon.ico" />

    <link rel="stylesheet" href="frontStyles.css" />
    <title>Kalamari Market: Shopping Cart</title>
    <script src = "scripts/myCart.js" async></script>
  </head>
  <body id = "shoppingCart">
    <!-- HEADER -->
    <header class="container-fluid">
      <div class="row">
        <div class="col-md-auto">
          <img class="img-fluid" src="images/header.png" alt="KALAMARI MARKET"/>
        </div>
        <div class="col d-flex align-items-center">
          <h5>Buy Groceries Online!</h5>
        </div>
      </div>
    </header>

    <!--NAVIGATION BAR -->
    <nav class="container-fluid outlined-b outlined-t" id = "topbar">
      <!--first row of navigation bar-->
  
      <!-- only appears on small screens -->
      <section class="row pb-2 d-md-none">
        <div class = "col-3">
          <button id = "phoneBtn" class = "dropbtn"><a href="#"><i class="fas fa-bars px-1"></i></a></button> <!--menu button-->
        </div>
        <div class = "col-2">
          <button><a href="/index.html"><i class="fas fa-home px-1"></i></a></button> <!--home button-->
        </div>
        <div class = "col-2">
          <button><a href="/shoppingCart.html"><i class="fas fa-shopping-cart px-1"></i></a></button> <!--shopping cart button-->
        </div>
        <div class = "col-2">
          <button><a href="/login.html"><i class="fas fa-sign-in-alt px-1"></i></a></button> <!--sign in button-->
        </div>
        <div class = "col-2">
          <button><a href="/register.html"><i class="fas fa-user-plus px-1"></i></a></button> <!--new user button-->
        </div>
      </section>
      <!-- only appears on medium/large screens -->
      <section class = "d-none d-md-block">
        <div class = "row">
          <div class = "col-md-auto">
            <a href="/shoppingCart.html"><button>My Cart  <i class="fas fa-shopping-cart"></i></button></a> <!--shopping cart butoon-->
          </div>
          <div class= "col d-flex justify-content-center align-items-center kmbg">
          </div>
          <div class="col-md-auto d-flex justify-content-end">
            <a href="/login.html"><button>Login  <i class="fas fa-sign-in-alt"></i></button></a> <!--Login button -->
            <a href="/register.html"><button>Register <i class="fas fa-user-plus"></i></button></a> <!--Register button-->
          </div>
        </div>
      </section>
      <!--end of html for first row of topbar -->
      <!--second row of navigation, doesn't appear on small screens-->
      <section class = "d-none d-md-block">
        <div class = "row px-0 bluebg outlined-t">
          <div class = "col-md-auto">
            <a href="#" id = "compBtn" class = "dropbtn"><i class="fas fa-bars px-1"></i> AISLES</a> <!--menu button-->
          </div>
          <div class = "col">
            <a href = "/index.html"><i class="fas fa-home"></i> HOME</a> <!--home button-->
          </div>
        </div>
      </section>
  
      </nav> <!-- end of navigation-->
    
        <!-- SIDEBAR -->
      <aside class = "clickdown">
        <nav class="col-md-auto clickdown-content orangeBox" id="myDropdown">
          <ul>
            <li><a href="/produce.html">Fruits and Vegetables</a></li>
            <li><a href="/dairy.html">Dairy and Eggs</a></li>
            <li><a href="/meat.html">Meat & Poultry</a></li>
            <li><a href="/bakery.html">Bakery Products</a></li>
            <li><a href="/seafood.html">Fish & Seafood</a></li>
            <li><a href="/beverages.html">Beverages</a></li>
            <li><a href="/frozen.html">Frozen</a></li>
            <li><a href="/household.html">Household items</a></li>
          </ul>
        </nev>
      </aside>"