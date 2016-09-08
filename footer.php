    <footer id="footer" class="clearfix">
      <div id="footer-widgets">

        <div class="container">

          <div class="row">
            <?php get_template_part('library/parts/part','clients') ?>
            <?php get_template_part('library/sidebars/sidebar','footer') ?>
            
          </div>

        </div> <!-- end .container -->
      </div> <!-- end #footer-widgets -->

      <div id="sub-floor">
        <div class="container">
          <div class="row">
           <nav role="navigation">
                  <?php //bones_supportive_nav(); ?>
            </nav>
            <?php //bones_secondary_nav(); ?>
            <p class="source-org copyright text-center">&copy; <?php echo date('Y'); ?> <?php echo get_bloginfo('name'); ?></p>
          </div> <!-- end .row -->
        </div>
      </div>

    </footer> <!-- end footer -->

    <!-- all js scripts are loaded in library/bones.php -->
    <?php wp_footer(); ?>
    <!-- Hello? Doctor? Name? Continue? Yesterday? Tomorrow?  -->

  </body>

</html> <!-- end page. what a ride! -->
