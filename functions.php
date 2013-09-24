<?php
/*
Author: Rasmus Jürs & Johnnie Berthelsen
URL: htp://jurs.me & http://inzite.dk

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/toro.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('library/toro.php'); // if you remove this, toro will break
/*
2. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
 require_once('library/admin.php'); // this comes turned off by default
/*
3. library/translation/translation.php
	- adding support for other languages
*/
// require_once('library/translation/translation.php'); // this comes turned off by default

	/*========================================================
=            Change name of default post type            =
========================================================*/

function custom_detail_post_labels() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Nyheder';
	$labels->singular_name = 'Nyhed';
	$labels->add_new = 'Tilføj Nyhed';
	$labels->add_new_item = 'Tilføj Nyhed';
	$labels->edit_item = 'Rediger Nyheder';
	$labels->new_item = 'Nyhed';
	$labels->view_item = 'Se Nyhed';
	$labels->search_items = 'Søg i Nyheder';
	$labels->not_found = 'Ingen Nyheder fundet';
	$labels->not_found_in_trash = 'Ingen Nyheder fundet i papirkurven';
}

	add_action( 'init', 'custom_detail_post_labels' );

	function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'Nyheder';
	$submenu['edit.php'][5][0] = 'Nyheder';
	$submenu['edit.php'][10][0] = 'Tilføj Nyheder';
	$submenu['edit.php'][16][0] = 'Nyheds Tags';
	echo '';
}

add_action( 'admin_menu', 'change_post_menu_label' );

update_option('image_default_link_type','file');

/************* Excerpt Length *************/

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'diasthumb', 242, 242, true ); //250x250
//add_image_size( 'diaslarge', 1000, 699, true ); //731x511
add_image_size( 'diaslarge', 1000, 629, true ); //731x460

// Compression settings:
add_filter('jpeg_quality', function($arg){return 70;});

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'toro-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'toro-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

// Add Greyscale version of sertain images
/*add_filter('wp_generate_attachment_metadata','greyscale_logo');
function bw_images_filter($meta) {
	$file = wp_upload_dir();
	$file = trailingslashit($file['path']).$meta['sizes']['toro']['file'];
	list($orig_w, $orig_h, $orig_type) = @getimagesize($file);
	$image = wp_load_image($file);
	imagefilter($image, IMG_FILTER_GRAYSCALE);
	//imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	switch ($orig_type) {
		case IMAGETYPE_GIF:
			$file = str_replace(".gif", "-bw.gif", $file);
			imagegif( $image, $file );
			break;
		case IMAGETYPE_PNG:
			$file = str_replace(".png", "-bw.png", $file);
			imagepng( $image, $file );
			break;
		case IMAGETYPE_JPEG:
			$file = str_replace(".jpg", "-bw.jpg", $file);
			imagejpeg( $image, $file );
			break;
	}
	return $meta;
}*/

add_filter('wp_generate_attachment_metadata','greyscale_logo_filter');

function greyscale_logo_filter($meta) {
	$file = wp_upload_dir();
	if (is_array($file) == true ) {
		$file = trailingslashit($file['path']).$meta['sizes']['greyscale_logo']['file'];
		if (file_exists($file) == true) {
			list($orig_w, $orig_h, $orig_type) = @getimagesize($file);
			$image = wp_load_image($file);

		
			imagefilter($image, IMG_FILTER_GRAYSCALE);
			switch ($orig_type) {
				case IMAGETYPE_GIF:
					imagegif( $image, $file );
					break;
				case IMAGETYPE_PNG:
					imagepng( $image, $file );
					break;
				case IMAGETYPE_JPEG:
					imagejpeg( $image, $file );
					break;
			};
		};
	};
	return $meta;
}


/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function toro_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __('Sidebar 1', 'torotheme'),
		'description' => __('The first (primary) sidebar.', 'torotheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __('Sidebar 2', 'torotheme'),
		'description' => __('The second (secondary) sidebar.', 'torotheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function toro_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<!-- custom gravatar call -->
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<!-- end custom gravatar call -->
				<?php printf(__('<cite class="fn">%s</cite>', 'torotheme'), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__('F jS, Y', 'torotheme')); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'torotheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e('Your comment is awaiting moderation.', 'torotheme') ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!

?>
