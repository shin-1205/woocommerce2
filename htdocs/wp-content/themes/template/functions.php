<?php
  
// WooCommerceサポート宣言

function fancy_lab_config(){

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'fancy_lab_main_menu' 	=> 'Fancy Lab Main Menu',
				'fancy_lab_footer_menu' => 'Fancy Lab Footer Menu',
			)
		);

		// This theme is WooCommerce compatible, so we're adding support to WooCommerce
		add_theme_support( 'woocommerce', array(
      'thumbnail_image_width' => 200,
    'gallery_thumbnail_image_width' => 100,
    'single_image_width' => 800,
			'product_grid' 			=> array(
	            'default_rows'    => 10,
	            'min_rows'        => 3,
	            'max_rows'        => 1,
	            'default_columns' => 1,
	            'min_columns'     => 4,
	            'max_columns'     => 6,		
			)
		) );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

        /**
        * Add support for core custom logo.
        *
        * @link https://codex.wordpress.org/Theme_Logo
        */
		// add_theme_support( 'custom-logo', array(
		// 	'height' 		=> 85,
		// 	'width'			=> 160,
		// 	'flex_height'	=> true,
		// 	'flex_width'	=> true,
		// ) );

		// add_image_size( 'fancy-lab-slider' , 1920, 800, array('center', 'center'));

		// if ( ! isset( $content_width ) ) {
		// 	$content_width = 600;
		// }				
}
add_action( 'after_setup_theme', 'fancy_lab_config', 0 );