<?php
$country_code = RF_Language::get_country_code();
$industries = [];
if (!empty($job->Industries)) {
    foreach ($job->Industries as $industry) {
        $industries[] = $industry->Name;
    }
}
$payoutType = array(
    "M" => esc_html__('Month', 'rf'),
    "D" => esc_html__('Day', 'rf'),
    "H" => esc_html__('Hour', 'rf')
);

$job_url = home_url('/job-details/?id=' . $job->Id);
?>
<div class="job-detail__header flex align--center justify--between">
    <div class="job-detail__header-info">
        <p><?php echo $job->CompanyName; ?></p>
        <h1 class="h5 text--black"><?php echo $job->JobTitle; ?></h1>
        <p><span><?php echo $job->RoleType->Name; ?></span></p>
    </div>
    <div class="job-detail__header-actions flex align--center">
        <a href="<?php esc_attr_e($job->ApplyLink); ?>" target="_blank" class="btn"><?php esc_html_e('Apply now', 'rf'); ?></a>
        <div class="share">
            <button class="btn btn-share">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"><path fill="currentColor" d="M15.7607 6.56562l-5.2674-4.78854c-.399-.39905-.87787 0-.87787.63847v2.39427c-3.75103 0-6.94339 2.31447-8.45976 5.42698C.597003 11.2744.277766 12.3917.03834 13.509c-.159619.7981.638484 1.1972 1.11734.4789 1.7558-2.7933 5.10777-4.62896 8.45975-4.62896v2.63366c0 .6385.47887 1.0376.87787.6385l5.2674-4.78853c.3193-.31924.3193-.95771 0-1.27695z"/></svg>
            </button>
            <div class="share-list">
                <h5><?php esc_html_e('Share', 'rf'); ?></h5>
                <ul>
                    <?php if ($country_code != 'CN') : ?>
                        <li>
                            <a href="https://wa.me/?text=<?php echo urlencode($job_url); ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"><path fill="#9048EB" d="M13.7551 2.24487C12.3075.797219 10.3828 0 8.33553 0c-2.04725 0-3.972.797219-5.41966 2.24487C1.46822 3.69253.671031 5.61722.671031 7.66447c0 1.29684.328281 2.57123.951409 3.70003L0 16l4.63541-1.6224c1.12887.6231 2.40325.9514 3.70009.9514 2.0472 0 3.972-.7973 5.4196-2.2449C15.2028 11.6365 16 9.71175 16 7.66447c0-2.04728-.7972-3.97197-2.2449-5.4196zm-1.6306 8.26683l-.8848.8849c-.733.733-2.81286-.1584-4.64539-1.99091-1.83256-1.83257-2.7239-3.91235-1.99087-4.64538l.88481-.88481c.18325-.18325.48038-.18325.66363 0l1.10603 1.10603c.18325.18325.18325.48038 0 .66363l-.66363.66362C7.238 7.66775 8.33225 8.76197 9.69122 9.40569l.66358-.66363c.1833-.18325.4804-.18325.6637 0l1.106 1.10603c.1833.18331.1833.48041 0 .66361z"/></svg> WhatsApp</a>
                        </li>
                        <li>
                            <a href="https://t.me/share/url?url=<?php echo urlencode($job_url); ?>&text=<?php echo rawurlencode($job->JobTitle); ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"><path fill="#9048EB" d="M15.6371 1.94766a.325783.325783 0 00-.0785-.15174.32653.32653 0 00-.1445-.09126c-.2013-.04006-.4097-.02533-.6033.04267 0 0-13.37936 4.91933-14.202359 5.36366-.190667.103-.220666.182-.248.26067-.133333.38067.280667.54867.280667.54867L4.10377 9.04866l1.653 4.49364s.18134.4357.436.4357c.10867 0 .35467-.1143.70634-.4667.74633-.7463 1.46266-1.365 1.82033-1.6666 1.19067.8223 2.47196 1.7313 3.02496 2.207.0926.0897.2023.1598.3226.2063.1202.0464.2486.0682.3774.064.525-.0197.6714-.596.6714-.596s2.4483-9.85367 2.53-11.17367c.008-.12934.019-.21167.0203-.3.0044-.10241-.0054-.20493-.029-.30467zm-10.94566 6.83c1.73-1.09167 7.55366-4.75933 7.92466-4.89567.0667-.01933.113.00267.1.04734-.1647.57833-6.34133 6.07066-6.36399 6.08897-.01432.0134-.02566.0296-.0333.0476-.00764.0181-.0114.0375-.01104.0571l-.24033 2.4683-1.376-3.81364z"/></svg> Telegram</a>
                        </li>
                        <li>
                            <a href="https://social-plugins.line.me/lineit/share?url=<?php echo rawurlencode($job_url); ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"><path fill="#9048EB" d="M8 .333374c-4.41 0-8 2.931996-8 6.535336C0 10.096 2.84667 12.8 6.69 13.314c.26067.0554.61533.1734.70533.396.08.202.05267.514.02534.7247l-.10934.684c-.03.202-.16.7953.69934.4327.86066-.3614 4.61063-2.736 6.29063-4.6794C15.4507 9.60537 16 8.30737 16 6.86871 16 3.26537 12.41.333374 8 .333374zM4.86867 9.01137H3.278c-.23 0-.42-.19133-.42-.422V5.38871c0-.23134.19-.42267.42-.42267.232 0 .42.19133.42.42267v2.778h1.17067c.232 0 .41933.19.41933.42266 0 .23067-.188.422-.41933.422zm1.644-.422c0 .23067-.188.422-.42067.422-.23 0-.418-.19133-.418-.422V5.38871c0-.23134.188-.42267.42-.42267.23067 0 .41867.19133.41867.42267v3.20066zm3.82733 0c0 .18134-.116.342-.288.4-.0427.014-.08867.02067-.13267.02067-.14066 0-.26066-.06067-.34-.168L7.95067 6.61671v1.972c0 .23066-.186.422-.42067.422-.23067 0-.41733-.19134-.41733-.422v-3.2c0-.18134.11533-.342.28666-.39934.04-.01533.09067-.022.12934-.022.13 0 .25.07.33.17067L9.5 7.37204V5.38871c0-.23134.188-.42267.42-.42267.23 0 .42.19133.42.42267v3.20066zm2.57-2.02333c.2327 0 .42.19133.42.42333 0 .23134-.1873.42267-.42.42267h-1.17v.75467h1.17c.2327 0 .42.19.42.42266 0 .23067-.1873.422-.42.422h-1.5907c-.23 0-.418-.19133-.418-.422V5.38871c0-.23134.188-.42267.42-.42267h1.5907c.2307 0 .418.19133.418.42267 0 .234-.1873.42266-.42.42266h-1.17v.75467h1.17z"/></svg> Line</a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $job_url; ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"><path fill="#9048EB" d="M6.02293 16L6 9H3V6h3V4c0-2.6992 1.67151-4 4.0794-4 1.1534 0 2.1447.08587 2.4335.12425v2.82082l-1.6699.00076c-1.30957 0-1.56313.62227-1.56313 1.53541V6H13l-1 3H9.27986v7H6.02293z"/></svg> Facebook</a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $job_url; ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"><path fill="#9048EB" d="M12.6667 0H3.33333C1.49267 0 0 1.49267 0 3.33333v9.33337C0 14.5073 1.49267 16 3.33333 16h9.33337C14.508 16 16 14.5073 16 12.6667V3.33333C16 1.49267 14.508 0 12.6667 0zM5.33333 12.6667h-2V5.33333h2v7.33337zm-1-8.1787c-.644 0-1.16666-.52667-1.16666-1.176s.52266-1.176 1.16666-1.176S5.5 2.66267 5.5 3.312s-.522 1.176-1.16667 1.176zm8.99997 8.1787h-2V8.93067c0-2.24534-2.66663-2.07534-2.66663 0v3.73603h-2V5.33333h2V6.51c.93066-1.724 4.66663-1.85133 4.66663 1.65067v4.50603z"/></svg> LinkedIn</a>
                    </li>
                    <li>
                        <a href="mailto:?subject=<?php echo $job->JobTitle; ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"><path fill="#9048EB" d="M15.3333 1.33337H.666667c-.4 0-.666667.26667-.666667.66667V14c0 .4.266667.6667.666667.6667H15.3333c.4 0 .6667-.2667.6667-.6667V2.00004c0-.4-.2667-.66667-.6667-.66667zm-1.5333 3.2L8.46667 9.20004c-.13334.06667-.33334.13333-.46667.13333-.13333 0-.33333-.06666-.46667-.13333L2.2 4.53337c-.26667-.26666-.33333-.66666-.06667-.93333.26667-.26667.66667-.33333.93334-.06667l4.86666 4.26667L12.8 3.53337c.2667-.26666.6667-.2.9333.06667.3334.26667.3334.66667.0667.93333z"/></svg> With Email</a>
                    </li>
                    <li>
                        <a href="#" class="copy-link" data-link="<?php echo $job_url; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"><path fill="#9048EB" fill-rule="evenodd" d="M9.62647 1.09333c1.45773-1.457772 3.82123-1.457772 5.27903 0 1.4578 1.45777 1.4578 3.82128-.0001 5.27905l-3.394 3.39405c-.4774.47757-1.0755.81667-1.73037.98117h-.02934l-.15463.032-.08533.016-.18396.0266h-.09064c-.04019 0-.0777.0045-.11355.0088-.02599.0031-.05111.0061-.07576.0072l-.15997.0187H8.68523a3.697737 3.697737 0 01-.39727-.0374c-.1093-.0186-.21597-.0399-.3226-.0666l-.15732-.0426c-.05599-.016-.11463-.0347-.17062-.056-.02051-.0079-.04138-.0153-.06234-.0228-.03626-.013-.07281-.026-.10829-.0412-.01866-.008-.03732-.0157-.05598-.0234-.03733-.0154-.07466-.0308-.11199-.0486-.3968-.1839-.75786-.4366-1.06646-.74653-.21615-.21668-.32879-.51578-.30929-.8212.01715-.25742.12704-.49991.30929-.68253.42089-.39615 1.07746-.39615 1.49838 0 .62458.62379 1.63637.62379 2.26094 0l.87452-.86919.0213-.02399 2.5009-2.49821c.6251-.62508.6251-1.63852 0-2.2636-.6251-.62507-1.6385-.62507-2.2636 0L9.11718 4.61804c-.07605.07655-.19078.09973-.2906.05864a4.479337 4.479337 0 00-1.7037-.33328h-.09864c-.10891.00209-.20815-.0623-.25061-.16263-.04296-.10004-.02081-.21611.05599-.29329l2.79685-2.79415zm-.48988 4.63913c.22687.14426.43702.31326.62654.50391.21615.21665.32877.51575.30937.82117-.0184.25558-.12824.49597-.30933.67722-.4209.39615-1.07747.39615-1.49839 0-.62458-.62379-1.63636-.62379-2.26094 0L2.59911 11.1368c-.62507.6251-.62507 1.6385 0 2.2636.62508.6251 1.63852.6251 2.26359 0l2.01299-2.0156c.07604-.0766.19077-.0998.2906-.0587a4.485561 4.485561 0 001.70635.3306h.10664c.14725-.0008.26732.1178.26817.2651.0004.0716-.028.1404-.07886.1908l-2.7995 2.7995c-.69881.6997-1.64805 1.0913-2.63687 1.0878-2.0615-.0013-3.731578-1.6735-3.730267-3.735.000626-.9879.392868-1.9353 1.090747-2.63448l3.39139-3.39405c.69906-.7015 1.64917-1.09499 2.63952-1.09314.71353 0 1.41209.20446 2.01298.58923z" clip-rule="evenodd"/></svg> Copy Link</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="job-detail-content">
    <div class="job-detail-content__wrapper">
        <h5><?php esc_html_e('Overview', 'rf'); ?></h5>
        <table class="job-detail-table">
            <?php if ($job->Landmark || $job->City) : ?>
                <tr>
                    <td>
                        <?php esc_html_e('Location', 'rf'); ?>
                    </td>
                    <td><?php if( $job->City) echo $job->City->Name; ?><?php if ($job->Landmark) echo '- ' . $job->Landmark->Name; ?></td>
                </tr>
            <?php endif; ?>
            <?php if ($job->RoleType) : ?>
                <tr>
                    <td>
                        <?php esc_html_e('Job-type', 'rf'); ?>
                    </td>
                    <td><?php echo $job->RoleType->Name; ?></td>
                </tr>
            <?php endif; ?>
            <?php if (!empty($job->Sectors)) : ?>
                <tr>
                    <td>
                        <?php esc_html_e('Job Category', 'rf'); ?>
                    </td>
                    <td>
                        <?php
                        echo $job->Sectors[0]->Name;
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
            <?php if ($job->SalaryFrom || $job->SalaryTo) : ?>
                <tr>
                    <td>
                        <?php esc_html_e('Salary', 'rf'); ?>
                    </td>
                    <td>
                                <span>
                                    <?php echo format_money($job->SalaryFrom, $job->SalaryCurrency); ?>
                                </span>
                        <span><?php if ($job->SalaryTo && $job->SalaryTo > $job->SalaryFrom) echo '- ' .  format_money($job->SalaryTo); ?></span>
                        <span>/<?php echo $payoutType[$job->SalaryPayoutType]; ?></span>
                    </td>
                </tr>
            <?php endif; ?>
        </table>
        <?php if (!empty($job->CompanyName)) : ?>
            <h5>
                <?php esc_html_e('Who you\'ll be working for', 'rf'); ?>
            </h5>
            <?php echo $job->CompanyName; ?>
        <?php endif; ?>
        <?php if (!empty($job->JobRequirements)) : ?>
            <h5>
                <?php esc_html_e('What requirements you\'ll need to be eligible', 'rf'); ?>
            </h5>
            <?php echo $job->JobRequirements; ?>
        <?php endif; ?>
        <?php if (!empty($job->JobDesc)) : ?>
            <h5>
                <?php esc_html_e('What you\'ll be doing on the job', 'rf'); ?>
            </h5>
            <?php echo $job->JobDesc; ?>
        <?php endif; ?>
        <h5>
            <?php esc_html_e('Consultant Contact', 'rf'); ?>
        </h5>
        <table>
            <?php if ($job->ConsultantName) : ?>
                <tr>
                    <td><strong><?php esc_html_e('Posted by', 'rf'); ?>:</strong></td>
                    <td><span><?php echo $job->ConsultantName; ?></span></td>
                </tr>
            <?php endif; ?>
            <?php if ($job->ConsultantTelNo) : ?>
                <tr>
                    <td><strong><?php esc_html_e('Phone', 'rf'); ?>:</strong></td>
                    <td><a href="tel:<?php echo $job->ConsultantTelNo; ?>"><?php echo $job->ConsultantTelNo; ?></a></td>
                </tr>
            <?php endif; ?>
            <?php if ($job->ConsultantEmail) : ?>
                <tr>
                    <td><strong><?php esc_html_e('Email', 'rf'); ?>:</strong></td>
                    <td><a href="mailto:<?php echo $job->ConsultantEmail; ?>"><?php echo $job->ConsultantEmail; ?></a></td>
                </tr>
            <?php endif; ?>
            <?php if ($job->ConsultantNotes) : ?>
                <tr>
                    <td><strong><?php esc_html_e('Reg No', 'rf'); ?>:</strong></td>
                    <td><?php echo strtoupper(str_replace('reg no: ', '', strtolower($job->ConsultantNotes))); ?></td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</div>
