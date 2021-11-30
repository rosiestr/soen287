

const deleteOrderButton = document.getElementById('deleteOrderButton');
if (deleteOrderButton != null) {
    deleteOrderButton.addEventListener('click', deleteOrders);
}


function parseOrderData() {

}
function loadOrderItems() {

}
function deleteOrders() {
    
    const orderTable = document.getElementById('orders-table');
    let checkboxes = orderTable.querySelectorAll('input[type=checkbox]');
    let ordersToDelete = []; 
    for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            let row = checkboxes[i].parentElement.parentElement;
            let orderID = row.getElementsByClassName('orderID')[0].value;
            ordersToDelete.push(orderID); 
            checkboxes[i].parentElement.parentElement.remove(); 
        }
    }
    document.getElementById('deleteIDs').value = JSON.stringify(ordersToDelete);

}