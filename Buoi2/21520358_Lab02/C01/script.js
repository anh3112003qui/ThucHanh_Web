function clearDisplay() {
  document.getElementById('display').value = '';
  document.getElementById('result').innerHTML = '0';
}

function appendToDisplay(value) {
  document.getElementById('display').value += value;
}
function clearOneChar() {
  document.getElementById('display').value = document
    .getElementById('display')
    .value.slice(0, -1);
}

function calculate() {
  try {
    document.getElementById('result').innerHTML = eval(
      document.getElementById('display').value
    );
  } catch (error) {
    document.getElementById('display').value = 'Lỗi';
  }
}
