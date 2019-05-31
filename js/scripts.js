$('.toogle-menu').on('click', function(e) {
  e.preventDefault;
  $(this).toggleClass('toogle-menu_active');
  $('.slide-menu').toggleClass('slide-menu_active');
  $('.menu li').toggleClass('animate-left');
});

$(window).scroll(function(){
  var h_scroll = $(this).scrollTop();
  if (h_scroll > 56) {
    $('header').addClass('header__fixed')
  } else {
    $('header').removeClass('header__fixed')
  }
})

var timeOut;
function scrollToTop() {
  if (document.body.scrollTop!=0 || document.documentElement.scrollTop!=0){
    window.scrollBy(0,-50);
    timeOut=setTimeout('scrollToTop()',15);
  }
  else clearTimeout(timeOut);
}

$('.p_faq__item').on('click', function(){
  $(this).toggleClass('p_faq__item-open');
});

//TEST PAGE
$('.p_test__submit').on('click', function(){
  openTestModal();
  var testChecked = $('input.kvastest:checked');
  var balls = 0;
  testChecked.each(function(){
    balls = balls + parseInt($(this).val(), 10);
  });
  console.log(balls);
})

var openTestModal = function(){
  $('body').addClass('modal-open');
  $('.testresult__modal').addClass('testresult__modal-open');
  $('.modal__bg').addClass('modal__bg-open');
}

$('.testresult__modal-close').on('click', function(){
  $('body').removeClass('modal-open');
  $('.testresult__modal').removeClass('testresult__modal-open');
  $('.modal__bg').removeClass('modal__bg-open');
})

//CONTACT PAGE
if ($('.p_contact__subtitle').length > 1) {
  var contactSubtitleHeight = $('.p_contact__subtitle').height();
  $('.p_contact__subtitle').each(function(){
    $(this).css({'min-height':contactSubtitleHeight});
  })  
}

//PRODUCTS 
var swiperProductsFunc = function() {
  if ($(document).width() > 760) {
    var swiperProducts = new Swiper('.swiper-products', {
      slidesPerView: 3,
      loop: true,
      pagination: {
        el: '.swiper-pagination',
      },
      navigation: {
        nextEl: '.swiper-products-button-next',
        prevEl: '.swiper-products-button-prev',
      },
    })
  }
}

swiperProductsFunc();

//Product Modal 
$('.p_products__slide').on('click', function(){
  productModal = $(this).data('product-slide');
  $('.'+productModal+'').addClass('p_products__modal-open');
  $('.p_products__block').addClass('p_products__block-hide');
  scrollToTop();
  swiperProductsFunc();
})

$('.p_products__modal-close').on('click', function(){
  $('.p_products__modal').removeClass('p_products__modal-open');
  $('.p_products__block').removeClass('p_products__block-hide');
})

//POSTS 
if ($(document).width() > 760) {
  var swiperPosts = new Swiper('.p_posts__slider', {
    slidesPerView: 3,
    loop: true,
    pagination: {
      el: '.swiper-pagination',
    },
    navigation: {
      nextEl: '.swiper-posts-button-next',
      prevEl: '.swiper-posts-button-prev',
    },
  })
}

//Advantages
if ($(document).width() > 760) {
  var swiperAdvantages = new Swiper('.p_main__advantages-slider', {
    slidesPerView: 3,
    loop: true,
    autoplay: {
      delay: 5000,
    },
    pagination: {
      el: '.swiper-pagination',
    },
  })
}