var sliderPukI = 1;
var slidePukId = $('.slider-puk-slide');

if($('.slider-puk-wrapper').length > 0) {
  var sliderPukWidth = $('.slider-puk-wrapper').width();
  var sliderPukSlideIterator = 0;
  var sliderPukMove = 0;
}

slidePukId.each(function(){
  var currentSlide = $(this).data('slider-puk-id');
  if(currentSlide === 1) {
    $(this).addClass('slider-puk-active');
    return;
  } else {
    $(this).removeClass('slider-puk-active');
    return;
  }
});

$('.slider-puk-left').on('click', function(){
	if (sliderPukI > 1) {
	  sliderPukI = sliderPukI - 1;
    sliderPukMove = - (sliderPukSlideIterator - sliderPukWidth);
    sliderPukSlideIterator -= sliderPukWidth;
    slidePukId.each(function(){
      var currentSlide = $(this).data('slider-puk-id');
      $('.slider-puk-wrapper').css({'transform':'translate3d(' + sliderPukMove + 'px, 0px, 0px)'});
      if(currentSlide === sliderPukI) {
        $(this).addClass('slider-puk-active');
        return;
      } else {
        $(this).removeClass('slider-puk-active');
        return;
      }
    });
    
  }
})

$('.slider-puk-right').on('click', function(){
  if (sliderPukI < slidePukId.length) {
    sliderPukI = sliderPukI + 1;
    sliderPukMove = - (sliderPukSlideIterator + sliderPukWidth);
    sliderPukSlideIterator += sliderPukWidth;
    slidePukId.each(function(){
      var currentSlide = $(this).data('slider-puk-id');
      var prevSlide = $(this).prev();
      // $(prevSlide.className).find('.p_brewery__img img').addClass('slider-puk-prev');
      $('.slider-puk-wrapper').css({'transform':'translate3d(' + sliderPukMove + 'px, 0px, 0px)'})
      if(currentSlide === sliderPukI) {
        $(this).addClass('slider-puk-active');
        // $(this).find('.p_brewery__img img').css({'transform':'translateX(-100%)'});
        return;
      } else {
        $(this).removeClass('slider-puk-active');
        return;
      }
    });
    
  }
})