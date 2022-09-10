<?php
/**
 * Theme: administration section
 */
function get_administration_section()
{
  ob_start();
  get_template_part('template-parts/sections/administration');
  return ob_get_clean();
}
add_shortcode('pm_administration_section', 'get_administration_section');

/**
 * Theme: sticky post section
 */
function get_latest_sticky_section(): string
{
  /* Get all sticky posts */
  $sticky = get_option('sticky_posts');
  rsort($sticky);
  $sticky = array_slice($sticky, 0, 10);
  $the_query = new WP_Query(array('post__in' => $sticky, 'ignore_sticky_posts' => 1));
  $return = '';


  if ($the_query->have_posts()) {
    $i = 0;
    $post_count = $the_query->post_count;
    $split = ceil( $post_count / 2 );
    $first_column_articles = '';
    $second_column_articles = '';
    $third_column_articles = '';

    while ($the_query->have_posts()) {
      $the_query->the_post();
      $article_class = $i == 0 ? ' home-news__item-primary' : '';
      $article = '<article class="home-news__item'. $article_class .'">
              <h2 class="home-news__item__title">
                <a href="' . get_permalink() . '" title="' . get_the_excerpt() . '" class="home-news__item__link secondary-link">
                  '. get_the_excerpt() .'
                </a>
              </h2>
              '. get_prime_minister_post_shared_meta_template() .'
            </article>';
      if ($i == 0) {
        $first_column_articles = $article;
      } elseif ($split >= $i) {
        $second_column_articles .= $article;
      } else {
        $third_column_articles .= $article;
      }

      $i++;
    }

    $first_column =  $first_column_articles ? '<div class="col-xs-12 col-xl-4 home-news__column">' . $first_column_articles. '</div>' : '';
    $second_column =  $second_column_articles ? '<div class="col-xs-12 col-xl-4 home-news__column">' . $second_column_articles. '</div>' : '';
    $third_column =  $third_column_articles ? '<div class="col-xs-12 col-xl-4 home-news__column">' . $third_column_articles. '</div>' : '';

    $return .= '
      <section class="home-news">
        <div class="container">
          <div class="row">' . $first_column . $second_column . $third_column  . '</div>
        </div>
      </section>';
  }
  /* Restore original Post Data */
  wp_reset_postdata();

  return $return;

}
add_shortcode('pm_latest_sticky_section', 'get_latest_sticky_section');

/**
* Theme: statistics section
 */
function get_statistics_section() {
  ob_start();
  get_template_part('template-parts/sections/statistics');
  return ob_get_clean();
}
add_shortcode('pm_statistics_section', 'get_statistics_section');

/**
 * Theme: subscribe section
 */

function get_subscribe_form(): string
{
  ob_start();
  require get_template_directory() . get_template_part('template-parts/sections/subscribe');
  return ob_get_clean();
}

add_shortcode('pm_subscribe_form_section', 'get_subscribe_form');

?>