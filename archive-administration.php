<?php get_header(); ?>
<?php
$the_query = new WP_Query(array(
  'post_type' => 'administration',
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
                  <?php the_field('administration_page_title', 'option'); ?>
                </h1>
                <p class="hero-administration__message">
                  <?php the_field('administration_page_description', 'option'); ?>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div class="hero__image__wrapper">
            <?php
            $image = get_field('administration_page_hero_image', 'option');
            $size = 'full';
            if ($image) {
              echo wp_get_attachment_image($image, $size, false, array('class' => 'hero__image'));
            }
            ?>
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
                  <?php
                  $image = get_field('member_photo');
                  $size = 'thumbnail';
                  if ($image) {
                    echo wp_get_attachment_image($image, $size, false, array('class' => 'administration__grid__img'));
                  }
                  ?>
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
      </div>
    </section>
  </main>
<?php wp_reset_query(); ?>
<?php get_footer('simple'); ?>