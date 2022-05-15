//При нажатии кнопки, ее текст будет меняться на тот, который был введен пользователем в input
butt.onclick = function() {
	var text = document.getElementById('txt').value;
	document.getElementById('butt').value=text;  
}