jQuery(function ($) {
    $('.module-connected__form').each(function () {
        var $form = $(this);
        var formLoadingClass = 'module-connected__form__loading';
        var formSuccessClass = 'module-connected__form__success';
        var formErrorClass = 'module-connected__form__error';
        $form.on('submit', function (e) {
            e.preventDefault();
            var email = $form.find('input[type=email]').val();
            var data = {
                'action': 'subscribe_user',
                'email': email,
                'security': pm_ajax.security
            };
            $form.addClass(formLoadingClass);

            $.post(pm_ajax.ajax_url, data, function (response) {
                if (response.success) {
                    $form.addClass(formSuccessClass);
                } else {
                    console.log(response);
                    $form.addClass(formErrorClass);
                }
                $form.removeClass(formLoadingClass);
            });
        });
    });
});