<?php

add_action('wp_ajax_newsletter', 'save_email_newsletter');
add_action('wp_ajax_nopriv_newsletter', 'save_email_newsletter');

function save_email_newsletter()
{
    $success = false;
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);

    if ($email) {
        //do save to database
        $success = true;
    }

    wp_send_json([
        'success' => $success
    ]);
}


?>

<style>
    .newsletter-block .newsletter-form,
    .newsletter-block.success .newsletter-text {
        display: block;
    }
    .newsletter-block .newsletter-text,
    .newsletter-block.success .newsletter-form {
        display: none;
    }
</style>

<div class="newsletter-block">
    <form class="newsletter-form">
        <input type="email" id="newsletter_email" placeholder="<?php echo __( 'Enter email for newsletter', 'textdomain' ); ?>">
        <button><?php echo __( 'Sing up', 'textdomain' ); ?></button>
    </form>
    <div class="newsletter-text">
        <?php echo __( 'Thank you for send you email!', 'textdomain' ); ?>
    </div>
</div>



<script>
    $('.newsletter_form').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url : '/wp-admin/admin-ajax.php',
            type: "POST",
            data: {'action': 'newsletter', email: $('#newsletter_email').val()},
            success: function (data) {
                if (data.success !== undefined && data.success) {
                    $('.newsletter-block').addClass('success');
                } else {
                    // You can add validation form and display errors from response
                }
            },
            error: function (jqXHR, status, errorThrow) {

            }
        });
    })
</script>
