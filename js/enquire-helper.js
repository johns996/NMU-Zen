// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {

		//the default search menu is stored in the mobile-visible dropdown
		//enquire uses a media query to detect desktop display and then moves that search menu into the desktop region
		//if a user resizes their browser, enquire will move the search menu back into the mobile div
		enquire.register("screen and (min-width: 768px)", {
			match : function() {
				$('#search-collapse-div').empty();
				$('#search-dropdown').append(searchStored);
				searchBindChange();
				androidVideoHandler();  //used for the hp video
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
		}, true);


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
		};

		//this function makes sure the default search behavior is available when switching between search types
		function resetSearch() {
			$('#search-query').show();
			$('#search-department').hide();
			$('#search-query').attr('name', 'query');
			$('#search-department').attr('name', 'searchname');
			$('#searchform').attr({
				action: '/searchquery',
				method: 'get'
			});
		};

		//this is a special behavior just for android devices and the youtube video
		function androidVideoHandler() {
			var ua = navigator.userAgent.toLowerCase();
			if (ua.indexOf("android") > -1) {
					$("#playYoutube").click(function() {
							console.log("Your playYoutube click was detected!")
							window.open("https://www.youtube.com/watch?v=JtpUN4_mXhI");
					});
			}
		}


		// left nav responsive
		enquire.register("all and (max-width:991px)", {
			match: function() {
				// add click listener to the mobile menu label to expand/collapse it
				$('.nav-label').on('click', function(e){
					if($('#left-nav').hasClass('expanded')) {
						$('#left-nav').removeClass('expanded');
						$('#left-nav').slideUp();
					} else {
						$('#left-nav').slideDown();
						$('#left-nav').addClass('expanded');
					}	
				});
			},
			unmatch: function() {
				// remove the click listener and ensure the menu is expanded
				$('#left-nav').slideDown();
				$('.nav-label').off('click');
			}
		});

})(jQuery, Drupal, this, this.document);
