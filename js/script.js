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

		$('#search-icon').one('click', function() {
			//to avoid duplicating the search section, we copy over the content from the mobile collapse menu and put it in the nav dropdown
			searchStored = $('#search-collapse-div').html();
			$('#search-dropdown').append(searchStored);
		});

/*
//no longer used because it's difficult to remove the dropdowns
//and because this seems like a lot of extra work for just a list of 5 links
//so it's being duplicated at the block level
		enquire.register("screen and (max-width: 767px)", {
			match : function() {
				//store the html of the main navbar
				mainNavStored = $('#main-navigation-collapse').html();
				// append that html to the top navbar
				$('#top-navigation-collapse').prepend(mainNavStored);
			},
			unmatch : function() {
				//remove the appended nav element when leaving the xs display
				$('#top-navigation-collapse > #main-navigaiton-ul').remove();
			}
		});
*/

  } // end attach
};


})(jQuery, Drupal, this, this.document);
