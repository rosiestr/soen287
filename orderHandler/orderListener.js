//if document is still loading, wait until buttons are ready before running program
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
}
//else start program
else {
    ready();
}
function ready() {
    let deleteOrderButton = document.getElementById('deleteOrderButton');
    if (deleteOrderButton != null) {
        deleteOrderButton.addEventListener('click', deleteOrders);
    }
    let editOrderButtons = document.getElementsByClassName('editOrderButton');
    if (editOrderButtons != null) {
        for (let i = 0; i < editOrderButtons.length; i++) {
            editOrderButtons[i].addEventListener('click', saveOrderID);
        };
    }
} 
function deleteOrders() {
    const orderTable = document.getElementById('orders-table');
    let checkboxes = orderTable.querySelectorAll('input[type=checkbox]');
    let ordersToDelete = []; 
    for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            let row = checkboxes[i].parentElement.parentElement;
            let orderID = row.getElementsByClassName('editOrderID')[0].value;
            ordersToDelete.push(orderID);
            console.log(orderID); 
            checkboxes[i].parentElement.parentElement.remove(); 
        }
    }
    document.getElementById('deleteIDs').value = JSON.stringify(ordersToDelete);
}
function saveOrderID(event) {
    let buttonClicked = event.target;
    let item = buttonClicked.parentElement.parentElement;
    console.log(item); 
    let orderID = item.getElementsByClassName('editOrderID')[0].value;
    const saveOrderValue = document.getElementById('orderToEdit');
    saveOrderValue.value = orderID; 
}