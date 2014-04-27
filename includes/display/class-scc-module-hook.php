<?php
/**
 * SCC_Modules_Hook class
 *
 * This class is responsible for hooking the modules information
 * into Simple Course Creator's post listing on the front-end.
 *
 * It uses SCC's "scc_before_list_item" hook to place the information
 * based on the plugin settings. 
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // No accessing this file directly


class SCC_Modules_Hook {
	
	/**
	 * constructor for SCC_Modules_Hook class
	 */
	public function __construct() {
		
		// load post meta output information
		add_action( 'scc_before_list_item', array( $this, 'after_item_module_info' ) );
	}
	
	/**
	 * output module information above post titles
	 *
	 * The information output in this method is applied to *each*
	 * article listed in the course container.
	 */
	public function after_item_module_info( $post_id ) {
		echo "";
	}
}
new SCC_Modules_Hook();