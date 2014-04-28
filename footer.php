<!-- footer -->
<?php include "edit_post_link.php" ?>
<footer class="page-footer">
	<div class="container">
		<div class="row" role="contentinfo">

			<div class="col-sm-5">

				<!-- copyright -->

					<p class="copyright">
						&copy; <?php echo date("Y"); ?> Copyright <?php bloginfo('name'); ?>. <?php _e('Powered by', 'toro'); ?>
						<a href="//wordpress.org" title="WordPress">WordPress</a> &amp; <a href="//jurs.me" title="Toro">Toro</a>.
					</p>

				<!-- /copyright -->

			</div>


			<?php footer_nav(); ?>


		</div>
	</div>
</footer>
<!-- /footer -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
			var _gaq=[['_setAccount','UA-XXXXXXXX-XX'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)})(document,'script');
		</script>

		<!-- Grunt Live Reload Script -->
		<script src="//localhost:35729/livereload.js"></script>

	</body>
</html>
