<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/admin
 * @author     floristone
 */
class Florist_One_Flower_Delivery_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Florist_One_Flower_Delivery_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Florist_One_Flower_Delivery_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/florist-one-flower-delivery-admin.css', array(), $this->version, 'all' );
		if ( 'settings_page_'.$this->plugin_name == get_current_screen() -> id ) {
			wp_enqueue_style( 'wp-color-picker' );
	    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/florist-one-flower-delivery-admin.css', array( 'wp-color-picker' ), $this->version, 'all' );
		}
		else if ( 'toplevel_page_'.$this->plugin_name == get_current_screen() -> id ) {
			wp_enqueue_style( 'wp-color-picker' );
	    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/florist-one-flower-delivery-admin.css', array( 'wp-color-picker' ), $this->version, 'all' );
		}

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Florist_One_Flower_Delivery_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Florist_One_Flower_Delivery_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/florist-one-flower-delivery-admin.js', array( 'jquery' ), $this->version, false );
		if ( 'settings_page_'.$this->plugin_name == get_current_screen() -> id ) {
			//wp_enqueue_media();
	    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/florist-one-flower-delivery-admin.js', array( 'jquery', 'wp-color-picker' ), $this->version, false );
		}
		else if ( 'toplevel_page_'.$this->plugin_name == get_current_screen() -> id ) {
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/florist-one-flower-delivery-admin.js', array( 'jquery', 'wp-color-picker' ), $this->version, false );
		}
		wp_localize_script( $this->plugin_name, 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */

	public function add_plugin_admin_menu() {

	    /*
	     * Add a settings page for this plugin to the Settings menu.
	     *
	     * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
	     *
	     *        Administration Menus: http://codex.wordpress.org/Administration_Menus
	     *
	     */
      add_menu_page( 'Flower Delivery Configuration', 'Flower Delivery', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'), 'dashicons-store', 65  );

			//set option defaults on install
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
				'products_cw' => 0,
				'products_ea' => 0,
				'products_md' => 0,
				'products_tg' => 0,
				'products_vd' => 0,
				'rotation' => 0,
				'florists_of_choice' => array(),
				'facility_id' => 0,
				'florist_selection' => 0
			);
			add_option('florist-one-flower-delivery', $options);

	}

	 /**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */

	public function add_action_links( $links ) {
	    /*
	    *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
	    */
	   $settings_link = array(
	    '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
	   );
	   return array_merge(  $settings_link, $links );

	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */

	public function display_plugin_setup_page() {
	    include_once( 'partials/florist-one-flower-delivery-admin-display.php' );
	}

	public function options_update() {
    	register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
 	}

	public function validate($input) {
	    // All checkboxes inputs
	    $valid = array();

	    //Cleanup
			$valid['products'] = $input['products'];
			$valid['navigation_color'] = $input['navigation_color'];
			$valid['navigation_hover_color'] = $input['navigation_hover_color'];
			$valid['navigation_text_color'] = $input['navigation_text_color'];
			$valid['navigation_hover_text_color'] = $input['navigation_hover_text_color'];
      $valid['button_color'] = $input['button_color'];
			$valid['button_hover_color'] = $input['button_hover_color'];
			$valid['button_text_color'] = $input['button_text_color'];
			$valid['button_hover_text_color'] = $input['button_hover_text_color'];
			$valid['link_color'] = $input['link_color'];
			$valid['heading_color'] = $input['heading_color'];
			$valid['text_color'] = $input['text_color'];
			$valid['products_per_page'] = $input['products_per_page'];
			$valid['address_institution'] = $input['address_institution'];
			$valid['address_1'] = $input['address_1'];
			$valid['address_city'] = $input['address_city'];
			$valid['address_state'] = $input['address_state'];
			$valid['address_country'] = $input['address_country'];
			$valid['address_zipcode'] = $input['address_zipcode'];
			$valid['address_phone'] = $input['address_phone'];
			$valid['flower_storefront_id'] = $input['flower_storefront_id'];

			$valid['products_cm'] = ( isset($input['products_cm']) && !empty($input['products_cm']) ) ? 1 : 0;
			$valid['products_ea'] = ( isset($input['products_ea']) && !empty($input['products_ea']) ) ? 1 : 0;
			$valid['products_md'] = ( isset($input['products_md']) && !empty($input['products_md']) ) ? 1 : 0;
			$valid['products_tg'] = ( isset($input['products_tg']) && !empty($input['products_tg']) ) ? 1 : 0;
			$valid['products_vd'] = ( isset($input['products_vd']) && !empty($input['products_vd']) ) ? 1 : 0;

			$valid['rotation'] = ( isset($input['rotation']) && !empty($input['rotation']) ) ? 1 : 0;

			$valid['florist_selection'] = ( isset($input['florist_selection']) && !empty($input['florist_selection']) ) ? 1 : 0;
			if ($valid['florist_selection'] == 0){
				$valid['facility_id'] = 0;
				$valid['florists_of_choice'] = [];
			}
			else{
				$valid['florists_of_choice'] = json_decode($input['florists_of_choice']);
				if ((is_array($valid['florists_of_choice']) == false) || (count($valid['florists_of_choice']) ==  0)){
					$valid['facility_id'] = 0;
					$valid['florists_of_choice'] = [];
				}
				else if ( $input['facility_id'] != "0" || $input['facility_id'] != 0 || $input['facility_id'] == null ) {
					//put
					$args = array(
		        'method' => 'PUT',
		        'httpversion' => '1.1',
		        'sslverify' => true,
		        'headers' => array(
		          'Authorization' => 'Basic '.base64_encode( USERNAME . ':' . PASSWORD ),
		          'Content-Length' => 0
		        )
		      );
					$url    = F1_API . '/flowershop/chooseflorists?facilityid=' . $input['facility_id'] . '&florists=' . $input['florists_of_choice'] . '&rotation=' . ( $valid['rotation'] == 0 ? 'false' : 'true' ) ;

					$api_response =	wp_remote_request( $url, $args );
					$api_response_body = json_decode( wp_remote_retrieve_body( $api_response ), true );

					// $valid['link'] = $url;
					$valid['facility_id'] = $api_response_body["FACILITYID"];

				}
				else{
					//post
					$data = array(
						'facilityname' => $valid['address_institution'] . ' - wp aff=' . $input['affiliate_id'],
						'florists' => json_encode($valid['florists_of_choice']),
						'city' => $valid['address_city'],
						'state' => $valid['address_state'],
						'rotation' => ( $valid['rotation'] == 0 ? false : true )
					);
					$args = array(
						 'method' => 'POST',
						 'httpversion' => '1.1',
						 'sslverify' => true,
						 'headers' => array(
							 'Authorization' => 'Basic ' . base64_encode( USERNAME . ':' . PASSWORD )
						 ),
						 'body' => $data
					);
					$url    = F1_API . '/flowershop/chooseflorists';
					$api_response =	wp_remote_request( $url, $args );
					$api_response_body = json_decode( wp_remote_retrieve_body( $api_response ), true );

					// $valid['link'] = $url;
					$valid['facility_id'] = $api_response_body["FACILITYID"];
				}
			}



			$args = array(
	        'method' => 'GET',
	        'httpversion' => '1.1',
	        'sslverify' => true,
	        'headers' => array(
	          'Authorization' => 'Basic '.base64_encode( USERNAME . ':' . PASSWORD )
	        )
	    );
	    $url    = F1_API . '/wordpress/flowershop-getcurrency?affiliate_id=' . $affiliateid;

			//validate affiliateid
			$affiliateid = $input['affiliate_id'];
	 		$args = array(
	        'method' => 'GET',
	        'httpversion' => '1.1',
	        'sslverify' => true,
	        'headers' => array(
	          'Authorization' => 'Basic '.base64_encode( USERNAME . ':' . PASSWORD )
	        )
	    );
	    $url    = F1_API . '/wordpress/flowershop-getcurrency?affiliate_id=' . $affiliateid;
	    $api_response =	wp_remote_request( $url, $args );
	    $api_response_body = json_decode( wp_remote_retrieve_body( $api_response ), true );

			$valid['affiliate_id'] = (!array_key_exists('errors', $api_response_body)) ? $input['affiliate_id'] : '0';
			$valid['currency'] = (array_key_exists('CURRENCY', $api_response_body)) ? $api_response_body['CURRENCY'] : 'u';

			//update analytics table in case affiliate_id is changed
			$args = array(
        'method' => 'PUT',
        'httpversion' => '1.1',
        'sslverify' => true,
        'headers' => array(
          'Authorization' => 'Basic '.base64_encode( USERNAME . ':' . PASSWORD ),
          'Content-Length' => 0
        )
      );

			$flower_storefront_id = $input['flower_storefront_id'];

			$url    = F1_API . '/wordpress/flowershop-analytics-new?flower_storefront_id=' . $flower_storefront_id . '&affiliate_id=' . $valid['affiliate_id'] .'&version=' . $this->version . '&last_update_action=options updated';
 		 	$api_response =	wp_remote_request( $url, $args );

	  	return $valid;
	 }

}
