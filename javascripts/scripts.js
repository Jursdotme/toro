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

  $("#carousel-header-24").owlCarousel({
    // Most important owl features
    items : 5,
    itemsCustom : false,
    itemsDesktop : [1199,4],
    itemsDesktopSmall : [980,3],
    itemsTablet: [768,2],
    itemsTabletSmall: false,
    itemsMobile : [479,1],
    singleItem : true,
    itemsScaleUp : false,

    //Basic Speeds
    slideSpeed : 200,
    paginationSpeed : 800,
    rewindSpeed : 1000,

    //Autoplay
    autoPlay : false,
    stopOnHover : false,

    // Navigation
    navigation : false,
    navigationText : ["prev","next"],
    rewindNav : true,
    scrollPerPage : false,

    //Pagination
    pagination : false,
    paginationNumbers: false,

    // Responsive
    // responsive: true,
    // responsiveRefreshRate : 200,
    // responsiveBaseWidth: window,

    // CSS Styles
    // baseClass : "owl-carousel",
    // theme : "owl-theme",

    //Lazy load
    // lazyLoad : false,
    // lazyFollow : true,
    // lazyEffect : "fade",

    //Auto height
    autoHeight : true,

    //JSON
    // jsonPath : false,
    // jsonSuccess : false,

    //Mouse Events
    // dragBeforeAnimFinish : true,
    // mouseDrag : true,
    // touchDrag : true,

    //Transitions
    // transitionStyle : false,

    // Other
    // addClassActive : false,

    //Callbacks
    // beforeUpdate : false,
    // afterUpdate : false,
    // beforeInit: false,
    // afterInit: false,
    // beforeMove: false,
    // afterMove: false,
    // afterAction: false,
    // startDragging : false,
    // afterLazyLoad : false
  });

});

/*-----  End of Frontpage slider  ------*/


/*====================================
=            Isotope Test            =
====================================*/

var $container = $('#isotope-container');
// init
$container.isotope({
  // options
  itemSelector: '.isotope-item',
  layoutMode: 'masonry',
});

$container.imagesLoaded( function() {
  $container.isotope('layout');
});

/*-----  End of Isotope Test  ------*/
