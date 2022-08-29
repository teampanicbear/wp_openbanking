<?php
/**
 * Template Name: Country
 *
 * @package recruitfirst
 */

get_header();


$country_code = RF_Language::get_country_code();


?>

<div class="site-main" style="overflow: hidden">
    <div class="contact-header">
        <div class="container">
            <div class="grid grid--two-columns grid--doubling">
                <div class="grid__column"></div>
                <div class="grid__column">
                    <h1 class="h2">Your country code is: <strong><?php echo $country_code; ?></strong></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer('v2');
?>
