<?php
/**
* A unique identifier is defined to store the options in the database and reference them from the theme.
* By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
* If the identifier changes, it'll appear as if the options have been reset.
*/

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
* Defines an array of options that will be used to generate the settings page and be saved in the database.
* When creating the 'id' fields, make sure to use all lowercase and no spaces.
*
* If you are making your theme translatable, you should replace 'options_framework_theme'
* with the actual text domain for your theme.  Read more:
* http://codex.wordpress.org/Function_Reference/load_theme_textdomain
*/

function optionsframework_options() {

	$options[] = array(
		'name' => __('Page Wrapper', 'toro'),
		'type' => 'heading');

	// Use wrapper checkbox
	$options[] = array(
		'name' => __('Activate Page Wrapper', 'toro'),
		'desc' => __('Wrap the page in a box to allow for background image.', 'toro'),
		'id' => 'use_wrapper',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Background Color', 'toro'),
		'desc' => __('No color selected by default.', 'toro'),
		'id' => 'background_color',
		'std' => '',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Wrapper Color', 'toro'),
		'desc' => __('No color selected by default.', 'toro'),
		'id' => 'wrapper_color',
		'std' => '',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Background Image', 'toro'),
		'desc' => __('Upload and use an image as a background', 'toro'),
		'id' => 'background_image',
		'type' => 'upload');


	// Wrapper Tiling array
	$wrapper_array = array(
		'repeat-x' => __('Tile Horizontal', 'toro'),
		'repeat-y' => __('Tile Vertical', 'toro'),
		'repeat' => __('Tile Both', 'toro'),
		'no-repeat' => __('No Tiling', 'toro')
	);

	$options[] = array(
		'name' => __('Background Tiling', 'toro'),
		'desc' => __('How should the background image repeat across the page?', 'toro'),
		'id' => 'background_tiling',
		'std' => 'three',
		'type' => 'select',
		'options' => $wrapper_array);


	// Wrapper Positioning array
	$background_positioning_array = array(
		'left top' => __('left top', 'toro'),
		'left center' => __('left center', 'toro'),
		'left bottom' => __('left bottom', 'toro'),
		'right top' => __('right top', 'toro'),
		'right center' => __('right center', 'toro'),
		'right bottom' => __('right bottom', 'toro'),
		'center top' => __('center top', 'toro'),
		'center center' => __('center center', 'toro'),
		'center bottom' => __('center bottom', 'toro')
	);

	$options[] = array(
		'name' => __('Background position', 'toro'),
		'desc' => __('Position of the background image.', 'toro'),
		'id' => 'background_position',
		'std' => 'left top',
		'type' => 'select',
		'options' => $background_positioning_array);

	// Background Image size
	$background_size_array = array(
		'auto' => __('Auto', 'toro'),
		'cover' => __('Cover', 'toro'),
		'contain' => __('Contain', 'toro'),
	);

	$options[] = array(
		'name' => __('Background position', 'toro'),
		'desc' => __('Position of the background image.', 'toro'),
		'id' => 'background_size',
		'std' => 'auto',
		'type' => 'select',
		'options' => $background_size_array);

	// Fixed background Image
	$options[] = array(
		'name' => __('Fixed Background Image', 'toro'),
		'desc' => __('Remove Scroll from background image.', 'toro'),
		'id' => 'fix_image',
		'std' => '0',
		'type' => 'checkbox');

	return $options;
}
