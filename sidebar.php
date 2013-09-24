				<div id="sidebar1" class="large-3 columns" role="complementary">

					<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar1' ); ?>

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->

						<div class="alert alert-help">
							<p><?php _e("Aktiver venligst nogle Widgets", "torotheme");  ?></p>
						</div>

					<?php endif; ?>

				</div>