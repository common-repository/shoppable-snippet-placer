<?php

/*
Plugin Name: Shopsuite Snippet Wordpress Plugin
Plugin URI: http://shopsuite.com/wordress
Description: A plugin to place the Shopsuite snippets correctly within Wordpress texts (This is the hexadecimal code found in dashboard -> Widgets)
Version: 2.0.4
Author: Shopsuite B.V.
Author URI: http://shopsuite.com/
License: GPLv2 or later
Text Domain: shopsuite, shoppable
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

/**
 * @package Shopsuite
 * @param array $atts
 * @param null $content
 * @param string $tag
 * @return string
 */


function shopsuite_snippet($atts = array(), $content = null, $tag = ''){
	// normalize attribute keys, lowercase
	$atts = array_change_key_case((array)$atts, CASE_LOWER);
	// override default attributes with user attributes
	$defaults = array();
	$defaults['id'] = '1';
	$wporg_atts = shortcode_atts($defaults, $atts, $tag);
	$id = $wporg_atts['id'];

	if( isset( $id ) ){
		return '<div data="shopsuite" data-shopsuite-snippet="'.$id.'"></div><script type="text/javascript" src="https://cdn.shopsuite.com/js/layer.js"></script>';
	}else{
		return '<div data="shopsuite"></div><script type="text/javascript" src="https://cdn.shopsuite.com/js/layer.js"></script>';
	}
}

add_shortcode( 'shopsuite_snippet', 'shopsuite_snippet' );
add_shortcode( 'shoppable_snippet', 'shopsuite_snippet' );
