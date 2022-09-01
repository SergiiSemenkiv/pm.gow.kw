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
        <div class="col-md-10 col-lg-8 col-xl-8 col">
          <?php prime_minister_page_for_post_link('page-heading__category-link') ?>
          <?php the_title('<h1 class="page-title page-title-medium page-title-regular">', '</h1>'); ?>
          <?php prime_minister_post_shared_meta('page-heading__shared-meta justify-content-center'); ?>
        </div>
      </div>
    </div>
  </header>
  <section class="page-image">
    <div class="container">
      <div class="row">
        <div class="col">
          <?php prime_minister_post_thumbnail(); ?>
        </div>
      </div>
    </div>
  </section>
  <main class="page-main">
    <div class="container">
      <div class="row">
        <div class="col-12 col-xl-9 site-content__column">
          <article class="static-content">
            <div class="page-text">
              <?php the_content(); ?>
            </div>
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
        {{> sidebar }}
      </div>
    </div>
  </main>
</article><!-- #post-<?php the_ID(); ?> -->
