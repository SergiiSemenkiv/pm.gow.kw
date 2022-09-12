<?php

function subscribe_user_scripts()
{
  wp_register_script('prime-minister-subscribe-user', get_template_directory_uri() . '/js/subscribe.js', array('jquery'), _S_VERSION, true);
  $script_array = array(
    'ajax_url' => admin_url('admin-ajax.php'),
    'security' => wp_create_nonce('subscribe_user'),
  );
  wp_localize_script('prime-minister-subscribe-user', 'pm_ajax', $script_array);
  wp_enqueue_script('prime-minister-subscribe-user');
}

add_action('wp_enqueue_scripts', 'subscribe_user_scripts');

function subscribe_user()
{
  global $wpdb;
  check_ajax_referer('subscribe_user', 'security');
  $email = esc_sql(filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL));
  $success = false;
  $response_message = 'An unexpected error occurred';
  $table_name = $wpdb->prefix . 'email_subscribers';

  $is_email_exist_in_db = $wpdb->get_var("SELECT ID FROM $table_name WHERE email = '$email'");

  if ($is_email_exist_in_db == NULL) {
    $db_insert_check = $wpdb->insert(
      $table_name,
      array(
        'email' => $email,
        'locale' => apply_filters( 'wpml_current_language', null ),
      )
    );
    if($db_insert_check) {
      $success = true;
      $response_message = 'Email has been saved successfully';
    }
  } else {
    $response_message = 'Duplicate email is not allowed';
  }

  wp_send_json([
    'success' => $success,
    'message' => $response_message,
    'locale' => apply_filters( 'wpml_current_language', null ),
  ]);

  wp_die();
}

add_action('wp_ajax_subscribe_user', 'subscribe_user');
add_action('wp_ajax_nopriv_subscribe_user', 'subscribe_user');
