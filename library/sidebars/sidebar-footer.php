
<?php
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'sidebar-footer'  )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>

	<?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
	
		<?php dynamic_sidebar( 'sidebar-footer' ); ?>

	<?php endif; ?>
	
