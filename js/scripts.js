$('.mobile-menu').on('click', function(e) {
  e.preventDefault;
  $(this).toggleClass('mobile-menu__active');
  $('.mobile-cover').toggleClass('mobile-cover__open');
  $('body').toggleClass('modal-open');
});

$(window).scroll(function(){
  var h_scroll = $(this).scrollTop();
  if (h_scroll > 110) {
    $('header').addClass('header__fixed')
  } else {
    $('header').removeClass('header__fixed')
  }
})

jQuery(document).ready(function($){
  $('.hero').addClass('hero__active');
})

$('a').click(function() {
  window.location.href = window.location.href.substr(0, window.location.href.indexOf('#'));
});

var userAgent, ieReg, ie;
userAgent = window.navigator.userAgent;
ieReg = /msie|Trident.*rv[ :]*11\./gi;
ie = ieReg.test(userAgent);

if(ie) {
  $(".object-fit").each(function () {
    var $container = $(this),
        imgUrl = $container.find("img").prop("src");
    if (imgUrl) {
      $container.css({"background-image":'url(' + imgUrl + ')', "background-size":"cover", "background-position": "center top"}).addClass("custom-object-fit");
    }
  });
}

$('.p_faq__item').on('click', function(){
  $(this).toggleClass('p_faq__item-open');
});

//MAIN HERO
var swiperMainHeroFunc = function() {
  var swiperProducts = new Swiper('.main-hero-swiper', {
    slidesPerView: 1,
    loop: true,
    effect: 'fade',
    autoplay: {
      delay: 5000,
    },
    pagination: {
      el: '.main-hero-swiper-pagination',
    },
  })
}

swiperMainHeroFunc();

//TEST PAGE
$('.p_test__submit').on('click', function(){
  openTestModal();
  var testChecked = $('input.kvastest:checked');
  var balls = 0;
  testChecked.each(function(){
    balls = balls + parseInt($(this).val(), 10);
  });
  if(balls <= 2) {
    $('.testresult__modal-awesome').removeClass('testresult__modal-showblock');
    $('.testresult__modal-good').removeClass('testresult__modal-showblock');
    $('.testresult__modal-bad').addClass('testresult__modal-showblock');
  }
  if(balls === 3 ) {
    $('.testresult__modal-awesome').removeClass('testresult__modal-showblock');
    $('.testresult__modal-bad').removeClass('testresult__modal-showblock');
    $('.testresult__modal-good').addClass('testresult__modal-showblock');
  }
  if(balls >= 4 ) {
    $('.testresult__modal-good').removeClass('testresult__modal-showblock');
    $('.testresult__modal-bad').removeClass('testresult__modal-showblock');
    $('.testresult__modal-awesome').addClass('testresult__modal-showblock');
  }
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
if ($(document).width() > 992) {
  if ($('.p_contact__subtitle').length > 1) {
    var contactSubtitleHeight = $('.p_contact__subtitle').height();
    $('.p_contact__subtitle').each(function(){
      $(this).css({'min-height':contactSubtitleHeight});
    })  
  }
}

if ($(document).width() < 992) {
  var headerTopHeight = $('.mobile-cover .header__top').height();
  console.log(headerTopHeight);
  $('.mobile-cover .header__menu').css({'margin-top':headerTopHeight});
}

//PRODUCTS 
var swiperProductsFunc = function() {
  if ($(document).width() > 992) {
    var swiperProducts = new Swiper('.swiper-products', {
      slidesPerView: 3,
      clickable: true,
      observer: true,
      loop: true,
      pagination: {
        el: '.swiper-mainproducts-pagination',
      },
      navigation: {
        nextEl: '.swiper-products-button-next',
        prevEl: '.swiper-products-button-prev',
      },
    })
  } else {
    var swiperProducts = new Swiper('.swiper-products', {
      slidesPerView: 1,
      observer: true,
      clickable: true,
      loop: true,
      pagination: {
        el: '.swiper-mainproducts-pagination',
      },
      navigation: {
        nextEl: '.swiper-products-button-next',
        prevEl: '.swiper-products-button-prev',
      },
    })
  }
}

var swiperProductsSimilarFunc = function() {
  var swiperSimilarProducts = new Swiper('.swiper-products-similar', {
    slidesPerView: 3,
    loop: true,
    preventClicks: false,
    observer: true,
    pagination: {
      el: '.swiper-innerproduct-pagination',
    },
    navigation: {
      nextEl: '.swiper-products-button-next',
      prevEl: '.swiper-products-button-prev',
    },
    breakpoints: {
      768: {
        slidesPerView: 1,
      },
    }
  })
}

swiperProductsFunc();

//Product Modal 
function scrollToTop(value) {
  console.log(value);
  var targetScroll =  $('#' + value).offset().top;
  $('html, body').animate({
      scrollTop: (targetScroll - 100)
  }, 500);
  swiperProductsSimilarFunc();
}

$('.p_products__slide').on('click', function(){
  $('.p_products__modal').removeClass('p_products__modal-open');
  $('.p_products__block').removeClass('p_products__block-hide');
  productModal = $(this).data('product-slide');
  $('.'+productModal+'').addClass('p_products__modal-open');
  $('.p_products__block').addClass('p_products__block-hide');
  scrollToTop(productModal);
})

$('.p_products__modal-close').on('click', function(){
  $('.p_products__modal').removeClass('p_products__modal-open');
  $('.p_products__block').removeClass('p_products__block-hide');
  swiperProductsFunc();
})

//POSTS 
if ($(document).width() > 992) {
  var swiperCompPosts = new Swiper('.p_posts__slider', {
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
if ($(document).width() < 992) {
  var swiperMobilePosts = new Swiper('.p_posts__slider', {
    slidesPerView: 2,
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

if ($(document).width() < 760) {
  var swiperAdvantages = new Swiper('.p_main__advantages-slider', {
    slidesPerView: 1,
    loop: true,
    autoplay: {
      delay: 5000,
    },
    pagination: {
      el: '.swiper-pagination',
    },
  })
}

//RECIPES PAGE 
if ($('.p_posts__first-info').length > 0){
  var heightPostInfo = $('.p_posts__first-info').height();
  console.log(heightPostInfo);
  $('.ingredients-open').css({'top':'calc(10px + ' + heightPostInfo + 'px)'});  
}

$('.ingredients').on('click', function(){
  $('.ingredients-open').toggleClass('ingredients-open-toggle');
  $('.ingredients-toggle').toggleClass('ingredients-toggle-open');
})