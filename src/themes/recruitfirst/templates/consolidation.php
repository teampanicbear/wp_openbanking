<?php
/**
 * Template Name: Consolidation
 *
 * @package recruitfirst
 */


get_header();

//$job_detail = RF_API::get_job_details(15037);
//if ($job_detail) {
//    $job_detail = $job_detail->data;
//}

$country_code = RF_Language::get_country_code();

$jobs_list = [];
$paging = null;
$first_job = null;

$current_page = max(1, get_query_var('paged'));
$sub_id = $_GET['id'];
$sub_id = urlencode($sub_id);

$jobs_data = RF_API::get_subscription_jobs($sub_id, 5, $current_page);

if (!empty($jobs_data)) {
    $paging = $jobs_data['paging'];
    $jobs_list = $jobs_data['body']->data;
    $first_job = $jobs_list[0];
}

$modify_url = get_page_url('templates/modify');
$unsubscribe_url = get_page_url('templates/unsubscribe');
?>
<?php if ($sub_id && $jobs_data) : ?>
    <div class="site-main">
        <div class="consolidation-header">
            <div class="container">
                <h1><?php esc_html_e('New Jobs!', 'rf'); ?></h1>
            </div>
        </div>
        <div class="container">
            <div class="consolidation-inner">
                <div class="grid grid--nospace grid--stackable">
                    <div class="grid__column five-twelfths tablet--one-whole mobile--one-whole">
                        <div class="consolidation-sidebar">
                            <div class="consolidation-sidebar__header">
                                <h3 class="h5 text--bold">
                                    <?php echo sprintf(__("%1s new jobs that you may interested in!", 'rf'), '<span class="text--primary">' . $paging->totalCount . '</span> '); ?>
                                </h3>
                            </div>
                            <div class="jobs-list">
                                <?php if (!empty($jobs_list)) :
                                    foreach ($jobs_list as $job) {
                                        set_query_var('job', $job);
                                        get_template_part('template-parts/job-list-card');
                                    }
                                endif; ?>
                                <?php if ($paging->totalPages > 1) : ?>
                                    <div class="paging">
                                        <span class="showing">
                                            <?php echo sprintf(__("Page %1s of %2s", 'rf'), $current_page, $paging->totalPages); ?>
                                        </span>
                                        <?php rf_navigation($paging->totalPages); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="consolidation-sidebar__footer">
                                <div class="consolidation-banner">
                                    <span class="consolidation-banner__icon">
                                        <img src="<?php echo THEME_URL; ?>/images/consolidation/glossy.png"
                                             alt="Nothing suitable?" width="60">
                                    </span>
                                    <h5><?php esc_html_e('Nothing suitable?', 'rf'); ?></h5>
                                    <p><?php esc_html_e('Modify the filters in your job alert to expand your search options!', 'rf'); ?></p>
                                    <a href="<?php echo $modify_url; ?>?id=<?php echo $sub_id; ?>"
                                       class="btn btn--primary"><?php esc_html_e('Modify job alert', 'rf'); ?></a>
                                </div>
                            </div>
                            <div class="mgt--30 text--center">
                                <a href="<?php echo $unsubscribe_url; ?>?id=<?php echo $sub_id; ?>"
                                   class="btn btn-unsubscribe"><?php esc_html_e('Unsubscribe notification', 'rf'); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="grid__column seven-twelfths mobile--hidden tablet--hidden">
                        <div class="job-detail">
                            <?php if ($first_job) :
                                set_query_var('job', $first_job);
                                get_template_part('template-parts/job-content');
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (!wp_is_mobile()) : ?>
    <script>
        function copyToClipboard(text) {
            var input = document.body.appendChild(document.createElement("input"));
            input.value = text;
            input.select();
            document.execCommand('copy');
            input.parentNode.removeChild(input);
        }
        document.querySelector('.copy-link').addEventListener('click', function (e) {
        	e.preventDefault()
            const link = this.dataset.link
            copyToClipboard(link)
        });
        (function ($) {
            var $job_content = $('.job-detail')

            $('.job-card-list').click(function (e) {
                e.preventDefault()
                var job_id = $(this).data('job-id')
                if (job_id) {
                    $.ajax(AJAX_URL, {
                        method: 'POST',
                        data: {
                            action: 'get_subscription_job',
                            job_id: job_id
                        }
                    }).done(function (response) {
                        if (response) {
                            $job_content.html(response)
                            window.scroll({
                                top: 0,
                                left: 0,
                                behavior: 'smooth'
                            })
                        }
                    })
                }
            })

        })(jQuery)
    </script>
    <?php endif; ?>
<?php else : ?>
    <section class="error-404 not-found">
        <div class="error-404__wrapper">
            <h1>404</h1>
            <h2><?php esc_html_e('No found subscription ID', 'rf'); ?></h2>
            <p><?php esc_html_e('Sorry, but we are not able to find the job you are looking for.', 'rf'); ?></p>
        </div>
    </section><!-- .error-404 -->
<?php endif;
get_footer('v2');
