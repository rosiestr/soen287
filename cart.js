if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
}
else {
    ready();
}

function ready() {
    var removeCartItemButtons = document.getElementsByClassName('remove-btn');
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        var button = removeCartItemButtons[i];
        button.addEventListener('click', removeCartItem)
    }

    var quantityInputs = document.getElementsByClassName('cart-item-quantity');
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i];
        input.addEventListener('change', quantityChange);
    }
    
}

    function removeCartItem(event) {
        var buttonClicked = event.target;
        buttonClicked.parentElement.parentElement.remove();
        updateCartTotal();
        var itemContainer = document.getElementsByClassName('cart-item-container')[0];
        if (itemContainer.getElementsByClassName('item').length == 0) {
            document.getElementsByClassName('summary')[0].classList.toggle('hide');
            document.getElementsByClassName('cart-empty')[0].classList.toggle('show');
            
        }
        
        
    }
    
    function quantityChange(event) {
        var input = event.target;
        if (isNaN(input.value) || input.value <= 0) {
            input.value = 1;
        }
        updateCartTotal();
        updateItemTotal(input);
    }
    function updateItemTotal(input) {
        var inputElement = input.parentElement.parentElement; 
            var itemPrice = parseFloat(inputElement.getElementsByClassName('price')[0].innerText.replace('$', '')); 
        var quantity = input.value;  
        var itemTotal = Math.round(quantity * itemPrice * 100) / 100;
        var itemTotalElement = inputElement.getElementsByClassName('item-total')[0];
        itemTotalElement.innerText = '$' + itemTotal; 
    }
    function updateCartTotal() {
        var cartItemContainer = document.getElementsByClassName('cart-item-container')[0];
        var cartItems = cartItemContainer.getElementsByClassName('item');
        var total = 0;
        var numOfitems = 0;
        for (var i = 0; i < cartItems.length; i++) {
            var item = cartItems[i];
            var priceElement = item.getElementsByClassName('price')[0];
            var quantityElement = item.getElementsByClassName('cart-item-quantity')[0];
            var price = parseFloat(priceElement.innerText.replace('$', ''));
            console.log(price)
            var quantity = quantityElement.value;
            total += (price * quantity);
            numOfitems++;
        }
        var deliveryFee = 4.00;
        if (total >= 100) {
            deliveryFee = 0.00;
        }
        const GST = 0.05;
        const QST = 0.09975;
        total = Math.round(total * 100) / 100; 
        var totalQst = Math.round(total * QST * 100)/100;
        var totalGst = Math.round(total * GST * 100)/100;
        var cartTotal = Math.round((total + totalQst + totalGst + deliveryFee) * 100) / 100;
        document.getElementsByClassName('numOfItems')[0].innerText = numOfitems;
        document.getElementsByClassName('cart-subtotal')[0].innerText = '$' + total;
        document.getElementsByClassName('cart-delivery')[0].innerText = '$' + deliveryFee + ".00";
        document.getElementsByClassName('cart-qst')[0].innerText = '$' + totalQst;
        document.getElementsByClassName('cart-gst')[0].innerText = '$' + totalGst;
        document.getElementsByClassName('cart-total')[0].innerText = '$' + cartTotal;
    }

