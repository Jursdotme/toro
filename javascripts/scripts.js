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

/*====================================
=            Conditionizr            =
====================================*/

conditionizr.add('chrome', ['class'], function () {
  return !!window.chrome && /google/i.test(navigator.vendor);
});

conditionizr.add('safari', ['class'], function () {
  return /constructor/i.test(window.HTMLElement);
});

conditionizr.add('firefox', ['class'], function () {
  return typeof InstallTrigger !== 'undefined';
});

conditionizr.add('ie11', ['class'], function () {
  return /(?:\sTrident\/7\.0;.*\srv:11\.0)/i.test(navigator.userAgent);
});

conditionizr.add('ie10', ['class'], function () {
  var version = false;
  /*@cc_on
    if (/^10/.test(@_jscript_version) && /MSIE 10\.0(?!.*IEMobile)/i.test(navigator.userAgent))
    version = true
  @*/
  return version;
});

conditionizr.add('ie9', ['class'], function () {
  var version = false;
  /*@cc_on
    if (/^9/.test(@_jscript_version) && /MSIE 9\.0(?!.*IEMobile)/i.test(navigator.userAgent))
    version = true
  @*/
  return version;
});

conditionizr.add('ie8', ['class'], function () {
  var version = false;
  /*@cc_on
    if (@_jscript_version > 5.7 && !/^(9|10)/.test(@_jscript_version))
    version = true
  @*/
  return version;
});

conditionizr.add('touch', ['class'], function () {
  return !!'ontouchstart' in window || !!navigator.msMaxTouchPoints;
});

conditionizr.add('ios', ['class'], function () {
  return /(iPad|iPhone|iPod)/i.test(navigator.userAgent);
});

conditionizr.add('mac', ['class'], function () {
  return /mac/i.test(navigator.platform);
});

conditionizr.add('windows', ['class'], function () {
  return /win/i.test(navigator.platform);
});

conditionizr.add('linux', ['class'], function () {
  return /linux/i.test(navigator.platform) && !/android|cros/i.test(navigator.userAgent);
});

console.log(conditionizr)

/*-----  End of Conditionizr  ------*/