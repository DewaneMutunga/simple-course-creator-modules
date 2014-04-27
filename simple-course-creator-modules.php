<?php
/**
 * Plugin Name: SCC - Modules
 * Plugin URI: http://buildwpyourself.com/downloads/scc-modules/
 * Description: Organize posts by module within a course
 * Version: 1.0.0
 * Author: Dewane Mutunga
 * Author URI: http://dewanemutunga.com
 * License: GPL2
 * Requires at least: 3.8
 * Tested up to: 3.8
 * Text Domain: sccm
 * Domain Path: /languages/
 * 
 * This plugin is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as 
 * published by the Free Software Foundation.
 * 
 * This plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, see http://www.gnu.org/licenses/.
 *
 * @package Simple Course Creator
 * @category Output
 * @author Dewane Mutunga
 * @license GNU GENERAL PUBLIC LICENSE Version 2 - /license.txt
 */


// No accessing this file directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * primary class for Simple Course Creator Modules
 *
 * @since 1.0.0
 */
 class Simple_Course_Creator_Modules {
	 
	 /**
	 * constructor for Simple_Course_Creator_Modules class
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		
		// define plugin name
		define( 'SCCM_NAME', __( 'Simple Course Creator Modules', 'sccm' ) );

		// define plugin version
		define( 'SCCM_VERSION', '1.0.0' );

		// define plugin directory
		define( 'SCCM_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );

		// define plugin root file
		define( 'SCCM_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );

		// require additional plugin files
		$this->includes();
	}
	
	/**
	 * require additional plugin files
	 *
	 * @since 1.0.0
	 */
	private function includes() {
		require_once( SCCM_DIR . 'includes/display/class-scc-module-hook.php' );		// hooks output class
		require_once( SCCM_DIR . 'includes/admin/class-scc-module-taxonomy.php' );		// setup module taxonomy
		require_once( SCCM_DIR . 'includes/admin/class-scc-module-settings.php' );		// settings class
	}
 }
 new Simple_Course_Creator_Modules();
