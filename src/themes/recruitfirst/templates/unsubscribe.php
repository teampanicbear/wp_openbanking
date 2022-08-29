<?php
/**
 * Template Name: Unsubscribe notification
 *
 * @package recruitfirst
 */


get_header();
$sub_id = $_GET['id'];
$sub_id = urlencode($sub_id);
?>
    <div class="site-main">
        <div class="consolidation-header">
            <div class="container">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
        <div class="container">
            <div class="consolidation-inner unsubscribe-form">
                <div class="modify-form__header text--center">
                    <h5><?php esc_html_e('Farewell', 'rf'); ?></h5>
                    <p><?php esc_html_e("We hope you've found the job you were looking for. Should you need job alerts in the future, don't forget to subscribe with us!", 'rf'); ?></p>
                    <button
                        class="btn btn-submit
                    >
                        <span class="btn-text"><?php esc_html_e('Unsubscribe'); ?></span>
                        <span class="btn-spinner">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-spinner" viewBox="0 0 20 20"><path d="M7.229 1.173a9.25 9.25 0 1 0 11.655 11.412 1.25 1.25 0 1 0-2.4-.698 6.75 6.75 0 1 1-8.506-8.329 1.25 1.25 0 1 0-.75-2.385z" fill="currentColor"/></svg>
                        </span>
                    </button>
                    <div class="form__message mgt--10"></div>
                </div>

            </div>
        </div>
    </div>
    <script>
    var message = '<?php esc_html_e('Unsubscribe successful', 'rf'); ?>';
      (function ($) {
        var btnSubmit = $('.btn-submit')
        btnSubmit.click(function (e) {
        	e.preventDefault()

            btnSubmit.addClass('loading')
            $.ajax({
                url: AJAX_URL,
                type: 'post',
                data: {
                	action: 'unsubscribe',
                    sub_id: '<?php echo $sub_id; ?>',
                }
            }).done(function (response) {
                console.log(response)
                var messageEl = $('.form__message')
                if (response && response.success) {
                    messageEl.removeClass('form__message--error-inline').html('<p class="pt--20">' + message + '</p>')
                  setTimeout(function () {
                  	window.location.href = window.home_url
                  }, 1500)
                } else {
                    messageEl.addClass('form__message--error-inline').html('<p>' + response.data + '</p>')
                }
            })
                .always(function () {
                    btnSubmit.removeClass('loading')
                })
        })

      })(jQuery)
    </script>
<?php
get_footer('v2');
