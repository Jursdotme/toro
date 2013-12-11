<?php
/*
 *  Author: Rasmus Jürs
 *  URL: jurs.me
 *  Custom functions, support and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

/*
library/admin.php
        - removing some default WordPress dashboard widgets
        - an example custom dashboard widget
        - adding custom login css
        - changing text in footer of admin
*/
require_once( 'library/admin.php' ); // this comes turned off by default


/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    // add_image_size('large', 700, '', true); // Large Thumbnail
    // add_image_size('medium', 250, '', true); // Medium Thumbnail
    // add_image_size('small', 120, '', true); // Small Thumbnail
    // add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('toro', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

/*********************
MENUS & NAVIGATION
*********************/

// wp menus
    add_theme_support( 'menus' );

    // registering wp3+ menus
    register_nav_menus(
        array(
            'main_nav' => __( 'Main Menu', 'torotheme' ),   // main nav in header
            'mobil-nav' => __( 'Mobil menu', 'torotheme' ), // secondary nav in footer
            'off-canvas-mobil-nav' => __( 'Off Canvas Mobil menu', 'torotheme' ), // secondary nav in footer
        )
    );

// Custom Walker for Toro Topbar
class My_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    if ($depth >= 1) {
        $output .= "\n$indent<ul class=\"desk_menu desk_submenu desk_subsubmenu\">\n"; }
    else { $output .= "\n$indent<ul class=\"has-dropdown\">\n";}
  }
}

// the main desktop menu
function main_nav() {
    // display the wp3 menu if available
    wp_nav_menu(array(
        'container' => 'nav',                           // remove nav container
        'container_id' => 'main-nav',                    // class of container (should you choose to use it)
        'menu' => __( 'Main Menu', 'torotheme' ),    // nav name
        'theme_location' => 'main_nav',              // where it's located in the theme
        'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
        'fallback_cb' => 'toro_main_nav_fallback',      // fallback function
        'walker' => new My_Walker_Nav_Menu()            // include the new custom desktop walker
    ));
} /* end toro desktop main nav */

// the main mobile menu
function mobile_nav() {
    // display the wp3 menu if available
    wp_nav_menu(array(
        'container' => 'nav',                           // remove nav container
        'container_id' => 'mobile',                     // class of container (should you choose to use it)
        'menu' => __( 'Mobil Menu', 'torotheme' ),      // nav name
        'theme_location' => 'mobil-nav',                // where it's located in the theme
        'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
        'fallback_cb' => 'toro_main_nav_fallback',      // fallback function
        'walker' => new My_Walker_Nav_Menu()            // include the new custom mobile walker
    ));
} /* end toro mobile main nav */

// the off canvas mobile menu
function off_canvas_mobile_nav() {
    // display the wp3 menu if available
    wp_nav_menu(array(
        'container' => 'nav',                           // remove nav container
        'container_id' => 'off-canvas-mobile',          // class of container (should you choose to use it)
        'menu' => __( 'Off Canvas Mobil Menu', 'torotheme' ),   // nav name
        'theme_location' => 'off-canvas-mobil-nav',     // where it's located in the theme
        'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
        'fallback_cb' => 'toro_main_nav_fallback',      // fallback function
        'walker' => new My_Walker_Nav_Menu()            // include the new custom mobile walker
    ));
} /* end toro mobile main nav */


// Load Toro scripts (footer.php)
function toro_header_scripts()
{
    if (!is_admin()) {
    
    	wp_deregister_script('jquery'); // Deregister WordPress jQuery
    	wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array(), '1.10.2', true); // Google CDN jQuery
    	wp_enqueue_script('jquery'); // Enqueue it!
    	
    	wp_register_script('conditionizr', 'http://cdnjs.cloudflare.com/ajax/libs/conditionizr.js/4.0.0/conditionizr.min.js', array(), '4.0.0', true); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!
        
        wp_register_script('modernizr', 'http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js', array(), '2.6.2', true); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('foundation', get_template_directory_uri() . '/javascripts/foundation.js', array(), '1.0.0', true); // Custom scripts
        wp_enqueue_script('foundation'); // Enqueue it!

        wp_register_script('foundationForms', get_template_directory_uri() . '/javascripts/foundation-forms.js', array(), '1.0.0', true); // Custom scripts
        wp_enqueue_script('foundationForms'); // Enqueue it!

        wp_register_script('navigation', get_template_directory_uri() . '/javascripts/nav.js', array(), '1.0.0', true); // Custom scripts
        wp_enqueue_script('navigation'); // Enqueue it!
        
        wp_register_script('toroscripts', get_template_directory_uri() . '/javascripts/scripts.js', array(), '1.0.0', true); // Custom scripts
        wp_enqueue_script('toroscripts'); // Enqueue it!
    }
}

// Load Toro conditional scripts
function toro_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/javascripts/scriptname.js', array('jquery'), '1.0.0', true); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load Toro styles
function toro_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/stylesheets/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!
    
    wp_register_style('toro', get_template_directory_uri() . '/stylesheets/style.css', array(), '1.0', 'all');
    wp_enqueue_style('toro'); // Enqueue it!
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'toro') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function torogravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function torocomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
	
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'toro_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'toro_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'toro_styles'); // Add Theme Stylesheet
add_action('init', 'create_post_type_html5'); // Add our Toro Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'torogravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

/*----------------------------------------------------*\
    Move Menu administration to top level admin menu
\*----------------------------------------------------*/

function remove_submenus() {
  global $submenu;
  unset($submenu['themes.php'][10]); // Removes Menu  
}
add_action('admin_menu', 'remove_submenus');

function new_nav_menu () {
    global $menu;
    $menu[99] = array('', 'read', 'separator', '', 'menu-top menu-nav');
    add_menu_page(__('Navigation', 'mav-menus'), __('Navigation', 'nav-menus'), 'edit_themes', 'nav-menus.php', '', '', 99);
}
add_action('admin_menu', 'new_nav_menu');

function custom_menu_order($menu_ord) {  
if (!$menu_ord) return true;  

return array(  
    'index.php', // Dashboard  
    'edit.php', // Posts 
    'upload.php', // Media
    'edit.php?post_type=page', // Pages
    'edit-comments.php', // Comments 
    'link-manager.php', // Links 
    'separator1', // First separator  
    'nav-menus.php', // Navigation
    'separator2', // Second separator  
    'themes.php', // Appearance  
    'plugins.php', // Plugins  
    'users.php', // Users  
    'tools.php', // Tools  
    'options-general.php', // Settings  
    'separator-last', // Last separator  
);
}  
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order  
add_filter('menu_order', 'custom_menu_order');

?>
