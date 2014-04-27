<?php
/**
 * SCC Modules settings class
 *
 * This class adds new settings to the Simple Course Creator
 * settings page.
 *
 * It does not use add_settings_section() from WordPress Settings API
 * because it uses the settings section already created by SCC. 
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // No accessing this file directly


class SCC_Modules_Settings {
	
	/**
	 * constructor for SCC_Modules_Settings class
	 */
	public function __construct() {

		// register settings
		add_action( 'admin_init', array( $this, 'register_settings' ), 30, 2 );
	}
	
	/**
	 * register SCC Modules settings
	 */
	public function register_settings() {
		
	}
	
	/**
	 * save options settings
	 *
	 * 
	 */
	public function save_settings( $input ) {
		
	}

}
new SCC_Modules_Settings();