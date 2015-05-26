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
        // suorita kun dia vaihtuu
        $('.main-gallery').on('beforeChange', function(event, slick, currentSlide, nextSlide){
          $('#video')[0].currentTime = 0; // aseta ajaksi 0. Aloittaa videon alusta.
          $('#video')[0].play(); // toistaa videon.
        });
    }

});

