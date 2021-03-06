<?php
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
  <!-- css for index.html -->
  <link rel="stylesheet" href="frontStyles.css">
  <!--title to appear in tab-->
  <title>Kalamari Market: Fruits and Vegetables</title>
</head>

<body>
  <!-- HEADER -->
  <header class="container-fluid"> <!--container that fills width of page-->
    <div class="row">
      <div class="col-md-auto"> <!--column width is size of its contents-->
        <img class = "img-fluid" src = "images/header.png" alt = "KALAMARI MARKET">
      </div>
      <div class = "col d-flex align-items-center">
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
  <!--NAVIGATION BAR-->
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
          <h4>FRUITS AND VEGETABLES</h4> <!--Aisle section title -->
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


  <!-- MAIN -->
  <div class="container-fluid">
    <div class="row">
      <!--gradient color aside - only shows on large screens -->
      <aside class="col-xl-1 gradientbg"></aside>
      <main class = "col-xl-10" id = "main">
      <!-- Aisle title to appear on small screens -->
        <header class = "d-md-none d-flex justify-content-center outlined-tb mt-1">
          <h5>Fruits & Vegetables</h5>
        </header>
        <!-- Aisle subsection - fruits -->
        <section class = "row" id = "#fruits">
          <h4>Fruits</h4>
          <div class = "col" id = "applesAndPears">
            <a href = "products/appleBag.php" target="_blank">
              <figure>
                <img src = "images/Produce/apples.png" class = "thumbnail" alt = "Apple Bag">
              </figure>
              <figcaption><b>$4.99 ea.</b> (approx. 600g)<br> Apples, Granny Smith</figcaption>
            </a>
          </div>
          <div class = "col">
            <a href = "products/appleFuji.php" target="_blank">
              <figure>
                <img src = "images/Produce/appleFuji.png" class = "thumbnail" alt = "Fuji Apple">
              </figure>
              <figcaption><b>$.89 ea.</b><br> Apple, Fuji</figcaption>
            </a>
          </div>
          <div class = "col">
            <a href = "products/appleRedDelicious.php" target="_blank">
              <figure>
                <img src = "images/Produce/appleRedDelicious.png" class = "thumbnail" alt = "Red Delicious Apple">
              </figure>
              <figcaption><b>$.99 ea.</b><br> Apple, Red Delicious</figcaption>
            </a>
          </div>
          <div class = "col">
            <a href = "products/bartlettPear.php" target="_blank">
              <figure>
                <img src = "images/Produce/pear.png" class = "thumbnail" alt = "Bartlett Pear">
              </figure>
              <figcaption><b>$0.95 ea.</b><br>Bartlett Pear</figcaption>
            </a>
          </div>
          <div class = "col">
            <a href = "products/navelOrange.php" target="_blank">
              <figure>
                <img src = "images/Produce/orange.jpg" class = "thumbnail" alt = "Navel Orange">
              </figure>
              <figcaption><b>$0.69 ea.</b><br> Orange, Navel</figcaption>
            </a>
          </div>
          <div class = "col">
            <a href = "products/bloodOrange.php" target="_blank">
              <figure>
                <img src = "images/Produce/bloodOrange.jpg" class = "thumbnail" alt = "Blood Orange">
              </figure>
              <figcaption><b>$0.99 ea.</b><br> Orange, Blood Orange</figcaption>
            </a>
          </div>
          <div class = "col">
            <a href = "products/lemonBag.php" target="_blank">
              <figure>
                <img src = "images/Produce/lemons.png" class = "thumbnail" alt = "Lemons">
              </figure>
              <figcaption><b>$4.99 ea. </b><br> Lemons, bag of 6</figcaption>
            </a>
          </div>
          <div class = "col">
            <a href = "products/lime.php" target="_blank">
              <figure>
                <p>ON SALE</p>
                <img src = "images/Produce/lime2.jpg" class = "thumbnail" alt = "Lime">
              </figure>
              <figcaption><b>$0.49 ea.</b><br> Lime</figcaption>
            </a>
          </div>
          <div class = "col">
            <a href = "products/grapefruit.php" target="_blank">
              <figure>
                <img src = "images/Produce/grapefruit.png" class = "thumbnail" alt = "Grapefruit">
              </figure>
              <figcaption><b>$0.99 ea.</b><br> Grapefruit</figcaption>
            </a>
          </div>
          <div class = "col">
            <a href = "products/banana.php" target="_blank">
              <figure>
                <img src = "images/Produce/banana.png" class = "thumbnail" alt = "Banana"></figure>
                <figcaption><b>$0.59/lb</b><br> Banana</figcaption>
            </a>
          </div>
        </section> <!--end of fruits section -->

        <!-- Aisle subsection - Vegetables -->
        <section class = "row" id = "vegetables">
          <h4>Vegetables</h4>
          <div class = "col" id = "tomato">
            <a href = "products/tomatos.php" target="_blank">
              <figure>
                <img src = "images/Produce/tomato.png" class = "thumbnail" alt = "Tomatoes">
              </figure>
              <figcaption><b>$.69/lb</b><br> Tomatoes on the vine</figcaption>
            </a>
          </div>
          <div class = "col" id = "roots">
            <a href = "products/carrots.php" target="_blank">
              <figure>
                <img src = "images/Produce/carrot.png" class = "thumbnail" alt = "Carrots">
              </figure>
              <figcaption><b>$2.99 ea.</b> (approx. 400g) <br> Carrots</figcaption>
            </a>
          </div>
          <div class = "col" id = "broccoli">
            <a href = "products/broccoli.php" target="_blank">
              <figure>
                <p>ON SALE</p>
                <img src = "images/Produce/broccoli.png" class = "thumbnail" alt = "Broccoli"></figure>
              <figcaption><b>$1.99 ea.</b><br> Broccoli</figcaption>
            </a>
          </div>
          <div class = "col">
            <a href = "products/garlicHead.php" target="_blank">
              <figure>
                <img src = "images/Produce/garlicHead.png" class = "thumbnail" alt = "Broccoli">
              </figure>
              <figcaption><b>0.89 ea.</b><br> Garlic head</figcaption>
            </a>
          </div>
          <div class = "col">
            <a href = "products/shallot.php" target="_blank">
              <figure>
                <img src = "images/Produce/shallot.jpg" class = "thumbnail" alt = "Shallot">
              </figure>
              <figcaption><b>1.19 ea.</b><br> Shallot, french</figcaption>
            </a>
          </div>
          <div class = "col">
            <a href = "products/yellowOnion.php" target="_blank">
              <figure>
                <img src = "images/Produce/onion.jpg" class = "thumbnail" alt = "Onion">
              </figure>
              <figcaption><b>1.09 ea.</b><br> Onion, yellow</figcaption>
            </a>
          </div>
          <div class = "col">
            <a href = "products/redOnion.php" target="_blank">
              <figure>
                <img src = "images/Produce/redOnion.jpg" class = "thumbnail" alt = "Red Onion">
              </figure>
              <figcaption><b>1.19 ea.</b><br> Onion, red</figcaption>
            </a>
          </div>
        </section> <!-- end of vegetables section -->
        <a href = "#top"><button><i class = "fas fa-arrow-up"></i></button></a> <!-- button to return to top of page-->
      </main> <!--end of main body content-->
      <!--gradient color aside - only shows on large screens -->
      <aside class="col-xl-1 gradientbg"></aside>
    </div>
  </div>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
