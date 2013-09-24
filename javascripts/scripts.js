/*
Toro Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/

// as the page loads, call these scripts
jQuery(document).ready(function($) {
	
	// add all your scripts here

    // add IE class to ie 10
    if (navigator.userAgent.indexOf('Mac OS X') != -1) {
          $("body").addClass("mac");
        } else {
          $("body").addClass("pc");
        }

        $(".video_container").fitVids();

    $(".case-hover").each( function() {
       
        $(this).hover( function() {
            $(".case-thumb-overlay", $(this)).fadeIn(500);
        }, function() {
            $(".case-thumb-overlay", $(this)).stop(true, true).fadeOut(500);
        });
    });

    $(".team-item","#team-slider").each(function(){
        var currentItem = $(this)
        if ( $(".team-icon" , currentItem ).length > 0 )
        {   
            $(".team-icon" , $(this) ).toggleClick(function(event){
                console.log("slide down")
                $(".team-info", currentItem).slideDown(250);
            }, function() {
                $(".team-info", currentItem).slideUp(250);
            });
        }
    });
	
 
}); /* end of as page load scripts */


/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
    var doc = w.document;
    if( !doc.querySelector ){ return; }
    var meta = doc.querySelector( "meta[name=viewport]" ),
        initialContent = meta && meta.getAttribute( "content" ),
        disabledZoom = initialContent + ",maximum-scale=1",
        enabledZoom = initialContent + ",maximum-scale=10",
        enabled = true,
		x, y, z, aig;
    if( !meta ){ return; }
    function restoreZoom(){
        meta.setAttribute( "content", enabledZoom );
        enabled = true; }
    function disableZoom(){
        meta.setAttribute( "content", disabledZoom );
        enabled = false; }
    function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
        if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );