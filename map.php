<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags for Bootstrap, provided by https.getbootstrap.com-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
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
    <!-- css for index.html -->
    <link rel="stylesheet" href="frontStyles.css" />
    <!--title to appear in tab-->
    <title>Kalamari Market: Locations</title>
  </head>

  <body>
    <!-- HEADER -->
    <header class="container-fluid">
      <!--container that fills width of page-->
      <div class="row">
        <div class="col-md-auto">
          <!--column width is size of its contents-->
          <img class="img-fluid" src="images/header.png" alt = "KALAMARI MARKET"/>
        </div>
        <div class="col d-flex align-items-center">
          <?php
          if (isset($_COOKIE['loggedFirstName'])) {
          echo "<h5>Hello, ".$_COOKIE['loggedFirstName']."</h5>";
          }
          else {
            echo "<h5>Buy Groceries Online!</h5>";
          }
           ?>
        </div>
      </div>
    </header>
    <!--NAVIGATION-->
    <nav class="container-fluid outlined-b outlined-t" id = "topbar">
      <!--first row of navigation bar-->

      <!-- only appears on small screens -->
      <section class="row pb-2 d-md-none">
          <div class = "col-3">
              <button id = "phoneBtn" class = "dropbtn"><a href="#"><i class="fas fa-bars px-1"></i></a></button> <!--menu button-->
          </div>
          <div class = "col-2">
              <button><a href="index.php"><i class="fas fa-home px-1"></i></a></button> <!--home button-->
          </div>
          <div class = "col-2">
              <button><a href="shoppingCart.php"><i class="fas fa-shopping-cart px-1"></i></a></button> <!--shopping cart button-->
          </div>
          <div class = "col-2">
              <button><a href="logout.php"><i class="fas fa-sign-in-alt px-1"></i></a></button> <!--sign in button-->
          </div>
      </section>
      <!-- only appears on medium/large screens -->
      <section class = "d-none d-md-block">
          <div class = "row">
              <div class = "col-md-auto">
              <a href="shoppingCart.php"><button>My Cart  <i class="fas fa-shopping-cart"></i></button></a> <!--shopping cart butoon-->
              </div>
              <div class= "col d-flex justify-content-center align-items-center">
              <h4>MEAT & POULTRY</h4>
              </div>
              <div class="col-md-auto d-flex justify-content-end">
              <a href="logout.php"><button>Logout  <i class="fas fa-sign-in-alt"></i></button></a> <!--Login button -->
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
            <a href = "index.php"><i class="fas fa-home"></i> HOME</a> <!--home button-->
          </div>
        </div>
      </section>

    </nav> <!-- end of navigation-->

    <!-- SIDEBAR -->
    <aside class = "clickdown">
      <nav class="col-md-auto clickdown-content orangeBox" id="myDropdown">
        <ul>
            <li><a href="produce.php">Fruits and Vegetables</a></li>
            <li><a href="dairy.php">Dairy and Eggs</a></li>
            <li><a href="meat.php">Meat & Poultry</a></li>
            <li><a href="bakery.php">Bakery Products</a></li>
            <li><a href="seafood.php">Fish & Seafood</a></li>
            <li><a href="beverages.php">Beverages</a></li>
            <li><a href="frozen.php">Frozen</a></li>
            <li><a href="household.php">Household items</a></li>
        </ul>
      </nev>
    </aside>

    <!--WRAPPER-->
    <section class="container-fluid">
      <div class="row">
        <aside class="col-xl-1 gradientbg"></aside>
        <!-- MAIN -->
        <main class="col-xl-10 d-flex justify-content-center py-5">
          <!--Once we make our site dynamic, I want to try to put in a maps API-->
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3030.1591538028056!2d22.94827381469676!3d40.58224225348183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14a83ed8e27f5757%3A0x7ed15a51b436d96a!2sMARKET%20IN!5e0!3m2!1sen!2sca!4v1633200735051!5m2!1sen!2sca"
            width="600"
            height="450"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
          >
          </iframe>
        </main>
        <!--end of main content-->
        <aside class="col-xl-1 gradientbg"></aside>
      </div>
    </section>

    <!-- STICKY FOOTER-->
    <footer>
      <div class = "outlined-t outlined-b greybg px-3">
        <a href = "/contact.php"><i class="fas fa-phone-square"></i>  Contact Us&nbsp&nbsp   </a> <!--Contact button-->
        <a href = "/map.php"><i class="fas fa-map-pin"></i> Find a Store</a> <!-- map pin button -->
      </div>
    </footer>
    <!--end of sticky footer -->
    <!-- BOTTOM OF PAGE -->
    <div class = "outlined-t inset-b smallp px-2" id = "bottom">
    <!--table with hours-->
        <table>
            <tr>
                <th>Hours</th>
                <th></th>
            </tr>
            <tr>
                <td>Monday</td>
                <td>7AM - 10PM</td>
            </tr>
            <tr>
                <td>Tuesday</td>
                <td>7AM - 10PM</td>
            </tr>
            <tr>
                <td>Wednesday</td>
                <td>7AM - 10PM</td>
            </tr>
            <tr>
                <td>Thursday</td>
                <td>8AM - 11PM</td>
            </tr>
            <tr>
                <td>Friday</td>
                <td>8AM - 11PM</td>
            </tr>
            <tr>
                <td>Saturday</td>
                <td>9AM - 10PM</td>
            </tr>
            <tr>
                <td>Sunday</td>
                <td>9AM - 9PM</td>
            </tr>
        </table>
    </div>


    <script>
        // Get the button, and when the user clicks on it, execute myFunction
        document.getElementById("phoneBtn").onclick = function() {dropContent()};
        document.getElementById("compBtn").onclick = function() {dropContent()};

        /* myFunction toggles between adding and removing the show class, which is used to hide and show the dropdown content */
        function dropContent() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
    </script>

    <!-- Bootstrap Bundle with Popper - provided by https.getbootstrap.com -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
