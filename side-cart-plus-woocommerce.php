<?php
/**
* Plugin Name: side cart plus for woocommerce
* Description: This plugin allows you to Create Sidebar cart in WooCommerce.
* Version: 1.0
* Author: ABS creative
* License: A "GNUGPLv3" license name 
*/



/*
	Include and define all file type
*/


if (!defined('ABSPATH')) {
  die('-1');
}
if (!defined('SIWSCP_PLUGIN_NAME')) {
  define('SIWSCP_PLUGIN_NAME', 'Woocommerce side cart plus');
}
if (!defined('SIWSCP_PLUGIN_VERSION')) {
  define('SIWSCP_PLUGIN_VERSION', '2.0.0');
}
if (!defined('SIWSCP_PLUGIN_FILE')) {
  define('SIWSCP_PLUGIN_FILE', __FILE__);
}
if (!defined('SIWSCP_PLUGIN_DIR')) {
  define('SIWSCP_PLUGIN_DIR',plugins_url('', __FILE__));
}
if (!defined('SIWSCP_BASE_NAME')) {
    define('SIWSCP_BASE_NAME', plugin_basename(SIWSCP_PLUGIN_FILE));
}
if (!defined('SIWSCP_DOMAIN')) {
  define('SIWSCP_DOMAIN', 'siwscp');
}


/*
	Globals
*/ 

global $wpdb;


if (!class_exists('SIWSCP')) {

  	class SIWSCP {

    	protected static $SIWSCP_instance;

    
    	function __construct() {

        	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

        	add_action('admin_init', array($this, 'SIWSCP_check_plugin_state'));
      }

      	


      function SIWSCP_file_includes() {

      	//siwscp-admin-side add file

	    	include_once('class-option/siwscp-admin-side.php');

	    	//siwscp-front-side add file

	    	include_once('class-option/siwscp-front-side.php');

        //siwscp-front-side add file

        include_once('class-option/siwscp-option.php');


        //icon file

        include_once('class-option/siwscp_icon_file.php');

          //inline css

         include_once('class-option/siwscp-inline.php');
       

        
	    }



  		/*
  			Activation/Deactivation Woocommerce
        
  		*/





      function SIWSCP_check_plugin_state(){

      		if ( ! ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) ) {

        		set_transient( get_current_user_id() . 'wfcerror', 'message' );

      		}

    	}



      /*
       Front Script and style
        
      */


      function  SIWSCP_load_script_style(){
        global $SIWSCP_option;

        wp_enqueue_script('jquery', false, array(), false, false);

        wp_enqueue_script( 'owlcarousel', SIWSCP_PLUGIN_DIR . '/owlcarousel/owl.carousel.js', false, '1.0.0' );

        wp_enqueue_style( 'owlcarousel-min', SIWSCP_PLUGIN_DIR . '/owlcarousel/assets/owl.carousel.min.css',false,'1.0.0' );
        
        wp_enqueue_style( 'owlcarousel-theme', SIWSCP_PLUGIN_DIR . '/owlcarousel/assets/owl.theme.default.min.css', false, '1.0.0' );
        wp_enqueue_script( 'siwscp-front-script', SIWSCP_PLUGIN_DIR . '/assest/js/siwscp-front.js', false, '1.0.0' );

        wp_enqueue_style( 'siwscp-front-style', SIWSCP_PLUGIN_DIR . '/assest/css/style.css', false, '1.0.0' );

        wp_localize_script( 'siwscp-front-script', 'ajax_postajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

        wp_enqueue_script( 'jquery-effects-core' );


        wp_localize_script('siwscp-front-script', 'siwscpData', array(
          'siwscp_sidecart_width' => $SIWSCP_option[ 'siwscp_sidecart_width'].'px',
          'siwscp_auto_open' => $SIWSCP_option['siwscp_auto_open'],
          'siwscp_cart_open_from'=>$SIWSCP_option['siwscp_cart_open_from'],
          'siwscp_trigger_class' => $SIWSCP_option['siwscp_trigger_class'],
      ));
        
      }




       /*
       Admin Script and style
        
      */



      function SCFW_load_admin_script_style() {
          wp_enqueue_style( 'wp-color-picker' );
        
          wp_enqueue_style( 'siwscp-back-style', SIWSCP_PLUGIN_DIR . '/assest/css/back.css', false, '1.0.0' );

          wp_enqueue_script( 'siwscp-back-script', SIWSCP_PLUGIN_DIR . '/assest/js/siwscp-back.js', array( 'jquery', 'select2') );

          wp_enqueue_script( 'wp-color-picker-alpha', SIWSCP_PLUGIN_DIR . '/assest/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '1.0.0', true );

          wp_localize_script( 'ajaxloadpost', 'ajax_postajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

           wp_enqueue_style( 'woocommerce_admin_styles',WP_PLUGIN_URL . '/woocommerce/assets/css/admin.css', array(), '1.0' );
          
      }


       /*
       Admin Script and error
        
      */



    	function SIWSCP_error_notice() {



        	if ( get_transient( get_current_user_id() . 'wfcerror' ) ) {

          		deactivate_plugins( plugin_basename( __FILE__ ) );

          		delete_transient( get_current_user_id() . 'wfcerror' );

          		echo '<div class="error"><p> This plugin is deactivated because it require <a href="plugin-install.php?tab=search&s=woocommerce">WooCommerce</a> plugin installed and activated.</p></div>';
        	}


    	}


     /*
       Admin Init main File
        
      */



	    function SIWSCP_main() {

	    	add_action( 'admin_notices', array($this, 'SIWSCP_error_notice'));

        add_action( 'wp_enqueue_scripts',  array($this, 'SIWSCP_load_script_style'));

        add_action( 'admin_enqueue_scripts', array($this, 'SCFW_load_admin_script_style'));
	      	
	      
		}






	    public static function SIWSCP_instance() {

	      	if (!isset(self::$SIWSCP_instance)) {

	        	self::$SIWSCP_instance = new self();

	        	self::$SIWSCP_instance->SIWSCP_main();

	        	self::$SIWSCP_instance->SIWSCP_file_includes();
	      	}

	      	return self::$SIWSCP_instance;

		 }

	
}
 add_action('plugins_loaded', array('SIWSCP', 'SIWSCP_instance'));
}

?>