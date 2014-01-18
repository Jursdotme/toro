			<!-- footer -->
			<footer class="footer row" role="contentinfo">
				
				<div class="large-9 medium-8 small-12 columns">

					<!-- copyright -->
					<p class="copyright">
						&copy; <?php echo date("Y"); ?> Copyright <?php bloginfo('name'); ?>. <?php _e('Powered by', 'toro'); ?> 
						<a href="//wordpress.org" title="WordPress">WordPress</a> &amp; <a href="//jurs.me" title="Toro">Toro</a>.
					</p>
					<!-- /copyright -->
					
				</div>

			</footer>
			<!-- /footer -->

			</div>
		
		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>
		
		<!-- analytics -->
		<script>
			var _gaq=[['_setAccount','UA-XXXXXXXX-XX'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)})(document,'script');
		</script>
		
		<script>
		// OWL Setup
			$(document).ready(function() {

				// Costumizing Owl Carusel: http://www.owlgraphic.com/owlcarousel/#customizing
	 
			  $("#frontpage-slider").owlCarousel({
			    autoPlay : 3000,
			    stopOnHover : true,
			    navigation:true,
			    paginationSpeed : 1000,
			    goToFirstSpeed : 2000,
			    singleItem : true,
			    autoHeight : false,
			    items : 1,
			    transitionStyle : "goDown"
			  });
			 
			});
		</script>

		<script src="//localhost:35729/livereload.js"></script>
	

	</body>
</html>