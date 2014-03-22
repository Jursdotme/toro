<?php 
add_shortcode('gallery', 'my_gallery_shortcode'); 

function my_gallery_shortcode($attr) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) )
			$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'div',
		'icontag'    => 'div',
		'captiontag' => 'div',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => '',
		'large'			 => '4',
		'medium'		 => '3',
		'small'			 => '2'
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$icontag = tag_escape($icontag);
	$valid_tags = wp_kses_allowed_html( 'post' );
	if ( ! isset( $valid_tags[ $itemtag ] ) )
		$itemtag = 'div';
	if ( ! isset( $valid_tags[ $captiontag ] ) )
		$captiontag = 'div';
	if ( ! isset( $valid_tags[ $icontag ] ) )
		$icontag = 'div';

	$columns = intval($columns);
	$columnNumber = 12;
	$calcColumn = $columnNumber/$columns;

	$selector = "gallery-{$instance}";

	$size_class = sanitize_html_class( $size );
	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class} row'>";
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		$imagethumb = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_image_src($id) : wp_get_attachment_image_src($id);
		$sourcelink = wp_get_attachment_image_src($id, "full");

		$output .= "<{$itemtag} class='gallery-item col-md-{$attr['large']} col-sm-{$attr['medium']} col-xs-{$attr['small']}'>";
		$output .= "<a href='{$sourcelink[0]}' class='thumbnail fancybox' rel='group' title='$attachment->post_excerpt.'><img src='{$imagethumb[0]}' max-width='100%' height='auto'>";
		// if ( $captiontag && trim($attachment->post_excerpt) ) {
		// 	$output .= "
		// 		<{$captiontag} class='wp-caption-text gallery-caption'>
		// 		" . wptexturize($attachment->post_excerpt) . "
		// 		</{$captiontag}>";
		// }
		$output .= "</a></{$itemtag}>";
		
	}

	$output .= "</div>\n";

	return $output;
} ?>