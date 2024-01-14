const tableList = ['Bàn 1', 'Bàn 2', 'Bàn 3'];
const foodList = new Map([
  ['', 0],
  ['Bún bò', 20000],
  ['Hủ tiếu', 18000],
  ['Bánh canh', 17000],
  ['Phở bò', 19000],
  ['Nui', 15000],
  ['Bánh mì thịt', 12000],
  ['Bánh cuốn', 15000],
]);
function updateClock() {
  const clockElement = document.getElementById('clock');
  const now = new Date();

  const options = {
    weekday: 'long',
    year: 'numeric',
    month: '2-digit',
    day: '2-digit',
    hour: '2-digit',
    minute: '2-digit',
  };
  const formattedDate = now.toLocaleDateString('en-US', options);

  clockElement.textContent = formattedDate;
}

// Gọi hàm updateClock mỗi giây
setInterval(updateClock, 1000);

// Đảm bảo rằng đồng hồ được cập nhật ngay lập tức sau khi trang tải
updateClock();

const tableSelect = document.getElementById('select-table');

for (let val of tableList) {
  const option = document.createElement('option');
  option.value = val; // Set the option's value to the key
  option.textContent = val; // Set the option's display text to the key
  tableSelect.appendChild(option);
}

const foodSelect = document.getElementById('select-food');

for (let key of foodList.keys()) {
  const option = document.createElement('option');
  option.value = key; // Set the option's value to the key
  option.textContent = key; // Set the option's display text to the key
  foodSelect.appendChild(option);
}
var selectElement = document.getElementById('select-food');

function addFood(foodId, name, price) {
  str = `<tr class='foodid-${foodId}'><td class='foodname'>` + name + '</td>';
  str += "<td><input class = 'quantity' value='1'></td>";
  str += "<td><input class='foodprice' value=" + price + '>' + '</td>';
  str += "<td><button class = 'btn-del'> Xoá </button></td></tr>";
  return str;
}

//local storage
var orderList = [];
function calculateTotal(tableId) {
  let total = 0;
  let storedData = localStorage.getItem(tableId);
  let parsedData = JSON.parse(storedData);
  total = parsedData.reduce(function (total, currentValue) {
    console.log(total);

    // Trả về biến total cộng với giá trị của phần tử đang lặp
    return total + currentValue.price * currentValue.quantity;
  }, 0);
  const totalH4 = $(`#table-${tableId} tr:last .total`);
  totalH4.text(total);
}

function updateFoodFromLocalStorage(tableId, foodId, q) {
  let storedData = localStorage.getItem(tableId);
  let parsedData = JSON.parse(storedData);
  if (q == 0) {
    parsedData = parsedData.filter(function (item) {
      return item.id != foodId;
    });
  } else {
    parsedData = parsedData.map(function (item) {
      if (item.id === foodId) {
        console.log('Hehe', { ...item, quantity: q });

        return { ...item, quantity: q };
      }
      return item;
    });
  }
  localStorage.setItem(tableId, JSON.stringify(parsedData));
  calculateTotal(tableId);
}

console.log(tableSelect);
tableSelect.addEventListener('click', function () {
  foodSelect.selectedIndex = 0;
});

selectElement.addEventListener('click', function () {
  //change table's order
  var selectedOption = selectElement.value;
  var selectFoodIndex = selectElement.selectedIndex;

  let tableIndex = tableSelect.selectedIndex;

  let storedData = localStorage.getItem(tableIndex);
  let parsedData = JSON.parse(storedData);
  let flag = -1;
  if (parsedData != null)
    flag = parsedData.findIndex((val) => val.id == selectFoodIndex);

  if (flag == -1) {
    if (selectedOption != '') {
      // Add food into local storage

      if (!Array.isArray(orderList[tableIndex])) {
        orderList[tableIndex] = []; // Initialize it as an array
      }
      orderList[tableIndex].push({
        id: foodSelect.selectedIndex,
        name: foodSelect.value,
        price: foodList.get(foodSelect.value),
        quantity: 1,
      });
      console.log(orderList[tableIndex][0]);
      localStorage.setItem(tableIndex, JSON.stringify(orderList[tableIndex]));

      // Add food into table
      const table = $(`#table-${tableIndex} tr:last`);

      const foodHTML = addFood(
        foodSelect.selectedIndex,
        foodSelect.value,
        foodList.get(foodSelect.value)
      );

      table.before(foodHTML);
      // ________ //
      // calculate total and update
      const totalH4 = $(`#table-${tableIndex} tr:last .total`);

      totalH4.text(calculateTotal(tableIndex));

      // add event for input and button
      let deleteButton = $(
        `#table-${tableIndex} .foodid-${foodSelect.selectedIndex} .btn-del`
      );
      console.log(deleteButton);
      deleteButton.on('click', function () {
        //delete on screen
        let row = deleteButton.parent().parent();
        console.log(row); // Get the row containing the button
        row.remove();

        //delete on local storage
        updateFoodFromLocalStorage(tableIndex, foodSelect.selectedIndex, 0);
      });

      let quantityInp = $(
        `#table-${tableIndex} .foodid-${foodSelect.selectedIndex} .quantity`
      );
      quantityInp.on('input', function () {
        //update on local storage
        if (quantityInp.val() != 0)
          updateFoodFromLocalStorage(
            tableIndex,
            foodSelect.selectedIndex,
            quantityInp.val()
          );
      });
    }
  }
});

// In hóa đơn

$('.btn-print').on('click', function () {
  var tableNumber = $(this).data('bill');
  localStorage.setItem('currentTable', tableNumber);
  window.location.href = 'bill.html';
});
