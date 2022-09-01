<?php get_header(); ?>
<?php
$post_id = 84;
// query
$the_query = new WP_Query(array(
  'post_type' => 'administrations',
  'posts_per_page' => -1,
  'meta_key' => 'list_order',
  'orderby' => 'meta_value',
  'order' => 'ASC'
));

?>

    <!-- HERO START-->
    <section class="hero hero-from-lg hero-administration">
      <div class="container-fluid">
        <div class="hero__wrapper">
          <div class="hero__content ">
            <div class="hero__content__container">
              <div class="row justify-content-center">
                <div class="col-12 col-xl-6">
                  <h1 class="page-title hero-administration__title">
                    <?php the_field('administrations_title', $post_id); ?>
                  </h1>
                  <p class="hero-administration__message">
                    <?php the_field('administrations_description', $post_id); ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div>
            <div class="hero__image__wrapper">
              <?php
              $image = get_field('administrations_image', $post_id);
              if( !empty( $image ) ): ?>
                <img class="hero__image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- HERO END-->

    <main class="page-main">
      <section class="administration__grid">
        <div class="container">
          <?php if ($the_query->have_posts()): ?>
            <ul class="row justify-content-center">
              <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <li class="col-12 col-lg-4 col-xl-3">
                  <a href="<?php the_permalink() ?>" class="administration__grid__item">
                    <img src="<?php the_field('thumbnail'); ?>"
                         alt="<?php the_field('name'); ?>"
                         class="administration__grid__img">
                    <div class="administration__grid__name">
                      <?php the_field('name'); ?>
                    </div>
                    <div class="administration__grid__position">
                      <?php the_field('position'); ?>
                    </div>
                  </a>
                </li>
              <?php endwhile; ?>
            </ul>
          <?php endif; ?>
          <?php wp_reset_query(); ?>
        </div>
      </section>
    </main>
<?php get_footer('simple'); ?>