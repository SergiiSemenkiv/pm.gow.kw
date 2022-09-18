<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prime_Minister
 */

?>

<article id="post-<?php the_ID(); ?>" class="post__list__item">
  <h2 class="post__list__title">
    <?php $post_title = has_excerpt() ? get_the_excerpt() : get_the_title() ?>
    <a href="<?php the_permalink() ?>" rel="bookmark" class="post__list__link">
      <?php the_excerpt() ?>
    </a>
  </h2>
  <?php prime_minister_post_shared_meta('post__list__meta'); ?>
</article><!-- #post-<?php the_ID(); ?> -->
