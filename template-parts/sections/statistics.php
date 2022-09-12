<?php
$theme_statistics_section = get_field('theme_statistics_section', 'option');
$progress_title = $theme_statistics_section['progress_title'];
$progress_value = $theme_statistics_section['progress_value'];
$progress_text = $theme_statistics_section['progress_text'];
$progress_link = $theme_statistics_section['progress_link'];
$stat_title = $theme_statistics_section['stat_title'];
$stat_value = $theme_statistics_section['stat_value'];
$stat_value_subtext = $theme_statistics_section['stat_value_subtext'];
?>

<section class="home__statistic">
  <div class="container">
    <div class="home__statistic__inner">
      <div class="row">
        <div class="col-12 g-lg-0 col-lg-auto">
          <div class="home__statistic__progress">
            <h2 class="home__statistic__progress__title"><?php echo $progress_title; ?></h2>
            <div class="d-flex align-items-center">
              <h4 class="home__statistic__progress__percent"><?php echo $progress_value; ?></h4>
              <div class="home__statistic__progress__text">
                <?php echo $progress_text; ?>
              </div>
            </div>
            <?php
            if ($progress_link) :
              $link_url = $progress_link['url'];
              $link_title = $progress_link['title'];
              $link_target = $progress_link['target'] ? $progress_link['target'] : '_self';
              ?>
              <a class="home__statistic__progress__link" href="<?php echo esc_url($link_url); ?>"
                 target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-12 g-lg-0 col-lg">
          <div class="home__statistic__stat">
            <h3 class="home__statistic__stat__title"><?php echo $stat_title; ?></h3>
            <div class="home__statistic__stat__data">
              <span class="home__statistic__stat__value">
                <?php echo $stat_value; ?>
              </span>
              <?php echo $stat_value_subtext; ?>
            </div>
            <?php while ( have_rows( 'theme_statistics_section', 'option' ) ) : the_row(); ?>
              <div class="home__statistic__timeline">
                <div class="home__statistic__timeline__placeholder">
                  <span class="home__statistic__timeline__line"></span>
                </div>
                <ul class="home__statistic__timeline__list">
                  <?php while (have_rows('timeline')) : the_row(); ?>
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
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
