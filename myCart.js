//if document is still loading, wait until buttons are ready before running program
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
}
//else start program
else {
    ready();
}

//ready function
function ready() {
    //load saved date from local storage 
    loadItemsFromStorage(); 

    //NOT PERMANENT, just for testing (until add to cart buttons are programed)
    if (checkCartEmpty()) {
        if (confirm("Would you like to add default items to cart?")) {
            addCartItem("CHAPMAN'S Vanilla Super Ice Cream Sandwiches", 1, "$5.99", "/images/Frozen/iceCreamSandwich.jpg")
            addCartItem("Brown Eggs, Extra Large", 1, "$2.88", "/images/Dairy/eggs.png")
            addCartItem("Bananas", 1, "$2.99", "/images/Produce/banana.png")
            addCartItem("1% Milk 2L", 1, "$3.99", "/images/Dairy/milk.jpeg")
            addCartItem("Fresh Beef Flank", 1, "$2.99", "/images/Meat/beef.png")
            document.getElementsByClassName('summary')[0].classList.toggle('hide');
            //show the hidden cart empty section
            document.getElementsByClassName('cart-empty')[0].classList.toggle('show-flex');
        }
    }
    updateCartTotal();

    //get an array of all the delete item buttons
    let removeCartItemButtons = document.getElementsByClassName('remove-btn');
    //loop through the array
    for (let i = 0; i < removeCartItemButtons.length; i++) {
        /*Add a 'click' event listener for each button that runs the removeCartItem function every
        time a 'delete item' button is clicked*/
        let button = removeCartItemButtons[i];
        button.addEventListener('click', removeCartItem)
    }

    let quantityPlusButtons = document.getElementsByClassName('plus-cart-quantity');
    for (let i = 0; i < quantityPlusButtons.length; i++) {
        let plus = quantityPlusButtons[i];
        plus.addEventListener('click', quantityAddOne);
    }
    let quantityMinusButtons = document.getElementsByClassName('minus-cart-quantity');
    for (let i = 0; i < quantityMinusButtons.length; i++) {
        let minus = quantityMinusButtons[i];
        minus.addEventListener('click', quantitySubtractOne);
    }
    saveItemsToStorage();
}

//removeCartItem function
function removeCartItem(event) {
    //when a button is clicked, remove it's grandparent element (which is the item row)
    let buttonClicked = event.target;
    buttonClicked.parentElement.parentElement.remove();
    //run the updateCartTotal function
    updateCartTotal();
    saveItemsToStorage();
    //run the checkCartEmpty function
    checkCartEmpty();    
}

//Function to add one quantity 
function quantityAddOne(event) {
    //get the clicked button's grandparent 
    let item = event.target.parentElement.parentElement;
    //get the quantity 
    let quantityElement = item.getElementsByClassName('cart-item-quantity')[0];
    let quantity = parseFloat(quantityElement.innerText);
    //change the quantity 
    if (isNaN(quantity)) {
        quantity = 1
    }
    else {
        quantity++
    }
    //set the quantity 
    quantityElement.innerText = quantity
    //set it to storage 
    saveItemsToStorage();
    //update cart total 
    updateCartTotal();
}
//Function to subtract one quantity 
function quantitySubtractOne(event) {
    //get the clicked button's grandparent 
    let item = event.target.parentElement.parentElement;
    //get the quantity 
    let quantityElement = item.getElementsByClassName('cart-item-quantity')[0];
    let quantity = parseFloat(quantityElement.innerText);
    
    //change the quantity 
    if (isNaN(quantity)) {
        quantity = 1;
    }
    quantity--;
    if (quantity <= 0) {
        quantity = 1; 
    }
    //update the quantity 
    quantityElement.innerText = quantity;
    //save it to storage 
    saveItemsToStorage();
    //update cart total 
    updateCartTotal();
}

//updateCartTotal function
function updateCartTotal() {
    let cartItemContainer = document.getElementsByClassName('cart-item-container')[0];
    //get an array of all the items
    let cartItems = cartItemContainer.getElementsByClassName('item');
    let overallTotal = 0;
    let numOfitems = 0;
    //loop through the array
    for (let i = 0; i < cartItems.length; i++) {
        let item = cartItems[i];
        console.log(item); 
        //get the price element on an item
        let priceElement = item.getElementsByClassName('price')[0];
        //get the quantity element on an item
        let quantityElement = item.getElementsByClassName('cart-item-quantity')[0];
        //convert the price element to a float
        let price = parseFloat(priceElement.innerText.replace('$', ''));
        //convert the quantity element to a float
        let quantity = parseFloat(quantityElement.innerText);
        
        //add (price*quantity) of the item to the total
        overallTotal += (price * quantity);
        
        //add 1 to the number of item count
        numOfitems+=quantity;

        //Calculate and round the item total
        let itemTotal = Math.round(quantity * price * 100) / 100;
        let itemTotalElement = item.getElementsByClassName('item-total')[0];
        //set and format the item total 
        itemTotalElement.innerText = '$' + itemTotal;
    }
    //Check to see if user is eligible for free delivery
    let deliveryFee = 4.00;

    //If their total is >= 100, they are. 
    if (overallTotal >= 100) {
        deliveryFee = 0.00; 
    }
    let GST = 0.05;
    let QST = 0.09975;
    //Round the total
    overallTotal = Math.round(overallTotal * 100) / 100;
    //Calculate and round the QST
    let totalQst = Math.round((overallTotal + deliveryFee) * QST * 100) / 100;
    //Calculate and round the GST
    let totalGst = Math.round((overallTotal + deliveryFee) * GST * 100) / 100;
    //Calculate and round the total + tax
    let totalPlusTax = Math.round((overallTotal + totalQst + totalGst + deliveryFee) * 100) / 100;
    //set the number of items
    document.getElementsByClassName('numOfItems')[0].innerText = numOfitems;
    //set and format the subtotal 
    document.getElementsByClassName('cart-subtotal')[0].innerText = '$' + overallTotal;
    //set and format the delivery fee
    document.getElementsByClassName('cart-delivery')[0].innerText = '$' + deliveryFee + ".00";
    //set and format the total QST
    document.getElementsByClassName('cart-qst')[0].innerText = '$' + totalQst;
    //set and format the total GST
    document.getElementsByClassName('cart-gst')[0].innerText = '$' + totalGst;
    //set and format the total 
    document.getElementsByClassName('cart-total')[0].innerText = '$' + totalPlusTax;
}

