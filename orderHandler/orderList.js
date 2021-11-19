
const deleteOrderButton = document.getElementById('deleteOrderButton');
deleteOrderButton.addEventListener('click', deleteOrders);

function deleteOrders() {
    const orderTable = document.getElementById('orders-table');
    let checkboxes = orderTable.querySelectorAll('input[type=checkbox]');
    for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            checkboxes[i].parentElement.parentElement.remove(); 
        }
    }

}