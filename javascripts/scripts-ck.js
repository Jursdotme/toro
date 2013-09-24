/*
Toro Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/// as the page loads, call these scripts
jQuery(document).ready(function(e){navigator.userAgent.indexOf("Mac OS X")!=-1?e("body").addClass("mac"):e("body").addClass("pc");e(".video_container").fitVids();e(".case-hover").each(function(){e(this).hover(function(){e(".case-thumb-overlay",e(this)).fadeIn(500)},function(){e(".case-thumb-overlay",e(this)).stop(!0,!0).fadeOut(500)})});e(".team-item","#team-slider").each(function(){var t=e(this);e(".team-icon",t).length>0&&e(".team-icon",e(this)).toggleClick(function(n){console.log("slide down");e(".team-info",t).slideDown(250)},function(){e(".team-info",t).slideUp(250)})})});(function(e){function c(){n.setAttribute("content",s);o=!0}function h(){n.setAttribute("content",i);o=!1}function p(t){l=t.accelerationIncludingGravity;u=Math.abs(l.x);a=Math.abs(l.y);f=Math.abs(l.z);!e.orientation&&(u>7||(f>6&&a<8||f<8&&a>6)&&u>5)?o&&h():o||c()}if(!(/iPhone|iPad|iPod/.test(navigator.platform)&&navigator.userAgent.indexOf("AppleWebKit")>-1))return;var t=e.document;if(!t.querySelector)return;var n=t.querySelector("meta[name=viewport]"),r=n&&n.getAttribute("content"),i=r+",maximum-scale=1",s=r+",maximum-scale=10",o=!0,u,a,f,l;if(!n)return;e.addEventListener("orientationchange",c,!1);e.addEventListener("devicemotion",p,!1)})(this);