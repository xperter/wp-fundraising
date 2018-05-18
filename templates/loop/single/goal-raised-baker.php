<?php
if ( ! defined( 'ABSPATH' ) ) exit;

global $post;
$funding_goal   = wf_get_total_goal_by_campaign($post->ID);

$raised = 0;
$total_raised = wf_get_total_fund_raised_by_campaign($post->ID);
$backers_count = wf_backers_count($post->ID);

if ($total_raised){
    $raised = $total_raised;
}
?>
<div class="xs-single-sidebar xs-mb-30">
    <ul class="xs-list-with-content fundpress-simple-list-content">
        <?php if ($raised) { ?>
            <li class="color-navy-blue bold xs-mb-20"><?php echo wf_price(number_format($raised,wc_get_price_decimals(),wc_get_price_decimal_separator(), wc_get_price_thousand_separator())); ?><span class="color-semi-black regular"><?php echo wf_single_fund_raised_text(); ?></span></li>
        <?php } ?>

        <?php if ($funding_goal) { ?>
            <li class="color-green bold xs-mb-20"><?php echo wf_price(number_format($funding_goal,wc_get_price_decimals(),wc_get_price_decimal_separator(), wc_get_price_thousand_separator())); ?><span class="color-semi-black regular"><?php echo wf_single_fund_goal_text(); ?></span></li>
        <?php } ?>

        <?php if ( $backers_count > 0 ) { ?>
            <li class="color-brick-light-2 bold"><?php echo $backers_count; ?><span class="color-semi-black regular"><?php echo wf_single_backers_count_text(); ?></span></li>
        <?php } ?>

    </ul>
</div>