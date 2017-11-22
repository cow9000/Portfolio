//Make canvas a object
var canvas = document.getElementById("mainCanvas");
var context = canvas.getContext("2d");

//drawing
var score = 0;


//speed
var fps = 30;

//Width and height for screen
var width = 600;
var height = 500;

canvas.width = width;
canvas.height = height;
/*
Make a rectangle
context.fillStyle = "green";
context.fillRect(100, 100, 20, 20);*/

//Key array
var keys = [];

var player = {
	x: 10,
	y: 10,
	width: 20,
	height: 20,
	speed: 3
};

var enemy = {
	x: Math.random() * (width - 20),
	y: Math.random() * (height - 20),
	width: 20,
	height: 20,
	speed: 3
};


/*
Key Listener

Key down 
window.addEventListener("keydown", function(e){
	alert(e.keyCode);
}, false);


Key up
window.addEventListener("keyup", function(e){
	delete keys[e.keyCode];
}, false);

*/

window.addEventListener("keydown", function(e){
	keys[e.keyCode] = true;
}, false);

window.addEventListener("keyup", function(e){
	delete keys[e.keyCode];
}, false);

/*
up - 38
down - 40
left - 37
right - 39
*/
//Run both Update, and render
function game(){
	update();
	render();
}


function update(){
	if(keys[38]) player.y -= player.speed;
	if(keys[40]) player.y += player.speed;
	if(keys[37]) player.x -= player.speed;
	if(keys[39]) player.x += player.speed;
	
	if(player.y < 0) {player.y = 0;}
	if(player.x < 0) {player.x = 0;}
	if(player.x >= width - player.width) {player.x = width - player.width;}
	if(player.y >= height - player.height) {player.y = height - player.height;}

	if(collision(player,enemy)){
		process();
	}
}

//DRAWING THINGS
function render(){
	context.clearRect(0,0,width,height);
	context.fillStyle= "blue";
	context.fillRect(player.x,player.y,player.width,player.height);
	
	context.fillStyle= "red";
	context.fillRect(enemy.x,enemy.y,enemy.width,enemy.height);
	
	context.font = "bold 30px helvetica";
	context.fillText(score, 30,30);
}

function process(){
	score++;
	enemy.x = Math.random() * (width - 20);
	enemy.y = Math.random() * (height - 20);
}


function collision(first, second){
	return !(first.x > second.x + second.width||
	first.x + first.width < second.x||
	first.y > second.y + second.height||
	first.y + first.height < second.y);
}



//Game loop
setInterval(function(){
	game();
}, 1000/fps);

































