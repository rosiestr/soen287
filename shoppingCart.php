<?php 
    include_once 'includes/dbh.inc.php';
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
    <link rel="shortcut icon" href="images/KMicon.ico" />

    <link rel="stylesheet" href="frontStyles.css" />
    <title>Kalamari Market: Shopping Cart</title>
    <script src = "http://localhost/kalamari/myCart.js" async></script>
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
      </aside>
    <br />
    <h2 class="cartHeader">MY CART</h2>
    <!-- <hr /> -->
    <!-- MAIN -->
    <main class="my-cart-main container-fluid">
      <div class = "row">
        <section class = "wrapper col-sm-6">
          <div class = "shoppingCart"> 
            <ul class = "cart-item-container">
              <!-- <li class = "item">
                <figure>
                <img
                  src="/images/Frozen/iceCreamSandwich.jpg"
                  alt="Ice Cream Sandwich"              
                  class="cartIMG"
                />
                <figcaption class = "item-name">CHAPMAN'S Vanilla Super Ice Cream Sandwiches</figcaption>
                </figure>
                <div class = "item-price-times"> 
                  <div class = "cart-quantity-change">
                    <button class = "minus-cart-quantity"><i class="fas fa-minus"></i></button>
                    <button class = "plus-cart-quantity"><i class="fas fa-plus"></i></button> 
                    <button class = "cart-item-quantity">1</button>
                  </div>
                  <span class = "type-of-quantity"></span>  x
                  <span class = "price">$5.99</span>   
                </div>
                <div class = "item-row">
                <p class = "item-total-col">Item Total: <span class="item-total"></span></p>              
                <button class = "remove-btn">Delete Item</button>
                </div>
                <hr>
              </li>

            <li class = "item">
              <figure>
              <img
                src="/images/Dairy/eggs.png"
                alt="Eggs"              
                class="cartIMG"/>
              <figcaption class = "item-name">Brown Eggs, Extra Large</figcaption>
              </figure>
              <div class = "item-price-times"> 
                <div class = "cart-quantity-change">
                  <button class = "minus-cart-quantity"><i class="fas fa-minus"></i></button>
                  <button class = "plus-cart-quantity"><i class="fas fa-plus"></i></button> 
                  <button class = "cart-item-quantity">1</button>
                </div>
                <span class = "type-of-quantity"></span>  x
                <span class = "price">2.99$</span> 
              </div>
              <div class = "item-row">
              <p class = "item-total-col">Item Total: <span class="item-total"></span></p>               
              <button class = "remove-btn">Delete Item</button>
              
              </div>
              <hr/>
            </li>

              <li class = "item">
                <figure>
                  <img
                  src="/images/Produce/banana.png"
                  alt="Banana"
                  class="cartIMG"
                />
                <figcaption class = "item-name">Bananas</figcaption>
                </figure>
                <div class = "item-price-times"> 
                  <div class = "cart-quantity-change">
                    <button class = "minus-cart-quantity"><i class="fas fa-minus"></i></button>
                    <button class = "plus-cart-quantity"><i class="fas fa-plus"></i></button> 
                    <button class = "cart-item-quantity">1</button>
                  </div>
                  <span class = "type-of-quantity">lbs</span>x
                  <span class = "price">$2.99</span> 
                </div>
                <div class = "item-row">
                  <p class = "item-total-col">Item Total: <span class="item-total"></span></p>              
                  <button class = "remove-btn">Delete Item</button>
                </div>
                <hr />
              </li>

              <li class = "item">
                <figure>
                <img
                  src="/images/Dairy/milk.jpeg"
                  alt="milk"
                  class="cartIMG"/>
                <figcaption class = "item-name">1% Milk 2L</figcaption>
                </figure>
                <div class = "item-price-times"> 
                  <div class = "cart-quantity-change">
                    <button class = "minus-cart-quantity"><i class="fas fa-minus"></i></button>
                    <button class = "plus-cart-quantity"><i class="fas fa-plus"></i></button> 
                    <button class = "cart-item-quantity">1</button>
                  </div>
                  <span class = "type-of-quantity"></span>x
                  <span class = "price">$3.99</span> 
                </div>
                <div class = "item-row">
                  <p class = "item-total-col">Item Total: <span class="item-total"></span></p>              
                  <button class = "remove-btn">Delete Item</button>
                </div>
              </li>

              <li class = "item">
                <figure>
                <img
                  src="/images/Meat/beef.png"
                  alt="Beef"
                  class="cartIMG"
                /> 
                <figcaption class = "item-name">Fresh Beef Flank</figcaption> 
                </figure>
                <div class = "item-price-times"> 
                  <div class = "cart-quantity-change">
                    <button class = "minus-cart-quantity"><i class="fas fa-minus"></i></button>
                    <button class = "plus-cart-quantity"><i class="fas fa-plus"></i></button> 
                    <button class = "cart-item-quantity">1</button>
                  </div> 
                  <span class = "type-of-quantity">lbs</span> x
                  <span class = "price">$2.99</span> 
                </div>
                <div class = "item-row">
                <p class = "item-total-col">Item Total: <span class="item-total"></span> </p>             
                <button class = "remove-btn">Delete Item</button>
                </div>
              </li> -->
            </ul>
          </div> 
        </section>     
        <section class="wrapper col-sm-6">
          <div class="summary">
            <h5 class="summaryHeader">SUMMARY</h5>
            <br />
            <p>Number of items: <span class="numOfItems">5</span></p>
            <p>
              Subtotal: <span class="cart-subtotal price"><strong>$18.71</strong></span>
            </p>
            <p>Delivery Fee:<span class="cart-delivery price">$4.00</span></p>
            <p>QST:<span class="cart-qst price">$2.27</span></p>
            <p>GST:<span class="cart-gst price">$1.14</span></p>
            <p>
              Total: <span class="cart-total price"><strong>$26.12</strong></span>
            </p>
            <button type = "submit" form = "order-details" class="checkout_B"onclick="checkoutMsg()">CHECKOUT</button>
            <a href = "/index.html"><button class="cont-shopping">CONTINUE SHOPPING</button></a>
          </div>
        </section>
      
        <section class = "cart-empty"> 
            <p>Your cart is empty!</p> 
            <a href = "/index.html"><button>Continue Shopping</button></a>   
          </div>
        </section>
      </div>
    </main>
    <form id = "order-details" method="post" action="action/saveOrder.php"> 
      <input type = "hidden" name = "order-items" class = "order-items"> 
      <input type = "hidden" name = "order-total" class = "order-total"> 
    </form>
    <br> 
    <!-- STICKY FOOTER-->
    <footer> 
      <div class = "outlined-t outlined-b greybg px-3">
        <a href = "/contact.html"><i class="fas fa-phone-square"></i>  Contact Us&nbsp&nbsp   </a> <!--Contact button-->
        <a href = "/map.html"><i class="fas fa-map-pin"></i> Find a Store</a> <!-- map pin button -->
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
        //document.getElementById("checkout-btn").onclick= function(){checkoutMsg()};
    
        /* myFunction toggles between adding and removing the show class, which is used to hide and show the dropdown content */
        function dropContent() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
        // function checkoutMsg(){
        //   // var buttonClicked = event.target;
        //   //var checkoutButton = document.getElementsByClassName('checkout-btn');
        //   alert("Thank you for shopping with Kalamari Market!");
    
        // }
        //button.addEventListener('click',checkoutMsg);

    </script>

    <!-- Bootstrap Bundle with Popper - provided by https.getbootstrap.com -->
    <!-- <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
      crossorigin="anonymous"
    ></script> --> 
  </body>
</html>
