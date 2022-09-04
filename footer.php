<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prime_Minister
 */

?>
  </div>
  <!--SITE MAIN END -->
  <div class="site-bottom">
    <?php if(is_active_sidebar('footer_widget_area')) :?>
      <?php dynamic_sidebar( 'footer_widget_area' ); ?>
    <?php endif;?>
    <?php get_template_part('template-parts/footer_navigation'); ?>
  </div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
