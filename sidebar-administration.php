<?php
// query
$the_query = new WP_Query(array(
  'post_type' => 'administration',
  'posts_per_page' => -1,
  'meta_key' => 'list_order',
  'orderby' => 'meta_value',
  'order' => 'ASC'
));

?>
<?php if ($the_query->have_posts()): ?>
<div class="col-12 col-xl-3 site-sidebar__column">
  <div class="site-sidebar">
    <ul class="site-sidebar__list">
      <li class="site-sidebar__item">
        <?php prime_minister_post_archive_link('sidebar__link'); ?>
        <?php prime_minister_post_category_link('sidebar__link'); ?>
      </li>
      <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <li class="site-sidebar__item">
          <a href="<?php the_permalink() ?>" class="sidebar__link">
            <?php echo get_field('name') . ' - ' . get_field('position'); ?>
          </a>
        </li>
      <?php endwhile; ?>
    </ul>
  </div>
</div>
<?php endif; ?>
<?php wp_reset_query(); ?>