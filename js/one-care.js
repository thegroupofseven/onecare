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
    if (this.hash !== "" && $(this).attr('href').indexOf(window.location.href) === -1) {
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
  
  var accItem = document.getElementsByClassName('accordionItem');
  var accHD = document.getElementsByClassName('accordionItemHeading');
  for (i = 0; i < accHD.length; i++) {
      accHD[i].addEventListener('click', toggleItem, false);
  }
  function toggleItem() {
      var itemClass = this.parentNode.className;
      for (i = 0; i < accItem.length; i++) {
          accItem[i].className = 'accordionItem close';
      }
      if (itemClass == 'accordionItem close') {
          this.parentNode.className = 'accordionItem open';
      }
  }


  // open jobs
  $('.open-jobs-filter__button--button').on('click', function() {
    $(this).toggleClass('open-jobs-filter__button--active')
    $(this).siblings('.open-jobs-filter__button--link').toggleClass('open-jobs-filter__button--visible')
  })

  // active sidebar item hack
  if ($('body').hasClass('single-open_jobs') && $('.sidebar-container .menu-get-involved-container')) {
    $('.sidebar-container .menu-get-involved-container').find('a[href*="work-for-us/vacancies"]').parent().addClass('current-menu-item current_page_item')
  }

});