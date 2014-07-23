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
* If you are making your theme translatable, you should replace 'toro_developer_developer'
* with the actual text domain for your theme.  Read more:
* http://codex.wordpress.org/Function_Reference/load_theme_textdomain
*/

function optionsframework_options() {

	$options[] = array(
		'name' => __('Page Wrapper', 'toro_developer'),
		'type' => 'heading');

	// Use wrapper checkbox
	$options[] = array(
		'name' => __('Activate Page Wrapper', 'toro_developer'),
		'desc' => __('Wrap the page in a box to allow for background image.', 'toro_developer'),
		'id' => 'use_wrapper',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Background Color', 'toro_developer'),
		'desc' => __('No color selected by default.', 'toro_developer'),
		'id' => 'background_color',
		'std' => '',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Wrapper Color', 'toro_developer'),
		'desc' => __('No color selected by default.', 'toro_developer'),
		'id' => 'wrapper_color',
		'std' => '',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Background Image', 'toro_developer'),
		'desc' => __('Upload and use an image as a background', 'toro_developer'),
		'id' => 'background_image',
		'type' => 'upload');


	// Wrapper Tiling array
	$wrapper_array = array(
		'repeat-x' => __('Tile Horizontal', 'toro_developer'),
		'repeat-y' => __('Tile Vertical', 'toro_developer'),
		'repeat' => __('Tile Both', 'toro_developer'),
		'no-repeat' => __('No Tiling', 'toro_developer')
	);

	$options[] = array(
		'name' => __('Background Tiling', 'toro_developer'),
		'desc' => __('How should the background image repeat across the page?', 'toro_developer'),
		'id' => 'background_tiling',
		'std' => 'three',
		'type' => 'select',
		'options' => $wrapper_array);


	// Wrapper Positioning array
	$background_positioning_array = array(
		'left top' => __('left top', 'toro_developer'),
		'left center' => __('left center', 'toro_developer'),
		'left bottom' => __('left bottom', 'toro_developer'),
		'right top' => __('right top', 'toro_developer'),
		'right center' => __('right center', 'toro_developer'),
		'right bottom' => __('right bottom', 'toro_developer'),
		'center top' => __('center top', 'toro_developer'),
		'center center' => __('center center', 'toro_developer'),
		'center bottom' => __('center bottom', 'toro_developer')
	);

	$options[] = array(
		'name' => __('Background position', 'toro_developer'),
		'desc' => __('Position of the background image.', 'toro_developer'),
		'id' => 'background_position',
		'std' => 'left top',
		'type' => 'select',
		'options' => $background_positioning_array);

	// Background Image size
	$background_size_array = array(
		'auto' => __('Auto', 'toro_developer'),
		'cover' => __('Cover', 'toro_developer'),
		'contain' => __('Contain', 'toro_developer'),
	);

	$options[] = array(
		'name' => __('Background position', 'toro_developer'),
		'desc' => __('Position of the background image.', 'toro_developer'),
		'id' => 'background_size',
		'std' => 'auto',
		'type' => 'select',
		'options' => $background_size_array);

	// Fixed background Image
	$options[] = array(
		'name' => __('Fixed Background Image', 'toro_developer'),
		'desc' => __('Remove Scroll from background image.', 'toro_developer'),
		'id' => 'fix_image',
		'std' => '0',
		'type' => 'checkbox');

	return $options;
}
