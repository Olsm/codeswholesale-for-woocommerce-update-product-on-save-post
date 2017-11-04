<?php
/*
Plugin Name: CodesWholesale for WooCommerce Update product on save post
Description: Add action when saving post so that product is updated with price an stock from codeswholesale
Version: 1.0.0
Author: Olav Småriset
*/

use CodesWholesaleFramework\Postback\UpdatePriceAndStock\UpdatePriceAndStockAction;

add_action('save_post', 'update_price_and_stock_for_product');

/**
 * @param int $post_id
 */
function update_price_and_stock_for_product($post_id) {
    $productId = null;
    if ($post_id)
        $productId = get_post_meta($post_id, CodesWholesaleConst::PRODUCT_CODESWHOLESALE_ID_PROP_NAME, true);
    $action = new UpdatePriceAndStockAction(new WP_Update_Price_And_Stock(), new WP_Spread_Retriever());
    $action->setConnection(CW()->get_codes_wholesale_client());
    $action->setProductId($productId);

    $action->process();
}