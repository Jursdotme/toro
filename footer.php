				<footer class="footer row">

						<div class="large-12 columns">
							<p><a href="<?php echo esc_url( __( 'http://jurs.me/', 'Toro' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'Toro' ), 'Toro' ); ?></a></p>
						</div>
						

				</footer> <!-- end footer -->

			</div> <!-- end #container -->

			<!-- all js scripts are loaded in library/toro.php -->
			<?php wp_footer(); ?>
		
		<!-- Add fitvids.js for responsive youtube imbedding -->
		<script src="<?php echo get_template_directory_uri(); ?>/javascripts/jquery.fitvids.js"></script>

		<!-- Use fastclick.js to remove 300ms click delay on touch screens -->
		<script type='application/javascript' src='<?php echo get_template_directory_uri(); ?>/javascripts/fastclick.js'></script>

		<script type="text/javascript">
			window.addEventListener('load', function() {
			    FastClick.attach(document.body);
			}, false);
		</script>

	</body>

</html> <!-- end page. what a ride! -->