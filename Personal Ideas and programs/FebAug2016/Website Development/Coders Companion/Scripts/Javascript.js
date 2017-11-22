$(document).ready(function(){
var htmlCode = $.cookie("htmlCode");

//if(htmlCode != null){
//$("#html").val(htmlCode);
//}
//if($.cookie("cssCode") != null){
//$("#css").val($.cookie("cssCode"));
//}
//if($.cookie("jsCode") != null){
//$("#js").val($.cookie("jsCode"));
//}



$("#prev").contents().find("html").html("<!DOCTYPE html> <html>");
	
	
	
    var Op = false;
    var ValHtml1 = $("#html").val();
    var ValHtml2 = $("#html").val();
    var Valcss1 = $("#css").val();
    var Valcss2 = $("#css").val();
    var Valjs1 = $("#js").val();
    var Valjs2 = $("#js").val();

    $("#prev").contents().find("head").html("<script>" + Valjs1 + "</script>" + "<style>" + Valcss1 + "</style" + ">");
    $("#prev").contents().find("body").html(ValHtml1);
    $(".biglink").click(function(){
        if(Op == false){
        Op = true;
        $(this).html("Hide Options");
        $("#top2").slideUp(400);
        $("#top3").slideUp(400).delay(400).slideDown(400);
        }
        else {
        Op = false;
        $(this).html("Coders Island");
        $("#top3").slideUp(400);
        $("#top2").slideUp(400).delay(400).slideDown(400);
        }
    
    });
    setInterval(function(){
    ValHtml1 = $("#html").val();
    Valcss1 = $("#css").val();
    Valjs1 = $("#js").val();
    if(ValHtml1 != ValHtml2){
    ValHtml1 = $("#html").val();
    ValHtml2 = $("#html").val();
    Valcss1 = $("#css").val();
    Valcss2 = $("#css").val();
    Valjs1 = $("#js").val();
    Valjs2 = $("#js").val();
    update();
    } 
    else if(Valcss1 != Valcss2){
    ValHtml1 = $("#html").val();
    ValHtml2 = $("#html").val();
    Valcss1 = $("#css").val();
    Valcss2 = $("#css").val();
    Valjs1 = $("#js").val();
    Valjs2 = $("#js").val();
    update();
    } 
    else if(Valjs1 != Valjs2){
    ValHtml1 = $("#html").val();
    ValHtml2 = $("#html").val();
    Valcss1 = $("#css").val();
    Valcss2 = $("#css").val();
    Valjs1 = $("#js").val();
    Valjs2 = $("#js").val();
    update();
    } 
    },1000);
    
    function update(){
    $("#prev").contents().find("head").html("<script>" + Valjs1 + "</script>" + "<style>" + Valcss1 + "</style" + ">");
    $("#prev").contents().find("body").html(ValHtml1);
    
    
    
    };
    
	function save(){
		$.cookie("htmlCode", $("#html").val());
		$.cookie("cssCode", $("#css").val());
		$.cookie("jsCode", $("#js").val());
		$("#saveText").slideDown(500).delay(1000).slideUp(500);
	};
	
	
    $("#htmlB").click(function(){
        $(".HoverOver").html("HTML");
        $("#js").css("display","none");
        $("#css").css("display","none");
        $("#html").css("display","block");
        $("#clipBoard").css("display","none");
    });
    $("#cssB").click(function(){
        $(".HoverOver").html("Css");
        $("#js").css("display","none");
        $("#css").css("display","block");
        $("#html").css("display","none");
        $("#clipBoard").css("display","none");
    });
    $("#jsB").click(function(){
        $(".HoverOver").html("Javascript");
        $("#js").css("display","block");
        $("#css").css("display","none");
        $("#html").css("display","none");
        $("#clipBoard").css("display","none");
    });
    
	$(".saveFile").click(function(){
			
			
		save();
	});
	$("#buttonFont").click(function(){
		//Need a font. http://www.w3schools.com/cssref/css_websafe_fonts.asp WEB SAFE FONTS.
		
		
		
		
		
	});
	
		window.setInterval(function() {
		save();
	}, 60000);
	
	
	$(document).delegate('textarea', 'keydown', function(e) {
  var keyCode = e.keyCode || e.which;

  if (keyCode == 9) {
    e.preventDefault();
    var start = $(this).get(0).selectionStart;
    var end = $(this).get(0).selectionEnd;

    // set textarea value to: text before caret + tab + text after caret
    $(this).val($(this).val().substring(0, start)
                + "\t"
                + $(this).val().substring(end));

    // put caret at right position again
    $(this).get(0).selectionStart =
    $(this).get(0).selectionEnd = start + 1;
  }
});

$(window).bind('keydown', function(event) {
    if (event.ctrlKey || event.metaKey) {
        switch (String.fromCharCode(event.which).toLowerCase()) {
        case 's':
            event.preventDefault();
			save();
            break;
        case 'f':
            event.preventDefault();
            alert('ctrl-f');
            break;
        case 'g':
            event.preventDefault();
            alert('ctrl-g');
            break;
        }
    }
});


});