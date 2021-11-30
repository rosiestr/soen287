//if document is still loading, wait until buttons are ready before running program
if (document.readyState == 'loading') {

    document.addEventListener('DOMContentLoaded', ready);
}
//else start program
else {
    ready();
}
function ready() {
    
    const shippingAddress = document.getElementById('shippingAddress');
    const billingCheck = document.querySelector("input[name = sameAddress]");
    billingCheck.addEventListener('change', () => {
        console.log(billingCheck);
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
    });

    const shippingElement = document.getElementById('shippingAddress');
    shippingElement.addEventListener('keyup', () => {
        billingCheck.checked = false;
        pickupCheck.checked = false; 
    })

    const applyitems = document.getElementsByClassName('apply');
    console.log(applyitems[0]); 
    for (let i = 0; i < applyitems.length; i++){
        let button = applyitems[i]; 
        button.addEventListener('click', updateItemTotal);
    }
} 


function updateItemTotal(event) {
    let buttonClicked = event.target;
    let itemElement = buttonClicked.parentElement.parentElement;
    let quantity = itemElement.getElementsByClassName('quantity')[0].value;
    let priceElement = itemElement.getElementsByClassName('price')[0];
    let price = priceElement.innerText.replace("$", ""); 
    price =  parseFloat(price);
    let discount = parseFloat(itemElement.getElementsByClassName('discount')[0].value) / 100; 
    let itemTotal = price * quantity;
    if (discount != null) {
        itemTotal = (itemTotal - (itemTotal * discount));
        console.log(itemTotal);
    }
    let itemTotalElement = itemElement.getElementsByClassName('item-total')[0];
    console.log(itemTotalElement); 
    itemTotalElement.innerText = "$" + itemTotal; 
}