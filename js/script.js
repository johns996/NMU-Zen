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

    // Place all code here.

		//load enquire.js and a polyfill if needed
		Modernizr.load([
    //first test need for polyfill
    {
        test: window.matchMedia,
        nope: "/sites/all/themes/zen_nmu/js/vendor/matchMedia.js"
    },

    //and then load enquire
    "/sites/all/themes/zen_nmu/js/vendor/enquire.min.js",
    //finally, load the scripts that depend on enquire
    "/sites/all/themes/zen_nmu/js/enquire-helper.js"
		]);

		$(document).on('click', '.yamm .dropdown-menu', function(e) {
			e.stopPropagation()
		});

		// add fade in animation to bootstrap dropdowns
		$('.dropdown').on('show.bs.dropdown', function(e){
			$(this).find('.dropdown-menu').first().stop(true, true).fadeIn(200);
		});

		// add fade out animation to bootstrap dropdowns
		$('.dropdown').on('hide.bs.dropdown', function(e){
			$(this).find('.dropdown-menu').first().stop(true, true).fadeOut(300);
		});

		$('#main-navigation-collapse a').click(function(){
				//make a nav item loose its focus if a user clicks on the item to hide the dropdown menu
				//not 100% sure why this lets the item come into focus on the first click
				$(this).blur();
		});


		//add or remove a class to the navbar to keep it opaque when actively showing navigation items
		$('#header-main-navigation').on('show.bs.dropdown', function () {
			$(this).addClass('nav-active');
		});
		$('#header-main-navigation').on('hide.bs.dropdown', function () {
			$(this).removeClass('nav-active');
		});

		if ($('#nmu-alert').length){
			var alertHeight = $('#nmu-alert').height();
			alertHeight = alertHeight + 62;  //62 is the margin (30) padding (30) and border (2)
			currentOffset = $('#header-main-navigation').attr('data-offset-top');
			var theFullHeight = parseInt(currentOffset,10) + parseInt(alertHeight,10);
			$('#header-main-navigation').attr('data-offset-top', theFullHeight);
			//$('#header-main-navigation').data('bs.affix').options.offset = theFullHeight;
		};

		$('#nmu-alert').on('closed.bs.alert', function () {
			$('#header-main-navigation').data('bs.affix').options.offset = currentOffset;
		});

  } // end attach
};


})(jQuery, Drupal, this, this.document);
