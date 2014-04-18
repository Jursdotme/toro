<?php


/***********  CUSTOM EXCERPTS  ***********/


// Create 20 Word Callback for Index page Excerpts, call using toro_excerpt('toro_index');
function toro_index($length)
{
    return 50;
}

// Create 40 Word Callback for Custom Post Excerpts, call using toro_excerpt('toro_custom_post');
function toro_custom_post($length)
{
    return 40;
}


/***********  CREATE THE CUSTOM EXCERPTS CALLBACK  ***********/


function toro_excerpt($length_callback = '', $more_callback = '')
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



/***********  CUSTOM VIEW ARTICLE LINK TO POST  ***********/


function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'toro') . '</a>';
}


/***********  ADD ALL THE STUFF TO WORDPRESS  ***********/

add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
 ?>
