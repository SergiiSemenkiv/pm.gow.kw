<?php
/* Template Name: Administration Page */

get_header();
?>
    <?php
    while (have_posts()) :
      the_post();
      get_template_part('template-parts/content', 'administration');
    endwhile;
    ?>
<?php
get_footer('simple');