$(document).ready(function () {
    $('.preloader').addClass('will-hide');
    roundslider('.round-slider-container');
  
    setTimeout(function () {
      $("body").removeClass('hide-scroll');
      $('.preloader').remove();
  
      AOS.init({
        duration: 1000,
        once: true
      });
    }, 2000);
  
    if (!$('#top-nav.navbar').hasClass('static-height')) {
      $(document).scroll(function () {
        if ($(document).scrollTop() > 20 && !$('#top-nav.navbar').hasClass('navbar-is-scrolling'))
          $('#top-nav.navbar').addClass('navbar-is-scrolling');
        else if ($(document).scrollTop() <= 20 && $('#top-nav.navbar').hasClass('navbar-is-scrolling'))
          $('#top-nav.navbar').removeClass('navbar-is-scrolling');
      }).scroll();
    }
  
    $('#topnavbar').on('show.bs.collapse', function () {
      $('#top-nav').addClass('collapsed');
    }).on('hide.bs.collapse', function () {
      $('#top-nav').removeClass('collapsed');
    });
  
    $('.team-members').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
      if (nextSlide == 0 && currentSlide != 1)
        roundslider_next('.round-slider-container', 0);
      else if (currentSlide == 0 && nextSlide != 1)
        roundslider_prev('.round-slider-container', 0);
      else if (currentSlide > nextSlide)
        roundslider_prev('.round-slider-container', 0);
      else if (currentSlide < nextSlide)
        roundslider_next('.round-slider-container', 0);
    });
  
    $(document).on('click', 'a[href^="#"]', function (event) {
      event.preventDefault();
  
      $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top - $('#top-nav').outerHeight() - 20
      }, 1000);
    });
  
    $('.video-popup').magnificPopup({
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 160,
      preloader: false,
    });
  
  });