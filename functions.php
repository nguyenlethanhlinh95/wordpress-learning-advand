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

//remove_action('woocommerce_after_single_product_summary','woocommerce_output_related_products',20);

// tim nhung doan hook chưa comment để list ra danh sách functions
//global $wp_filter;
//echo '<pre>';
//print_r($wp_filter['woocommerce_after_single_product'],true);
//echo '</pre>';

