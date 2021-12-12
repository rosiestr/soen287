<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
    <link rel="shortcut icon" href="../images/KMicon.ico" />

    <link rel="stylesheet" href="../frontStyles.css" />
    <script src = "../description.js" async></script>
    <script src = "../propertiesChange.js" async></script>
    <script src = "../products/addToCart.js" async></script>

    <title>Live Lobster</title>
  </head>
  <body>
    <!-- HEADER -->
    <header class="container-fluid">
      <div class="row">
        <div class="col-md-auto">
          <img class="img-fluid" src="../images/header.png" alt = "KALAMARI MARKET"/>
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

    <!--NAVIGATION BAR -->
    <nav class="container-fluid outlined-b outlined-t" id = "topbar">
      <!--first row of navigation bar-->

      <!-- only appears on small screens -->
      <section class="row pb-2 d-md-none">
        <div class = "col-3">
          <button id = "phoneBtn" class = "dropbtn"><a href="#"><i class="fas fa-bars px-1"></i></a></button> <!--menu button-->
        </div>
        <div class = "col-2">
          <button><a href="../index.php"><i class="fas fa-home px-1"></i></a></button> <!--home button-->
        </div>
        <div class = "col-2">
          <button><a href="../shoppingCart.php"><i class="fas fa-shopping-cart px-1"></i></a></button> <!--shopping cart button-->
        </div>
        <div class = "col-2">
          <button><a href="../logout.php"><i class="fas fa-sign-in-alt px-1"></i></a></button> <!--sign in button-->
        </div>
      </section>
      <!-- only appears on medium/large screens -->
      <section class = "d-none d-md-block">
        <div class = "row">
          <div class = "col-md-auto">
            <a href="../shoppingCart.php"><button>My Cart  <i class="fas fa-shopping-cart"></i></button></a> <!--shopping cart butoon-->
          </div>
          <div class= "col d-flex justify-content-center align-items-center kmbg">
          </div>
          <div class="col-md-auto d-flex justify-content-end">
            <a href="../logout.php"><button>Logout  <i class="fas fa-sign-in-alt"></i></button></a> <!--Login button -->
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
            <a href = "../index.php"><i class="fas fa-home"></i> HOME</a> <!--home button-->
          </div>
        </div>
      </section>

    </nav> <!-- end of navigation-->

      <!-- SIDEBAR -->
      <aside class = "clickdown">
        <nav class="col-md-auto clickdown-content orangeBox" id="myDropdown">
          <ul>
            <li><a href="../produce.php">Fruits and Vegetables</a></li>
            <li><a href="../dairy.php">Dairy and Eggs</a></li>
            <li><a href="../meat.php">Meat & Poultry</a></li>
            <li><a href="../bakery.php">Bakery Products</a></li>
            <li><a href="../seafood.php">Fish & Seafood</a></li>
            <li><a href="../beverages.php">Beverages</a></li>
            <li><a href="../frozen.php">Frozen</a></li>
            <li><a href="../household.php">Household items</a></li>
          </ul>
        </nev>
      </aside>
    </aside>
    <article class="container-fluid">
      <div class = "row">
        <section class = "col-sm-6 d-flex align-items-center">
          <img
        src="../images/Seafood/lobster.jpeg"
        alt="Lobster"
        height="550"
        class="img-fluid"
      />
    </section>
    <section class="col-sm-6">
        <h3>Live Lobster</h3>
        <p>
          <strong style="font-size: larger">$22.99 avg. ea.</strong>
          <br>1-1.25lb
        </p>
        <hr />
        <p>
          Live lobsters of various sizes and types imported from a wide range of
          locations for your gourmet dinners
        </p>
        <p>Curbside pickup eligible</p>
        <p>Free standard shipping</p>
        <button class="description" onclick="loadDescription()">
          <img src="../images/desc.png" alt="list" width="18" />
          More Description
        </button>
        <div id="expandDesc" style="display: none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </div>
        <br />
        <br />
        <form action="/action_page.php">
          <label for="quantity">Enter Desired Quantity :</label><br />
          <input type="text" value="" name="QTY" id="QTY" onKeyUp="calculate()"/>
          <br />
          <label for="size"></label><br />
          <select name="sizes" class="selects" id="select1">
            <option value="none">Select Size</option>
            <option value="small">Small</option>
            <option value="medium">Medium</option>
            <option value="large">Large</option>
          </select>
          <br /><br />
          <label for="types"></label><br />
          <select name="types" class="selects" id="select2">
            <option value="none">Select Type</option>
            <option value="warm">Warm Water Lobster</option>
            <option value="cold">Cold Water Lobster</option>
          </select>
        </form>
        <br />
        <label for="subtotal">Subtotal :</label><br>
        <input type="hidden" name="PPRICE" id="PPRICE" value="22.99" disabled/>
        <input type="text" name="TOTAL" id="TOTAL" readonly/>

        <br /><br>
        <label>Get this item with your grocery order:</label>
        <button class="cart">Add To Cart</button>
        <br /><br /><br />
      </section>
      </div>
    </article>
    <!-- STICKY FOOTER-->
    <footer>
      <div class = "outlined-t outlined-b greybg px-3">
        <a href = "../contact.php"><i class="fas fa-phone-square"></i>  Contact Us&nbsp&nbsp   </a> <!--Contact button-->
        <a href = "../map.php"><i class="fas fa-map-pin"></i> Find a Store</a> <!-- map pin button -->
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

    <!-- Javascript for Refresh page  -->
    <script src="../refresh.js" charset="utf-8"></script>

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
