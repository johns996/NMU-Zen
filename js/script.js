/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {


// To understand behaviors, see https://drupal.org/node/756722#behaviors
Drupal.behaviors.my_custom_behavior = {
  attach: function(context, settings) {

    // Place your code here.
		$(document).ready(function() {
			$('#main-nav-li-one').mouseenter(function(){
				$('#panel-one').show();
				$('a', this).addClass('active');
			});
			$('#main-navigation-wrapper').mouseleave(function(){  //only hide the nav when the mouse leaves the wrapper div
				$('.navigation-panel:visible').hide();  //hide any visible nav panel since we are leaving the wrapper area
				$('.main-navigation a.active').removeClass('active');  //remove any active nav classes
			});
		});

  }
};


})(jQuery, Drupal, this, this.document);
