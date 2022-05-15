var a = prompt("Введите значение для первой стороны a треугольника");
var b = prompt("Введите значение для второй стороны b треугольника");
var c = prompt("Введите значение для третьей стороны c треугольника");

var p = (a + b + c) * 0.5;
var S = Math.sqrt(p * (p - a) * (p - b) * (p - c));
alert("Площадь треугольника равна " + S);

//var myHeading = document.querySelector('h1');
//myHeading.textContent = 'Hello worl!';