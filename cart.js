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
    var removeCartItemButtons = document.getElementsByClassName('remove-btn');
    //loop through the array
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        //Add a 'click' event listener for each button
        //that runs the removeCartItem function every
        //time a 'delete item' button is clicked
        var button = removeCartItemButtons[i];
        button.addEventListener('click', removeCartItem)
    }

    var quantityPlusButtons = document.getElementsByClassName('plus-cart-quantity');
    for (var i = 0; i < quantityPlusButtons.length; i++) {
        var plus = quantityPlusButtons[i];
        plus.addEventListener('click', quantityAddOne);
    }
    var quantityMinusButtons = document.getElementsByClassName('minus-cart-quantity');
    for (var i = 0; i < quantityMinusButtons.length; i++) {
        var minus = quantityMinusButtons[i];
        minus.addEventListener('click', quantitySubtractOne);
    }
}
//removeCartItem function
function removeCartItem(event) {
    //when a button is clicked, remove it's grandparent element
    //(which is the item row)
    var buttonClicked = event.target;
    buttonClicked.parentElement.parentElement.remove();
    //run the updateCartTotal function
    updateCartTotal();
    //run the checkCartEmpty function
    checkCartEmpty();    
}

function quantityAddOne(event) {
    var item = event.target.parentElement.parentElement;
    var quantityElement = item.getElementsByClassName('cart-item-quantity')[0];
    var quantity = parseFloat(quantityElement.innerText);
    
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
    var item = event.target.parentElement.parentElement; 
    var quantityElement = item.getElementsByClassName('cart-item-quantity')[0];
    var quantity = parseFloat(quantityElement.innerText);
    
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
    var cartItemContainer = document.getElementsByClassName('cart-item-container')[0];
    //get an array of all the items
    var cartItems = cartItemContainer.getElementsByClassName('item');
    var total = 0;
    var numOfitems = 0;
    //loop through the array
    for (var i = 0; i < cartItems.length; i++) {
        var item = cartItems[i];
        //get the price element on an item
        var priceElement = item.getElementsByClassName('price')[0];
        //get the quantity element on an item
        var quantityElement = item.getElementsByClassName('cart-item-quantity')[0];
        //convert the price element to a float
        var price = parseFloat(priceElement.innerText.replace('$', ''));
        //convert the quantity element to a float
        var quantity = parseFloat(quantityElement.innerText);
        
        //add (price*quantity) of the item to the total
        total += (price * quantity);
        
        //add 1 to the number of item count
        numOfitems++;

        //Calculate and round the item total
        var itemTotal = Math.round(quantity * price * 100) / 100;
        var itemTotalElement = item.getElementsByClassName('item-total')[0];
        //set and format the item total 
        itemTotalElement.innerText = '$' + itemTotal;
    }
    //Check to see if user is eligible for free delivery
    var deliveryFee = 4.00;

    //If their total is >= 100, they are. 
    if (total >= 100) {
        deliveryFee = 0.00; 
    }
    const GST = 0.05;
    const QST = 0.09975;
    //Round the total
    total = Math.round(total * 100) / 100;
    //Calculate and round the QST
    var totalQst = Math.round((total + deliveryFee) * QST * 100) / 100;
    //Calculate and round the GST
    var totalGst = Math.round((total + deliveryFee) * GST * 100) / 100;
    //Calculate and round the total + tax
    var cartTotal = Math.round((total + totalQst + totalGst + deliveryFee) * 100) / 100;
    //set the number of items
    document.getElementsByClassName('numOfItems')[0].innerText = numOfitems;
    //set and format the subtotal 
    document.getElementsByClassName('cart-subtotal')[0].innerText = '$' + total;
    //set and format the delivery fee
    document.getElementsByClassName('cart-delivery')[0].innerText = '$' + deliveryFee + ".00";
    //set and format the total QST
    document.getElementsByClassName('cart-qst')[0].innerText = '$' + totalQst;
    //set and format the total GST
    document.getElementsByClassName('cart-gst')[0].innerText = '$' + totalGst;
    //set and format the total 
    document.getElementsByClassName('cart-total')[0].innerText = '$' + cartTotal;
}

//checkCartEmptyFunction
function checkCartEmpty() {
    var itemContainer = document.getElementsByClassName('cart-item-container')[0];
    if (itemContainer.getElementsByClassName('item').length == 0) {
        //if the cart is empty, hide the summary section
        document.getElementsByClassName('summary')[0].classList.toggle('hide');
        //show the hidden cart empty section
        document.getElementsByClassName('cart-empty')[0].classList.toggle('show');
        
    }
}
