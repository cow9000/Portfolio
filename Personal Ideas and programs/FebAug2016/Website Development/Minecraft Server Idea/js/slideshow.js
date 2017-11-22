var updateTimer = setInterval(function(){update()},1);
var time = -5;
var i = 1;

var title = ["Welcome to Conjured Earth"," Title 2","Title 3"];
var desc = ["We welcome you to our website, and we hope you have a wonderful stay.","Desc 2","Desc 3"];


function update(){
	if(time == -5){
		document.getElementById("title").innerHTML = title[i-1];
		document.getElementById("text").innerHTML = desc[i-1];
	}
	
	
	time += 5;
	document.getElementById("timer").style.width = ((time/15000) * 100).toString() + "%";
	if(time > 15000){
		startSlideshow();
		time = 0;
	}
}


function startSlideshow(){
	i ++;
	if(i > 3) i = 1;
	document.getElementById("image").style.opacity = 0;
	
	
	setTimeout(function(){
		document.getElementById("image").style.opacity = 1; 
		document.getElementById("title").style.opacity = 1; 
		document.getElementById("text").style.opacity = 1;
	},700);
	
	
	setTimeout(function(){
		document.getElementById("image").src = "Images/slideshow/" + i.toString() + ".jpg";
		document.getElementById("title").innerHTML = title[i-1];
		document.getElementById("text").innerHTML = desc[i-1];
	},100);
	
}