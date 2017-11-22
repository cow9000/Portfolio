

	setInterval(function () {updateChat(); getPlayers();}, 3000);
	
	
	
	
	function updateChat(){
	var xmlhttp;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("chat").innerHTML = xmlhttp.responseText;
            }
        }
		xmlhttp.open("GET","scripts/getChat.php?return=true",true);
		xmlhttp.send();
	}
	
	function getPlayers(){
	var xmlhttp;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("online").innerHTML = xmlhttp.responseText;
            }
        }
		xmlhttp.open("GET","scripts/returnMinecraft.php?players=true",true);
		xmlhttp.send();
	}
	
	
	
	function whenDone(a){
		alert(a);
		return a;
	}
	getUser(function(result) { document.getElementById("player").value = result; });


	
	function passwordOut(callback){
	var xmlhttp;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				callback(xmlhttp.responseText);
            }
        }
		xmlhttp.open("POST","scripts/getPassword.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("pass=out");
	}
	
	
	
	
	
	function getUser(callback) {
		httpRequest = new XMLHttpRequest();
		httpRequest.onreadystatechange = function () {
			if (httpRequest.readyState === 4) { // request is done
				if (httpRequest.status === 200) { // successfully
					callback(httpRequest.responseText); // we're calling our method
				}
			}
		};
		httpRequest.open('GET', "scripts/getUser.php");
		httpRequest.send();
	}
	
	function getChatInput(){
		getUser(function(result) { document.getElementById("player").value = result; });
				passwordOut(function(result3){
					var chat = document.getElementById("chatInput").value;
					var person = document.getElementById("player").value;
					var password = result3;
					if(person != "false"){
						sendChat(chat,person,password);
						document.getElementById("chatInput").value = "";
					}else{
						document.getElementById("chatInput").value = "YOU MUST SIGN IN";
					}
			});
	}
	
	
	function sendChat(chat, person,password){
	var xmlhttp;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //IF enabled
            }
        }
		xmlhttp.open("GET","scripts/outputChat.php?chat=" + escape(chat) + "&player=" + person + "&password=" + password ,true);
		xmlhttp.send();
	}
	
	