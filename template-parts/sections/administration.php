<?php
$theme_administration_section = get_field('theme_administration_section', 'option');
$image = $theme_administration_section['image'];
$top_subtitle = $theme_administration_section['top_subtitle'];
$title = $theme_administration_section['title'];
$message = $theme_administration_section['message'];
?>

<!-- MODULE Administration START -->
<section class="module-administration rtl-ignore">
  <div class="module-administration__wrap site-bottom__item-inner">
    <div class="module-administration__row">
      <div class="module-administration__img__column">
        <div class="module-administration__img">
          <?php
          if( !empty( $image ) ): ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
          <?php endif; ?>
        </div>
      </div>
      <div class="module-administration__content__column">
        <div class="module-administration__content__wrap">
          <div class="module-administration__content">
            <h5 class="text-primary">
              <?php echo $top_subtitle; ?>
            </h5>
            <h2 class="module-administration__title">
              <?php echo $title; ?>
            </h2>
            <p class="module-administration__text">
              <?php echo $message; ?>
            </p>
            <?php while ( have_rows( 'theme_administration_section', 'option' ) ) : the_row(); ?>
              <ul class="module-administration__list link-styled-list">
                <?php while (have_rows('link_list')) : the_row(); ?>
                  <?php
                  $link = get_sub_field('list_item');
                  if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <li class="module-administration__list__item">
                      <a href="<?php echo $link_url ?>"
                         target="<?php echo esc_attr($link_target); ?>">
                        <?php echo esc_html($link_title); ?>
                      </a>
                    </li>
                  <?php endif; ?>
                <?php endwhile; ?>
              </ul>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- MODULE Administration END -->