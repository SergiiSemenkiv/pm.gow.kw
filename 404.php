<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Prime_Minister
 */

get_header();
$post_id = 84;
?>
  <section class="error-page">
    <div class="container">
      <div class="row">
        <div class="col">
          <img class="error-page__image" src="<?php bloginfo('template_url'); ?>/assets/img/errors/page_not_found.svg"
               alt="">
          <div class="error-page__inner">
            <div class="error-page__subtitle">
              <?php the_field('404_error_subtitle', $post_id); ?>
            </div>
            <div class="error-page__title">
              <?php the_field('404_error_title', $post_id); ?>
            </div>
            <div class="error-page__message">
              <?php the_field('404_error_message', $post_id); ?>
            </div>
            <a href="<?php echo get_home_url() ?>" class="button error-page__button">
              <?php the_field('404_error_button', $post_id); ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
