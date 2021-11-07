//Accesing each element input
let inputQty = document.getElementById("QTY");
let inputTotal = document.getElementById("TOTAL");
let inputSelect1 = document.getElementById("select1");
let inputSelect2 = document.getElementById("select2");
let inputOption = document.querySelector(".selects");


//Saving data before the page reloads
window.onbeforeunload = function() {

    if (inputQty.value) {
      sessionStorage.setItem("savedQty",inputQty.value);
    }
    if (inputTotal.value) {
      sessionStorage.setItem("savedTotal",inputTotal.value);
    }
    if (inputOption.selectedIndex) {
      sessionStorage.setItem("savedOption",inputOption.selectedIndex);
    }
    if (inputSelect1.selectedIndex) {
      sessionStorage.setItem("savedSelect1",inputSelect1.selectedIndex);
    }
    if (inputSelect2.selectedIndex) {
      sessionStorage.setItem("savedSelect2",inputSelect2.selectedIndex);
    }
}

//Placing the previously saved data into the corresponding input box when page is loading
window.onload = function() {

        // If values are not blank, restore them to the fields
        let quantity = sessionStorage.getItem("savedQty");
        if (quantity !== null) {
          inputQty.value = quantity;
        }

        let total = sessionStorage.getItem("savedTotal");
        if (total !== null) {
          inputTotal.value = total;
        }

        let option = sessionStorage.getItem("savedOption");
        if (option !== null) {
          inputOption.options[option].selected = true;
        }

        let select1 = sessionStorage.getItem("savedSelect1");
        if (select1 !== null) {
          inputSelect1.options[select1].selected = true;
        }

        let select2 = sessionStorage.getItem("savedSelect2");
        if (select2 !== null) {
          inputSelect2.options[select2].selected = true;
        }
    }
