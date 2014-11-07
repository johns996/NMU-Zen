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

		//the default search menu is stored in the mobile-visible dropdown
		//enquire uses a media query to detect desktop display and then moves that search menu into the desktop region
		//if a user resizes their browser, enquire will move the search menu back into the mobile div
		enquire.register("screen and (min-width: 768px)", {
			match : function() {
				$('#search-collapse-div').empty();
				$('#search-dropdown').append(searchStored);
				searchBindChange();
				$('#search-query').attr('autofocus', 'true');  //no autofocus on small screens
			},
			unmatch : function() {
				$('#search-dropdown').empty();
				$('#search-collapse-div').append(searchStored);
				searchBindChange();
			},
			setup : function() {
				searchStored = $('#search-collapse-div').html();
				searchBindChange();
			}
		});

		//we add the change events to a function so they can be re-bound as enquire re-writes the search menu
		function searchBindChange(){
			$('#search-az').bind('change', function(){
				resetSearch();
				$('#search-query').attr('placeholder', 'ENTER A LETTER');
				$('#search-query').focus();
			});
			$('#search-keyword').bind('change', function(){
				resetSearch();
				$('#search-query').attr('placeholder', 'SEARCH NMU');
				$('#search-query').focus();
			});
			$('#search-map').bind('change', function(){
				resetSearch();
				$('#search-query').attr('placeholder', 'SEARCH CAMPUS MAP');
				$('#search-query').focus();
			});
			$('#search-calendar').bind('change', function(){
				resetSearch();
				$('#search-query').attr('placeholder', 'SEARCH CALENDAR');
				$('#search-query').focus();
			});
			$('#search-directory').bind('change', function(){
				resetSearch();
				$('#search-query').hide();
				$('#search-department').show();
				$('#search-department').focus();
				$('#searchform').attr({
					action: '//aditweb3.nmu.edu/telephone/directory/web/dept_listing.php',
					method: 'post'
				});
			});
			$('#search-people').bind('change', function(){
				resetSearch();
				$('#search-query').attr('placeholder', 'ENTER A LAST NAME');
				$('#search-query').focus();
				$('#search-query').attr('name', 'searchname');
				$('#search-department').attr('name', 'dept-searchname');  //change this name to prevent its data from blocking the people search
				$('#searchform').attr({
					action: '//aditweb3.nmu.edu/telephone/directory/web/default.php',
					method: 'post'
				});
			});
		}

		function resetSearch() {
			$('#search-query').show();
			$('#search-department').hide();
			$('#search-query').attr('name', 'query');
			$('#search-department').attr('name', 'searchname');
			$('#searchform').attr({
				action: '/searchquery',
				method: 'get'
			});
		}



/*
//not used anymore in favor of enquire method above
//using this method, i can't target any of the elements appended to the desktop search div
//likely because the id's have been duplicated with this script
		$('#search-icon').one('click', function() {
			//to avoid duplicating the search section, we copy over the content from the mobile collapse menu and put it in the nav dropdown
			searchStored = $('#search-collapse-div').html();
			$('#search-dropdown').append(searchStored);

		});
*/

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
