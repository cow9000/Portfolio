$(document).ready(function(){

$("#loginButton").click(function(){
	$("#login").css("display","block")
	$("#loginButton").css("display","none")
	$("#registerButton").css("display","none")
});

$("#registerButton").click(function(){
	$("#Signup").css("display","block")
	$("#loginButton").css("display","none")
	$("#registerButton").css("display","none")
});
$('#password').bind('keypress', function(e) {
var valid = (13 || e.which >= 48 && e.which <= 57) || (e.which >= 65 && e.which <= 90) || (e.which >= 97 && e.which <= 122) || 13;
	if (!valid) {
		e.preventDefault();
	}
});
$('#rpassword').bind('keypress', function(e) {
var valid = (13 || e.which >= 48 && e.which <= 57) || (e.which >= 65 && e.which <= 90) || (e.which >= 97 && e.which <= 122) || 13;
	if (!valid) {
		e.preventDefault();
	}
});
$('#email').bind('keypress', function(e) {
var valid = (13 || e.which >= 48 && e.which <= 57) || e.which == 64 || e.which == 46 || (e.which >= 65 && e.which <= 90) || (e.which >= 97 && e.which <= 122) || 13;
	if (!valid) {
		e.preventDefault();
	}
});
$('#username').bind('keypress', function(e) {
var valid = (13 || e.which >= 48 && e.which <= 57) || (e.which >= 65 && e.which <= 90) || (e.which >= 97 && e.which <= 122) ;
	if (!valid) {
		e.preventDefault();
	}
});

$('#usernameSign').bind('keypress', function(e) {
var valid = (13 || e.which >= 48 && e.which <= 57) || (e.which >= 65 && e.which <= 90) || (e.which >= 97 && e.which <= 122);
	if (!valid) {
		e.preventDefault();
	}
});

$('#passwordSign').bind('keypress', function(e) {
var valid = (13 || e.which >= 48 && e.which <= 57) || (e.which >= 65 && e.which <= 90) || (e.which >= 97 && e.which <= 122);
	if (!valid) {
		e.preventDefault();
	}
});

});