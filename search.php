<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Prime_Minister
 */

get_header();
?>
<?php
$theme_search_page = get_field('theme_search_page', 'option');
$title = $theme_search_page['title'];
$subtitle = $theme_search_page['subtitle'];
$nothing_found = $theme_search_page['nothing_found'];
?>
<?php if (have_posts()) : ?>
  <header class="page-heading">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7 col">
          <h1 class="page-title">
            <?php echo $title; ?>
          </h1>
          <div class="page-title__deck">
            <?php
              $search_query = esc_html__(get_search_query());
              echo $subtitle . ': <i> "'. $search_query .'" </i>';
            ?>
          </div>
        </div>
      </div>
    </div>
  </header>
  <main class="page-main">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6 mx-auto">
          <div class="post__list">
            <?php
            while (have_posts()) :
              the_post();
              get_template_part('template-parts/content', 'search');
            endwhile;
            ?>
          </div>
          <?php prime_minister_posts_nav() ?>
        </div>
      </div>
    </div>
  </main>
<?php
else :
?>

  <header class="page-heading">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7 col">
          <h1 class="page-title">
            <?php echo $nothing_found; ?>
          </h1>
        </div>
      </div>
    </div>
  </header>
<?php
endif; ?>

<?php get_footer('simple'); ?>