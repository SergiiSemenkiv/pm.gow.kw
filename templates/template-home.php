<?php
/* Template Name: Home Page */
get_header();
?>
<?php
while (have_posts()) :
  the_post(); ?>
  <header class="hero hero-from-lg hero-home">
    <div class="container-fluid hero__container">
      <div class="hero__wrapper">
        <div>
          <div class="hero__image__wrapper">
            <?php
            $image = get_field('hero_image');
            $size = 'full';
            if ($image) {
              echo wp_get_attachment_image($image, $size, false, array('class' => 'hero__image'));
            }
            ?>
            <?php if (get_field('welcome_title')): ?>
              <div class="home__welcome">
                <div class="container">
                  <div class="row">
                    <div class="home__welcome__inner">
                      <p><?php the_field('welcome_title'); ?></p>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="hero__content home__topper hero__ratio-box">
          <div class="hero__ratio-box__inside justify-content-center">
            <div class="container hero__content__container">
              <div class="row">
                <div class="col-12 col-lg-5">
                  <h1 class="home__topper__title"><?php the_field('hero_title'); ?></h1>
                  <div class="home__topper__links">
                    <nav class="home__topper__menu">
                      <?php
                      wp_nav_menu(
                        array(
                          'theme_location' => 'home_hero_menu',
                          'menu_id' => 'home_hero_menu',
                          'menu_class' => 'home_hero_menu',
                          'items_wrap' => '<ul id="%1$s" class="home__topper__links__list link-styled-list">%3$s</ul>',
                          'add_li_class' => 'home__topper__links__item',
                          'container' => 'false',
                          'fallback_cb' => false,
                        )
                      );
                      ?>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <main class="page-main">
    <?php the_content(); ?>
  </main>
<?php endwhile; ?>
<?php
get_footer();