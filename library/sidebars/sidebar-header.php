
<?php
	/* The supplemental widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'sidebar-header' )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
	<?php if ( is_active_sidebar( 'sidebar-header' ) ) : ?>
	<div id="header-widgets" class="widget-area eightcol last" role="complementary">
		<?php dynamic_sidebar( 'sidebar-header' ); ?>
	</div><!-- #header .widget-area -->
	<?php endif; ?>


