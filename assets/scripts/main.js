/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        $(".close-btn").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        $(".inner-mobile-toggle").click(function(e) {
            e.preventDefault();
            $("main.main").toggleClass("main-shrink");
            $("aside.sidebar").toggleClass("side-toggle");
        });
         $('.contentt').hide();
         $('a.read').click(function (e) {
          $(this).parent('.excerptt').slideToggle(500);
           $(this).siblings('.whole-post').slideToggle(500);
           console.log(this);
         });
         $('a.read-less').click(function (e) {
          e.preventDefault();
             $(this).parent('.contentt').slideUp('fast');
             $(this).closest('.awsm-content-scrollbar').find('.excerptt').show();
         });
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
        var galleryLink = $('#myTab a');
        var serviceContainerSize = $('.tab-content');
        var serviceContainer = $('.tab-content .tab-pane');
        var targetInit = $('#news');
        var outHeightInit = targetInit.outerHeight();
        serviceContainerSize.css('min-height', outHeightInit + 156 + 'px');

        galleryLink.click(function (e) {
            e.preventDefault();
            $('#myTab a.active-box').removeClass('active-box');
            $(this).addClass('active-box');
            var galleryID = $(this).attr('data-key');
            var target = $('#' + galleryID);
            var outHeight = target.outerHeight();
            serviceContainerSize.css('min-height', outHeight + 100 + 'px');
            target.fadeIn(500);
            serviceContainer.not(target).fadeOut(500);
        });
        // Select all links with hashes
        $('a[href*="#"]')
          // Remove links that don't actually link to anything
          .not('[href="#"]')
          .not('[href="#0"]')
          .click(function(event) {
            // On-page links
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
              // Figure out element to scroll to
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
              // Does a scroll target exist?
              if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $('html, body').animate({
                  scrollTop: target.offset().top
                }, 1000, function() {
                  // Callback after animation
                  // Must change focus!
                  var $target = $(target);
                  $target.focus();
                  if ($target.is(":focus")) { // Checking if the target was focused
                    return false;
                  } else {
                    $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                    $target.focus(); // Set focus again
                  }
                });
              }
            }
          });
      }
    },
    // About us page, note the change from about-us to about_us.
    'single_meetup': {
      init: function() {
        // JavaScript to be fired on the about us page
      },
      finalize: function() {
      jQuery.fn.timelinr = function(options){
        // default plugin settings
        settings = jQuery.extend({
          orientation:              'vertical', // value: horizontal | vertical, default to horizontal
          containerDiv:             '#timeline',  // value: any HTML tag or #id, default to #timeline
          datesDiv:                 '#dates',     // value: any HTML tag or #id, default to #dates
          datesSelectedClass:       'selected',   // value: any class, default to selected
          datesSpeed:               'normal',     // value: integer between 100 and 1000 (recommended) or 'slow', 'normal' or 'fast'; default to normal
          issuesDiv:                '#issues',    // value: any HTML tag or #id, default to #issues
          issuesSelectedClass:      'selected',   // value: any class, default to selected
          issuesSpeed:              'fast',       // value: integer between 100 and 1000 (recommended) or 'slow', 'normal' or 'fast'; default to fast
          issuesTransparency:       0.2,          // value: integer between 0 and 1 (recommended), default to 0.2
          issuesTransparencySpeed:  500,          // value: integer between 100 and 1000 (recommended), default to 500 (normal)
          prevButton:               '#prev',      // value: any HTML tag or #id, default to #prev
          nextButton:               '#next',      // value: any HTML tag or #id, default to #next
          arrowKeys:                'false',      // value: true | false, default to false
          startAt:                  1,            // value: integer, default to 1 (first)
          autoPlay:                 'false',      // value: true | false, default to false
          autoPlayDirection:        'forward',    // value: forward | backward, default to forward
          autoPlayPause:            2000          // value: integer (1000 = 1 seg), default to 2000 (2segs)
        }, options);

        $(function(){
          // Checks if required elements exist on page before initializing timelinr | improvement since 0.9.55
          if ($(settings.datesDiv).length > 0 && $(settings.issuesDiv).length > 0) {
            // setting variables... many of them
            var howManyDates = $(settings.datesDiv+' li').length;
            var howManyIssues = $(settings.issuesDiv+' li').length;
            var currentDate = $(settings.datesDiv).find('a.'+settings.datesSelectedClass);
            var currentIssue = $(settings.issuesDiv).find('li.'+settings.issuesSelectedClass);
            var widthContainer = $(settings.containerDiv).width();
            var heightContainer = $(settings.containerDiv).height();
            var widthIssues = $(settings.issuesDiv).width();
            var heightIssues = $(settings.issuesDiv).height();
            var widthIssue = $(settings.issuesDiv+' li').width();
            var heightIssue = $(settings.issuesDiv+' li').height();
            var widthDates = $(settings.datesDiv).width();
            var heightDates = $(settings.datesDiv).height();
            var widthDate = $(settings.datesDiv+' li').width();
            var heightDate = $(settings.datesDiv+' li').height();
            // set positions!
            if(settings.orientation === 'vertical') {
              $(settings.issuesDiv).height(heightIssue*howManyIssues);
              $(settings.datesDiv).height(heightDate*howManyDates).css('marginTop',heightContainer/2-heightDate/2);
              var defaultPositionDates = parseInt($(settings.datesDiv).css('marginTop').substring(0,$(settings.datesDiv).css('marginTop').indexOf('px')));
            }

            $(settings.datesDiv+' a').click(function(event){
              event.preventDefault();
              // first vars
              var whichIssue = $(this).text();
              var currentIndex = $(this).parent().prevAll().length;
              // moving the elements
              if(settings.orientation === 'vertical') {
                $(settings.issuesDiv).animate({'marginTop':-heightIssue*currentIndex},{queue:false, duration:settings.issuesSpeed});
              }
              $(settings.issuesDiv+' li').animate({'opacity':settings.issuesTransparency},{queue:false, duration:settings.issuesSpeed}).removeClass(settings.issuesSelectedClass).eq(currentIndex).addClass(settings.issuesSelectedClass).fadeTo(settings.issuesTransparencySpeed,1);
              // prev/next buttons now disappears on first/last issue | bugfix from 0.9.51: lower than 1 issue hide the arrows | bugfixed: arrows not showing when jumping from first to last date
              if(howManyDates === 1) {
                $(settings.prevButton+','+settings.nextButton).fadeOut('fast');
              } else if(howManyDates === 2) {
                if($(settings.issuesDiv+' li:first-child').hasClass(settings.issuesSelectedClass)) {
                  $(settings.prevButton).fadeOut('fast');
                  $(settings.nextButton).fadeIn('fast');
                }
                else if($(settings.issuesDiv+' li:last-child').hasClass(settings.issuesSelectedClass)) {
                  $(settings.nextButton).fadeOut('fast');
                  $(settings.prevButton).fadeIn('fast');
                }
              } else {
                if( $(settings.issuesDiv+' li:first-child').hasClass(settings.issuesSelectedClass) ) {
                  $(settings.nextButton).fadeIn('fast');
                  $(settings.prevButton).fadeOut('fast');
                }
                else if( $(settings.issuesDiv+' li:last-child').hasClass(settings.issuesSelectedClass) ) {
                  $(settings.prevButton).fadeIn('fast');
                  $(settings.nextButton).fadeOut('fast');
                }
                else {
                  $(settings.nextButton+','+settings.prevButton).fadeIn('slow');
                }
              }
              // now moving the dates
              $(settings.datesDiv+' a').removeClass(settings.datesSelectedClass);
              $(this).addClass(settings.datesSelectedClass);
              if(settings.orientation === 'horizontal') {
                $(settings.datesDiv).animate({'marginLeft':defaultPositionDates-(widthDate*currentIndex)},{queue:false, duration:'settings.datesSpeed'});
              } else if(settings.orientation === 'vertical') {
                $(settings.datesDiv).animate({'marginTop':defaultPositionDates-(heightDate*currentIndex)},{queue:false, duration:'settings.datesSpeed'});
              }
            });

            $(settings.nextButton).bind('click', function(event){
              event.preventDefault();
              // bugixed from 0.9.54: now the dates gets centered when there's too much dates.
              var currentIndex = $(settings.issuesDiv).find('li.'+settings.issuesSelectedClass).index();
              if(settings.orientation === 'vertical') {
                var currentPositionIssues = parseInt($(settings.issuesDiv).css('marginTop').substring(0,$(settings.issuesDiv).css('marginTop').indexOf('px')));
                var currentIssueIndex = currentPositionIssues/heightIssue;
                var currentPositionDates = parseInt($(settings.datesDiv).css('marginTop').substring(0,$(settings.datesDiv).css('marginTop').indexOf('px')));
                var currentIssueDate = currentPositionDates-heightDate;
                if(currentPositionIssues <= -(heightIssue*howManyIssues-(heightIssue))) {
                  $(settings.issuesDiv).stop();
                  $(settings.datesDiv+' li:last-child a').click();
                } else {
                  if (!$(settings.issuesDiv).is(':animated')) {
                    // bugixed from 0.9.54: now the dates gets centered when there's too much dates.
                    $(settings.datesDiv+' li').eq(currentIndex+1).find('a').trigger('click');
                  }
                }
              }
              // prev/next buttons now disappears on first/last issue | bugfix from 0.9.51: lower than 1 issue hide the arrows
              if(howManyDates === 1) {
                $(settings.prevButton+','+settings.nextButton).removeClass('time-arrow');
              } else if(howManyDates === 2) {
                if($(settings.issuesDiv+' li:first-child').hasClass(settings.issuesSelectedClass)) {
                  $(settings.prevButton).removeClass('time-arrow');
                  $(settings.nextButton).addClass('time-arrow');
                }
                else if($(settings.issuesDiv+' li:last-child').hasClass(settings.issuesSelectedClass)) {
                  $(settings.nextButton).removeClass('time-arrow');
                  $(settings.prevButton).addClass('time-arrow');
                }
              } else {
                if( $(settings.issuesDiv+' li:first-child').hasClass(settings.issuesSelectedClass) ) {
                  $(settings.prevButton).removeClass('time-arrow');
                }
                else if( $(settings.issuesDiv+' li:last-child').hasClass(settings.issuesSelectedClass) ) {
                  $(settings.nextButton).removeClass('time-arrow');
                }
                else {
                  $(settings.nextButton+','+settings.prevButton).addClass('time-arrow');
                }
              }
            });

            $(settings.prevButton).click(function(event){
              event.preventDefault();
              // bugixed from 0.9.54: now the dates gets centered when there's too much dates.
              var currentIndex = $(settings.issuesDiv).find('li.'+settings.issuesSelectedClass).index();
              if(settings.orientation === 'vertical') {
                var currentPositionIssues = parseInt($(settings.issuesDiv).css('marginTop').substring(0,$(settings.issuesDiv).css('marginTop').indexOf('px')));
                var currentIssueIndex = currentPositionIssues/heightIssue;
                var currentPositionDates = parseInt($(settings.datesDiv).css('marginTop').substring(0,$(settings.datesDiv).css('marginTop').indexOf('px')));
                var currentIssueDate = currentPositionDates+heightDate;
                if(currentPositionIssues >= 0) {
                  $(settings.issuesDiv).stop();
                  $(settings.datesDiv+' li:first-child a').click();
                } else {
                  if (!$(settings.issuesDiv).is(':animated')) {
                    // bugixed from 0.9.54: now the dates gets centered when there's too much dates.
                    $(settings.datesDiv+' li').eq(currentIndex-1).find('a').trigger('click');
                  }
                }
              }
              // prev/next buttons now disappears on first/last issue | bugfix from 0.9.51: lower than 1 issue hide the arrows
              if(howManyDates === 1) {
                $(settings.prevButton+','+settings.nextButton).removeClass('time-arrow');
              } else if(howManyDates === 2) {
                if($(settings.issuesDiv+' li:first-child').hasClass(settings.issuesSelectedClass)) {
                  $(settings.prevButton).removeClass('time-arrow');
                  $(settings.nextButton).addClass('time-arrow');
                }
                else if($(settings.issuesDiv+' li:last-child').hasClass(settings.issuesSelectedClass)) {
                  $(settings.nextButton).removeClass('time-arrow');
                  $(settings.prevButton).addClass('time-arrow');
                }
              } else {
                if( $(settings.issuesDiv+' li:first-child').hasClass(settings.issuesSelectedClass) ) {
                  $(settings.prevButton).removeClass('time-arrow');
                }
                else if( $(settings.issuesDiv+' li:last-child').hasClass(settings.issuesSelectedClass) ) {
                  $(settings.nextButton).removeClass('time-arrow');
                }
                else {
                  $(settings.nextButton+','+settings.prevButton).addClass('time-arrow');
                }
              }
            });
            // keyboard navigation, added since 0.9.1
            if(settings.arrowKeys==='true') {
              if(settings.orientation==='horizontal') {
                $(document).keydown(function(event){
                  if (event.keyCode === 39) {
                       $(settings.nextButton).click();
                    }
                  if (event.keyCode === 37) {
                       $(settings.prevButton).click();
                    }
                });
              } else if(settings.orientation==='vertical') {
                $(document).keydown(function(event){
                  if (event.keyCode === 40) {
                       $(settings.nextButton).click();
                    }
                  if (event.keyCode === 38) {
                       $(settings.prevButton).click();
                    }
                });
              }
            }
            // default position startAt, added since 0.9.3
            $(settings.datesDiv+' li').eq(settings.startAt-1).find('a').trigger('click');
          }
        });
      };
      $(function(){
         $().timelinr();
      });
      $(".register").click(function (e) {
          e.preventDefault();
          $(".meetup-join-event").fadeIn(500);
          $("header.banner").css("z-index", "0");
      });

      $(".close-register").click(function (e) {
          e.preventDefault();
          $(".meetup-join-event").fadeOut(500);
          $("header.banner").css("z-index", "2");
      });
              // Select all links with hashes
        $('.anchor-wrap a[href*="#"]')
          // Remove links that don't actually link to anything
          .not('[href="#"]')
          .not('[href="#0"]')
          .click(function(event) {
            // On-page links
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
              // Figure out element to scroll to
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
              // Does a scroll target exist?
              if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $('html, body').animate({
                  scrollTop: target.offset().top
                }, 1000, function() {
                  // Callback after animation
                  // Must change focus!
                  var $target = $(target);
                  $target.focus();
                  if ($target.is(":focus")) { // Checking if the target was focused
                    return false;
                  } else {
                    $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                    $target.focus(); // Set focus again
                  }
                });
              }
            }
          });

      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
