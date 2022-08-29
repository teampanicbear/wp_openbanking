<?php
/**
 * Template Name: Join Detail
 *
 * @package recruitfirst
 */

get_header();

$jobs_list_url = get_page_url('templates/candidate');

$current_job_id = $_GET['id'];

$job_data = '';
$related_jobs = [];

if ($current_job_id) {
    $res = RF_API::get_job_details($current_job_id);

    if ($res) {
        $job_data = $res->data;
    }

    $related_jobs = RF_API::get_related_jobs($current_job_id)->data;
}

$industries = [];
if (!empty($job_data->Industries)) {
    foreach ($job_data->Industries as $industry) {
        $industries[] = $industry->Name;
    }
}

$payoutType = array(
    "M" => esc_html__('Month', 'rf'),
    "D" => esc_html__('Day', 'rf'),
    "H" => esc_html__('Hour', 'rf')
);

$job_url = home_url('/job-details/?id=' . $current_job_id);

$country_code = RF_Language::get_country_code();
$location = get_location($job_data);
?>
<?php if ($job_data) : ?>
    <div class="site-main">
        <div class="job-detail-header">
            <div class="container">
                <span class="job-detail-header__tag">
                    <?php
                        echo $job_data->Sectors[0]->Name;
                    ?>
                </span>
                <h1 class="h2 job-detail-header__heading">
                    <?php echo mb_strtolower($job_data->JobTitle); ?>
                </h1>
                <a target="_blank" href="<?php esc_attr_e($job_data->ApplyLink); ?>" class="btn">
                    <?php esc_html_e('Apply now', 'rf'); ?>
                </a>

                <div class="job-detail-header__socials">
                    <?php if ($country_code != 'CN') : ?>
                    <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo $job_url; ?>"
                       class="job-detail-social">
                        <svg width="16" height="16" fill="none" xmlns="http://www.w3.org/2000/svg"><path
                                    d="M6.023 16L6 9H3V6h3V4c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V6H13l-1 3H9.28v7H6.023z"
                                    fill="currentColor"/></svg>
                    </a>
                    <?php endif; ?>
                    <a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $job_url; ?>"
                       class="job-detail-social">
                        <svg width="16" height="16" fill="none" xmlns="http://www.w3.org/2000/svg"><path
                                    d="M12.667 0H3.333A3.334 3.334 0 000 3.333v9.334A3.334 3.334 0 003.333 16h9.334A3.333 3.333 0 0016 12.667V3.333A3.333 3.333 0 0012.667 0zM5.333 12.667h-2V5.333h2v7.334zm-1-8.179a1.172 1.172 0 01-1.166-1.176c0-.65.522-1.176 1.166-1.176.644 0 1.167.527 1.167 1.176 0 .65-.522 1.176-1.167 1.176zm9 8.179h-2V8.93c0-2.246-2.666-2.076-2.666 0v3.736h-2V5.333h2V6.51c.93-1.724 4.666-1.851 4.666 1.65v4.507z"
                                    fill="currentColor"/></svg>
                    </a>
                    <?php if ($country_code != 'CN') : ?>
                    <a href="https://wa.me/?text=<?php echo rawurlencode($job_url); ?>" class="job-detail-social" target="_blank">
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none">
                            <path d="M13.7551 2.3812C12.3075.9206 10.3828.1162 8.3355.1162c-2.0472 0-3.972.8044-5.4196 2.265C1.4682 3.8418.671 5.7837.671 7.8492c0 1.3085.3283 2.5943.9514 3.7332L0 16.2594l4.6354-1.6369a7.608 7.608 0 003.7001.9599c2.0472 0 3.972-.8044 5.4196-2.265C15.2028 11.8568 16 9.9149 16 7.8493s-.7972-4.0075-2.2449-5.4681zm-1.6306 8.3408l-.8848.8928c-.733.7395-2.8129-.1598-4.6454-2.0087-1.8325-1.849-2.7239-3.9474-1.9909-4.687l.8849-.8927a.4663.4663 0 01.6636 0l1.106 1.116a.4765.4765 0 010 .6695l-.6636.6696c.6437 1.371 1.738 2.475 3.097 3.1246l.6635-.6696a.4664.4664 0 01.6637 0l1.106 1.1159a.4764.4764 0 010 .6696z"
                                  fill="currentColor"/>
                        </svg>
                    </a>
                    <a href="https://t.me/share/url?url=<?php echo rawurlencode($job_url); ?>&text=<?php echo rawurlencode($job_data->JobTitle); ?>" target="_blank" class="job-detail-social">
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none">
                            <path d="M15.6371 2.0814a.3298.3298 0 00-.0785-.1531.3262.3262 0 00-.1445-.092 1.1361 1.1361 0 00-.6033.043S1.4314 6.8426.6084 7.2908c-.1906.104-.2206.1837-.248.263-.1333.384.2807.5536.2807.5536l3.4627 1.1384 1.653 4.5339s.1813.4396.436.4396c.1086 0 .3546-.1154.7063-.4709.7463-.753 1.4627-1.3772 1.8203-1.6815 1.1907.8296 2.472 1.7468 3.025 2.2267a.961.961 0 00.3226.2082.9546.9546 0 00.3774.0646c.525-.0199.6714-.6014.6714-.6014s2.4483-9.9418 2.53-11.2736c.008-.1305.019-.2136.0203-.3027a1.135 1.135 0 00-.029-.3074zM4.6914 8.9725c1.73-1.1014 7.5537-4.802 7.9247-4.9395.0667-.0195.113.0027.1.0478-.1647.5835-6.3413 6.125-6.364 6.1435a.1408.1408 0 00-.0443.1056l-.2404 2.4904-1.376-3.8478z"
                                  fill="currentColor"/>
                        </svg>
                    </a>
                    <a href="https://social-plugins.line.me/lineit/share?url=<?php echo rawurlencode($job_url); ?>" class="job-detail-social" target="_blank">
                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none">
                            <g>
                                <path d="M8 .4526c-4.41 0-8 2.9583-8 6.5939 0 3.2562 2.8467 5.9844 6.69 6.503.2607.0558.6153.1749.7053.3995.08.2038.0527.5186.0254.7312l-.1094.6901c-.03.2038-.16.8024.6994.4365.8606-.3645 4.6106-2.7605 6.2906-4.7212C15.4507 9.8076 16 8.498 16 7.0465 16 3.4109 12.41.4526 8 .4526zM4.8687 9.2083H3.278c-.23 0-.42-.193-.42-.4258V5.5532c0-.2334.19-.4264.42-.4264.232 0 .42.193.42.4264v2.8029h1.1707c.232 0 .4193.1917.4193.4264 0 .2327-.188.4258-.4193.4258zm1.644-.4258c0 .2327-.188.4258-.4207.4258-.23 0-.418-.193-.418-.4258V5.5532c0-.2334.188-.4264.42-.4264.2307 0 .4187.193.4187.4264v3.2293zm3.8273 0c0 .183-.116.345-.288.4036a.4272.4272 0 01-.1327.0209c-.1406 0-.2606-.0613-.34-.1696L7.9507 6.7922v1.9897c0 .2327-.186.4257-.4207.4257-.2307 0-.4173-.193-.4173-.4257V5.5532a.424.424 0 01.2866-.4029c.04-.0155.0907-.0222.1294-.0222.13 0 .25.0706.33.1722L9.5 7.5543v-2.001c0-.2335.188-.4265.42-.4265.23 0 .42.193.42.4264v3.2293zm2.57-2.0414c.2327 0 .42.193.42.4271 0 .2334-.1873.4264-.42.4264h-1.17v.7615h1.17c.2327 0 .42.1917.42.4264 0 .2327-.1873.4258-.42.4258h-1.5907c-.23 0-.418-.193-.418-.4258V5.5532c0-.2334.188-.4264.42-.4264h1.5907c.2307 0 .418.193.418.4264 0 .2361-.1873.4265-.42.4265h-1.17v.7614h1.17z"
                                      fill="currentColor"/>
                            </g>
                            <defs>
                                <clipPath>
                                    <path fill="#fff" transform="translate(0 .1162)"
                                          d="M0 0h16v16.1432H0z"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                    <?php endif; ?>
                    <a class="job-detail-social"  href="mailto:?subject=<?php echo $job_data->JobTitle; ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"><path fill="currentColor" d="M15.3333 1.33337H.666667c-.4 0-.666667.26667-.666667.66667V14c0 .4.266667.6667.666667.6667H15.3333c.4 0 .6667-.2667.6667-.6667V2.00004c0-.4-.2667-.66667-.6667-.66667zm-1.5333 3.2L8.46667 9.20004c-.13334.06667-.33334.13333-.46667.13333-.13333 0-.33333-.06666-.46667-.13333L2.2 4.53337c-.26667-.26666-.33333-.66666-.06667-.93333.26667-.26667.66667-.33333.93334-.06667l4.86666 4.26667L12.8 3.53337c.2667-.26666.6667-.2.9333.06667.3334.26667.3334.66667.0667.93333z"/></svg></a>
                    <a href="#" class="job-detail-social copy-link" data-link="<?php echo $job_url; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M9.62647 1.09333c1.45773-1.457772 3.82123-1.457772 5.27903 0 1.4578 1.45777 1.4578 3.82128-.0001 5.27905l-3.394 3.39405c-.4774.47757-1.0755.81667-1.73037.98117h-.02934l-.15463.032-.08533.016-.18396.0266h-.09064c-.04019 0-.0777.0045-.11355.0088-.02599.0031-.05111.0061-.07576.0072l-.15997.0187H8.68523a3.697737 3.697737 0 01-.39727-.0374c-.1093-.0186-.21597-.0399-.3226-.0666l-.15732-.0426c-.05599-.016-.11463-.0347-.17062-.056-.02051-.0079-.04138-.0153-.06234-.0228-.03626-.013-.07281-.026-.10829-.0412-.01866-.008-.03732-.0157-.05598-.0234-.03733-.0154-.07466-.0308-.11199-.0486-.3968-.1839-.75786-.4366-1.06646-.74653-.21615-.21668-.32879-.51578-.30929-.8212.01715-.25742.12704-.49991.30929-.68253.42089-.39615 1.07746-.39615 1.49838 0 .62458.62379 1.63637.62379 2.26094 0l.87452-.86919.0213-.02399 2.5009-2.49821c.6251-.62508.6251-1.63852 0-2.2636-.6251-.62507-1.6385-.62507-2.2636 0L9.11718 4.61804c-.07605.07655-.19078.09973-.2906.05864a4.479337 4.479337 0 00-1.7037-.33328h-.09864c-.10891.00209-.20815-.0623-.25061-.16263-.04296-.10004-.02081-.21611.05599-.29329l2.79685-2.79415zm-.48988 4.63913c.22687.14426.43702.31326.62654.50391.21615.21665.32877.51575.30937.82117-.0184.25558-.12824.49597-.30933.67722-.4209.39615-1.07747.39615-1.49839 0-.62458-.62379-1.63636-.62379-2.26094 0L2.59911 11.1368c-.62507.6251-.62507 1.6385 0 2.2636.62508.6251 1.63852.6251 2.26359 0l2.01299-2.0156c.07604-.0766.19077-.0998.2906-.0587a4.485561 4.485561 0 001.70635.3306h.10664c.14725-.0008.26732.1178.26817.2651.0004.0716-.028.1404-.07886.1908l-2.7995 2.7995c-.69881.6997-1.64805 1.0913-2.63687 1.0878-2.0615-.0013-3.731578-1.6735-3.730267-3.735.000626-.9879.392868-1.9353 1.090747-2.63448l3.39139-3.39405c.69906-.7015 1.64917-1.09499 2.63952-1.09314.71353 0 1.41209.20446 2.01298.58923z" clip-rule="evenodd"/></svg>
                        <span class="tooltip"><?php esc_html_e('Copied', 'rf'); ?></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="job-detail-content">
            <div class="container">
                <div class="job-detail-content__wrapper">
                    <h5><?php esc_html_e('Overview', 'rf'); ?></h5>
                    <table class="job-detail-table">
                        <?php if ($location) : ?>
                        <tr>
                            <td>
                                <?php esc_html_e('Location', 'rf'); ?>
                            </td>
                            <td><?php echo $location; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($job_data->RoleType) : ?>
                        <tr>
                            <td>
                                <?php esc_html_e('Job-type', 'rf'); ?>
                            </td>
                            <td><?php echo $job_data->RoleType->Name; ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if (!empty($job_data->Sectors)) : ?>
                        <tr>
                            <td>
                                <?php esc_html_e('Job Category', 'rf'); ?>
                            </td>
                            <td>
                                <?php
                                    echo $job_data->Sectors[0]->Name;
                                ?>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <td>
                                <?php esc_html_e('Industries', 'rf'); ?>
                            </td>
                            <td>
                                <?php echo implode(', ', $industries); ?>
                            </td>
                        </tr>
                        <?php if ($job_data->SalaryFrom || $job_data->SalaryTo) : ?>
                        <tr>
                            <td>
                                <?php esc_html_e('Salary', 'rf'); ?>
                            </td>
                            <td>
                                <span>
                                    <?php echo format_money($job_data->SalaryFrom, $job_data->SalaryCurrency); ?>
                                </span>
                                <span><?php if ($job_data->SalaryTo && $job_data->SalaryTo > $job_data->SalaryFrom) echo '- ' .  format_money($job_data->SalaryTo); ?></span>
                                <span>/<?php echo $payoutType[$job_data->SalaryPayoutType]; ?></span>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </table>
                    <?php if (!empty($job_data->CompanyName)) : ?>
                        <h5>
                            <?php esc_html_e('Who you\'ll be working for', 'rf'); ?>
                        </h5>
                        <?php echo $job_data->CompanyName; ?>
                    <?php endif; ?>
                    <?php if (!empty($job_data->JobRequirements)) : ?>
                        <h5>
                            <?php esc_html_e('What requirements you\'ll need to be eligible', 'rf'); ?>
                        </h5>
                        <?php echo $job_data->JobRequirements; ?>
                    <?php endif; ?>
                    <?php if (!empty($job_data->JobDesc)) : ?>
                        <h5>
                            <?php esc_html_e('What you\'ll be doing on the job', 'rf'); ?>
                        </h5>
                        <?php echo $job_data->JobDesc; ?>
                    <?php endif; ?>
                    <h5>
                        <?php esc_html_e('Consultant Contact', 'rf'); ?>
                    </h5>
                    <table>
                        <?php if ($job_data->ConsultantName) : ?>
                        <tr>
                            <td><strong><?php esc_html_e('Posted by', 'rf'); ?>:</strong></td>
                            <td><span><?php echo $job_data->ConsultantName; ?></span></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($job_data->ConsultantTelNo) : ?>
                        <tr>
                            <td><strong><?php esc_html_e('Phone', 'rf'); ?>:</strong></td>
                            <td><a href="tel:<?php echo $job_data->ConsultantTelNo; ?>"><?php echo $job_data->ConsultantTelNo; ?></a></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($job_data->ConsultantEmail) : ?>
                        <tr>
                            <td><strong><?php esc_html_e('Email', 'rf'); ?>:</strong></td>
                            <td><a href="mailto:<?php echo $job_data->ConsultantEmail; ?>"><?php echo $job_data->ConsultantEmail; ?></a></td>
                        </tr>
                        <?php endif; ?>
                        <?php if ($job_data->ConsultantNotes) : ?>
                        <tr>
                            <td><strong><?php esc_html_e('Reg No', 'rf'); ?>:</strong></td>
                            <td><?php echo strtoupper(str_replace('reg no: ', '', strtolower($job_data->ConsultantNotes))); ?></td>
                        </tr>
                        <?php endif; ?>
                    </table>
                    <?php if (!wp_is_mobile()) : ?>
                    <div class="job-detail-content__bottom">
                        <h5><?php esc_html_e('Sound interesting?', 'rf'); ?></h5>
                        <a target="_blank" href="<?php esc_attr_e($job_data->ApplyLink); ?>" class="btn">
                            <?php esc_html_e('Apply!', 'rf'); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if (count($related_jobs) > 0) : ?>
        <div class="job-detail__related jobs-related">
            <div class="container">
                <div class="job-detail__related-header">
                    <h3>
                        Take a look at these jobs too
                    </h3>
                    <a href="<?php echo $jobs_list_url; ?>" class="btn">
                        <?php esc_html_e('View all jobs', 'rf'); ?>
                    </a>
                </div>
            </div>
            <div class="swiper-container job-detail__related-container">
                <div class="job-detail__related-list swiper-wrapper">
                    <?php
                    foreach ($related_jobs as $job) :
                        set_query_var( 'job', $job );
                        ?>
                        <div class="swiper-slide">
                            <?php get_template_part( 'template-parts/job', 'card' ); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="job-detail__related-controls">
                    <button class="job-detail__control job-detail__control-prev">
                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg"><line x1="1" y1="-1" x2="10" y2="-1" transform="matrix(-1 0 0 1 13 7)" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M6 11L1 6l5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </button>
                    <div class="swiper-pagination"></div>
                    <button class="job-detail__control job-detail__control-next">
                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg"><line x1="1" y1="6" x2="10" y2="6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M7 11l5-5-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <script>
        document.title = document.querySelector('.job-detail-header h1').innerHTML
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
            this.classList.add('copied')
            const button = this
            setTimeout(function () {
                button.classList.remove('copied')
            }, 1500)
        })
    </script>

<?php else : ?>
    <section class="error-404 not-found">
        <div class="error-404__wrapper">
            <h1>404</h1>
            <h2><?php esc_html_e('Job Not Found', 'rf'); ?></h2>
            <p><?php esc_html_e('Sorry, but we are not able to find the job you are looking for.', 'rf'); ?></p>
            <a href="<?php echo $jobs_list_url; ?>" class="btn">
                <?php esc_html_e('Back to Candidate', 'rf'); ?>
            </a>
        </div>
    </section><!-- .error-404 -->
<?php endif;
get_footer('v2');
