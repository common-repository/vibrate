<?php
/*Plugin Name: vibrate
Plugin URI: https://profiles.wordpress.org/pranavpathakjaora/
Description: The vibrate plugin helps you to vibrate mobile user's screen with cusotmized popup.
Author: Pranav Pathak
Version: 1.0
Author URI: https://profiles.wordpress.org/pranavpathakjaora/
*/

/**  Copyright 2016  Pranav Pathak  (email : pranavpathak125@gmail.com)
 *
 *    This program is free software; you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License, version 2, as 
 *    published by the Free Software Foundation.
 *
 *    This program is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with this program; if not, write to the Free Software
 *    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
 // Not a WordPress context? Stop.
! defined( 'ABSPATH' ) and exit;

//Require the code to the rest of the plugin
require plugin_dir_path( __FILE__ ) . 'functions/vibrate-functions.php';
$wc_vibrate = new wc_vibrate();

add_action( 'wp_enqueue_scripts', array($wc_vibrate,'call_vibrate' ), $in_footer = true ); 

add_action('wp_footer', array($wc_vibrate,'call_html_function'));
define( 'PLUGIN_DIR_VIBRATE', plugin_dir_url(__FILE__) );
