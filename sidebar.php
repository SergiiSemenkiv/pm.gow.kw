<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prime_Minister
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="col-12 col-xl-3 site-sidebar__column">
  <div class="site-sidebar">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
  </div>
</div>
