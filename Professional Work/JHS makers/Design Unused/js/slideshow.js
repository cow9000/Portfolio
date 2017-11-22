//time is how many seconds it will run through the slideshow
var timer = 15;
//current is the second it currently is on
var current = 0;

//number is for the slide it currently is on
var number = 1;
//maxNum is for the amount of slides it has (0.png,1.png,etc);
var maxNum = 1;

var disabled = true;


/////////////////////////
//So I do not need to initiate it in onload
/////////////////////////
startTimer();

////////////////////////
//Makes it so the document has a set background and size at the beginning so it doesn't show up blank.
////////////////////////
document.getElementById("slideshow").style.background="url(images/slideshow/" + number.toString() + ".png)";
//document.getElementById("slideshow").style.backgroundSize="100% 100%";
/////////////////////////



//Should be self-explanatory if you read above variables.
function startTimer(){
	var myVar = setInterval(count, 1000);
}

function count(){
	if(disabled == false){
		if(current >= timer){
			
			if(number == maxNum){
				number = -1;
			}
			number ++;
			
			current = 0;
			document.getElementById("slideshow").style.background="url(images/slideshow/" + number.toString() + ".png)";
			//document.getElementById("slideshow").style.backgroundSize="100% 100%";
			document.getElementById("b1").style.width=(current/timer) * 100 + "%";
		}else{
			current += 1;
			document.getElementById("b1").style.width=(current/timer) * 100 + "%";
		}
	}
}