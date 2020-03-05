$( document ).ready(function() {
  
  
  $(function() {
    $(".service-link.one").addClass('selected');
    $(".reports-full-width#one").addClass('current');
  });

  $(".service-link").on("click", function(){
    $(this).addClass("slick-current");
    $(this).siblings().removeClass("slick-current");
      var href = $(this).attr('href');
      console.log(href);
      
      $(href).addClass('current');
      $(href).siblings().removeClass("current");
      
   });
  
  $('.service-scroll').slick({
    arrows: true,
    autoplay: false,
    dots: false,
    infinite: true,
    cssEase: 'linear',
    speed: 700,
    slidesToShow: 6,
    slidesToScroll: 6,  
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 5
        }
      },
      {
      breakpoint: 900,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3
        }
      },
      {
        breakpoint: 560,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 400,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
  $('.support_slider').slick({
    autoplay:true,
    dots: true,
    infinite: true,
    cssEase: 'linear',
    speed: 700,
    slidesToShow: 1,
    slidesToScroll: 1,
  });
  $('.news-slider').slick({
    arrows: false,
    autoplay:true,
    dots: true,
    infinite: true,
    cssEase: 'linear',
    speed: 700,
    slidesToShow: 1,
    slidesToScroll: 1,
  });
  jQuery('img.svg').each(function(){
      var $img = jQuery(this);
      var imgID = $img.attr('id');
      var imgClass = $img.attr('class');
      var imgURL = $img.attr('src');
  
      jQuery.get(imgURL, function(data) {
          // Get the SVG tag, ignore the rest
          var $svg = jQuery(data).find('svg');
  
          // Add replaced image's ID to the new SVG
          if(typeof imgID !== 'undefined') {
              $svg = $svg.attr('id', imgID);
          }
          // Add replaced image's classes to the new SVG
          if(typeof imgClass !== 'undefined') {
              $svg = $svg.attr('class', imgClass+' replaced-svg');
          }
  
          // Remove any invalid XML tags as per http://validator.w3.org
          $svg = $svg.removeAttr('xmlns:a');
  
          // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
          if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
              $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
          }
  
          // Replace image with new SVG
          $img.replaceWith($svg);
  
      }, 'xml');
  
  });
  
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });

});