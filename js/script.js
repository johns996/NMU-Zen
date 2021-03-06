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

		//first check if modernizr is there (this helps the file browser since it does not load the js properly)
		if(typeof(Modernizr) == "object"){
			//load enquire.js and a polyfill if needed
			Modernizr.load([

				//first test need for polyfill
				{
						test: window.matchMedia,
						nope: ["https://www.nmu.edu/sites/all/themes/zen_nmu/js/vendor/matchMedia.js", "https://www.nmu.edu/sites/all/themes/zen_nmu/js/vendor/matchMedia.addListener.js"]
				},

				//and then load enquire
				"https://www.nmu.edu/sites/all/themes/zen_nmu/js/vendor/enquire.min.js",
				//finally, load the scripts that depend on enquire
				"https://www.nmu.edu/sites/all/themes/zen_nmu/js/enquire-helper.js"
			]);
		}

		$(document).on('click', '.yamm .dropdown-menu', function(e) {
			e.stopPropagation();
		});

		// add fade in animation to bootstrap dropdowns
		$('.dropdown').on('show.bs.dropdown', function(){
			$(this).find('.dropdown-menu').first().stop(true, true).fadeIn(200);
		});

		// add fade out animation to bootstrap dropdowns
		$('.dropdown').on('hide.bs.dropdown', function(){
			$(this).find('.dropdown-menu').first().stop(true, true).fadeOut(300);
		});

		// make sure the search box is focused when a user clicks on the search icon
		// chrome does not need this since it respects the autofocus tag on the form element, no other browser does
		$('#search-icon').click(function(){
			setTimeout(function() {
				$('#search-query').focus();;
			}, 0);
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

		//move the stick point for the nav bar based on the presence of the alert
		if ($('#nmu-alert').length){
			var alertHeight = $('#nmu-alert').height();
			alertHeight = alertHeight + 62;  //62 is the margin (30) padding (30) and border (2)
			var currentOffset = $('#header-main-navigation').attr('data-offset-top');
			var theFullHeight = parseInt(currentOffset,10) + parseInt(alertHeight,10);
			$('#header-main-navigation').attr('data-offset-top', theFullHeight);
			//$('#header-main-navigation').data('bs.affix').options.offset = theFullHeight;
		}

		$('#nmu-alert').on('closed.bs.alert', function(){
			var bsAffix = $('#header-main-navigation').data('bs.affix');
			offset = parseInt(currentOffset, 10);
			bsAffix.options.offset.top = bsAffix.options.offsetTop = offset;
		});

		//left navigation functionality
		if($('#left-nav li ul').length > 1){
			$('#left-nav li a:not([href])').click(function(){
				var parentSelector = $(this).parent();
				var activate = !$(parentSelector).hasClass('active');
				$('#left-nav li ul').slideUp();  //start by sliding up all nav lists
				$('#left-nav li').removeClass('active');  //remove all active classes
				if(activate) {
					$(parentSelector).find('ul').slideDown();
					$(parentSelector).addClass('active');
				}
			});
		} else {
			$('#left-nav li').addClass('single-nav');
		}
		selectNavItem();

		setupCycle2Nav();

  } // end attach
};


})(jQuery, Drupal, this, this.document);

function selectNavItem(){
	jQuery(document).ready(function($){
		if($('#left-nav li ul').length > 1){  //done ever hide the nav if only one is present
			$('#left-nav li ul').hide(); //first hide all of the sub nav lists b/c they are shown by default
		}
		var passedItem = $('#field-nav-expand').text();
		if(!passedItem){  //show the first one by default
			$('#left-nav li').first().addClass('active');
			$('#left-nav li ul').first().show();
		}else if(passedItem != 'none'){ //else show a nav based on what's selected, show nothing if 'none'
			$('#' + passedItem).addClass('active');
			$('#' + passedItem + ' ul').show();
		}
	});
}

function breadcrumbBuilder(siteIdentifier){
	jQuery(document).ready(function($){
		//nmu link
		var nmuLink = '<a href="/">NMU</a>';

		if(siteIdentifier !== 'Drupal'){
			//department home
			var dept = $( ".nav-label" ).text();
			var dept = $.trim(dept) + " Home";
			var locLink = location.pathname.split("/");
			var locLink = locLink[1];
			var dept = ' / <a href="/'+locLink+'">'+dept+'</a>';
		} else {
			var dept = '';
		}

		//nav section currently expanded
		var section = $( "#field-nav-expand" ).text();
		var sectionLabel = $('#' + section).find("a").eq(0).text();
		if(sectionLabel =='' || sectionLabel == 'Undefined'){
			sectionLabel = 'Northern Michigan University';
		}
		var sectionLabel = ' / <a>'+sectionLabel+'</a>';

		$('div.breadcrumbs').html(nmuLink + dept + sectionLabel);
	});
}

function setupCycle2Nav() {
	function setupClickHandlers($) {
		$('#cycle-slideshow').on('click', '.cycle-nav .cycle-prev', function(e) {
			$('.cycle-slideshow').cycle('prev');
		});
		$('#cycle-slideshow').on('click', '.cycle-nav .cycle-next', function(e) {
			$('.cycle-slideshow').cycle('next');
		});
	}
	if(!jQuery('#cycle-slideshow').length) return;
	jQuery('#cycle-slideshow').on('cycle-initialized', function(event, optHash) {
		setupClickHandlers(jQuery);
	});
}
