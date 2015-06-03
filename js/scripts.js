// -- PRELOADER -- //
jQuery(window).load(
    function() { 
        jQuery(".container").fadeOut(); 
        jQuery("#preloader").delay(100).fadeOut("slow"); 
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
        
    // suorita kun dian vaihtumisen jälkeen
    $('.main-gallery').on('afterChange', function(event, slick, currentSlide, nextSlide){
        if ($('.slick-active').has('video').length > 0) { // tarkasta onko aktiivisessa diassa videota
            $('.slick-active > #video')[0].currentTime = 0; // aseta ajaksi 0. Aloittaa videon alusta.
            $('.slick-active > #video')[0].play(); // toistaa videon.
        } 
    });   
});

