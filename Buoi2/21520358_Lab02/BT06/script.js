const tourList = new Map([
  ['Hà Nội – Hạ Long – Tuần Châu ', 10000000],
  ['Hà Nội – Sapa', 6000000],
  ['Đà Nẵng – Hội An', 3000000],
  ['Buôn Mê Thuộc – Kon Tum', 2000000],
  ['TP.HCM – Nha Trang', 3500000],
  ['TP.HCM – Cần Thơ – Cà Mau', 2500000],
]);
const tourSelect = document.getElementById('select-tour');

if (document.title === 'Home')
  for (let key of tourList.keys()) {
    const option = document.createElement('option');
    option.value = key; // Set the option's value to the key
    option.textContent = key; // Set the option's display text to the key
    tourSelect.appendChild(option);
  }
// if bill -> get data from localStorage
else {
  const customerName = localStorage.getItem('customer-name');
  document.getElementById('cus-fullname').innerHTML = customerName;

  const note = localStorage.getItem('note');
  document.getElementById('note').innerHTML = note;

  const address = localStorage.getItem('address');
  document.getElementById('address').innerHTML = address;

  const date = localStorage.getItem('date');
  document.getElementById('date').innerHTML = date;

  const adults = localStorage.getItem('adults');
  document.getElementById('adults').innerHTML = adults;

  const children = localStorage.getItem('children');
  document.getElementById('children').innerHTML = children;

  const adultPrice = localStorage.getItem('price');
  document.getElementById('adult-price').innerHTML = adultPrice;

  const childPrice = adultPrice / 2;
  document.getElementById('child-price').innerHTML = childPrice;

  const adultTourAmount = adultPrice * adults;
  document.getElementById('adult-tour-amount').innerHTML = adultTourAmount;

  const childTourAmount = childPrice * children;
  document.getElementById('child-tour-amount').innerHTML = childTourAmount;

  document.getElementById('total-result').innerHTML =
    childTourAmount + adultTourAmount;
}

function onClickBookTour() {
  const customerName = document.getElementById('input-customer-name').value;
  localStorage.setItem('customer-name', customerName);

  const address = document.getElementById('input-address').value;
  localStorage.setItem('address', address);

  const note = document.getElementById('note').value;
  localStorage.setItem('note', note);

  const selectTourList = document.getElementById('select-tour');
  const selectedTour = selectTourList.value;
  const price = tourList.get(selectedTour);
  localStorage.setItem('price', price);

  const adults = document.getElementById('adult-number').value;
  const children = document.getElementById('children-number').value;
  localStorage.setItem('adults', adults);
  localStorage.setItem('children', children);

  localStorage.setItem('date', new Date().toDateString());

  window.location.href = 'bill.html';
}
