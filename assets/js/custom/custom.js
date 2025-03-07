/**
 *	Custom jQuery Scripts
 *	Developed by: Lisa DeBona
 *  Date Modified: 02.21.2025
 */
jQuery(document).ready(function ($) {
  
  var mobileBreakPoint = 1024;

  $(window).on('load resize', function(){
    mobileNavigation();
  });
  function mobileNavigation() {
    if( $(window).width() <= mobileBreakPoint ) {
      if( $('.MobileNavigation .main-navigation').length==0 ) {
        $('.site-header .main-navigation').appendTo('.mobileNavContent');
        $('.site-header .secondaryNav').appendTo('.mobileNavContent');
      }
    } else {
      if( $('.site-header .primary-navigation .main-navigation').length==0 ) {
        $('.mobileNavContent .main-navigation').appendTo('.site-header .primary-navigation');
        $('.mobileNavContent .secondaryNav').appendTo('.site-header .header-top .header-right');
      }
    }
  }

  if( $('.site-header .secondaryNav .searchBtn').length ) {
    $('.site-header .secondaryNav .searchBtn').clone().insertBefore('.mobile-toggle');
  }

  $('.collapsible-title').on('click', function(){
    var mainParent = $(this).parents('.collapsible');
    var current = $(this);
    $(this).parent().toggleClass('open');
    $(this).parent().find('.collapsible-content').slideToggle();
    $(this).attr('aria-expanded', function(i, attr) {
      return attr === 'true' ? 'false' : 'true';
    });

    //Close previously open
    mainParent.find('.collapsible-title').not(current).each(function(){
      $(this).attr('aria-expanded','false');
      $(this).parent().find('.collapsible-content').slideUp();
    });
  });


  if( $('.slideshow').length ) {
    $('.slideshow').each(function(){
      if( typeof $(this).attr('id')!='undefined' && $(this).attr('id')!=null ) {
        var slideId = '#' + $(this).attr('id');
        do_slideshow(slideId);
      }
    });
  }

  $(document).on('click', '.searchBtn', function(e){
    e.preventDefault();
    var expanded = $(this).attr('aria-expanded') === 'true';
    $(this).attr('aria-expanded', !expanded);
    $('.header-search-form').slideToggle();
    $('.header-search-form input[name="s"]').val("");
    setTimeout(function(){
      $('.header-search-form input[name="s"]').focus();
    },50);
  });

  $(document).on('click', '.mobile-toggle', function(e){
    e.preventDefault();
    var expanded = $(this).attr('aria-expanded') === 'true';
    $(this).attr('aria-expanded', !expanded);
    $('.MobileNavigation').toggleClass('open');
    $('body').toggleClass('mobile-navigation-active');
  });

  $(document).on('click', '.mobileNavClose, .MobileNavigationOverlay', function(e){
    e.preventDefault();
    $('.mobile-toggle').attr('aria-expanded','false');
    $('.MobileNavigation').addClass('closed');
    $('body').removeClass('mobile-navigation-active');
    setTimeout(function(){
      $('.MobileNavigation').removeClass('open closed');
    },500);
  });

  /* Slideshow */
  function do_slideshow(selector) {
    var swiper = new Swiper(selector, {
      effect: 'fade', /* "slide", "fade", "cube", "coverflow" or "flip" */
      loop: true,
      noSwiping: true,
      simulateTouch : true,
      speed: 1000,
      autoplay: {
        delay: 6000,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      on: {
        init: function () {
          //console.log("swiper initialized");
        },
      }
    });
  }

  

}); 
