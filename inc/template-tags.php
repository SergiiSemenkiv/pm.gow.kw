<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Prime_Minister
 */

if (!function_exists('prime_minister_posted_on')) :
  /**
   * Prints HTML with meta information for the current post-date/time.
   */
  function prime_minister_posted_on()
  {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if (get_the_time('U') !== get_the_modified_time('U')) {
      $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf(
      $time_string,
      esc_attr(get_the_date(DATE_W3C)),
      esc_html(get_the_date()),
      esc_attr(get_the_modified_date(DATE_W3C)),
      esc_html(get_the_modified_date())
    );

    $posted_on = sprintf(
    /* translators: %s: post date. */
      esc_html_x('Posted on %s', 'post date', 'prime-minister'),
      '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
    );

    echo '<span class="shared-meta__date">' . $time_string . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

  }
endif;

if (!function_exists('prime_minister_posted_by')) :
  /**
   * Prints HTML with meta information for the current author.
   */
  function prime_minister_posted_by()
  {
    $byline = sprintf(
    /* translators: %s: post author. */
      esc_html_x('by %s', 'post author', 'prime-minister'),
      '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
    );

    echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

  }
endif;

if (!function_exists('prime_minister_entry_footer')) :
  /**
   * Prints HTML with meta information for the categories, tags and comments.
   */
  function prime_minister_entry_footer()
  {
    // Hide category and tag text for pages.
    if ('post' === get_post_type()) {
      /* translators: used between list items, there is a space after the comma */
      $categories_list = get_the_category_list(esc_html__(', ', 'prime-minister'));
      if ($categories_list) {
        /* translators: 1: list of categories. */
        printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'prime-minister') . '</span>', $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
      }

      /* translators: used between list items, there is a space after the comma */
      $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'prime-minister'));
      if ($tags_list) {
        /* translators: 1: list of tags. */
        printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'prime-minister') . '</span>', $tags_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
      }
    }

    if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
      echo '<span class="comments-link">';
      comments_popup_link(
        sprintf(
          wp_kses(
          /* translators: %s: post title */
            __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'prime-minister'),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          wp_kses_post(get_the_title())
        )
      );
      echo '</span>';
    }

    edit_post_link(
      sprintf(
        wp_kses(
        /* translators: %s: Name of current post. Only visible to screen readers */
          __('Edit <span class="screen-reader-text">%s</span>', 'prime-minister'),
          array(
            'span' => array(
              'class' => array(),
            ),
          )
        ),
        wp_kses_post(get_the_title())
      ),
      '<span class="edit-link">',
      '</span>'
    );
  }
endif;

if (!function_exists('prime_minister_post_thumbnail')) :
  /**
   * Displays an optional post thumbnail.
   *
   * Wraps the post thumbnail in an anchor element on index views, or a div
   * element when on single views.
   */
  function prime_minister_post_thumbnail()
  {
    if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
      return;
    }

    if (is_singular()) :
      ?>

      <div class="post-thumbnail">
        <?php the_post_thumbnail(); ?>
      </div><!-- .post-thumbnail -->

    <?php else : ?>

      <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
        <?php
        the_post_thumbnail(
          'post-thumbnail',
          array(
            'alt' => the_title_attribute(
              array(
                'echo' => false,
              )
            ),
          )
        );
        ?>
      </a>

    <?php
    endif; // End is_singular().
  }
endif;

if (!function_exists('wp_body_open')) :
  /**
   * Shim for sites older than 5.2.
   *
   * @link https://core.trac.wordpress.org/ticket/12563
   */
  function wp_body_open()
  {
    do_action('wp_body_open');
  }
endif;

if (!function_exists('prime_minister_post_meta')) :
  function get_prime_minister_post_shared_meta_template($classes = '') {
    if ('post' === get_post_type()) {
      $return = '<div class="shared-meta ' . $classes . '">';
      $return .= '<time class="shared-meta__date">'. get_the_date() .'</time>';
      $categories = get_the_category();
      if (!empty($categories)) {
        $return .= ' <i class="shared-meta__separator">•</i>';
        $return .= '<a class="shared-meta__category" href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
      }
      $return .= '</div>';

      return $return;
    }
  }
  /**
   * Prints HTML with meta information for the current post-date/time.
   */
  function prime_minister_post_shared_meta($classes = '')
  {
    echo get_prime_minister_post_shared_meta_template($classes);
  }
endif;

if (!function_exists('prime_minister_post_category_link')) :
  /**
   * Prints HTML with category information for the current post-date/time.
   */
  function prime_minister_post_category_link($classes = '')
  {
    $categories = get_the_category();
    if (!empty($categories)) {
      $post_type = get_post_type();
      $category_link = 'post' === $post_type ? esc_url(get_category_link($categories[0]->term_id)) : get_post_type_archive_link($post_type);
      echo '<a class="' . $classes . '" 
                 href="' . $category_link . '">'
        . esc_html($categories[0]->name) . '</a>';
    }
  }
endif;

if (!function_exists('prime_minister_page_for_post_link')) :
/**
 * Prints HTML with category information for the current post-date/time.
 */
  function prime_minister_page_for_post_link($class = '')
  {
    $page_for_posts = get_option('page_for_posts');
    echo '<a href="' . get_permalink($page_for_posts) . '" class="' . $class . '">';
    echo get_the_title($page_for_posts);
    echo '</a>';
  }
endif;