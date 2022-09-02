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
  <!--bootstrap reboot-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap-reboot.min.css"
        integrity="sha512-ZJ+KmS7LSGuRKphz9V5eX99TPMci9Ngt5lCk0XFdYJmBg+ZDr/4r/HSsMEiUKmR7bxe1eAv768c2YuSl/OGiFw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
  <!--bootstrap grid-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap-grid.min.css"
        integrity="sha512-Aa+z1qgIG+Hv4H2W3EMl3btnnwTQRA47ZiSecYSkWavHUkBF2aPOIIvlvjLCsjapW1IfsGrEO3FU693ReouVTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap-grid.rtl.min.css"-->
  <!--    integrity="sha512-O0LJksijgJLiKH5dDSIH0z9NuZvuiA/ON1nTFDtjTQ6lS0W0N4JptZxpnKJR5cVwyU0Nc3i6t/InaUbOrM6JPg=="-->
  <!--    crossorigin="anonymous" referrerpolicy="no-referrer" />-->
  <!--custom styles-->

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site site-wrap">
  <!--HEADER START-->
  <header id="site-header" class="site-header">
    <div class="site-header__inner rtl-ignore">
      <div class="container-fluid">
        <div class="row">
          <div class="col-5">
            <div class="site-header__text-logo">
              <a href="<?php echo get_home_url(); ?>">
                <?php echo file_get_contents(get_template_directory() . '/assets/img/logos/text_logo.svg'); ?>
              </a>
              <a href="<?php echo get_home_url(); ?>">
                <?php echo file_get_contents(get_template_directory() . '/assets/img/logos/text_logo_en.svg'); ?>
              </a>
            </div>
          </div>
          <div class="col-2 g-0">
            <?php if (has_custom_logo()) : ?>
              <div class="site-header__logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
          </div>
          <div class="col-5 site-header__menu__wrap">
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
          </div>
        </div>
      </div>
    </div>
    <nav id="site__menu-mobile" class="site-header__menu-mobile">
      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'home_hero_menu',
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
  </header>
  <!--HEADER END-->
  <!--SITE MAIN-->
  <div id="primary" class="site-main">