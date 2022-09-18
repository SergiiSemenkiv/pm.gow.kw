<?php get_header(); ?>
<?php
$query_args = array(
  'post_type' => 'administration',
  'posts_per_page' => -1,
  'meta_key' => 'list_order',
  'orderby' => 'meta_value',
  'order' => 'ASC'
);
$the_query = new WP_Query($query_args);
$list_groups = array();
if ($the_query->posts) {
  foreach ($the_query->posts as $key => $member) {
    $acf_group = get_field('list_group', $member->ID);
    if (!isset($list_groups[$acf_group])) {
      $list_groups[$acf_group] = array();
    }

    $list_groups[$acf_group][] = $member;
  }
}
wp_reset_query();

$theme_administration_page = get_field('theme_administration_page', 'option');
$message = $theme_administration_page['message'];
$hero_title = $theme_administration_page['hero_title'] ?: '';
$hero_image = $theme_administration_page['hero_image'];
?>
  <!-- HERO START-->
  <section class="hero hero-from-xl hero-administration">
    <div class="container-fluid hero__container">
      <div class="hero__wrapper">
        <div class="hero__content home__topper hero__ratio-box">
          <div class="hero__ratio-box__inside">
            <div class="hero__content__container">
              <div class="row justify-content-center">
                <div class="col-12 col-xl-6">
                  <h1 class="page-title hero-administration__title">
                    <?php echo $hero_title; ?>
                  </h1>
                  <p class="hero-administration__message">
                    <?php echo $message ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div class="hero__image__wrapper">
            <?php
            if ($hero_image) {
              echo wp_get_attachment_image($hero_image, 'full', false, array('class' => 'hero__image'));
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- HERO END-->
<?php if (!empty($list_groups)): ?>
  <main class="page-main">
    <section class="administration__grid">
      <div class="container">
        <?php foreach ($list_groups as $list_key=>$list_group) {
          ?>
            <ul class="row justify-content-center administration__grid__list <?php echo $list_key ?>">
              <?php foreach ($list_group as $member)
              {
                $memberID = $member->ID;
                ?>
                <li class="col-12 col-md-6 col-lg-4 col-xl-3">
                  <a  href="<?php the_permalink($memberID) ;?>"
                      class="administration__grid__item">
                    <?php
                    $image = get_field('member_photo', $memberID);
                    $size = 'thumbnail';
                    if ($image) {
                      echo wp_get_attachment_image($image, $size, false, array('class' => 'administration__grid__img'));
                    }
                    ?>
                    <div class="administration__grid__name">
                      <?php the_field('name', $memberID); ?>
                    </div>
                    <div class="administration__grid__position">
                      <?php the_field('position', $memberID); ?>
                    </div>
                  </a>
                </li>
                <?php
              }?>
            </ul>
          <?php
        } ?>
      </div>
    </section>
  </main>
<?php endif; ?>

<?php get_footer('simple'); ?>