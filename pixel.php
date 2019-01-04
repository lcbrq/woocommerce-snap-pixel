<?php

/*
* Plugin Name: Snapchat Pixel
* Description: Basic Snapchat pixel support for Woocommerce
* Version: 1.0
* Author: Tomasz Silpion Gregorczyk
* Author URI: http://www.silpion.com.pl
* License: GPL2
*/ 

class LCB_Snapchat_Pixel {
    
    public function init() {
        add_action( 'wp_footer', array($this, 'add_snapchat_default_pixel'), 998);
        add_action( 'woocommerce_thankyou', array($this, 'add_snapchat_purchase_pixel'), 999);
        add_filter( 'woocommerce_get_sections_advanced', array($this, 'snapchat_pixel_section' ));
        add_filter( 'woocommerce_get_settings_advanced', array($this, 'snapchat_pixel_settings'), 10, 2 );        
    }
   
    public function add_snapchat_default_pixel() {
        include(dirname(__FILE__) . '/includes/default.php');
    }
    
    public function add_snapchat_purchase_pixel($order_id) {
        include(dirname(__FILE__) . '/includes/purchase.php');
    }
    
    function snapchat_pixel_section($sections) {	
	$sections['snappixel'] = __('Snapchat Pixel ID', 'lcb-snapchat');
	return $sections;	
    }
    
    public function snapchat_pixel_settings($settings, $current_section) {
	
	if ( $current_section == 'snappixel' ) {
	     $settings_snapchat = array();
	     $settings_snapchat[] = array('name' => __('WC Snapchat Pixel', 'lcb-snapchat'), 'type' => 'title', 'id' => 'snappixel');

	     $settings_snapchat[] = array(
			'name'     => __('Snapchat Pixel ID', 'lcb-snapchat'),
			'id'       => 'snapchat_pixel_id',
			'type'     => 'text'
		);
		
	     $settings_snapchat[] = array('type' => 'sectionend', 'id' => 'wcslider');
             $settings = $settings_snapchat;
	} 
	
        return $settings;
    }
    
}

$pixel = new LCB_Snapchat_Pixel;
$pixel->init();
