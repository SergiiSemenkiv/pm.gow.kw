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
          <section class="static-content">
            <?php the_content(); ?>
            <?php prime_minister_entry_footer(); ?>
          </section>
        </div>
        <?php
        $current_post_id = get_the_ID();
        $the_query = new WP_Query(array(
          'posts_per_page' => 4,
          'post__not_in' => [$current_post_id]
        ));
        ?>
        <?php if ($the_query->have_posts()) : ?>
          <div class="col-12 col-xl-3 site-sidebar__column">
            <div class="site-sidebar">
              <ul class="site-sidebar__list">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                  <li class="site-sidebar__item">
                    <a href="<?php the_permalink() ?>" class="sidebar__link">
                      <?php echo get_the_excerpt(); ?>
                    </a>
                  </li>
                <?php endwhile; ?>
              </ul>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </main>
</article><!-- #post-<?php the_ID(); ?> -->
