<?php
// Add custom Theme Functions here
//remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
//remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);

function test()
{
    echo '<p>test action</p>';
}

add_action('woocommerce_single_product_summary', 'test',35);

function change_text($dulieu)
{
	$text = str_replace('Trend', 'Nổi bật', $dulieu);
	return $text;
}
add_filter( 'the_title', 'change_text');

//remove_action('woocommerce_single_product_summary','woocommerce_template_single_sharing',50);

