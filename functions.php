<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

require_once( 'library/navwalker.php' ); // needed for bootstrap navigation


// REDUX.  Needed for custom admin panel
// https://github.com/ReduxFramework/ReduxFramework
// WIP

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/library/admin/ReduxCore/framework.php' ) ) {
	require_once( dirname( __FILE__ ) . '/library/admin/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/library/option-config.php' ) ) {
	require_once( dirname( __FILE__ ) . '/library/option-config.php' );
}


// Custom metaboxes and fields
// https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
  if ( !class_exists( 'cmb_Meta_Box' ) ) {
    require_once( 'library/metabox/init.php' );
  }
}


/* library/bones.php (functions specific to BREW)
  - navwalker
  - Redux framework
  - Read more > Bootstrap button
  - Bootstrap style pagination
  - Bootstrap style breadcrumbs
*/
require_once( 'library/brew.php' ); // if you remove this, BREW will break
/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once( 'library/bones.php' ); // if you remove this, bones will break
/*
2. library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
// USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
//require_once( 'library/clients-post-type.php' );
//require_once( 'library/testimonials-post-type.php' );
//require_once( 'library/portfolio-post-type.php' );
//require_once( 'library/services-post-type.php' );
//require_once( 'library/promotions-post-type.php' );
/*
3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
// require_once( 'library/admin.php' ); // this comes turned off by default
/*
4. library/translation/translation.php
	- adding support for other languages
*/
// require_once( 'library/translation/translation.php' ); // this comes turned off by default

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'content-image', 640, 640, true );
add_image_size( 'tiny-image', 80, 80, false );
add_image_size( 'tiny-thumb', 80, 80, false );
add_image_size( 'small-thumb', 150, 150, true );
add_image_size( 'medium-thumb', 256, 256, false );
add_image_size( 'promo-thumb', 256, 256, false );
add_image_size( 'large-thumb', 350, 350, true );
add_image_size( 'top-image', 1140, 300, true );
add_image_size( 'portfolio-image', 1000, 1000, false );
add_image_size( 'box-list-image', 350, 350, false );
add_image_size( 'page-image', 640, 640, false );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/
add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
		return array_merge( $sizes, array(
			'tiny-thumb' => __('80 by 80'),
			'small-thumb' => __('150 by 150'),
			'medium-thumb' => __('256 by 256'),
			'large-thumb' => __('350 by 350'),
			'top-image' => __('1140 by 300'),
			'content-image' => __('640 by 640'),
		) );
}


/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	$widgets = array (
		
		array(
			'name' => __( 'Frontpage', 'bonestheme' ),
			'id' => 'sidebar-frontpage',
			'desc' => __( 'Only visible on frontpage', 'bonestheme' ) ),
		array(
			'name' =>__( 'Subpage', 'bonestheme' ),
			'id' => 'sidebar-subpage',
			'desc' => __( 'Visible on subpages in a column', 'bonestheme' ) ),
		array(
			'name' => __( 'Header', 'bonestheme' ),
			'id' => 'sidebar-header',
			'desc' => __( 'At the top of the page', 'bonestheme' ) ),
		array(
			'name' => __( 'Footer', 'bonestheme' ),
			'id' => 'sidebar-footer',
			'desc' => __( 'At the far bottom on the page', 'bonestheme' ) ),
		);
		/* Loop through the array and add our Widgetised areas */
		foreach ($widgets as $widget) {
			register_sidebar( array(
				'name' => $widget['name'],
				'id' => $widget['id'],
				'description' => $widget['desc'],
				'before_widget' => '<aside id="%1$s" class=" widget-container %2$s col-xs-12 col-sm-6 col-md-4 col-lg-3">',
				'after_widget' => '</aside>',
				'before_title' => '<h3  class="widget-title">',
				'after_title' => '</h3>',
			) );
		}

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!


/*
* neocreo specific
*/

// add pdf print support to post type 'product'
if(function_exists('set_pdf_print_support')) {
  set_pdf_print_support(array('post', 'page', 'neo_client', 'neo_portfolio'));
}

/*No generator*/
function no_generator() { return ''; }  
add_filter( 'the_generator', 'no_generator' );


// Search Form
function bones_wpsearch($form) {
		$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
		<label class="screen-reader-text" for="s">' . __('Search for:', 'bonestheme') . '</label>
		<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search the Site...','bonestheme').'" />
		<button type="submit" id="searchsubmit" >'. esc_attr__('Search') .'</button>
		</form>';
		return $form;
} // don't remove this bracket!

// get taxonomies terms links
function custom_taxonomies_terms_links() {
	global $post, $post_id;
	// get post by post id
	$post = &get_post($post->ID);
	// get post type by post
	$post_type = $post->post_type;
	// get post type taxonomies
	$taxonomies = get_object_taxonomies($post_type);
	foreach ($taxonomies as $taxonomy) {
		// get the terms related to post
		$terms = get_the_terms( $post->ID, $taxonomy );
		if ( !empty( $terms ) ) {
		
			$out = array();
			foreach ( $terms as $term )
			{
				$out[] = '<a href="' .get_term_link($term->slug, $taxonomy) .'">'.$term->name.'</a>';
			}
			$return = '<div id="categories" class="hidden">' . join( ', ', $out ) . '</div>';
		}
	}
	return $return;
}


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix comment-container">
			<div class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<?php // custom gravatar call ?>
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=64" class="load-gravatar avatar avatar-48 photo" height="64" width="64" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<?php // end custom gravatar call ?>
			</div>
      <div class="comment-content">
        <?php printf(__( '<cite class="fn">%s</cite>', 'bonestheme' ), get_comment_author_link()) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>
        <?php edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ?>
  			<?php if ($comment->comment_approved == '0') : ?>
  				<div class="alert alert-info">
  					<p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
  				</div>
  			<?php endif; ?>
  			<section class="comment_content clearfix">
  				<?php comment_text() ?>
  			</section>
  			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div> <!-- END comment-content -->
		</article>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

/*************** PINGS LAYOUT **************/

function list_pings( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	<li id="comment-<?php comment_ID(); ?>">
		<span class="pingcontent">
			<?php printf(__('<cite class="fn">%s</cite> <span class="says"></span>'), get_comment_author_link()) ?>
			<?php comment_text(); ?>
		</span>
	</li>
<?php } // end list_pings
?>
