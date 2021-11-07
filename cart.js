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
    updateCartTotal();
    //get an array of all the delete item buttons
    const removeCartItemButtons = document.getElementsByClassName('remove-btn');
    //loop through the array
    for (let i = 0; i < removeCartItemButtons.length; i++) {
        //Add a 'click' event listener for each button
        //that runs the removeCartItem function every
        //time a 'delete item' button is clicked
        let button = removeCartItemButtons[i];
        button.addEventListener('click', removeCartItem)
    }

    const quantityPlusButtons = document.getElementsByClassName('plus-cart-quantity');
    for (let i = 0; i < quantityPlusButtons.length; i++) {
        let plus = quantityPlusButtons[i];
        plus.addEventListener('click', quantityAddOne);
    }
    const quantityMinusButtons = document.getElementsByClassName('minus-cart-quantity');
    for (let i = 0; i < quantityMinusButtons.length; i++) {
        let minus = quantityMinusButtons[i];
        minus.addEventListener('click', quantitySubtractOne);
    }
}
//removeCartItem function
function removeCartItem(event) {
    //when a button is clicked, remove it's grandparent element
    //(which is the item row)
    let buttonClicked = event.target;
    buttonClicked.parentElement.parentElement.remove();
    //run the updateCartTotal function
    updateCartTotal();
    //run the checkCartEmpty function
    checkCartEmpty();    
}

function quantityAddOne(event) {
    let item = event.target.parentElement.parentElement;
    let quantityElement = item.getElementsByClassName('cart-item-quantity')[0];
    let quantity = parseFloat(quantityElement.innerText);
    
    if (isNaN(quantity)) {
        quantity = 1;
    }
    else {
        quantity++;
    }
    quantityElement.innerText = quantity;
    updateCartTotal();   
}
function quantitySubtractOne(event) {
    let item = event.target.parentElement.parentElement;
    let quantityElement = item.getElementsByClassName('cart-item-quantity')[0];
    let quantity = parseFloat(quantityElement.innerText);
    
    if (isNaN(quantity)) {
        quantity = 1;
    }
    quantity--;
    if (quantity <= 0) {
        quantity = 1; 
    }
    quantityElement.innerText = quantity;
    updateCartTotal();
}

//updateCartTotal function
function updateCartTotal() {
    const cartItemContainer = document.getElementsByClassName('cart-item-container')[0];
    //get an array of all the items
    const cartItems = cartItemContainer.getElementsByClassName('item');
    let overallTotal = 0;
    let numOfitems = 0;
    //loop through the array
    for (let i = 0; i < cartItems.length; i++) {
        let item = cartItems[i];
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
    const GST = 0.05;
    const QST = 0.09975;
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
    const itemContainer = document.getElementsByClassName('cart-item-container')[0];
    if (itemContainer.getElementsByClassName('item').length == 0) {
        //if the cart is empty, hide the summary section
        document.getElementsByClassName('summary')[0].classList.toggle('hide');
        //show the hidden cart empty section
        document.getElementsByClassName('cart-empty')[0].classList.toggle('show-flex');
        
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
    //sends alert message to the page once checkoutbutton is clicked
    alert("Thank you for shopping with Kalamari Market!");
    
  }
