<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Prime_Minister
 */

get_header();
?>
	  <?php
  		while ( have_posts() ) :
  			the_post();
        echo "get_post_type():" . get_post_type();
  			get_template_part( 'template-parts/content', get_post_type() );
  	?>
  	<?php endwhile; ?>
<?php
get_footer();
