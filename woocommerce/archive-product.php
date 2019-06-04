<?php
    if (is_product_category())
    {
        include 'content-page-category.php';
        //wc_get_template('content-page','category');
    }else{
        include 'conten-page-shop.php';
        //wc_get_template('content-page','shop');
    }
?>