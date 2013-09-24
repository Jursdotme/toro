<?php
/* Welcome to Toro :)
Thanks to the fantastic work by Toro users, we've now
the ability to translate Toro into different languages.

Developed by: Eddie Machado
URL: http://themble.com/toro/
*/



// Adding Translation Option
load_theme_textdomain( 'torotheme', get_template_directory() .'/library/translation' );
	$locale = get_locale();
	$locale_file = get_template_directory() ."/library/translation/$locale.php";
if ( is_readable($locale_file) ) require_once($locale_file);








?>