<?php
/* Template Name: Static Page */
get_header();
?>
<?php
while (have_posts()) :
  the_post();
  get_template_part('template-parts/content', 'static');
endwhile;
?>
<?php
get_footer('simple');
