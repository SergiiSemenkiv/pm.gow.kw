<section class="home__statistic">
  <div class="container">
    <div class="home__statistic__inner">
      <div class="row">
        <div class="col-12 g-md-0 col-md-auto">
          <div class="home__statistic__progress">
            <h2 class="home__statistic__progress__title"><?php the_field('statistic_section_progress_title', 'option'); ?></h2>
            <div class="d-flex align-items-center">
              <h4 class="home__statistic__progress__percent"><?php the_field('statistic_section_progress_value', "option"); ?></h4>
              <div class="home__statistic__progress__text">
                <?php the_field('statistic_section_progress_text', 'option'); ?>
              </div>
            </div>
            <?php
            $link = get_field('section_statistic_progress_link', 'option');
            if ($link) :
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
              <a class="home__statistic__progress__link" href="<?php echo esc_url($link_url); ?>"
                 target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-12 g-md-0 col-md">
          <div class="home__statistic__stat">
            <h3 class="home__statistic__stat__title"><?php the_field('statistic_section_stat_title', 'option'); ?></h3>
            <div class="home__statistic__stat__data">
              <span class="home__statistic__stat__value"><?php the_field('statistic_section_stat_value', 'option'); ?></span>
              <?php the_field('statistic_section_stats_value_subtext', 'option'); ?>
            </div>
            <?php if (have_rows('statistic_section_timeline', 'option')): ?>
            <div class="home__statistic__timeline">
              <div class="home__statistic__timeline__placeholder">
                <span class="home__statistic__timeline__line"></span>
              </div>
              <ul class="home__statistic__timeline__list">
                <?php while (have_rows('statistic_section_timeline', 'option')) : the_row(); ?>
                  <li class="home__statistic__timeline__item">
                    <div class="home__statistic__timeline__date">
                      <?php the_sub_field('date'); ?>
                    </div>
                    <div class="home__statistic__timeline__shots">
                      <?php the_sub_field('value'); ?>
                    </div>
                  </li>
                <?php endwhile; ?>
              </ul>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
