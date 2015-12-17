
				<div id="subpage-widgets" class="widget-area col-xs-3" role="complementary">

				<?php 
				if (is_home() || is_category() || is_single()) {
					bones_post_nav();
					# code...
				} else{
					bones_page_nav(); 

				}
				?>
					<?php if ( ! dynamic_sidebar( 'sidebar-subpage' ) ) : ?>

						

					<?php endif; // end sidebar widget area ?>
				</div><!-- #primary .widget-area -->