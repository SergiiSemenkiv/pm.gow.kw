<?php
/**
 * Prime Minister functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Prime_Minister
 */

if (!defined('_S_VERSION')) {
  // Replace the version number of the theme on each release.
  define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function prime_minister_setup()
{
  /*
    * Make theme available for translation.
    * Translations can be filed in the /languages/ directory.
    * If you're building a theme based on Prime Minister, use a find and replace
    * to change 'prime-minister' to the name of your theme in all the template files.
    */
  load_theme_textdomain('prime-minister', get_template_directory() . '/languages');

  // Add default posts and comments RSS feed links to head.
  add_theme_support('automatic-feed-links');

  /*
    * Let WordPress manage the document title.
    * By adding theme support, we declare that this theme does not use a
    * hard-coded <title> tag in the document head, and expect WordPress to
    * provide it for us.
    */
  add_theme_support('title-tag');

  /*
    * Enable support for Post Thumbnails on posts and pages.
    *
    * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    */
  add_theme_support('post-thumbnails');

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus(
    array(
      'header_menu' => 'Header Menu',
      'home_hero_menu' => 'Home Hero menu',
      'footer_menu_column_1' => 'Footer Menu First Column',
      'footer_menu_column_2' => 'Footer Menu Second Column',
      'footer_static_pages_menu' => 'Footer Menu Static Pages',
      'social_menu' => 'Social Menu',
    )
  );

  /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script',
    )
  );

  // Set up the WordPress core custom background feature.
  add_theme_support(
    'custom-background',
    apply_filters(
      'prime_minister_custom_background_args',
      array(
        'default-color' => 'ffffff',
        'default-image' => '',
      )
    )
  );

  // Add theme support for selective refresh for widgets.
  add_theme_support('customize-selective-refresh-widgets');

  /**
   * Add support for core custom logo.
   *
   * @link https://codex.wordpress.org/Theme_Logo
   */
  add_theme_support(
    'custom-logo',
    array(
      'height' => 75,
      'width' => 85,
      'flex-width' => true,
      'flex-height' => true,
    )
  );
}

add_action('after_setup_theme', 'prime_minister_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function prime_minister_content_width()
{
  $GLOBALS['content_width'] = apply_filters('prime_minister_content_width', 640);
}

add_action('after_setup_theme', 'prime_minister_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function prime_minister_widgets_init()
{
  register_sidebar(
    array(
      'name' => esc_html__('Sidebar', 'prime-minister'),
      'id' => 'sidebar-1',
      'description' => esc_html__('Add widgets here.', 'prime-minister'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
    )
  );
}

add_action('widgets_init', 'prime_minister_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function prime_minister_scripts()
{
  wp_enqueue_style('bootstrap-reboot', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap-reboot.min.css');

  if ( is_rtl() ) {
    wp_enqueue_style('bootstrap-grid', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap-grid.rtl.min.css');
  } else {
    wp_enqueue_style('bootstrap-grid', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap-grid.min.css');
  }
  wp_style_add_data( 'bootstrap-grid', 'title', 'foo' );

  wp_enqueue_style('prime-minister-style', get_stylesheet_uri(), array(), _S_VERSION);

  wp_enqueue_script('prime-minister-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
}

add_action('wp_enqueue_scripts', 'prime_minister_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}

show_admin_bar(false);

/**
 * ACF integration
 */
require get_template_directory() . '/inc/acf-configuration.php';

/**
 * Theme shortcodes
 */
require get_template_directory() . '/inc/custom-shortcodes.php';

/**
 * Email subscribe
 */
require get_template_directory() . '/inc/email-subscribe-integration.php';

/**
 * Navigation customization
 */
function add_additional_class_on_li($classes, $item, $args)
{
  if (isset($args->add_li_class)) {
    $classes[] = $args->add_li_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

/**
 * Theme Pagination
 */
function prime_minister_posts_nav()
{

  if (is_singular())
    return;

  global $wp_query;

  /** Stop execution if there's only 1 page */
  if ($wp_query->max_num_pages <= 1)
    return;

  $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
  $max = intval($wp_query->max_num_pages);

  /** Add current page to the array */
  if ($paged >= 1)
    $links[] = $paged;

  /** Add the pages around the current page to the array */
  if ($paged >= 3) {
    $links[] = $paged - 1;
    $links[] = $paged - 2;
  }

  if (($paged + 2) <= $max) {
    $links[] = $paged + 2;
    $links[] = $paged + 1;
  }

  echo '<nav class="pagination"><ul class="pagination__list">' . "\n";

  /** Link to first page, plus ellipses if necessary */
  if (!in_array(1, $links)) {
    $class = 1 == $paged ? 'current' : '';

    printf('<li class="pagination__item %s"><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

    if (!in_array(2, $links))
      echo '<li class="pagination__item"><span>...</span></li>';
  }

  /** Link to current page, plus 2 pages in either direction if necessary */
  sort($links);
  foreach ((array)$links as $link) {
    $class = $paged == $link ? 'current' : '';
    printf('<li class="pagination__item %s"><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
  }

  /** Link to last page, plus ellipses if necessary */
  if (!in_array($max, $links)) {
    if (!in_array($max - 1, $links))
      echo '<li class="pagination__item"><span>...</span></li>' . "\n";

    $class = $paged == $max ? 'current' : '';
    printf('<li class="pagination__item %s"><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
  }

  echo '</ul></div>' . "\n";

}

/**
 * Administration post type
 */
function create_posttype_administration() {

  register_post_type( 'administration',
    array(
      'labels' => array(
        'name' => __( 'Administration members' ),
        'singular_name' => __( 'Administration member' )
      ),
      'supports' => array('title', 'editor',),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'administration'),
      'show_in_rest' => true,
    )
  );
}
add_action( 'init', 'create_posttype_administration' );


/**
 * Heading options for categories, archive
 */
add_filter('get_the_archive_title', function () {
  $title = '';
  if (is_category()) {
    $title = single_cat_title('', false);
  } elseif (is_tag()) {
    $title = single_tag_title('', false);
  } elseif (is_author()) {
    $title = '<span class="vcard">' . get_the_author() . '</span>';
  } elseif (is_tax()) { //for custom post types
    $title = sprintf(__('%1$s'), single_term_title('', false));
  } elseif (is_post_type_archive()) {
    $title = post_type_archive_title('', false);
  }
  return $title;
});