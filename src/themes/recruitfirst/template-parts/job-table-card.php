<?php
$job_url = get_page_url('templates/job-detail');

$payoutType = array(
    "M" => esc_html__('Month', 'rf'),
    "D" => esc_html__('Day', 'rf'),
    "H" => esc_html__('Hour', 'rf')
)
?>

<div class="job-table-card">
    <div class="job-table-card__head">
        <div class="job-table-card__type">
            <span class="job-table-card__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 14 14"><path fill="#7E8CA0" d="M13.125 11.375H8.75c0 .525-.35.875-.875.875h-1.75c-.525 0-.875-.35-.875-.875H.875v1.75c0 .525.35.875.875.875h10.5c.525 0 .875-.35.875-.875v-1.75zM13.125 3.5H10.5V.875C10.5.35 10.15 0 9.625 0h-5.25C3.85 0 3.5.35 3.5.875V3.5H.875C.35 3.5 0 3.85 0 4.375v5.25c0 .525.35.875.875.875H5.25v-.875c0-.525.35-.875.875-.875h1.75c.525 0 .875.35.875.875v.875h4.375c.525 0 .875-.35.875-.875v-5.25c0-.525-.35-.875-.875-.875zm-4.375 0h-3.5V1.75h3.5V3.5z"/></svg>
            </span>
            <span><?php echo $job->RoleType->Name; ?></span>
        </div>
        <div class="job-table-card__type">
            <span class="job-table-card__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 14 14"><g><path fill="#7E8CA0" d="M7 0C3.5875 0 .875 2.7125.875 6.125c0 1.6625.6125 3.2375 1.8375 4.375.0875.0875 3.5875 3.2375 3.675 3.325.35.2625.875.2625 1.1375 0 .0875-.0875 3.675-3.2375 3.675-3.325 1.225-1.1375 1.8375-2.7125 1.8375-4.375C13.125 2.7125 10.4125 0 7 0zm0 7.875c-.9625 0-1.75-.7875-1.75-1.75s.7875-1.75 1.75-1.75 1.75.7875 1.75 1.75-.7875 1.75-1.75 1.75z"/></g></svg>
            </span>
            <span><?php echo $job->Country->Name; ?></span>
        </div>
    </div>
    <div class="job-table-card__content">
        <div class="job-table-card__industry">
            <span><?php echo $job->Industry[0]->Name; ?></span>
        </div>
        <div class="job-table-card__title">
            <a href="<?php echo $job_url; ?>?id=<?php echo $job->Id; ?>">
                <?php echo mb_strtolower(wp_trim_words($job->JobTitle, 12, '...')); ?>
            </a>
        </div>
    </div>
    <div class="job-table-card__price">
        <span class="candidate-table__price">
            <?php echo format_money($job->SalaryFrom, $job->SalaryCurrency); ?>
            <?php if ($job->SalaryTo && $job->SalaryTo > $job->SalaryFrom) echo '- ' .  format_money($job->SalaryTo, $job->SalaryCurrency); ?>
        </span>
        <span>/<?php echo $payoutType[$job->SalaryPayoutType]; ?></span>
    </div>
</div>
