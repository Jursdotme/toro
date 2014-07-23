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
  .tooltip();

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

    if(theClass === null || theClass === "") {
      $(this).addClass("table table-default");
    }

  });

/*-----  End of Integrate Bootstrap stuff with Wordpress  ------*/

/*=====================================================
=            Make Wordpress galleries work            =
=====================================================*/


  $(document).ready(function() {
    $(".fancybox").fancybox({
      prevEffect : 'elastic',
      nextEffect : 'elastic',
      helpers    : {
        title    : {
          type   : 'inside'
        }
      }});
  });


/*-----  End of Make Wordpress galleries work  ------*/

/*========================================
=            Frontpage slider            =
========================================*/

$(document).ready(function() {

  $("#frontpage-slider").owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    items:1,
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
  itemSelector : '.isotope-item',
  layoutMode   : 'masonry'
});

$container.imagesLoaded( function() {
  $container.isotope('layout');
});

// filter functions
  var filterFns = {
    // show if number is greater than 50
    numberGreaterThan50: function() {
      var number = $(this).find('.number').text();
      return parseInt( number, 10 ) > 50;
    },
    // show if name ends with -ium
    ium: function() {
      var name = $(this).find('.name').text();
      return name.match( /ium$/ );
    }
  };
  // bind filter button click
  $('#filters').on( 'click', 'button', function() {
    var filterValue = $( this ).attr('data-filter');
    // use filterFn if matches value
    filterValue = filterFns[ filterValue ] || filterValue;
    $container.isotope({ filter: filterValue });
  });
  // change is-checked class on buttons
  $('.button-group').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', 'button', function() {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      $( this ).addClass('is-checked');
    });
  });

/*-----  End of Isotope Test  ------*/



// Kitchen Sink

(function(){

  var $button = $("<div id='source-button' class='btn btn-primary btn-xs'>&lt; &gt;</div>").click(function(){
    var html = $(this).parent().html();
    html = cleanSource(html);
    $("#source-modal pre").text(html);
    $("#source-modal").modal();
  });

  $('.bs-component [data-toggle="popover"]').popover();
  $('.bs-component [data-toggle="tooltip"]').tooltip();

  $(".bs-component").hover(function(){
    $(this).append($button);
    $button.show();
  }, function(){
    $button.hide();
  });

  function cleanSource(html) {
    var lines = html.split(/\n/);

    lines.shift();
    lines.splice(-1, 1);

    var indentSize = lines[0].length - lines[0].trim().length,
        re = new RegExp(" {" + indentSize + "}");

    lines = lines.map(function(line){
      if (line.match(re)) {
        line = line.substring(indentSize);
      }

      return line;
    });

    lines = lines.join("\n");

    return lines;
  }

})();


// INITIATE WOW.JS
new WOW().init();

