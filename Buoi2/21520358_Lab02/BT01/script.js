function calculateSalary() {
  document.getElementById('salary').innerHTML =
    parseFloat(document.getElementById('basic-salary').value) *
    parseFloat(document.getElementById('coefficient-salary').value);
}
