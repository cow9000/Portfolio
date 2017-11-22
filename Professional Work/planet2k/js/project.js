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
		
		$(".project").each(function(){
			if(isVisibleInViewport(this)){
				$(this).css("opacity","1");
			}else{
				$(this).css("opacity","0");
			}	
		});
        
        $(".profile").each(function(){
			if(isVisibleInViewport(this)){
				$(this).css("opacity","1");
			}else{
				$(this).css("opacity","0");
			}
        });
	},100);
    
    
    $(".project .description").each(function(){
        if($(this).text().length > 150){
            $(this).text($(this).text().substring(0,150) + '...');
        }
    });
    
});