<?php
$snapchat_pixel_id = get_option( 'snapchat_pixel_id');

if(!$snapchat_pixel_id) {
    return;
}

?>

<script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"5488824"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script>

<!-- Snap Pixel Code -->
<script type='text/javascript'>
(function(e,t,n){if(e.snaptr)return;var a=e.snaptr=function()
{a.handleRequest?a.handleRequest.apply(a,arguments):a.queue.push(arguments)};
a.queue=[];var s='script';r=t.createElement(s);r.async=!0;
r.src=n;var u=t.getElementsByTagName(s)[0];
u.parentNode.insertBefore(r,u);})(window,document,
'https://sc-static.net/scevent.min.js');

var email = '';
var currency = '<?php echo get_option('woocommerce_currency'); ?>';

if(jQuery('#billing_email').val()) {
    email = jQuery('#billing_email').val();
}

snaptr('init', '<?php echo $snapchat_pixel_id; ?>', {
   'user_email': email
});

<?php if(is_product()): global $product; ?>

snaptr('track','VIEW_CONTENT') 

jQuery(".single_add_to_cart_button").click(function() {
    snaptr('track', 'ADD_CART', {'currency': currency, 'price': '<?php echo $product->get_price(); ?>', 'item_ids': ['<?php echo $product->get_sku(); ?>'] });
});

<?php else: ?>

snaptr('track', 'PAGE_VIEW');

jQuery(".ajax_add_to_cart").click(function() {
    var amount = jQuery(this).closest('.product').find('.amount').last().text();
    amount = amount.replace(currency, '').trim();
    snaptr('track', 'ADD_CART', {'currency': currency, 'price': amount, 'item_ids': [jQuery(this).attr('data-product_sku')] });
});

<?php endif; ?>

</script>
<!-- End Snap Pixel Code -->
