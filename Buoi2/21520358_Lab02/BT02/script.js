const foodList = new Map([
  ['Bún bò', 20000],
  ['Hủ tiếu', 18000],
  ['Bánh canh', 17000],
  ['Phở bò', 19000],
  ['Nuôi', 15000],
  ['Bánh mì thịt', 12000],
  ['Bánh cuốn', 15000],
]);
const drinkList = new Map([
  ['Cà phê đá', 12000],
  ['Cà phê sữa', 15000],
  ['Chanh dây', 13000],
  ['Chanh muối', 12000],
  ['Xí muội', 14000],
  ['Sữa tươi', 13000],
  ['Cam vắt', 17000],
]);

const foodSelect = document.getElementById('food-select');

for (let key of foodList.keys()) {
  const option = document.createElement('option');
  option.value = key; // Set the option's value to the key
  option.textContent = key; // Set the option's display text to the key
  foodSelect.appendChild(option);
}

const drinkSelect = document.getElementById('drink-select');

for (let key of drinkList.keys()) {
  const option = document.createElement('option');
  option.value = key; // Set the option's value to the key
  option.textContent = key; // Set the option's display text to the key
  drinkSelect.appendChild(option);
}

function calculateTotal() {
  // day/night
  let isNight = 0;
  var checkbox = document.getElementsByName('time');
  for (var i = 0; i < checkbox.length; ++i) {
    if (checkbox[i].checked === true) isNight = i;
  }

  // cal total
  const foodSelectElement = document.getElementById('food-select');
  let total = 0;

  const foodValuesArray = Array.from(foodList.values());

  for (let i = 0; i < foodSelectElement.options.length; i++) {
    if (foodSelectElement.options[i].selected) {
      total += foodValuesArray[i];
    }
  }

  const drinkSelectElement = document.getElementById('drink-select');
  const drinkValuesArray = Array.from(drinkList.values());

  for (let i = 0; i < drinkSelectElement.options.length; i++) {
    if (drinkSelectElement.options[i].selected) {
      total += drinkValuesArray[i];
    }
  }

  //
  if (isNight === 1) total *= 1.1;

  document.getElementById('total-result').innerHTML = total;
}
