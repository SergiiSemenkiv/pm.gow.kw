<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <!-- HERO START-->
  <section class="hero hero-from-xl hero-biography">
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
  </section>
  <!-- HERO END-->

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
</article>