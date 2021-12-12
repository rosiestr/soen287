//if document is still loading, wait until buttons are ready before running program
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
}
//else start program
else {
    ready();
}
function ready() {
    let deleteProductButton = document.getElementById('deleteProductButton');
    if (deleteProductButton != null) {
        deleteProductButton.addEventListener('click', deleteProduct);
    }
    let editProductButtons = document.getElementsByClassName('editProductButton');
    if (editProductButtons != null) {
        for (let i = 0; i < editProductButtons.length; i++) {
            editProductButtons[i].addEventListener('click', saveProductID);
        };
    }
} 
function deleteProduct() {
    const productTable = document.getElementById('product-table');
    let checkboxes = productTable.querySelectorAll('input[type=checkbox]');
    let productsToDelete = []; 
    for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            let row = checkboxes[i].parentElement.parentElement;
            let productID = row.getElementsByClassName('editProductID')[0].value;
            productsToDelete.push(productID);
            console.log(productID); 
            checkboxes[i].parentElement.parentElement.remove(); 
        }
    }
    document.getElementById('deleteIDs').value = JSON.stringify(productsToDelete);
    document.location.reload()
}
function saveProductID(event) {
    let buttonClicked = event.target;
    let item = buttonClicked.parentElement.parentElement;
    console.log(item); 
    let productID = item.getElementsByClassName('editProductID')[1].value;
    const saveProductValue = document.getElementById('productToEdit');
    saveProductValue.value = productID; 
}