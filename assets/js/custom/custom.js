/**
 *	Custom jQuery Scripts
 *	Developed by: Lisa DeBona
 *  Date Modified: 02.21.2025
 */
jQuery(document).ready(function ($) {
 
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
}); 
