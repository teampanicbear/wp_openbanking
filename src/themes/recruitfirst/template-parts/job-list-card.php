<?php
$job_url = get_page_url('templates/job-detail');

$payoutType = array(
    "M" => esc_html__('Month', 'rf'),
    "D" => esc_html__('Day', 'rf'),
    "H" => esc_html__('Hour', 'rf')
);

$job_url = get_page_url('templates/job-detail');
?>

<div class="job-card-list" data-job-id="<?php echo $job->Id; ?>">
    <div class="job-card-list__inner">
        <p class="job-card-list__company">
            <span><?php echo $job->CompanyName; ?></span>
        </p>
        <h3 class="h4 job-card-list__title">
            <a href="<?php echo $job_url; ?>?id=<?php echo $job->Id; ?>">
                <?php echo mb_strtolower(wp_trim_words($job->JobTitle, 10, '...')); ?>
            </a>
        </h3>
        <div class="flex align--center justify--between">
            <span class="job-card-list__contract"><span><?php echo $job->RoleType->Name; ?></span></span>
            <span class="job-card-list__salary">
                <span class="job-card-list__salary-amount">
                    <?php echo format_money($job->SalaryFrom, $job->SalaryCurrency); ?>
                    <?php if ($job->SalaryTo && $job->SalaryTo > $job->SalaryFrom) echo '- ' . format_money($job->SalaryTo, $job->SalaryCurrency); ?>
                </span>
                <span>/<?php echo $payoutType[$job->SalaryPayoutType]; ?></span>
            </span>
        </div>
    </div>
</div>
