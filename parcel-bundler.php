<?php
/*
 Plugin Name: Parcel Vue Bundler
 Plugin URI: http://mondaybynoon.com/parcel-bundle-vue-wordpress-plugin/
 Description: Starter WordPress plugin utilizing Parcel to bundle your Vue application
 Version: 0.0.2
 Author: Jonathan Christopher
 Author URI: https://mondaybynoon.com/
 Text Domain: parcelvuebundler
*/
/*  Copyright 2018 Jonathan Christopher (email : jonathan@mondaybynoon.com)
 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.
 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
class ParcelBundler {
	private $version = '0.0.2';
	private $slug = 'parcel-bundler';
	function __construct() {
	}
	function init() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'assets' ) );
	}
	/**
	 * Adds 'Parcel Bundle' entry to the WordPress Admin Menu under Settings
	 */
	function admin_menu() {
		add_options_page(
			__( 'Parcel Bundle', 'parcelbundler' ),
			__( 'Parcel Bundle', 'parcelbundler' ),
			'manage_options',
			$this->slug,
			function () { ?>
				<div id="<?php echo esc_attr( 'parcel-bundler-app' ); ?>"></div>
			<?php }
		);
	}
	/**
	 * Enqueue our Parcel-bundled assets on our settings screen
	 */
	function assets( $hook ) {
		// Only output on this plugin's page
		if ( 'settings_page_' . $this->slug !== $hook ) {
			return;
		}
		$debug = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG === true ) || ( isset( $_GET['script_debug'] ) ) ? '' : '.min';
		wp_enqueue_script(
			$this->slug,
			plugin_dir_url( __FILE__ ) . "/js/dist/bundle${debug}.js",
			array(),
			$this->version,
			true
		);
		wp_enqueue_style(
			$this->slug,
			plugin_dir_url( __FILE__ ) . "/js/dist/bundle${debug}.css",
			array(),
			$this->version
		);
	}
}
// Kickoff!
$parcel_bundler = new ParcelBundler();
$parcel_bundler->init();