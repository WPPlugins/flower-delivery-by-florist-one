<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/includes
 * @author     floristone
 */
class Florist_One_Flower_Delivery_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

	  define('F1_API', 'https://www.floristone.com/api/rest');

		$ssl_detected = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) ? 1 : 0;
		$site_url = $_SERVER['SERVER_NAME'];
		$ip_address = $_SERVER['REMOTE_ADDR'];

		if (get_option('florist-one-flower-delivery') != false){
			// app has already been installed and get_option('florist-one-flower-delivery') exists
			$config_options = get_option('florist-one-flower-delivery');
			$affiliate_id = $config_options['affiliate_id'];

		}
		else {
			// app has not been previously installed, set defaults
			$options = array(
			  'navigation_color' => '#8db6d9',
			  'navigation_hover_color' => '#18477d',
			  'navigation_text_color' => '#FFF',
			  'navigation_hover_text_color' => '#000',
			  'button_color' => '#8db6d9',
			  'button_hover_color' => '#8db6d9',
			  'button_text_color' => '#FFF',
			  'button_hover_text_color' => '#000',
			  'link_color' => '#18477d',
			  'heading_color' => '#000',
			  'text_color' => '#000',
			  'products_per_page' => 12,
			  'address_institution' => '',
			  'address_1' => '',
			  'address_city' => '',
			  'address_state' => '',
			  'address_zipcode' => '',
			  'address_country' => '',
			  'currency' => 'u',
			  'affiliate_id' => '0',
				'flower_storefront_id' => 0
			);
			add_option('florist-one-flower-delivery', $options);

			$affiliate_id = '0';

		}

		$data = array(
			'affiliate_id' => $affiliate_id,
			'ssl_detected' => $ssl_detected,
			'site_url' => $site_url,
			'ip_address' => $ip_address,
			'version' => '1.5.0'
		);

		 $args = array(
			 'method' => 'POST',
			 'httpversion' => '1.1',
			 'sslverify' => true,
			 'headers' => array(
				 'Authorization' => 'Basic ' . base64_encode( '999993:flowers' )
			 ),
			 'body' => $data
		 );

		 $url    = F1_API . '/wordpress/flowershop-analytics-new';
		 $api_response =	wp_remote_request( $url, $args );
		 $api_response_body = json_decode( wp_remote_retrieve_body( $api_response ), true );

		 $config_options = get_option('florist-one-flower-delivery');
		 $config_options['flower_storefront_id'] = $api_response_body["FLOWER_STOREFRONT_ID"];
		 update_option('florist-one-flower-delivery', $config_options);

	}

}
