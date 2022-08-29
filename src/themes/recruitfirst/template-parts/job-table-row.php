<?php
$job_url = get_page_url('templates/job-detail');

$payoutType = array(
    "M" => esc_html__('Month', 'rf'),
    "D" => esc_html__('Day', 'rf'),
    "H" => esc_html__('Hour', 'rf')
);
$location = get_location($job, false);
?>

<tr>
    <td>
        <a href="<?php echo $job_url; ?>?id=<?php echo $job->Id; ?>" class="candidate-table__title"><?php echo mb_strtolower(wp_trim_words($job->JobTitle, 12, '...')); ?></a>
    </td>
    <td>
        <a href="<?php echo $job_url; ?>?id=<?php echo $job->Id; ?>" class="candidate-table__link"></a>
        <span class="candidate-table__label"><?php echo $job->Industry[0]->Name; ?></span>
    </td>
    <td>
        <a href="<?php echo $job_url; ?>?id=<?php echo $job->Id; ?>" class="candidate-table__link"></a>
        <span class="candidate-table__label"><?php echo $job->Country->Name; ?></span>
    </td>
    <td>
        <a href="<?php echo $job_url; ?>?id=<?php echo $job->Id; ?>" class="candidate-table__link"></a>
        <?php if ($job->Landmark) : ?>
            <span class="candidate-table__label"><?php echo $location; ?></span>
        <?php endif; ?>
    </td>
    <td>
        <a href="<?php echo $job_url; ?>?id=<?php echo $job->Id; ?>" class="candidate-table__link"></a>
        <span class="candidate-table__label"><?php echo $job->RoleType->Name; ?></span>
    </td>
    <td class="candidate-table__salary">
        <a href="<?php echo $job_url; ?>?id=<?php echo $job->Id; ?>" class="candidate-table__link"></a>
        <span class="candidate-table__price">
            <?php echo format_money($job->SalaryFrom, $job->SalaryCurrency); ?>
            <?php if ($job->SalaryTo && $job->SalaryTo > $job->SalaryFrom) echo '- ' .  format_money($job->SalaryTo, $job->SalaryCurrency); ?>
        </span>
        <span>/<?php echo $payoutType[$job->SalaryPayoutType]; ?></span>
    </td>
</tr>
