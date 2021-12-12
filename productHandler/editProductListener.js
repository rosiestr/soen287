//if document is still loading, wait until buttons are ready before running program
if (document.readyState == 'loading') {

    document.addEventListener('DOMContentLoaded', ready);
}
//else start program
else {
    ready();
}
function ready() {
    updateCartTotal(); 
    const shippingAddress = document.getElementById('shippingAddress');
    const billingCheck = document.querySelector("input[name = sameAddress]");
    billingCheck.addEventListener('change', () => {
        let billingElement = document.getElementById('billingAddress');    
        if (billingCheck.checked) {
            shippingAddress.value = billingElement.value;
            pickupCheck.checked = false;
        }
    }); 
    const pickupCheck = document.getElementById('forPickup');
    pickupCheck.addEventListener('change', () => {       
        if (pickupCheck.checked) {
        shippingAddress.value = "ORDER FOR PICKUP";
        billingCheck.checked = false;           
        }
        else {
            shippingAddress.value = ""; 
        }
        updateCartTotal(); 
    });

    const shippingElement = document.getElementById('shippingAddress');
    shippingElement.addEventListener('keyup', () => {
        billingCheck.checked = false;
        pickupCheck.checked = false; 
    })
    let applyitems = document.getElementsByClassName('apply');
    for (let i = 0; i < applyitems.length; i++){
        let button = applyitems[i];
        button.addEventListener('click', updateItemTotal);
    }
    let discountApplyButton = document.getElementById('discount-apply');
    discountApplyButton.addEventListener('click', updateCartTotal);
    let discountInputs = document.getElementsByClassName('discount');
    for (let i = 0; i < discountInputs.length; i++){
        
    }
    let deleteButtons = document.getElementsByClassName('deleteItem');

    for (let i = 0; i < deleteButtons.length; i++){
        deleteButtons[i].addEventListener('click', removeRow);
    }
    
    const numberInputs = document.querySelectorAll('input[type=number]');
    for (let i = 0; i < numberInputs.length; i++) {
        numberInputs[i].addEventListener('change', stayWithinBounds);
    }
    
}


function stayWithinBounds(event) {
    let input = event.target;
    if (input.value < 0 || isNaN(input.value)) {
        if (input.classList.contains('quantity')) {
            input.value = 1;
        }
        else {
            input.value = 0;
        } 
    }
    else if (input.classList.contains('discount') & input.value > 100){
        input.value = 100; 
    }
}
function addItemRow() {
    let table = document.getElementsByClassName('table-body')[0]; 
    let itemRow = document.createElement('TR');
    itemRow.classList.add('item');
    let itemRowContents = `<td scope = 'row'>
    <input class = 'newItem' id = 'newItem' name = 'addedItemName' type = 'text' required>
    </td>
    <td class = 'price'><input class = 'newItemPrice' name = 'addedItemPrice' value = '0' type = 'number' required>
    </td>
    <td>
        <input type='number' id ='quantity' name = 'quantity' value = '0' class = 'quantity' required>
    </td>
    <td>
        <input type='number' id ='discount' name = 'discount' value = '0' class = 'discount'>
    </td>
    <td>
        <input type ='button' id = 'apply' name = 'apply' value = 'APPLY' class = 'apply'>
    </td>
    <td class = 'item-total'>
    </td> 
    <td>
    <button class = 'deleteItem button1'>x</button>
    </td> 
    `;
    itemRow.innerHTML = itemRowContents;
    table.append(itemRow);
    itemRow.getElementsByClassName('deleteItem')[0].addEventListener('click', removeRow);
    itemRow.getElementsByClassName('apply')[0].addEventListener('click', updateItemTotal);
    itemRow.getElementsByClassName('discount')[0].addEventListener('change', stayWithinBounds);
    itemRow.getElementsByClassName('quantity')[0].addEventListener('change', stayWithinBounds); 
}

function removeRow(event) {
    let button = event.target;
    console.log(button.parentElement);
    console.log(button.parentElement.parentElement); 
    button.parentElement.parentElement.remove();
    updateCartTotal(); 
}

