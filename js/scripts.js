// -- PRELOADER -- //
jQuery(window).load(
    function() { 
        jQuery(".container").fadeOut(); 
        jQuery("#preloader").delay(500).fadeOut("slow"); 
});  

jQuery(document).ready(function($) {
    $('.main-gallery').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 10000,
      adaptiveHeight: true,
      arrows: false
    });
    
    if ($('#video').length > 0) { // tarkastaa onko #video olemassa
        // On before slide change
        $('.main-gallery').on('beforeChange', function(event, slick, currentSlide, nextSlide){
          $('#video')[0].play();
        });
    }

});

