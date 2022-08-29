<?php
$job_url = get_page_url('templates/job-detail');

$payoutType = array(
    "M" => esc_html__('Month', 'rf'),
    "D" => esc_html__('Day', 'rf'),
    "H" => esc_html__('Hour', 'rf')
);
$location = get_location($job);
?>

<div class="job-card">
    <div class="job-card__inner">
        <a href="<?php echo $job_url; ?>?id=<?php echo $job->Id; ?>" class="job-card__link"></a>
        <?php if ($location) : ?>
        <p class="job-card__location">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.998 0a5.218 5.218 0 00-5.25 5.25c0 1.425.525 2.775 1.575 3.75.075.075 3.075 2.775 3.15 2.85.3.225.75.225.975 0 .075-.075 3.15-2.775 3.15-2.85 1.05-.975 1.575-2.325 1.575-3.75C11.248 2.325 8.923 0 5.998 0zm0 6.75c-.825 0-1.5-.675-1.5-1.5s.675-1.5 1.5-1.5 1.5.675 1.5 1.5-.675 1.5-1.5 1.5z" fill="currentColor" fill-opacity="0.3"/></svg>
            <span><?php echo $location; ?></span>
        </p>
        <?php endif; ?>
        <p class="job-card__salary">
            <span class="job-card__salary-amount">
                <?php echo format_money($job->SalaryFrom, $job->SalaryCurrency); ?>
                <?php if ($job->SalaryTo && $job->SalaryTo > $job->SalaryFrom) echo '- ' . format_money($job->SalaryTo, $job->SalaryCurrency); ?>
            </span>
            <span>/<?php echo $payoutType[$job->SalaryPayoutType]; ?></span>
        </p>
        <h3 class="h4 job-card__title"><?php echo $job->JobTitle; ?></h3>
        <span class="flex--spacer"></span>
        <p class="job-card__contract"><svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.498 0h-9c-.45 0-.75.3-.75.75v10.5c0 .45.3.75.75.75h9c.45 0 .75-.3.75-.75V.75c0-.45-.3-.75-.75-.75zm-4.5 9.75h-3v-1.5h3v1.5zm3-3h-6v-1.5h6v1.5zm0-3h-6v-1.5h6v1.5z" fill="currentColor" fill-opacity=".3"/></g></svg> <span><?php echo $job->RoleType->Name; ?></span></p>
    </div>
</div>
