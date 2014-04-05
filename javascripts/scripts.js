// DOM Ready
$(function() {
	
	// SVG fallback
	// toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script#update
	if (!Modernizr.svg) {
		var imgs = document.getElementsByTagName('img');
		var dotSVG = /.*\.svg$/;
		for (var i = 0; i != imgs.length; ++i) {
			if(imgs[i].src.match(dotSVG)) {
				imgs[i].src = imgs[i].src.slice(0, -3) + "png";
			}
		}
	}

});

/*===============================================
=            Pagination active state            =
===============================================*/

var pagination = $('.pagination .pagination .current');
pagination.parent().addClass('active');

/*-----  End of Pagination active state  ------*/


/*================================================================
=            Integrate Bootstrap stuff with Wordpress            =
================================================================*/

// Automatic tooltips on <abbr>
var abbrs = $("abbr");

abbrs.each(function() {
  
  $(this)
  .attr("data-toggle", "tooltip")
  .attr("data-placement", "top")
  .tooltip()
  
});

// Automatic Thumbnail on Image captions
var wpcaptiontxt = $(".wp-caption-text");

wpcaptiontxt.each(function() {

  $(this)
  .wrap("<div class='caption'></div>");
});

// add table styling to tables with no class
var tables = $("table");

  tables.each(function() {

    var theClass = $(this).attr("class");

    if(theClass == null || theClass == "") {
      $(this).addClass("table table-default");
    }

  });

/*-----  End of Integrate Bootstrap stuff with Wordpress  ------*/

/*=====================================================
=            Make Wordpress galleries work            =
=====================================================*/


  $(document).ready(function() {
    $(".fancybox").fancybox({
      prevEffect  : 'elastic',
      nextEffect  : 'elastic',
      helpers : {
        title : {
          type: 'inside'
        }
      }});
  });


/*-----  End of Make Wordpress galleries work  ------*/

/*========================================
=            Frontpage slider            =
========================================*/

$(document).ready(function() {
 
  $("#frontpage-slider").owlCarousel({
    navigation : true, // Show next and prev buttons
    slideSpeed : 300,
    paginationSpeed : 400,
    singleItem:true

    // "singleItem:true" is a shortcut for:
    // items : 1, 
    // itemsDesktop : false,
    // itemsDesktopSmall : false,
    // itemsTablet: false,
    // itemsMobile : false
  });
 
});

/*-----  End of Frontpage slider  ------*/







