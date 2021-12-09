<?php session_start();
print_r($_SESSION);
if (isset($_SESSION["loggedEmail"])) {
  $email = $_SESSION["loggedEmail"];
  } 
  else $email = "unknown"; 
include 'includes/frontstoreHead.php'?>
<title>Kalamari Market: Shopping Cart</title>
    <script src = 'scripts/myCart.js' async></script>
  </head>
  <body id = 'shoppingCart'>
    <?php include 'includes/frontstoreNav.php'?>
    <br />
    <h2 class="cartHeader">MY CART</h2>
    <!-- <hr /> -->
    <!-- MAIN -->
    <main class="my-cart-main container-fluid">
      <div class = "row">
        <section class = "wrapper col-sm-6">
          <div class = "shoppingCart"> 
            <ul class = "cart-item-container">
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
            <button type = "submit" form = "order-details" class="checkout_B" onclick="checkoutMsg()">CHECKOUT</button>
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
    <form id = "order-details" method="post" action="action/saveOrderToXML.php"> 
      <input type = "hidden" name = "order-items" class = "order-items" value = "test" id = "order-items-saved"> 
      <input type = "hidden" name = "order-total" class = "order-total" value = "test" id = "order-total-saved"> 
      <input type = "hidden" name = "user-email" class = "user-email" value = <?php echo $email ?> > 
      <?php echo $email ?>
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
  </body>
</html>
