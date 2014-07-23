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
 * If you are making your theme translatable, you should replace 'toro_developer'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'toro_developer'),
		'two' => __('Two', 'toro_developer'),
		'three' => __('Three', 'toro_developer'),
		'four' => __('Four', 'toro_developer'),
		'five' => __('Five', 'toro_developer')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'toro_developer'),
		'two' => __('Pancake', 'toro_developer'),
		'three' => __('Omelette', 'toro_developer'),
		'four' => __('Crepe', 'toro_developer'),
		'five' => __('Waffle', 'toro_developer')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __('Basic Settings', 'toro_developer'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Input Text Mini', 'toro_developer'),
		'desc' => __('A mini text input field.', 'toro_developer'),
		'id' => 'example_text_mini',
		'std' => 'Default',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Input Text', 'toro_developer'),
		'desc' => __('A text input field.', 'toro_developer'),
		'id' => 'example_text',
		'std' => 'Default Value',
		'type' => 'text');

	$options[] = array(
		'name' => __('Input with Placeholder', 'toro_developer'),
		'desc' => __('A text input field with an HTML5 placeholder.', 'toro_developer'),
		'id' => 'example_placeholder',
		'placeholder' => 'Placeholder',
		'type' => 'text');

	$options[] = array(
		'name' => __('Textarea', 'toro_developer'),
		'desc' => __('Textarea description.', 'toro_developer'),
		'id' => 'example_textarea',
		'std' => 'Default Text',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Input Select Small', 'toro_developer'),
		'desc' => __('Small Select Box.', 'toro_developer'),
		'id' => 'example_select',
		'std' => 'three',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $test_array);

	$options[] = array(
		'name' => __('Input Select Wide', 'toro_developer'),
		'desc' => __('A wider select box.', 'toro_developer'),
		'id' => 'example_select_wide',
		'std' => 'two',
		'type' => 'select',
		'options' => $test_array);

	if ( $options_categories ) {
	$options[] = array(
		'name' => __('Select a Category', 'toro_developer'),
		'desc' => __('Passed an array of categories with cat_ID and cat_name', 'toro_developer'),
		'id' => 'example_select_categories',
		'type' => 'select',
		'options' => $options_categories);
	}

	if ( $options_tags ) {
	$options[] = array(
		'name' => __('Select a Tag', 'toro_developer'),
		'desc' => __('Passed an array of tags with term_id and term_name', 'toro_developer'),
		'id' => 'example_select_tags',
		'type' => 'select',
		'options' => $options_tags);
	}

	$options[] = array(
		'name' => __('Select a Page', 'toro_developer'),
		'desc' => __('Passed an pages with ID and post_title', 'toro_developer'),
		'id' => 'example_select_pages',
		'type' => 'select',
		'options' => $options_pages);

	$options[] = array(
		'name' => __('Input Radio (one)', 'toro_developer'),
		'desc' => __('Radio select with default options "one".', 'toro_developer'),
		'id' => 'example_radio',
		'std' => 'one',
		'type' => 'radio',
		'options' => $test_array);

	$options[] = array(
		'name' => __('Example Info', 'toro_developer'),
		'desc' => __('This is just some example information you can put in the panel.', 'toro_developer'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Input Checkbox', 'toro_developer'),
		'desc' => __('Example checkbox, defaults to true.', 'toro_developer'),
		'id' => 'example_checkbox',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Advanced Settings', 'toro_developer'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Check to Show a Hidden Text Input', 'toro_developer'),
		'desc' => __('Click here and see what happens.', 'toro_developer'),
		'id' => 'example_showhidden',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Hidden Text Input', 'toro_developer'),
		'desc' => __('This option is hidden unless activated by a checkbox click.', 'toro_developer'),
		'id' => 'example_text_hidden',
		'std' => 'Hello',
		'class' => 'hidden',
		'type' => 'text');

	$options[] = array(
		'name' => __('Uploader Test', 'toro_developer'),
		'desc' => __('This creates a full size uploader that previews the image.', 'toro_developer'),
		'id' => 'example_uploader',
		'type' => 'upload');

	$options[] = array(
		'name' => "Example Image Selector",
		'desc' => "Images for layout.",
		'id' => "example_images",
		'std' => "2c-l-fixed",
		'type' => "images",
		'options' => array(
			'1col-fixed' => $imagepath . '1col.png',
			'2c-l-fixed' => $imagepath . '2cl.png',
			'2c-r-fixed' => $imagepath . '2cr.png')
	);

	$options[] = array(
		'name' =>  __('Example Background', 'toro_developer'),
		'desc' => __('Change the background CSS.', 'toro_developer'),
		'id' => 'example_background',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' => __('Multicheck', 'toro_developer'),
		'desc' => __('Multicheck description.', 'toro_developer'),
		'id' => 'example_multicheck',
		'std' => $multicheck_defaults, // These items get checked by default
		'type' => 'multicheck',
		'options' => $multicheck_array);

	$options[] = array(
		'name' => __('Colorpicker', 'toro_developer'),
		'desc' => __('No color selected by default.', 'toro_developer'),
		'id' => 'example_colorpicker',
		'std' => '',
		'type' => 'color' );

	$options[] = array( 'name' => __('Typography', 'toro_developer'),
		'desc' => __('Example typography.', 'toro_developer'),
		'id' => "example_typography",
		'std' => $typography_defaults,
		'type' => 'typography' );

	$options[] = array(
		'name' => __('Custom Typography', 'toro_developer'),
		'desc' => __('Custom typography options.', 'toro_developer'),
		'id' => "custom_typography",
		'std' => $typography_defaults,
		'type' => 'typography',
		'options' => $typography_options );



	return $options;
}
