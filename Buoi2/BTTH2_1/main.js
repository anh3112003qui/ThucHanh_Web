function tinhLuongThang() {
    var baseSalary = parseFloat(document.getElementById("salary").value);
    var coefficientSalary = parseFloat(document.getElementById("coefficient").value);

    var monthSalary = baseSalary * coefficientSalary;
    
    document.getElementById("result").innerHTML = monthSalary;
}