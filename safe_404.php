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
$settings_404_page = get_field('theme_404_page', 'option');
?>
  <section class="error-page">
    <div class="container">
      <div class="row">
        <div class="col">
          <?php
          $image = $settings_404_page['image'];
          if ($image) {
            echo wp_get_attachment_image($image, 'full', false, array('class' => 'error-page__image'));
          }
          ?>
          <div class="error-page__inner">
            <div class="error-page__subtitle">
              <?php echo $settings_404_page['subtitle'] ?>
            </div>
            <div class="error-page__title">
              <?php echo $settings_404_page['title'] ?>
            </div>
            <div class="error-page__message">
              <?php echo $settings_404_page['message'] ?>
            </div>
            <a href="<?php echo get_home_url() ?>" class="button error-page__button">
              <?php echo $settings_404_page['button_text'] ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
