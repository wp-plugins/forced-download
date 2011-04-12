<?php
/*
Plugin Name: Forced Download
Plugin URI: http://www.sideways8.com/plugins/forced-download
Description: This forces a download (vs. show up in your browser) for any "a href" that has the class "forced-download".  Works for jpg, pdf, doc, mp3, etc.
Version: 1.0.2
Author: Aaron Reimann
Author URI: http://www.aaronreimann.com
License: GPL3

Copyright 2011 Aaron Reimann aaronr@sideways8.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 3, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action('wp_print_scripts','forced_download_location');

// this function is strictly to pass the location of the plugin so javascript will know where download.php
// therefore javascript will be able to redirect URLS's to download.php
function forced_download_location(){
	if (!is_admin()) {
		echo '<script type="text/javascript">var fdl =  "'. WP_PLUGIN_URL .'/forced-download/";</script>';
	}
}

function init_fd() {
	if (!is_admin()) {
		wp_enqueue_script('jquery.url', WP_PLUGIN_URL . '/forced-download/js/jquery.url.js', array('jquery'));
		wp_enqueue_script( 'forced-download', WP_PLUGIN_URL . '/forced-download/js/forced-download.js', array('jquery'));
	}
}
add_action('init', 'init_fd');

?>
