function suppressBackspace(evt) {
    evt = evt || window.event;
    var target = evt.target || evt.srcElement;

    if (evt.keyCode == 8 && !/input|textarea/i.test(target.nodeName)) {
		if(input){
			inputText = inputText.slice(0, inputText.length - 1);
			document.getElementById("textBox").innerHTML = getTextBox + inputText;
		}
        return false;
    }
}

document.onkeydown = suppressBackspace;
document.onkeypress = suppressBackspace;


document.onkeypress = function(evt) {
    evt = evt || window.event;
    var charCode = evt.keyCode || evt.which;
    var charStr = String.fromCharCode(charCode);
	if(evt.keyCode == 13){
		next();
	}else if(input){
		if(evt.keyCode != 8){
			
			inputText = inputText + String.fromCharCode(charCode);
			document.getElementById("textBox").innerHTML = getTextBox + inputText;
		}else{
			inputText = inputText.slice(0, inputText.length - 1);
			document.getElementById("textBox").innerHTML = getTextBox + inputText;
		}
	}
	
	
};



var update = setInterval(function(){writeText()},75);
var writing = false;

//(o) - Old mad, (y) - you, (i) - INPUT, (g) - GET INPUT , (n) - Narrator , :g TEXT:- green, :r TEXT : - red, :y TEXT : - is yellow
var lines = ["(n) You wake up, not knowing where you are, the only thing you know is your name.",
"Enter your name - (i)",
"(n) Your name is (g), ",
"",
"",
"",
"",
"",
""]
var getChar = "";
var line = "";
var textSpot = 0;

var i = 0;
var i2 = 0;
var getTextBox = "";
var inputText = "";
var input = false;
y = false;
p = false;
function writeText(){

	if(i == i2){
		writing = true;
	}


	if(writing){
		var str = lines[i];
		if(textSpot < str.length){
			getChar = lines[i].split('')[textSpot];
			if(getChar != "<" && getChar != ">" && getChar != ":" && getChar != "(" && getChar != ")"){
				if(y == true){
					y = false;
					getChar = "";
				}
				line = line + getChar;
				document.getElementById("textBox").innerHTML = line;
				document.getElementById('play').play();
			}else{
				document.getElementById('play').pause();
				if(getChar == ":"){
					if(lines[i].split('')[textSpot + 1] == "g"){
						
						getChar = "<p style='color:green;  display:inline;'>"
						line = line + getChar;
						document.getElementById("textBox").innerHTML = line;
						document.getElementById('play').play();
						textSpot ++;
						p = true;
					}else if(lines[i].split('')[textSpot + 1] == "r"){
						
						getChar = "<p style='color:red; display:inline;'>"
						line = line + getChar;
						document.getElementById("textBox").innerHTML = line;
						document.getElementById('play').play();
						textSpot ++;
						p = true;
					}else if(lines[i].split('')[textSpot + 1] == "y"){
						
						getChar = "<p style='color:yellow; display:inline;'>"
						line = line + getChar;
						document.getElementById("textBox").innerHTML = line;
						document.getElementById('play').play();
						textSpot ++;
						p = true;
					}else if(lines[i].split('')[textSpot + 1] != ":"){
						if(p == true){
							line = line + "</p>"
						}
					}
					
					
					
				}else if(getChar == "(" && lines[i].split('')[textSpot + 1] == "y"){
					y = true;
					getChar = "<p style='color:yellow; display:inline;'>(You)</p>"
					line = line + getChar;
					document.getElementById("textBox").innerHTML = line;
					document.getElementById('play').play();
				}else if(getChar == "(" && lines[i].split('')[textSpot + 1] == "o"){
					y = true;
					getChar = "<p style='color:yellow; display:inline;'>(Old man)</p>"
					line = line + getChar;
					document.getElementById("textBox").innerHTML = line;
					document.getElementById('play').play();
				}else if(getChar == "(" && lines[i].split('')[textSpot + 1] == "i"){
					y = true;
					getChar = ""
					line = line + getChar;
					document.getElementById("textBox").innerHTML = line;
					document.getElementById('play').play();
					startInput();
				}else if(getChar == "(" && lines[i].split('')[textSpot + 1] == "g"){
					y = true;
					getChar = "<p style='color:lightgreen; display:inline;'>" + inputText + "</p>"
					line = line + getChar;
					document.getElementById("textBox").innerHTML = line;
					document.getElementById('play').pause();
				}else if(getChar == "(" && lines[i].split('')[textSpot + 1] == "n"){
					y = true;
					getChar = "<p style='color:lightgreen; display:inline;'>Narrator - </p>"
					line = line + getChar;
					document.getElementById("textBox").innerHTML = line;
					document.getElementById('play').pause();
				}
			}
			textSpot ++;
		}else{
			if(!input){
				document.getElementById("textBox").innerHTML = line + "<br> - Press enter to continue";
				document.getElementById('play').pause();
				writing = false;
				line = "";
				textSpot = 0;
				i ++;
			}	
		}
	}
	
}

function next(){
	
	if(input == true){
		input = false;
		i2 ++;
	}
	
	
	if(writing == false){
		i2 ++;
	}


}

function startInput(){
	
	getTextBox = document.getElementById("textBox").innerHTML;
	inputText = "";
	input = true;
	
}
