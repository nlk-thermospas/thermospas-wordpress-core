<?php
/*
Plugin Name: Gravity Forms: Remove required and add optional string to increase form submits
Plugin URI: http://onlineboswachters.nl
Description: Remove * for required fields and add (optional) to optional fields. This will increase submits on your form and thus conversion.
Version: 0.2
Author: Online Boswachters
Author URI: http://onlineboswachters.nl
*/

/* Copyright 2014 Online Boswachters (email : info@onlineboswachters.nl) */

$pluginurl = plugin_dir_url(__FILE__);	
define( 'gfreq_FRONT_URL', $pluginurl );
define( 'gfreq_URL', plugin_dir_url(__FILE__) );
define( 'gfreq_PATH', plugin_dir_path(__FILE__) );
define( 'gfreq_BASENAME', plugin_basename( __FILE__ ) );
define( 'gfreq_VERSION', '0.2' );

class gfreq {
	
	function __construct() {
		if (!$this->is_gravityforms_installed()) return;
		
		$this->get_options();
		//TODO: set textdomain languages
		//If GF is going to add this, dont load plugin
		
		if (is_admin()) :
			$this->add_admin_includes();
			add_action( 'admin_init', array( $this, 'options_init' ) );
			add_filter( 'gform_addon_navigation', array( $this,'gform_addon_navigation'));
		else :
			add_filter( "gform_field_content", array( $this, 'gfreq_replacer' ), 10, 5);
			add_filter( "gform_field_css_class", array( $this, 'gform_field_css_class' ), 10, 3);
		endif;
		
	}
	
	/* OPTIONS */
	
	/**
	 * Register the options needed for this plugins configuration pages.
	 */
	function options_init() {
		register_setting( 'gfreq_settings', 'gfreq_settings' );
	}
	
	/**
	 * Retrieve an option for the configuration page.
	 */
	function get_option($key = '') {
		if (!empty($this->options) && isset($this->options[$key])) {
			if (is_array($this->options)) :
				return $this->options[$key];
			else :
				return stripslashes($this->options[$key]);
			endif;
		}
		return false;
	}
	/**
	 * Retrieve all options for the configuration page from WP Options.
	 */
	function get_options() {
		if (isset($this->options)) return $this->options;
		if ($options = get_option('gfreq_settings')) {
			if (is_array($options)) :
				$this->options = $options;
			else :
				$this->options = unserialize($options);	
			endif;
		}
	}
	
	/**
	 * Save all options to WP Options database
	 */
	function save_options() {
		if (!empty($this->options)) {
			update_option('gfreq_settings', serialize($this->options));	
		}
	}
	
	/**
	 * Save a specifix option to WP Option database
	 */
	function save_option($key, $value, $save_to_db = false) {
		if (!empty($this->options)) {
			$this->options[$key] = $value;
		}
		if ($save_to_db == true) {
			$this->save_options();	
		}
	}
	
	/* INCLUDES */
	
	/**
	 * Include specific PHP files when visiting an admin page
	 */
	function add_admin_includes() {
		$includes = array('plugin-admin'); //add includes here that are in the includes fodler, without the .php
		$this->add_includes($includes);
	}
	
	/**
	 * Include specific PHP files when visiting a page on the website
	 */
	function add_includes($includes_new = array()) {
		$includes = array(); //add includes here that are in the includes fodler, without the .php
		if (is_array($includes_new)) $includes = $includes_new;
		if (!count($includes)) return false;
		foreach ($includes as $_include) :		
			$path = gfreq_PATH.'includes/'.$_include.'.php';
			if (!file_exists($path)) continue;
			include_once($path);
		endforeach;
	}
	
	/* HELPERS */
	function enqueue_scripts() {
		
	}	

    /*
     * Check if GF is installed
     */
    private function is_gravityforms_installed(){
        return class_exists( 'RGForms' );
    }

    /*
     * Do a GF version compare
     */
    private function check_gravityforms_version($version, $operator){
        if(class_exists('GFCommon')){
            return version_compare( GFCommon::$version, $version, $operator );
        }
        return false;
    }
	
	function gform_field_css_class($class, $field, $form) {
		if ($field['isRequired']) {
			$class = str_replace('gfield_contains_required','',$class);
		} else {
			$class .= ' gfield_contains_optional';
		}
		return $class;
	}
	
	function gfreq_replacer($content, $field, $value, $lead_id, $form_id) {
		
		//var_dump($field);
		//var_dump($content);
		
		if ($field['isRequired']) {
			$content = str_replace('<span class=\'gfield_required\'>*</span>','', $content);
		} else {
			
			if ($field['label'] == '') return $content;
			$content = str_replace('</label></li>','{{label_list}}', $content);
			
			$str_optional = __('optional','gfreq');
			$setting_str_optional = $this->get_option('str_optional');
			if ($setting_str_optional) :
				$str_optional = $setting_str_optional;
			endif;
			
			//$content = str_replace('</label>',' <span class="gfield_optional">(' .$str_optional.')</span></label>', $content);
			
			$content = str_replace('{{label_list}}', '</label></li>', $content);
			
		}
		return $content;
		
	}
	
	/* ADMIN */
	
	/**
	 * Add this plugin to the Gravity Forms menu in the WP Admin
	 */
	function gform_addon_navigation($menu_items){
   		$menu_items[] = array("name" => "gfreq_settings", "label" => "Required/Optional", "callback" => array( $this, 'gfreq_settings' ), "permission" => "edit_posts");
    	return $menu_items;
	}
	
	/**
	 * The settings page where you can edit the options of this plugin
	 */
	function gfreq_settings() {
		
		global $table_prefix;
		global $plugin_admin;
		
		$plugin_admin->admin_header(true, 'gfreq_settings', 'gfreq_settings');
		
		//echo '<p></p>';
		
		echo $plugin_admin->textinput('str_optional',__('Your custom string you want to add after optional field labels'));
		
		//$plugin_admin->postbox( 'gfreq_settings', __( 'Your App Links', 'gfreq' ), $content );
		
		
		$plugin_admin->admin_footer();
	}

}
$gfreq = new gfreq();
?>