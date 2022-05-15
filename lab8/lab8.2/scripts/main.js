var $elem = document.querySelector("#txt");
var text = $elem.textContent;

function change() {
	for (var i = 0; i < text.length; i++) {
		var char = text[i];

		if(char == char.toLowerCase()) {
			text[i] = ' ';
		}
	}
	document.getElementById("txt").innerHTML = text;
}
