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


// Sua truong billing country la khong bat buoc
add_filter( 'woocommerce_checkout_fields', 'khongbatbuoc');
function khongbatbuoc($data)
{
    $data['billing']['billing_country']['required'] = false;
    return $data;
}

// Xoa truong company la khong bat buoc
add_filter( 'woocommerce_checkout_fields', 'delete_company');
function delete_company($data)
{
    unset($data['billing']['billing_company']);
    return $data;
}


// Them truong Dien thoai di dong vao form Checkout
add_filter('woocommerce_checkout_fields', 'themdienthoaididong',10,1);
function themdienthoaididong($dulieu)
{
    $dulieu['billing']['billing_dienthoaididong'] = array(
        'type' => 'text',
        'label' => __('Dien thoai di dong', 'woocommerce'),
        'placeholder' => __('Dien thoai di dong', 'woocommerce'),
        'required' => false,
        'class' => array('dtdd')
    );
    return $dulieu;
}

// xu ly hien thi trong admin, trang thong ke chi tiet don hang
add_action('woocommerce_admin_order_data_after_billing_address', 'themdienthoaiadmin');
function themdienthoaiadmin($order)
{
    echo '<hr>';
    echo '<div class="dulieudtdd"><b>Dien thoai di dong: '. get_post_meta($order->id, "_billing_dienthoaididong",true) .'</b></div>';
}

// them select box, tinh thanh trong billing
add_filter('woocommerce_checkout_fields', 'themtinh',10,1);
function themtinh($dulieu)
{
    unset($dulieu['billing']['billing_city']);
    $dulieu['billing']['billing_tinh'] = array(
        'type' => 'select',
        'label' => __('Tinh ho tro giao hang', 'woocommerce'),
        'required' => false,
        'class' => array('htgh'),
        'options' => array(
            'CHON' => __('Chọn tỉnh thành', 'woocommerce'),
            'HANOI' => __('Hà Nội', 'woocommerce'),
            'HCM' => __('Thành phố HCM', 'woocommerce'),
            'DANANG' => __('Thành phố Đà Nẵng', 'woocommerce'),
        )

    );
    return $dulieu;
}

