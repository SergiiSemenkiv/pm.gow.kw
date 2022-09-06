<!-- MODULE Administration START -->
<section class="module-administration rtl-ignore">
  <div class="module-administration__wrap site-bottom__item-inner">
    <div class="module-administration__row">
      <div class="module-administration__img__column">
        <div class="module-administration__img">
          <img src="<?php block_field('image') ?>" alt="<?php block_field( 'title' ); ?>">
        </div>
      </div>
      <div class="module-administration__content__column">
        <div class="module-administration__content__wrap">
          <div class="module-administration__content">
            <h5 class="text-primary">
              <?php block_field( 'more-title' ); ?>
            </h5>
            <h2 class="module-administration__title">
              <?php block_field( 'title' ); ?>
            </h2>
            <p class="module-administration__text">
              <?php block_field( 'message' ); ?>
              </p>
            <ul class="module-administration__list link-styled-list">
              <li class="module-administration__list__item">
                <a href="<?php block_field( 'link-1-url' ); ?>"><?php block_field( 'link-1-text' ); ?></a>
              </li>
              <li class="module-administration__list__item">
                <a href="<?php block_field( 'link-2-url' ); ?>"><?php block_field( 'link-2-text' ); ?></a>
              </li>
              <li class="module-administration__list__item">
                <a href="<?php block_field( 'link-3-url' ); ?>"><?php block_field( 'link-3-text' ); ?></a>
              </li>

            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- MODULE Administration END -->

