/* global jQuery */
(function ($) {
  /* Smooth scroll for anchors */
  $('.js-scroll').click(function (e) {
    e.preventDefault()
    var dest = 0
    if ($(this.hash).offset().top > $(document).height() - $(window).height()) {
      dest = $(document).height() - $(window).height()
    } else {
      dest = $(this.hash).offset().top
    }

    $('html,body').animate({
      scrollTop: dest
    }, 1000)
  })

  /* Shows .sub-menu  */
  $('.menu-item-has-children').on('click', function (e) {
    if ($(e.target).is('.menu-item-has-children > a')) {
      e.preventDefault()
    }
    var subMenu = $(this).children('.sub-menu')
    if (!subMenu.hasClass('sub-menu-active')) {
      subMenu.addClass('sub-menu-active')
    } else if (!$(e.target).is('.sub-menu li a')) {
      subMenu.removeClass('sub-menu-active')
    }
  })

  /* Closes .sub-menu on body click */
  $('body').on('click', function (e) {
    if (!$(e.target).is('.sub-menu li a') && !$(e.target).is('.menu-item-has-children > a')) {
      $('.sub-menu').removeClass('sub-menu-active')
    }
  })

/* Scrolls to selected section */
$(".scroll-to").click(function(e) {
  e.preventDefault();
  var aid = $(this).attr("href");
  $('html,body').animate({scrollTop: $(aid).offset().top - 50},'slow');
});

})(jQuery)
