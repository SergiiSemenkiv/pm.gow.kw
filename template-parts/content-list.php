<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prime_Minister
 */

?>
<article id="post-<?php the_ID(); ?>" class="news-item">
  <h2 class="news-item__title">
    <?php
    $post_title = has_excerpt() ? get_the_excerpt() : get_the_title();
    ?>
    <a href="<?php the_permalink() ?>" title="<?php echo $post_title; ?>" class="news-item__link">
      <?php echo $post_title; ?>
    </a>
  </h2>
  <?php prime_minister_post_shared_meta('news-item__meta'); ?>
</article>