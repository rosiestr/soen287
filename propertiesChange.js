function calculate() {
  var a = Number(document.getElementById("PPRICE").value);
  var b = Number(document.getElementById("QTY").value);
  var c = (a * b).toFixed(2);

  document.getElementById("TOTAL").value = c;
}
