//jQuery is required to run this code
var src = 1;
$( document ).ready(function() {
    

    scaleVideoContainer();

    initBannerVideoSize('.video-container .poster img');
    initBannerVideoSize('.video-container .filter');
    initBannerVideoSize('.video-container video');

    $(window).on('resize', function() {
        scaleVideoContainer();
        scaleBannerVideoSize('.video-container .poster img');
        scaleBannerVideoSize('.video-container .filter');
        scaleBannerVideoSize('.video-container video');
    });
    
    $(".1").hover(function(){
        if(src != 1){
            src = 1;
            slideshowChange(1);
        }
    });
    
    $(".2").hover(function(){
        if(src != 2){
            src = 2;
            slideshowChange(2);
        }
    });
    
    $(".3").hover(function(){
        if(src != 3){
            src = 3;
            slideshowChange(3);
        }
    });
    
});

function scaleVideoContainer() {

    var height = $(window).height() + 130;
    var unitHeight = parseInt(height) + 'px';
    $('.homepage-hero-module').css('height',unitHeight);

}

function initBannerVideoSize(element){

    $(element).each(function(){
        $(this).data('height', $(this).height());
        $(this).data('width', $(this).width());
    });

    scaleBannerVideoSize(element);

}

function scaleBannerVideoSize(element){

    var windowWidth = $(window).width(),
    windowHeight = $(window).height() + 130,
    videoWidth,
    videoHeight;

    console.log(windowHeight);

    $(element).each(function(){
        var videoAspectRatio = $(this).data('height')/$(this).data('width');


        $('.homepage-hero-module .video-container video').addClass('fadeIn animated');

    });
}



//START THE SLIDESHOW STUFF
function slideshowChange(s){
        setTimeout(
          function() 
          {
           $(".homepage-hero-module").css("opacity", 0);
          }, 100);
        setTimeout(
          function() 
          {
    if(s == 1){
        $(".2").removeClass("selected");
        $(".3").removeClass("selected");
        $(".1").addClass("selected");
        $(".slideshow p").text("Our mission is to provide students with the opportunity to tinker and proactively explore the technological world around them");
        $(".src1").attr('src',"../images/MP4/Wall-Sketching.mp4");
        $(".src2").attr('src',"../images/WEBM/Wall-Sketching.webm");
        $(".src3").attr('src',"../images/Snapshots/Wall-Sketching.JPG");
    }else if(s == 2){
        $(".1").removeClass("selected");
        $(".3").removeClass("selected");
        $(".2").addClass("selected");
        $(".slideshow p").text("During the year of 2016 we have worked on many projects. We have built a robot that is controlled through a RC controller, a smarthome, and many more. The full lists of projects can be found here");
        $(".src1").attr('src',"../images/MP4/Love-Coding.mp4");
        $(".src2").attr('src',"../images/WEBM/Love-Coding.webm");
        $(".src3").attr('src',"../images/Snapshots/Love-Coding.JPG");
    }else{
        $(".1").removeClass("selected");
        $(".2").removeClass("selected");
        $(".3").addClass("selected");
        $(".slideshow p").text("We have been recognized in the media many times, and we hope to improve the world we live in by raising students to a higher level of thinking.");
    }
          }, 450);
        setTimeout(
          function() 
          {
           $(".homepage-hero-module").css("opacity", 1);
          }, 500);
                  setTimeout(
          function() 
          {
          $("video")[0].load();
          }, 500);
          //$("video")[0].load();
          
}