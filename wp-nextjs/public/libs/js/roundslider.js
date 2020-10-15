function roundslider(selector) {
    if( $(selector).length==0 )
      return;
  
    document.roundslider_disable = 1;
    document.roundslider_active = 1;
    $(selector).css('opacity','0');
  
    if( $(selector + ' > .round-slider-images > div').length < 7 ){
      $(selector + ' > .round-slider-images').append( $(selector + ' .round-slider-images').html() );
    }
  
    document.roundslider_count = $(selector + ' > .round-slider-images > div').length;
    roundslider_render(selector);
  
    setTimeout(function () {
      $(selector).addClass('no-transition').css('opacity','1');
    }, 2000);
  }
  
  function roundslider_render(selector) {
    $(selector + ' > .round-slider-images > div').attr('class', '');
  
    if (document.roundslider_active + 4 > document.roundslider_count) {
      for (var i = 1; i <= document.roundslider_active + 4 - document.roundslider_count; i++) {
        $(selector + ' > .round-slider-images > div:nth-of-type(' + i + ')').attr('class', 'image-' + (5 - (document.roundslider_active + 4 - document.roundslider_count) + i));
      }
    }
  
    var j = 1;
    for (var i = document.roundslider_active; i <= ((document.roundslider_active + 4 > document.roundslider_count) ? document.roundslider_count : document.roundslider_active + 4); i++) {
      $(selector + ' > .round-slider-images > div:nth-of-type(' + i + ')').attr('class', 'image-' + j);
      j++;
    }
  
    if ($('.image-1').prev('div').length)
      $(selector + ' > .round-slider-images > .image-1').prev('div').addClass('prev-slide no-transition');
    else
      $(selector + ' > .round-slider-images > div:last').addClass('prev-slide no-transition');
  
    if ($('.image-5').next('div').length)
      $(selector + ' > .round-slider-images > .image-5').next('div').addClass('next-slide no-transition');
    else
      $(selector + ' > .round-slider-images > div:first').addClass('next-slide no-transition');
  
    setTimeout(function() {
      document.roundslider_disable = 0;
    }, 1100);
  }
  
  function roundslider_prev(selector, disable=1) {
    if (document.roundslider_disable && disable)
      return;
    document.roundslider_disable = 1;
    document.roundslider_active = (document.roundslider_active == 1) ? document.roundslider_count : document.roundslider_active - 1;
    roundslider_render(selector)
  }
  
  function roundslider_next(selector, disable=1) {
    if (document.roundslider_disable && disable)
      return;
    document.roundslider_disable = 1;
    document.roundslider_active = (document.roundslider_active == document.roundslider_count) ? 1 : document.roundslider_active + 1;
    roundslider_render(selector)
  }