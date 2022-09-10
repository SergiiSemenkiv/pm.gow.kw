<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prime_Minister
 */

?>
<article id="post-<?php the_ID(); ?>" class="post__list post__list--primary">
  <h2 class="post__list__title">
    <?php
    $post_title = has_excerpt() ? get_the_excerpt() : get_the_title();
    ?>
    <a href="<?php the_permalink() ?>" title="<?php echo $post_title; ?>" class="post__list__link">
      <?php echo $post_title; ?>
    </a>
  </h2>
  <?php prime_minister_post_shared_meta('post__list__meta'); ?>
</article>