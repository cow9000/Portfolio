$(document).ready(function(){
	function isVisibleInViewport(elem)
	{
	    var y = elem.offsetTop;
	    var height = elem.offsetHeight;
	
	    while ( elem = elem.offsetParent )
	        y += elem.offsetTop;
	
	    var maxHeight = y + height;
	    var isVisible = ( y < ( window.pageYOffset + window.innerHeight ) ) && ( maxHeight >= window.pageYOffset );
	    return isVisible; 
	
	}
	setInterval(function () {
		var t = false;
		$(".container").each(function(){
			if(isVisibleInViewport(this)){
                if( $(this).css('opacity') == "0"){
                    if(!t){
                        $(this).css("opacity","1");
                        t = true;
                    }
                }
			}else{
				$(this).css("opacity","0");
			}	
		});
	},500);
    
    
    /*$(".container .description").each(function(){
        if($(this).text().length > 150){
            $(this).text($(this).text().substring(0,150) + '...');
        }
    });*/
    
});