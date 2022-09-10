<!-- MODULE Administration START -->
<section class="module-administration rtl-ignore">
  <div class="module-administration__wrap site-bottom__item-inner">
    <div class="module-administration__row">
      <div class="module-administration__img__column">
        <div class="module-administration__img">
          <?php
          $image = get_field('administration_section_image', 'option');
          if( !empty( $image ) ): ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
          <?php endif; ?>
        </div>
      </div>
      <div class="module-administration__content__column">
        <div class="module-administration__content__wrap">
          <div class="module-administration__content">
            <h5 class="text-primary">
              <?php the_field('administration_section_top_subtitle', 'option'); ?>
            </h5>
            <h2 class="module-administration__title">
              <?php the_field('administration_section_title', 'option'); ?>
            </h2>
            <p class="module-administration__text">
              <?php the_field('administration_section_message', 'option'); ?>
            </p>
            <?php if (have_rows('administration_section_link_list', 'option')): ?>
              <ul class="module-administration__list link-styled-list">
                <?php while (have_rows('administration_section_link_list', 'option')) : the_row(); ?>
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
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- MODULE Administration END -->