if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
}
//else start program
else {
    ready();
}

function ready() {
    let cart = JSON.parse(localStorage.getItem("CART"));
    if (cart === null) {
        cart = [];
    }
    localStorage.setItem("CART", JSON.stringify(cart));

    const item = document.getElementsByTagName('article')[0];
    const itemName = item.getElementsByTagName('h3')[0].innerText;
    const addCartItemButton = document.getElementsByClassName('cart')[0];
    const itemPrice = item.getElementsByTagName('strong')[0].innerText;
    const itemImageSrc = item.getElementsByTagName('img')[0].getAttribute('src');

    for (let i = 0; i < cart.length; i++) {
        if (cart[i] === itemName) {
            addCartItemButton.innerText = "ADDED";
            return; 
        }
    }
    addCartItemButton.addEventListener('click', addItemToCart, { once: true });

    function addItemToCart() {
        const quantityElement = document.getElementById("QTY");
        let quantity = Number(quantityElement.value);
        if (quantity < 1) quantity = 1; 
        //create an object from their attributes
        let cartItem = {
            name: itemName,
            quantity: quantity,
            price: itemPrice,
            IMGsrc : itemImageSrc
        }
        //get the cart from local storage 
        cart.push(cartItem); 
        localStorage.setItem("CART", JSON.stringify(cart));
        addCartItemButton.innerText = "ADDED";
        quantityElement.readOnly = true; 
    }
}




