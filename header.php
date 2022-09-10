<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prime_Minister
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!--google fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=IBM+Plex+Sans+Arabic:wght@400;600;700&display=swap"
      rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site site-wrap">

  <header id="site-header" class="site-header">
    <div class="site-header__inner rtl-ignore">
      <div class="container-fluid">
        <div class="row">
          <div class="col-5">
            <div class="site-header__text-logo">
              <?php
              $languages = apply_filters('wpml_active_languages', NULL, 'skip_missing=0&orderby=code');
              if (!empty($languages)) {
                foreach ($languages as $l) {
                  $l['url'] = apply_filters('wpml_permalink', home_url(), $l['language_code']);
                  if ($l['code'] === 'en') {
                    echo '<a href="' . $l['url'] . '">';
                    echo file_get_contents(get_template_directory() . '/assets/img/logos/text_logo_en.svg');
                    echo '</a>';
                  }
                  if ($l['code'] === 'ar') {
                    echo '<a href="' . $l['url'] . '">';
                    echo file_get_contents(get_template_directory() . '/assets/img/logos/text_logo.svg');
                    echo '</a>';
                  }
                }
              }
              ?>
            </div>
          </div>
          <div class="col-2 g-0">
            <?php if (has_custom_logo()) : ?>
              <div class="site-header__logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
          </div>
          <div class="col-5 site-header__menu__wrap">
            <?php if (has_nav_menu('header_menu')) : ?>
              <nav class="site-header__menu">
                <?php
                wp_nav_menu(
                  array(
                    'theme_location' => 'header_menu',
                    'menu_id' => 'header_menu',
                    'menu_class' => 'site-header__menu__list',
                    'items_wrap' => '<ul id="%1$s" class="site-header__menu__list">%3$s</ul>',
                    'add_li_class' => 'site-header__menu__item',
                    'container' => 'false',
                    'fallback_cb' => false,
                  )
                );
                ?>
              </nav>
              <button
                  id="site-header__menu-mobile__toggler"
                  class="site-header__menu-mobile__toggler"
                  type="button"
                  data-toggle="collapse">
              <span>
                <?php echo file_get_contents(get_template_directory() . '/assets/img/header/menu_icon.svg'); ?>
              </span>
              </button>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <?php if (has_nav_menu('header_menu')) : ?>
      <nav id="site__menu-mobile" class="site-header__menu-mobile">
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'header_menu',
            'menu_id' => 'site-header__menu-mobile__list',
            'menu_class' => 'site-header__menu-mobile__list',
            'items_wrap' => '<ul id="%1$s" class="site-header__menu-mobile__list">%3$s</ul>',
            'add_li_class' => 'site-header__menu-mobile__item',
            'container' => 'false',
            'fallback_cb' => false,
          )
        );
        ?>
      </nav>
    <?php endif; ?>
  </header>

  <div id="primary" class="site-main">