<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prime_Minister
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="page-heading page-heading-small-offset ">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7 col">
          <?php the_title('<h1 class="page-title">', '</h1>'); ?>
        </div>
      </div>
    </div>
  </header>
  <main class="page-main">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <article class="static-content">
            <?php the_content(); ?>
            <?php if (get_edit_post_link()) :
              edit_post_link(
                sprintf(
                  wp_kses(
                  /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Edit <span class="screen-reader-text">%s</span>', 'prime-minister'),
                    array(
                      'span' => array(
                        'class' => array(),
                      ),
                    )
                  ),
                  wp_kses_post(get_the_title())
                ),
                '<span class="edit-link">',
                '</span>'
              );
            endif; ?>
          </article>
        </div>
      </div>
    </div>
  </main>
</article><!-- #post-<?php the_ID(); ?> -->
