(function($) {
  "use strict"; // Start of use strict
  //Scrolling to sections with easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 71)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Closes menu when a link is clicked
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // Closes the menu when the page is scrolled
  $(window).scroll(function() {
    $('.navbar-collapse').collapse('hide');
  });

  $(".over").overhang({
    type: "success",
    message: "Email Sent!"
  });

})(jQuery); // End of use strict
  