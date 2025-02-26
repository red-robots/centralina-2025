"use strict";

/**
 *	Custom jQuery Scripts
 *	Developed by: Lisa DeBona
 *  Date Modified: 02.21.2025
 */
jQuery(document).ready(function ($) {
  $('.collapsible-title').on('click', function () {
    var mainParent = $(this).parents('.collapsible');
    var current = $(this);
    $(this).parent().toggleClass('open');
    $(this).parent().find('.collapsible-content').slideToggle();
    $(this).attr('aria-expanded', function (i, attr) {
      return attr === 'true' ? 'false' : 'true';
    }); //Close previously open

    mainParent.find('.collapsible-title').not(current).each(function () {
      $(this).attr('aria-expanded', 'false');
      $(this).parent().find('.collapsible-content').slideUp();
    });
  });

  if ($('.slideshow').length) {
    $('.slideshow').each(function () {
      if (typeof $(this).attr('id') != 'undefined' && $(this).attr('id') != null) {
        var slideId = '#' + $(this).attr('id');
        do_slideshow(slideId);
      }
    });
  }
  /* Slideshow */


  function do_slideshow(selector) {
    var swiper = new Swiper(selector, {
      effect: 'fade',

      /* "slide", "fade", "cube", "coverflow" or "flip" */
      loop: true,
      noSwiping: true,
      simulateTouch: true,
      speed: 1000,
      autoplay: {
        delay: 6000
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      },
      on: {
        init: function init() {//console.log("swiper initialized");
        }
      }
    });
  }
});