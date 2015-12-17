<?php
/*
Template Name: Home Page Template
*/
?>

<?php get_header(); ?>

       <?php wd_slider(1); ?>
<!--<div class="homebanner">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
      </div>
    </div>
  </div> end .container
</div>  end #banner-->
<div id="searchbox">
  <div class="container">
    <?php //get_template_part( 'library/sidebars/sidebar','frontpage' );
   echo do_shortcode('[booking_pluginbox id="46"]'); ?>
  </div>
</div>

<div class="container vspacer-sm">
  <div class="row">
    
    <!--Section 1-->
    <div class="col-xs-4 ">
     <?php the_content(); ?>
    </div>
    
    <!--Section 2-->
    <div class="col-xs-8">
      <?php get_template_part( 'library/partials/booking','hotellradmannen' ); ?>
    </div>
    
  </div>
  
  
</div>
<div class="container vspacer-sm cfix">
  <div class="row text-center">
    <!--Section 3-->
    <div class="col-xs-12">
      <?php get_template_part( 'library/sidebars/sidebar','frontpage' );?>
    </div>
    
  </div>
</div>
<div id="eventlistings" class="cfix">
  <div class="container vspacer-sm">
    <div class="row">
    
    <!--Section 1-->
    <div class="col-xs-4 ">
     <?php get_template_part( 'library/partials/listings','events' ); ?>
    </div>
    
    <!--Section 2-->
    <div class="col-xs-4">
      <?php get_template_part( 'library/partials/listings','music' ); ?>
    </div>
    
    <!--Section 3-->
    <div class="col-xs-4">
      <?php get_template_part( 'library/partials/listings','sports' ); ?>
    </div>
    
  </div>
  </div>
  
</div>

<?php get_footer(); ?>
