<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="hero hero-from-xl hero-biography">
    <div class="container-fluid">
      <div class="hero__wrapper">
        <div>
          <div class="hero__image__wrapper">
            <?php the_post_thumbnail('post-thumbnail', array('class' => 'hero__image')); ?>
          </div>
        </div>
        <div class="hero__content justify-content-center">
          <div class="hero__content__container">
            <div class="row justify-content-center">
              <div class="col col-xl-4">
                <div class="hero-biography__data">
                  <?php prime_minister_post_category_link('hero-biography__link'); ?>
                  <?php the_title('<h1 class="page-title page-title-medium hero-biography__name">', '</h1>'); ?>
                  <div class="hero-biography__position"><?php the_field('position'); ?></div>
                  <p class="hero-biography__message">
                    <?php the_field('description'); ?>
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
        {{> sidebar }}
      </div>
    </div>
  </main>
</article>