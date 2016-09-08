
	<nav role="menu">
			<?php 
			global $pagetype;
			if ( is_404() || is_search() ){ ?>
				
			<?php } 
			else if ( is_home() ||  is_singular( 'post' ) || is_post_type_archive( 'post' ) ) {
				//bones_category_nav( null, null );
			}
			
			else if ( get_post_type() == 'neo_portfolio' || is_post_type_archive( 'neo_portfolio' ) || is_singular( 'neo_portfolio' ) || $pagetype == 'neo_portfolio' ) {
				//bones_customposttype_page_nav( 'neo_portfolio' );
				//bones_category_nav('webbplats','');
				echo '<aside id="portfolio_cat_nav" class="page_nav">';
				echo '<h3>'.__('Categories','bonestheme').'</h3>';
				bones_category_nav( 'neo_portfolio_types');
				echo '</aside>';
				echo '<aside id="portfolio_skills_nav" class="page_nav">';
				echo '<h3>'.__('Skills','bonestheme').'</h3>';
				bones_category_nav( 'neo_portfolio_skills');
				echo '</aside>';
				//echo '<aside>';
				//echo '<h3>'.__('Clients','bonestheme').'</h3>';
				//bones_category_nav( 'neo_portfolio_clients');
				//echo '</aside>';
				

			}
			else if ( get_post_type() == 'neo_service' || is_post_type_archive( 'neo_service' ) || is_singular( 'neo_service' ) || $pagetype == 'neo_service' ) {
				//bones_customposttype_page_nav( 'neo_portfolio' );
				//bones_category_nav('webbplats','');
				echo '<aside id="service_cat_nav" class="page_nav">';
				echo '<h3>'.__('Categories','bonestheme').'</h3>';
				bones_category_nav( 'neo_service_types');
				echo '</aside>';
			
				

			}
			else if ( get_post_type() == 'neo_testimonial' || is_post_type_archive( 'neo_testimonial' ) || is_singular( 'neo_testimonial' ) || $pagetype == 'neo_testimonial' ) {
				//bones_customposttype_page_nav( 'neo_testimonial' );
			}
			else if ( get_post_type() == 'neo_promotion' || is_post_type_archive( 'neo_promotion' ) || is_singular( 'neo_promotion' ) || $pagetype == 'neo_promotion' ) {
				//bones_customposttype_page_nav( 'neo_testimonials' );
			}
			else if ( get_post_type() == 'neo_client' || is_post_type_archive( 'neo_client' ) || is_singular( 'neo_client' ) || $pagetype == 'neo_client' ) {
				echo '<aside id="client_cat_nav" class="page_nav">';
				echo '<h3>'.__('Clients','bonestheme').'</h3>';
				bones_customposttype_page_nav( 'neo_client' );
				//bones_category_nav( 'neo_client_types');
				echo '</aside>';
			}
			else {?>
			<?php 
				echo '<aside id="plain_page_nav" class="page_nav">';
				echo '<h3>'.__('Pages','bonestheme').'</h3>';
				bones_subpage_nav(); 
				echo '</aside>';
			?>
			<?php } ?>
			
			<?php 
			//global $post;
			//$current_cat =  get_the_category();
			////print_r($current_cat);
			//$current_catID = $current_cat[0]->cat_ID;
			//$current_taxanomy = $current_cat[0]->taxanomy;
			//echo 'We have ID: '.$current_catID;
			//echo 'We have tax: '.$current_taxanomy;
			//echo get_post_type();
			//only list categories for news and posts
			
				
			 ?>
	</nav>
	<?php
		/* The subpage widget area is triggered if any of the areas
		 * have widgets. So let's check that first.
		 *
		 * If none of the sidebars have widgets, then let's bail early.
		 */
		//if (  ! is_active_sidebar( 'sidebar-subpage' ) ){
		//		return;
		//	}
		// If we get this far, we have widgets. Let do this.
	?>
		<?php if ( is_active_sidebar( 'sidebar-subpage' ) ) : ?>
		<div id="subpage-widgets" class="widget-area" role="complementary">
			<?php get_template_part('library/parts/part','promotions'); ?>
			<?php dynamic_sidebar( 'sidebar-subpage' ); ?>
		</div><!-- #subpage .widget-area -->
		
		<?php endif; ?>



