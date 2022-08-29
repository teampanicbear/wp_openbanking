<?php
/**
 * Template Name: Candidate
 *
 * @package recruitfirst
 */


get_header();

$jobs_list = [];
$paging = null;

$current_page = max(1, get_query_var('paged'));
$current_location = $_GET['location'];
$current_area = $_GET['area'];
$current_industry = $_GET['industry'];
$current_jobtype = $_GET['jobtype'];
$search_term = $_GET['searchTerm'];

$jobs_data = RF_API::get_jobs($current_page, 10, $current_location, $current_area, $current_industry, $current_jobtype, $search_term);

if (!empty($jobs_data)) {
    $paging = $jobs_data['paging'];
    $jobs_list = $jobs_data['body']->data;
}

?>
    <div class="site-main">
        <div class="candidate-content">
            <div class="container">
                <div class="candidate-content__wrapper ten-twelfths mobile--one-whole tablet--one-whole">
                    <div class="candidate-content__table">
                        <div class="candidate-table">
                            <div class="candidate-table__wrapper">
                                <?php if (wp_is_mobile()) : ?>

                                    <?php if (!empty($jobs_list)) :
                                        foreach ($jobs_list as $job) {
                                            set_query_var( 'job', $job );
                                            get_template_part( 'template-parts/job-table-card' );
                                        }
                                    endif; ?>

                                <?php else : ?>
                                <table id="jobTable" class="responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th class="four-twelfths"><?php esc_html_e('Job Title', 'rf'); ?></th>
                                        <th class="two-twelfths"><?php esc_html_e('Industry', 'rf'); ?></th>
                                        <th class="two-twelfths"><?php esc_html_e('Location', 'rf'); ?></th>
                                        <th class="two-twelfths"><?php esc_html_e('Area/District', 'rf'); ?></th>
                                        <th class="two-twelfths"><?php esc_html_e('Job type', 'rf'); ?></th>
                                        <th class="two-twelfths"><?php esc_html_e('Salary', 'rf'); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (!empty($jobs_list)) :
                                        foreach ($jobs_list as $job) {
                                            set_query_var( 'job', $job );
                                            get_template_part( 'template-parts/job-table-row' );
                                        }
                                    endif; ?>
                                    </tbody>
                                </table>
                                <?php endif; ?>
                                <div class="candidate-loading">
                                    <span class="candidate-loading__text"><?php esc_html_e('Loading', 'rf'); ?></span>
                                </div>
                            </div>
                            <?php rf_navigation($paging->totalPages); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