function updateCartTotal() {
    //get an array of all the items
    let cartItems = document.getElementsByClassName('item');
    let overallTotal = 0;
    let discountElement = document.getElementById('overall-discount');
    let overallDiscount = parseFloat(discountElement.value);
    console.log(overallDiscount); 
    let allDiscounts = 0; 
    //loop through the array
    for (let i = 0; i < cartItems.length; i++) {
        let item = cartItems[i];
        //get the price element on an item
        let priceElement = item.getElementsByClassName('price')[0];
        //get the quantity element on an item
        let quantityElement = item.getElementsByClassName('quantity')[0];
        //convert the price element to a float
        let addedPrice = priceElement.getElementsByClassName('newItemPrice')[0];
        let price; 
        if (addedPrice != undefined) {
            price = addedPrice.value;
        }
        else {
            price = priceElement.innerText.replace("$", "");
        }
        price = parseFloat(price);
        //convert the quantity element to a float
        let quantity = quantityElement.value;
        let discount = parseFloat(item.getElementsByClassName('discount')[0].value);
        let itemDiscount = (price * quantity) * (discount / 100); 
        allDiscounts += (itemDiscount);
        let itemTotal = (price * quantity) - itemDiscount;
        //add (price*quantity) of the item to the total
        overallTotal += itemTotal;

        //Calculate and round the item total
        itemTotal = Math.round(itemTotal * 100) / 100;
        let itemTotalElement = item.getElementsByClassName('item-total')[0];
        //set and format the item total
        itemTotalElement.innerText = '$' + itemTotal;
    }
    //Check to see if user is eligible for free delivery
    let deliveryFee = 4.00;

    const orderForPicked = document.getElementById('forPickup');
    //If their total is >= 100, they are.
    if (overallTotal >= 100 || cartItems.length == 0 || orderForPicked.checked) {
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
    overallDiscountAmount = Math.round(overallTotal * overallDiscount) / 100;
    allDiscounts += overallDiscountAmount; 
    //Calculate and round the total + tax
    let totalPlusTax = Math.round((overallTotal + totalQst + totalGst + deliveryFee - overallDiscountAmount) * 100) / 100;
   
    //set and format the subtotal
    document.getElementsByClassName('cart-subtotal')[0].innerText = '$' + overallTotal;
    //set and format the delivery fee
    document.getElementsByClassName('cart-delivery')[0].innerText = '$' + deliveryFee + ".00";
    document.getElementById('discountTotal').innerText = '$' + Math.round(allDiscounts * 100) / 100; 
    //set and format the total QST
    document.getElementsByClassName('cart-qst')[0].innerText = '$' + totalQst;
    //set and format the total GST
    document.getElementsByClassName('cart-gst')[0].innerText = '$' + totalGst;
    //set and format the total
    document.getElementsByClassName('cart-total')[0].innerText = '$' + totalPlusTax;
    console.log(totalPlusTax);
    document.getElementsByClassName('cart-total-input')[0].value = totalPlusTax; 
    saveItemsForPhp(); 
}

function updateItemTotal(event) {
    let buttonClicked = event.target;
    let itemElement = buttonClicked.parentElement.parentElement;
    let quantity = itemElement.getElementsByClassName('quantity')[0].value;
    let priceElement = itemElement.getElementsByClassName('price')[0];
    let addedPrice = priceElement.getElementsByClassName('newItemPrice')[0];
    let price; 
    if (addedPrice != undefined) {
        price = addedPrice.value;
    }
    else {
        price = priceElement.innerText.replace("$", "");
    }
    price =  parseFloat(price);
    let discount = parseFloat(itemElement.getElementsByClassName('discount')[0].value);
    let itemTotal = (price * quantity) - ((price * quantity) * (discount / 100));
   
    let itemTotalElement = itemElement.getElementsByClassName('item-total')[0];
    itemTotalElement.innerText = "$" + Math.round(itemTotal * 100) / 100;
    updateCartTotal();
}

//Save items to local storage function
function saveItemsForPhp() {
    const cartItemContainer = document.getElementsByClassName('order-table')[0];
    let cartItems = cartItemContainer.getElementsByClassName('item');
    const cartItemFormValue = document.getElementsByClassName('cart-items-saved')[0]; 
    let cart = [];
    //go through all the cart items
    for (let i = 0; i < cartItems.length; i++) {
        let item = cartItems[i];
        let itemName, itemPrice; 
        if (item.classList.contains('old')) {
            //get their attributes
            itemName = item.getElementsByClassName('item-name')[0].innerText;
            itemPrice = item.getElementsByClassName('price')[0].innerText;
        }
        else {
            itemName = item.getElementsByClassName('newItem')[0].value;
            itemPrice = "$" + item.getElementsByClassName('newItemPrice')[0].value;
        }
        let itemQuantity = item.getElementsByClassName('quantity')[0].value;
        let itemDiscount = item.getElementsByClassName('discount')[0].value; 

        //create an object from their attributes
        let cartItem = {
            name: itemName,
            quantity: itemQuantity,
            price: itemPrice,
            discount: itemDiscount
        }
        //add that object to the cart array
        cart.push(cartItem);
    }
    //add the array to local storage
    let cartString = JSON.stringify(cart);
    if (cartString != null) {
        cartItemFormValue.value = cartString;
    }
}