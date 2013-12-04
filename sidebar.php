<!-- sidebar -->
<aside class="sidebar large-3 medium-4 small-12 columns" role="complementary">

	<?php get_template_part('searchform'); ?>
    		
	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
	</div>
		
</aside>
<!-- /sidebar -->