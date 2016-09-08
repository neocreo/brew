<?php
	/* The frontpage widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'sidebar-frontpage' )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
	<?php if ( is_active_sidebar( 'sidebar-frontpage' ) ) : ?>
	<div id="frontpage-widgets" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-frontpage' ); ?>
	</div><!-- #slideshow .widget-area -->
	<?php endif; ?>


