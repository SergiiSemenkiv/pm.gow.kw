<?php
function subscribe_form(): string
{
  ob_start();
  require get_template_directory() . '/template-parts/footer_cta.php';
  return ob_get_clean();
}

add_shortcode('subscribe_form', 'subscribe_form');

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

function subscribe_user_mailchimp($email)
{
  define('API_KEY', '205dbd228f1684ff7d7521ed69a51949-us18');
  define('AUDIENCE_ID', 'cd9025a70c');

  $data_center = substr(API_KEY, strpos(API_KEY, '-') + 1);
  $url = 'https://' . $data_center . '.api.mailchimp.com/3.0/lists/' . AUDIENCE_ID . '/members';
  $auth = base64_encode('user:' . API_KEY);
  $arr_data = json_encode(array(
    'email_address' => $email,
    'status' => 'subscribed', //pass 'subscribed' or 'pending'
  ));

  return wp_remote_post($url, array(
    'method' => 'POST',
    'headers' => array(
      'Content-Type' => 'application/json',
      'Authorization' => "Basic $auth"
    ),
    'body' => $arr_data,
  ));
}

function subscribe_user()
{
  global $wpdb;
  check_ajax_referer('subscribe_user', 'security');
  $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
  $success = false;
  $response_message = '';
  $table_name = $wpdb->prefix . 'subscribers';

  $isEmailExistDb = $wpdb->get_var("SELECT ID FROM $table_name WHERE email = '$email'");

  if ($isEmailExistDb == NULL) {
    $wpdb->insert(
      $table_name,
      array(
        'email' => $email,
      )
    );

    $response = subscribe_user_mailchimp($email);

    if (is_wp_error($response)) {
      $response_message = $response->get_error_message();
    } else {
      $status_code = wp_remote_retrieve_response_code($response);
      switch ($status_code) {
        case '200':
          $success = true;
          break;
        case '400':
          $api_response = json_decode(wp_remote_retrieve_body($response), true);
          $response_message = $api_response['title'];
          break;
        default:
          $response_message = 'Something went wrong. Please try again.';
          break;
      }
    }
  } else {
    $response_message = 'Duplicate email is not allowed';
  }

  wp_send_json([
    'success' => $success,
    'message' => $response_message,
  ]);

  wp_die();
}

add_action('wp_ajax_subscribe_user', 'subscribe_user');
add_action('wp_ajax_nopriv_subscribe_user', 'subscribe_user');





