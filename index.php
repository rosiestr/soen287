<?php
session_start();
echo print_r($_SESSION);
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
    <!-- my css -->
    <link rel="stylesheet" href="frontStyles.css" />
    <!--title to appear in tab-->
    <title>Kalamari Market: Online Groceries</title>
  </head>

  <body>
    <!-- HEADER -->
    <header class="container-fluid">
      <div class="row">
        <div class="col-md-auto">
          <img class="img-fluid" src="images/header.png" />
        </div>
        <div class="col d-flex align-items-center">
          <?php
          if ($_SESSION['loggedFirstName']) {
          echo "<h5>Hello, ".$_SESSION['loggedFirstName']."</h5>";
          }
          elseif ($_SESSION['registeredFirstName']) {
            echo "<h5>Hello, ".$_SESSION['registeredFirstName']."</h5>";
          }
          else {
            echo "<h5>Buy Groceries Online!</h5>";
          }
           ?>
        </div>
      </div>
    </header>

    <!--NAVIGATION BAR -->
    <nav id="topbar" class="container-fluid outlined-b outlined-t">
      <!--first row of navigation bar-->

      <!-- section only appears on small screens -->
      <section class="row d-md-none">
        <div class="col-5">
          <button id="phoneBtn">
            <i class="fas fa-arrow-circle-down px-1"></i>
          </button>
        </div>
        <div class="col-2">
          <button>
            <a href="shoppingCart.php"
              ><i class="fas fa-shopping-cart px-1"></i
            ></a>
          </button>
        </div>
        <div class="col-2">
          <button>
            <a href="logout.php"><i class="fas fa-sign-in-alt px-1"></i></a>
          </button>
        </div>
      </section>
      <!-- section only appears on medium/large screens -->
      <section class="d-none d-md-block">
        <div class="row d-flex justify-content-between">
          <div class="col-4">
            <a href="shoppingCart.php"
              ><button>My Cart <i class="fas fa-shopping-cart"></i></button
            ></a>
          </div>
          <div class="col-2 kmbg">
            <!-- div backround is images/km.1.png alt = "Kalamari Market Logo"-->
          </div>
          <div class="col-4 d-flex justify-content-end">
            <a href="logout.php"
              ><button>Logout <i class="fas fa-sign-in-alt"></i></button
            ></a>
          </div>
        </div>
      </section>
      <!--end of html for first row of topbar -->

      <!--second row of navigation, doesn't appear on small screens at all-->

      <!-- section that only appears on medium screens -->
      <section class="d-none d-md-block d-lg-none">
        <div class="row px-0 bluebg outlined-t">
          <div class="col">
            <a href="produce.html"><h6>Fruits and Vegetables</h6></a>
          </div>
          <div class="col">
            <a href="dairy.html"><h6>Dairy & Eggs</h6></a>
          </div>
          <div class="col">
            <a href="meat.html"><h6>Meat & Poultry</h6></a>
          </div>
          <div class="col dropdown">
            <button>
              <h6>More Aisles<i class="fas fa-arrow-circle-down px-1"></i></h6>
            </button>
            <div class="dropdown-content orangeBox">
              <ul>
                <li><a href="bakery.html">Bakery Products</a></li>
                <li><a href="seafood.html">Fish & Seafood</a></li>
                <li><a href="beverages.html">Beverages</a></li>
                <li><a href="frozen.html">Frozen</a></li>
                <li><a href="household.html">Household items</a></li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!-- section that only appears on large screens -->
      <section class="d-none d-lg-block">
        <div class="row bluebg outlined-t px-0 pt-1">
          <div class="col">
            <a href="produce.html"><h6>Fruits & Vegetables</h6></a>
          </div>
          <div class="col">
            <a href="dairy.html"><h6>Dairy & Eggs</h6></a>
          </div>
          <div class="col">
            <a href="meat.html"><h6>Meat & Poultry</h6></a>
          </div>
          <div class="col">
            <a href="bakery.html"><h6>Bakery Products</h6></a>
          </div>
          <div class="col dropdown">
            <button>
              <h6>More Aisles<i class="fas fa-arrow-circle-down px-1"></i></h6>
            </button>
            <div class="dropdown-content orangeBox">
              <ul>
                <li><a href="seafood.html">Fish & Seafood</a></li>
                <li><a href="beverages.html">Beverages</a></li>
                <li><a href="frozen.html">Frozen</a></li>
                <li><a href="household.html">Household items</a></li>
              </ul>
            </div>
          </div>
        </div>
      </section>
    </nav>
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
    </aside>
    <!-- end of navigation-->

    <!-- ADVERTISEMENT SECTION -->
    <section class="container-fluid midimage py-3 inset-b">
      <!--section background is "images/produce.jpg" alt="Produce at a Grocery Store" -->
      <div class="row align-items-center">
        <div class="col d-flex justify-content-center">
          <h2>10% OFF FOR STUDENTS</h2>
        </div>
        <div class="w-100"></div>
        <div class="col d-flex justify-content-center">
          <p class="whitep smallp">*With valid photo student ID</p>
        </div>
      </div>
    </section>

    <!--WRAPPER-->
    <div class="container-fluid">
      <div class="row">
        <!--GRADIENT COLOR ASIDE- only shows on large screens -->
        <aside class="col-xl-1 gradientbg"></aside>
        <!--MAIN-->
        <main class="col-xl-10" id="main">
          <!--SECTION HEADER-->
          <header class="row">
            <h2>START SHOPPING NOW!</h2>
            <div class="col-sm-6 d-flex justify-content-start">
              <h5 class="gradientbg shadow-b px-3 py-2">
                Check out this week's deals!
              </h5>
            </div>
            <div class="col-sm-6 d-flex justify-content-end">
              <p class="px-3 py-2">
                VALID UNTIL: <span class = "expire-date">09/26/2021</span>
              </p>
            </div>
          </header>
          <!-- SECTION WITH DEALS -->
          <section class="row" id="deals">
            <div class="col">
              <a href="products/beef.html" target="_blank">
                <figure>
                  <img
                    src="images/Meat/beef.png"
                    class="thumbnail"
                    alt="Beef"
                  />
                  <figcaption>
                    <strike>$4.99 </strike><b>$1.99/lb </b> <br />Fresh Beef
                    Flank
                  </figcaption>
                </figure>
              </a>
            </div>
            <div class="col">
              <a href="Seafood/mussels.html" target="_blank">
                <figure>
                  <img
                    src="images/Seafood/transparent-mussel.png"
                    class="thumbnail"
                    alt="mussels"
                  />
                  <figcaption>
                    <strike>$4.79 </strike><b>$2.99/lb </b><br />
                    Fresh mussels
                  </figcaption>
                </figure>
              </a>
            </div>
            <div class="col">
              <a href="Dairy/eggs.html" target="_blank">
                <figure>
                  <img
                    src="images/Dairy/eggs.png"
                    class="thumbnail"
                    alt="Eggs"
                  />
                  <figcaption>
                    <s>$3.99 </s><b>$2.99/carton </b> <br />Brown eggs, extra
                    large
                  </figcaption>
                </figure>
              </a>
            </div>
            <div class="col">
              <a href="products/broccoli.html" target="_blank">
                <figure>
                  <img
                    src="images/Produce/broccoli.png"
                    class="thumbnail"
                    alt="Broccoli"
                  />
                  <figcaption>
                    <strike>$2.39 </strike><b>$1.99 ea.</b><br />
                    Broccoli
                  </figcaption>
                </figure>
              </a>
            </div>
            <div class="col">
              <a href="products/lime.html" target="_blank">
                <figure>
                  <img
                    src="images/Produce/lime2.jpg"
                    class="thumbnail"
                    alt="Lime"
                  />
                  <figcaption>
                    <strike>$0.99 </strike><b>$0.49 ea. </b><br />
                    Lime
                  </figcaption>
                </figure>
              </a>
            </div>
            <div class="col">
              <a href="/Dairy/cheese.html" target="_blank">
                <figure>
                  <img
                    src="images/Dairy/cheese.png"
                    class="thumbnail"
                    alt="Cheese"
                  />
                  <figcaption>
                    <strike>$6.99 </strike><b>$4.99/lb </b><br />
                    Australian Swiss Cheese
                  </figcaption>
                </figure>
              </a>
            </div>
            <div class="col">
              <a href="/Dairy/bococcini.html" target="_blank">
                <figure>
                  <img
                    src="images/Dairy/bococcini.jpg"
                    class="thumbnail"
                    alt="Bocconcini"
                  />
                  <figcaption>
                    <strike>$3.99 </strike><b>$2.99/ea.</b><br />
                    Cocktail Bocconcini, Saputo, 300g
                  </figcaption>
                </figure>
              </a>
            </div>
            <div class="col">
              <a href="/Dairy/yogurt.html" target="_blank">
                <figure>
                  <img
                    src="images/Dairy/yogurtVanilla.jpg"
                    class="thumbnail"
                    alt=" Yogurt"
                  />
                  <figcaption>
                    <strike>$3.49 </strike><b>$1.99/ea.</b><br />
                    Activia Yogurt, 946g
                  </figcaption>
                </figure>
              </a>
            </div>
            <div class="col">
              <a href="products/iceCreamSandwich.html"
                target="_blank">
                <figure>
                  <img
                    src="images/Frozen/iceCreamSandwich.jpg"
                    class="thumbnail"
                    alt="Ice Cream Sandwich"/>
                </figure>
                <figcaption>
                  <s>$6.99 </s><b>$4.99 ea.</b> 12 X 120G<br />CHAPMAN'S Vanilla
                  Super Ice Cream Sandwiches
                </figcaption>
              </a>
            </div>
            <div class = "col">
              <a href = "houseHold/broom.html" target="_blank">
                <figure>
                  <img src = "images/Household/broom.jpg" class = "thumbnail" alt="Broom"></figure>
                  <figcaption><strike>$20.99 </strike> <b>$15.99 ea.</b><br> Broom </figcaption>
              </a>
            </div>

          </section>
          <!-- end of deals section -->
          <!--ADVERTISEMENT SECTION-->
          <section class="row pb-2">
            <div class="col-sm-6 pt-2">
              <img
                src="images/kalamariAdOne.jpg"
                class="img-fluid"
                alt="Free Delivery AD"
              />
            </div>
            <div class="col-sm-6 pt-2">
              <a href="seafood.hmtl">
                <img
                  src="images/kalamariAdTwo.jpg"
                  class="img-fluid"
                  alt="Seafood AD"
                />
              </a>
            </div>
          </section>
        </main>
        <!--GRADIENT COLOR ASIDE- only shows on large screen -->
        <aside class="col-xl-1 gradientbg"></aside>
      </div>
    </div>

    <!-- STICKY FOOTER -->
    <footer>
      <div class="outlined-t outlined-b greybg px-3" id="footer">
        <a href="contact.html"
          ><i class="fas fa-phone-square"></i> Contact Us&nbsp&nbsp
        </a>
        <a href="map.html"><i class="fas fa-map-pin"></i> Find a Store</a>
      </div>
    </footer>
    <!-- BOTTOM OF PAGE -->
    <div class="outlined-t px-2" id="bottom">
      <!--table with hours-->
      <table class="smallp">
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

    <!--end of footer -->

    <script>
      // Get the button, and when the user clicks on it, execute myFunction
      document.getElementById("phoneBtn").onclick = function () {
        dropContent();
      };
      /* dropContent toggles between adding and removing the "show" class, which is used to hide and show the dropdown content */
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
