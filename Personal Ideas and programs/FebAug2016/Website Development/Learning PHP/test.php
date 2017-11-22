<!DOCTYPE html>
<html>
    <head>
        <title></title>
		<style>
		@-webkit-keyframes example {
    0%   {left:0px; top:0px;}
    25%  {left:640px; top:0px;}
    50%  {left:640px; top:500px;}
    75%  {left:0px; top:500px;}
    100% {left:0px; top:0px;}
}

/* Standard syntax */
@keyframes example {
    0%   {left:0px; top:0px;}
    25%  {left:640px; top:0px;}
    50%  {left:900px; top:200px;}
    75%  {left:0px; top:200px;}
    100% {left:0px; top:0px;}
}
		</style>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
            var degrees = 0;
            var degrees2 = 0;
            var degrees3 = 0;
            var colors = 0;
            
            setInterval(function() {
      $("#test").css('-webkit-transform','rotate('+degrees+'deg)'); 
      $("#test").css('-moz-transform','rotate('+degrees+'deg)');
      $("#test").css('transform','rotate('+degrees+'deg)');
            }, 1000);
        
        $('#container').scroll(function(){
    var $this = $(this),
        scrollPercentage = 100 * $this.scrollLeft() / ($('#contained').width()-$this.width());
        scrollPercentage = Math.round(scrollPercentage);
        degrees = scrollPercentage * 1.8;
        degrees2 = scrollPercentage * .9;
        degrees3 = scrollPercentage * 3.6;
        colors = degrees;
        colors2 = degrees2;
        colors3 = degrees3;
        
      $("#test").css('-webkit-transform','rotate('+degrees+'deg)'); 
      $("#test").css('-moz-transform','rotate('+degrees+'deg)');
      $("#test").css('transform','rotate('+degrees+'deg)');
      
      
            $("#test2").css('-webkit-transform','rotate('+degrees2+'deg)'); 
      $("#test2").css('-moz-transform','rotate('+degrees2+'deg)');
      $("#test2").css('transform','rotate('+degrees2+'deg)');
      
      
            $("#test3").css('-webkit-transform','rotate('+degrees3+'deg)'); 
      $("#test3").css('-moz-transform','rotate('+degrees3+'deg)');
      $("#test3").css('transform','rotate('+degrees3+'deg)');
    $('#log').html(scrollPercentage.toFixed(2)+'%');
    $("#color").css('color', 'rgb(' + colors + ',' + colors2 + ',' + colors3 + ')');
    
            if(scrollPercentage <= 10){
        $("#water").css("background-color", "aqua");
        }
        else if(scrollPercentage <= 20){
        $("#water").css("background-color","b");
        }
        else if(scrollPercentage <= 30){
        $("#water").css("background-color","orange");
        }
        else{$("#water").css("background-color","red");}
});
        
        var num1 = Math.floor((Math.random() * 9) + 1);
        var num2 = Math.floor((Math.random() *9) + 1);
        var num3 = Math.floor((Math.random() * 9) + 1);
	    var deg = Math.floor((Math.random() * 360) + 1);
		var fontsize = Math.floor((Math.random() * 100) + 1);
		var opacity = (Math.random() * 1);
		var sec = Math.floor((Math.random() * 10) + 1);
        num1 = Math.round(num1);
        num2 = Math.round(num2);
        num3 = Math.round(num3);
        
        var left = Math.floor((Math.random() *  1000) + 1);
        left=Math.round(left);
        var top = Math.floor((Math.random() * 1000) + 1);
        top = Math.round(top);
        
        setInterval(function(){
		sec = Math.floor((Math.random() * 10) + 1);
        left = Math.floor((Math.random() * 1000) + 1);
        left=Math.round(left);
		fontsize = Math.floor((Math.random() * 100) + 1);
		opacity = (Math.random() * 1);
		deg = Math.floor((Math.random() * 360) + 1);
        top = Math.floor((Math.random() * 1000) + 1);
        top = Math.round(top);
        num1 = Math.floor((Math.random() * 8) + 1);
        num2 = Math.floor((Math.random() *8) + 1);
        num3 = Math.floor((Math.random() * 8) + 1);
        num1 = Math.round(num1);
        num2 = Math.round(num2);
        num3 = Math.round(num3);
        $("body").prepend("<div style='opacity:" + opacity + " ; font-size:" + fontsize + "px;left:" + left + "px" + "; top:" + top + "px" + "; position:absolute; color:#" + num1 + num2 + num3 + "; '>█</div>");
                num1 = Math.floor((Math.random() * 8) + 1);
        num2 = Math.floor((Math.random() *8) + 1);
        num3 = Math.floor((Math.random() * 8) + 1);
        num1 = Math.round(num1);
        num2 = Math.round(num2);
        num3 = Math.round(num3);
		//$("body").css("background-color","#" + num1 + num2 + num3)
        },1);
        
        });
        
        </script>
        <style>
        #test{background-color:orange; width:10px; height:100px; display:block;}
        #test2{background-color:red; width:5px; height:100px; display:block;}
        #test3{background-color:blue; width:2px; height:100px; display:block;}
        #circle{width:100px; height:100px; border-radius:100%; border:1px solid black;}
        #color{color:rgba(0,0,0,1);}
        #water{background-color:blue; width:150px; height:150px; display:block;}
		body{
		background-color:rgb(34, 17, 17);
		}
        </style>
    </head>
        <body>
            
            
            
            
            
            
            
            
        </body>
</html>

