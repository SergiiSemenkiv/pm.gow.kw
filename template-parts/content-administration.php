<?php
$hero_image = get_field('hero_image');
$hero_message = get_field('message');
$name = get_field('name');
$position = get_field('position');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="hero hero-from-xl hero-biography">
    <div class="container-fluid">
      <div class="hero__wrapper">
        <div>
          <div class="hero__image__wrapper">
            <?php
            if ($hero_image) {
              echo wp_get_attachment_image($hero_image, 'full', false, array('class' => 'hero__image'));
            }
            ?>
          </div>
        </div>
        <div class="hero__content justify-content-center">
          <div class="hero__content__container">
            <div class="row justify-content-center">
              <div class="col col-xl-6">
                <div class="hero-biography__data">
                  <?php prime_minister_post_archive_link('hero-biography__link'); ?>
                    <h1 class="page-title page-title-medium hero-biography__name">
                      <?php echo $name ?>
                    </h1>
                  <div class="hero-biography__position"> <?php echo $position ?></div>
                  <p class="hero-biography__message"> <?php echo $hero_message ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <main class="page-main">
    <div class="container">
      <div class="row">
        <div class="col-12 col-xl-9 site-content__column">
          <section class="static-content">
            <?php the_content(); ?>
            <?php prime_minister_entry_footer(); ?>
          </section>
        </div>
        <?php get_sidebar('administration'); ?>
      </div>
    </div>
  </main>
</article>