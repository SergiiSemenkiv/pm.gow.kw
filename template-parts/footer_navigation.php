<!--FOOTER START-->
<footer class="site-footer">
  <div class="site-bottom__item-inner">
    <div class="container">
      <div class="relative">
        <div class="row g-0">
          <div class="col-9 col-md">

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
          </div>
          <div class="col-9 col-md">
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
          </div>
          <div class="col-2 col-md offset-xl-1">
            <?php if (has_custom_logo()) : ?>
              <div class="site-footer__logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
          </div>
          <div class="col-9 col-md">
            <!--FOOTER STATIC PAGES -->
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
            <!--FOOTER STATIC PAGES -->
          </div>
          <div class="col-9 col-md-3 col-xl">

            <div class="social-and-address">
              <!-- FOOTER SOCIAL START -->
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
              <!-- FOOTER SOCIAL END -->

              <!-- FOOTER ADDRESS START -->
              <address class="site-footer__address">
                <div class="site-footer__address__title">
                  THE PRIME MINISTER
                </div>
                <p class="site-footer__address__text">Prime Minister's Office</p>
                <p class="site-footer__address__text">Seif Palace - Kuwait</p>
              </address>
              <!-- FOOTER ADDRESS END -->

              <!-- FOOTER TEXT LOGO -->
              <a class="site-footer__text-logo" href="<?php echo get_home_url() ?>">
                pm.gov.kw
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