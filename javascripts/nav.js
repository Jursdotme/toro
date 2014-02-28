var navtype = $("#dropdown-mobile").length;

if ( navtype < 1 ) {
    $("#mobile-nav-toggle").addClass("off-canvas")
}

else {
    $("#mobile-nav-toggle").addClass("dropdown")
};

var $navToggle = "#mobile-nav-toggle";

$($navToggle).addClass("closed")

$($navToggle).on("click", function() {

        $("nav#dropdown-mobile").slideToggle(300);

        var $this = $(this); // this is just for performance
                if(!$this.hasClass('closed'))
                $('.closed').toggleClass("closed").toggleClass("open");
                $this.toggleClass("closed").toggleClass("open");

        $($navToggle+".closed").html("m")
        $($navToggle+".open").html("X")
});

/*============================================
=            Mobile menu dropdown            =
============================================*/

$('nav#dropdown-mobile ul li:has(ul),nav#off-canvas-mobile ul li:has(ul), nav#off-canvas-mobile ul li:has(ul),nav#off-canvas-mobile ul li:has(ul)').addClass('has-dropdown');

//Add Toggle Buttons to dropdown menus
$("nav#dropdown-mobile ul li.has-dropdown > a,nav#off-canvas-mobile ul li.has-dropdown > a, nav#off-canvas-mobile ul li.has-dropdown > a,nav#off-canvas-mobile ul li.has-dropdown > a").append('<span class="icon">D</span>');


//Make the dropdown menus work
$("a span.icon").on("click", function() {
        
        

        $(this)
                .parent()
                        .parent()
                                .find(" > ul")
                                                .slideToggle(200);
return false;

});

$("a span.icon").click(function() {
    
    if ($(this).text() == "D")
       $(this).html("U")
    else
       $(this).html("D");

});


$("#label")
        .prev()
                .addClass( "before-label" )
$("#label")
        .next()
                .addClass("after-label");

$(function () {

        var $labelTarget = "nav a[title='label']"

        $( $labelTarget  ).parent().attr('id', 'label');

        $( $labelTarget  ).wrapInner( "<p></p>");

        $( $labelTarget ).replaceWith(function() {
                return $( this ).contents().wrap("<p></p>");
        });

});

/*-----  End of Mobile menu dropdown  ------*/

/*===========================================
=            Off-canvas unfolder            =
===========================================*/

// Off-Canvas

$("#off-canvas-mobile").prepend("<a href='#' class='close-off-canvas-menu'>X</a>")

$("#mobile-nav-toggle.off-canvas, .close-off-canvas-menu").click(function() {

        $(".offcanvas-navigation, .inner-pagewrapper").toggleClass( "unfolded" )

});

/*-----  End of Off-canvas unfolder  ------*/



