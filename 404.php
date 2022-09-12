<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Prime_Minister
 */

get_header();
?>

<?php
$theme_404_page = get_field('theme_404_page', 'option');
$image = $theme_404_page['image'];
$subtitle = $theme_404_page['subtitle'];
$title = $theme_404_page['title'];
$message = $theme_404_page['message'];
$button = $theme_404_page['button'];
?>
  <section class="error-page">
    <div class="container">
      <div class="row">
        <div class="col">
          <?php
          if ($image) {
            echo wp_get_attachment_image($image, 'full', false, array('class' => 'error-page__image'));
          }
          ?>
          <div class="error-page__inner">
            <div class="error-page__subtitle">
              <?php echo $subtitle; ?>
            </div>
            <div class="error-page__title">
              <?php echo $title; ?>
            </div>
            <div class="error-page__message">
              <?php echo $message; ?>
            </div>
            <a href="<?php echo get_home_url() ?>" class="button error-page__button">
              <?php echo $button; ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