//checkCartEmptyFunction
function checkCartEmpty() {
    let itemContainer = document.getElementsByClassName('cart-item-container')[0];
    if (itemContainer.getElementsByClassName('item').length == 0) {
        //if the cart is empty, hide the summary section
        document.getElementsByClassName('summary')[0].classList.toggle('hide');
        //show the hidden cart empty section
        document.getElementsByClassName('cart-empty')[0].classList.toggle('show-flex');
        return true; 
    }
}

//CHECKOUTBUTTON FUNCTION
function checkoutMsg(){

    var items=document.getElementsByClassName('item');

    document.getElementsByClassName('cart-item-container')[0].classList.toggle('hide'); //hides all the items in the cart
    document.getElementsByClassName('cart-empty')[0].classList.toggle('show-flex'); //shows the empty cart
    //document.getElementsByClassName('checkout_B')[0].classList.toggle('hide');
    //document.getElementsByClassName('cont-shopping')[0].classList.toggle('hide');
    document.getElementsByClassName('summary')[0].classList.toggle('hide'); //hides summary page
    //sends alert message to the page once checkoutbutton is clciked
    alert("Thank you for shopping with Kalamari Market!");
    localStorage.clear(); 
    
}
//Save items to local storage function 
function saveItemsToStorage() {
    let cartItemContainer = document.getElementsByClassName('cart-item-container')[0];
    let cartItems = cartItemContainer.getElementsByClassName('item');

    let cart = [];
    //go through all the cart items 
    for (let i = 0; i < cartItems.length; i++) {
        let item = cartItems[i];
        //get their attributes
        let itemName = item.getElementsByClassName('item-name')[0].innerText;
        let itemQuantity = item.getElementsByClassName('cart-item-quantity')[0].innerText;
        let itemPrice = item.getElementsByClassName('price')[0].innerText;
        let itemImageSrc = item.getElementsByClassName('cartIMG')[0].getAttribute('src');

        //create an object from their attributes 
        let cartItem = {
            name: itemName,
            quantity: itemQuantity,
            price: itemPrice,
            IMGsrc : itemImageSrc
        }
        //add that object to the cart array
        cart.push(cartItem); 
    }
    //add the array to local storage
    localStorage.setItem("CART", JSON.stringify(cart));
}

//Function to load items from local storage 
function loadItemsFromStorage() {
    //get the array of cart objects 
    let cart = JSON.parse(localStorage.getItem("CART"));
    if (cart != null) {
        for (let i = 0; i < cart.length; i++) {
            //get each cart object 
            let item = cart[i];
            //and add it to the page 
            addCartItem(item.name, item.quantity, item.price, item.IMGsrc)
        }
    }
}
//Function to add a cart item to the page 
function addCartItem(itemName, quantity, price, IMGsrc) {
    //create an <li class = "item"></li> element 
    let cartRow = document.createElement('li');
    cartRow.classList.add('item');
    //If cart item is already in the page, don't add it. 
    let cartItems = document.getElementsByClassName('cart-item-container')[0];
    let cartNames = cartItems.getElementsByClassName('item-name');
    for (let i = 0; i < cartNames.length; i++){
        if (cartNames[i].innerText === itemName) {
            return; 
        }
    }
    //otherwise append the html to the end of the list 
    let cartRowContents = `
    <figure>
    <img
        src="${IMGsrc}"
        alt="${itemName}"              
        class="cartIMG"
    />
    <figcaption class = "item-name">${itemName}</figcaption>
    </figure>
    <div class = "item-price-times"> 
        <div class = "cart-quantity-change">
        <button class = "minus-cart-quantity"><i class="fas fa-minus"></i></button>
        <button class = "plus-cart-quantity"><i class="fas fa-plus"></i></button> 
        <button class = "cart-item-quantity">${quantity}</button>
        </div>
        <span class = "type-of-quantity"></span>  x
        <span class = "price">${price}</span>   
    </div>
    <div class = "item-row">
    <p class = "item-total-col">Item Total: <span class="item-total"></span></p>              
    <button class = "remove-btn">Delete Item</button>
    </div>
    <hr>
    `
    cartRow.innerHTML = cartRowContents;
    cartItems.append(cartRow);
}