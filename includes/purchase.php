<?php

$snapchat_pixel_id = get_option( 'snapchat_pixel_id');

if(!$snapchat_pixel_id) {
    return;
}

$order = wc_get_order($order_id);
$item_sku = array();
foreach ($order->get_items() as $item) {
    $product = wc_get_product($item->get_product_id());
    $item_sku[] = "'" . $product->get_sku() . "'";
    }
    ?>
   <script type="text/javascript">
       jQuery(document).ready(function($){
           snaptr('track', 'PURCHASE', {'currency': 'CHF', 'item_ids': [<?php implode(',', $item_sku); ?>]});
       }); 
   </script>