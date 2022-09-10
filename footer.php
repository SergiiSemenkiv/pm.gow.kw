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
  <div class="site-bottom">
    <?php get_template_part( 'template-parts/sections/administration' ); ?>
    <?php get_template_part( 'template-parts/sections/subscribe' ); ?>
    <?php get_template_part( 'template-parts/footer/site-footer' ); ?>
  </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
