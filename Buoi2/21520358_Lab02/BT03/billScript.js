$('#date').text(new Date().toDateString());
let tableNumber = localStorage.getItem('currentTable');

$('#table-number').text(parseInt(tableNumber) + 1);

let storedData = localStorage.getItem(tableNumber);
let parsedData = JSON.parse(storedData);

let table = $('#food #title');
let total = 0;
parsedData.forEach((e) => {
  total += e.quantity * e.price;
  table.after(`<tr><td>${e.name}</td>
    <td>${e.quantity}</td>
    <td>${e.quantity * e.price}</td></tr>`);
});
console.log(total);

$('#bill-total').text(total);
