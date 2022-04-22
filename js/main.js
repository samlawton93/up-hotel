$(function() {
  AOS.init();
});

if ($('*[class*="wp-block"]').length > 0) {
		$('*[class*="wp-block"]').addClass('container large-container');
	}

$(document).ready(function() {
  $('.nav-item > a[href*="#contact-us"]').addClass('main-button');
});


// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top - 250
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });

window.onscroll = function() {
  stickyHeader();
};

var header = document.getElementById("header");
var sticky = header.offsetTop + 150;

console.log(sticky);

function stickyHeader() {
  if (window.pageYOffset > sticky) {
    header.classList.add("fixed-top");
  } else {
    header.classList.remove("fixed-top");
  }
}

//Add class to first paragraph in single.php
$(document).ready(function() {
  $('.post-body > p').first().addClass('lead');
  $('.post-body > blockquote').addClass('blockquote');
});

$('.hamburger-icon > .bars').on('click', function(){
  $('.hamburger-icon').toggleClass('open');
})
