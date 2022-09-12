<?php
$theme_site_domain = get_field('theme_site_domain', 'option');
$theme_office_address_title = get_field('theme_office_address_title', 'option');
$theme_office_address = get_field('theme_office_address', 'option');
?>

<!--FOOTER START-->
<footer class="site-footer">
  <div class="site-bottom__item-inner">
    <div class="container">
      <div class="relative">
        <div class="row g-0">
          <div class="col-9 col-md">
            <?php if (has_nav_menu('footer_menu_column_1')) : ?>
              <nav class="site-footer__menu">
                <?php
                wp_nav_menu(
                  array(
                    'theme_location' => 'footer_menu_column_1',
                    'menu_id' => 'footer_menu_column_1',
                    'menu_class' => 'site-footer__menu__list',
                    'add_li_class' => 'site-footer__menu__item',
                    'items_wrap' => '<ul id="%1$s" class="site-footer__menu__list">%3$s</ul>',
                    'container' => 'false',
                    'link_before' => '',
                    'fallback_cb' => false,
                  )
                );
                ?>
              </nav>
            <?php endif; ?>
          </div>
          <div class="col-9 col-md">
            <?php if (has_nav_menu('footer_menu_column_2')) : ?>
              <nav class="site-footer__menu">
                <?php
                wp_nav_menu(
                  array(
                    'theme_location' => 'footer_menu_column_2',
                    'menu_id' => 'footer_menu_column_2',
                    'menu_class' => 'site-footer__menu__list',
                    'add_li_class' => 'site-footer__menu__item',
                    'items_wrap' => '<ul id="%1$s" class="site-footer__menu__list">%3$s</ul>',
                    'container' => 'false',
                    'link_before' => '',
                    'fallback_cb' => false,
                  )
                );
                ?>
              </nav>
            <?php endif; ?>
          </div>
          <div class="col-2 col-md offset-xl-1">
            <?php if (has_custom_logo()) : ?>
              <div class="site-footer__logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
          </div>
          <div class="col-9 col-md">
            <!--FOOTER STATIC PAGES -->
            <?php if (has_nav_menu('footer_static_pages_menu')) : ?>
              <nav class="site-footer__menu site-footer__menu-secondary">
                <?php
                wp_nav_menu(
                  array(
                    'theme_location' => 'footer_static_pages_menu',
                    'menu_id' => 'footer_static_pages_menu',
                    'menu_class' => 'site-footer__menu__list',
                    'add_li_class' => 'site-footer__menu__item',
                    'items_wrap' => '<ul id="%1$s" class="site-footer__menu__list">%3$s</ul>',
                    'container' => 'false',
                    'link_before' => '',
                    'fallback_cb' => false,
                  )
                );
                ?>
              </nav>
            <?php endif; ?>
            <!--FOOTER STATIC PAGES -->
          </div>
          <div class="col-9 col-md-3 col-xl">

            <div class="social-and-address">
              <!-- FOOTER SOCIAL START -->
              <?php if (has_nav_menu('social_menu')) : ?>
                <nav class="site-footer__social">
                  <?php
                  wp_nav_menu(
                    array(
                      'theme_location' => 'social_menu',
                      'menu_id' => 'social_menu',
                      'menu_class' => 'site-header__menu__list',
                      'add_li_class' => 'site-footer__social__item',
                      'items_wrap' => '<ul id="%1$s" class="site-footer__social__list">%3$s</ul>',
                      'container' => 'false',
                      'link_before' => '',
                      'fallback_cb' => false,
                    )
                  );
                  ?>
                </nav>
              <?php endif; ?>
              <!-- FOOTER SOCIAL END -->

              <!-- FOOTER ADDRESS START -->
              <address class="site-footer__address">
                <div class="site-footer__address__title">
                  <?php echo $theme_office_address_title; ?>
                </div>
                <p class="site-footer__address__text">
                  <?php echo $theme_office_address; ?>
                </p>
              </address>
              <!-- FOOTER ADDRESS END -->

              <!-- FOOTER TEXT LOGO -->
              <a class="site-footer__text-logo" href="<?php echo get_home_url() ?>">
                <?php echo $theme_site_domain; ?>
              </a>
              <!-- FOOTER TEXT LOGO -->
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--FOOTER END-->