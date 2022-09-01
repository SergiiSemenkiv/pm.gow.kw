<?php get_header(); ?>
<?php if (have_posts()) : ?>
  <header class="page-heading">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-8 col">
          <?php prime_minister_page_for_post_link('page-heading__category-link') ?>
          <h1 class="page-title"><?php echo get_the_archive_title(); ?></h1>
        </div>
      </div>
    </div>
  </header>
  <main class="page-main">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6 mx-auto">
          <div class="news__list">
            <?php
            while (have_posts()) :
              the_post();
              get_template_part('template-parts/content', 'list');
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
//  ToDO add empty content page
endif; ?>
<?php get_footer(); ?>