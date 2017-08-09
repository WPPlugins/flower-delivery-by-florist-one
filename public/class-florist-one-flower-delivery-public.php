<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.floristone.com
 * @since      1.0.0
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Florist_One_Flower_Delivery
 * @subpackage Florist_One_Flower_Delivery/public
 * @author     floristone
 */
class Florist_One_Flower_Delivery_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.2
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

		wp_enqueue_style( 'jquery-slick-nav', plugin_dir_url( __FILE__ ) . 'css/slicknav.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/florist-one-flower-delivery-public.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'old-browser', plugin_dir_url( __FILE__ ) . 'css/florist-one-flower-delivery-public-old-browser.css', array(), $this->version, 'all' );
		wp_style_add_data( 'old-browser', 'conditional', 'lte IE 9' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( 'jquery-validate', plugin_dir_url( __FILE__ ) . 'js/jquery.validate.js', array( 'jquery' ), $this->version, false);
		wp_enqueue_script( 'jquery-slick-nav', plugin_dir_url( __FILE__ ) . 'js/jquery.slicknav.min.js', array( 'jquery' ), $this->version, false);
		wp_enqueue_script( 'jquery-history', plugin_dir_url( __FILE__ ) . 'js/jquery.history.js', array( 'jquery' ), $this->version, false);
		wp_enqueue_script( 'jquery-resize-sensor', plugin_dir_url( __FILE__ ) . 'js/resizeSensor.js', array( 'jquery' ), $this->version, false);
		wp_enqueue_script( 'jquery-element-queries', plugin_dir_url( __FILE__ ) . 'js/elementQueries.js', array( 'jquery' ), $this->version, false);
    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/florist-one-flower-delivery-public.js', array( 'jquery', 'jquery-history' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234 ) );

	}

}
