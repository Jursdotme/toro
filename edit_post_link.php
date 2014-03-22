<?php if (current_user_can( 'manage_options' )) { ?>
        <div class="container">
					<div class="row ">
						<div class="col-md-12">
							<div class="alert alert-info alert-dismissable">
							  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							  <strong><span class="fa fa-pencil"></span> Hejsa!</strong> – Du er logget ind som adminstrator. <?php edit_post_link("Klik her for at redigere denne side."); ?>
							</div>
						</div>
					</div>
				</div>
 <?php }; ?>