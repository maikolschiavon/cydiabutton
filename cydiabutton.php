<?php
/**
 * @package Cydia_Button
 * @version 1.0
 */
/*
Plugin Name: Cydia Button
Plugin URI: https://github.com/maikolschiavon/cydiapreview
Description: Enable Shortcode WP for show box with name, price and link for download tweak jailbreak from cydia
Author: Maikol Schiavon
Version: 1.0
Author URI: https://github.com/maikolschiavon
*/

/*
 * Add this shortcode into your article
   [cydia url="https://" cost="$0.99" name="Tweak Name" style="smallbox"]
*/

function cydia_func( $atts ) {
	$tweak_name = $atts["name"];
	$tweak_cost = $atts["cost"];
	$tweak_url = $atts["url"];

	$open_cydia = "cydia://url/https://cydia.saurik.com/api/share#?source=".$tweak_url;

	$html = cydia_css(); 

	if($atts["style"] == "smallbox"){
		$html .= "<div class='row row-cydia'>
					<div class='col-md-6 col-sm-6 col-xs-6'>
						<h3 class='tweak_name'>$tweak_name</h3>
					</div>
					<div class='col-md-6 col-sm-6 col-xs-6'>
						<a href='$open_cydia' class='btn btn-cydia'>Cydia Download</a>
						<h4 class='cydia'>$tweak_cost</h4>
					</div>
				</div>";

	}
	$a = shortcode_atts( array(
		'foo' => 'something',
		'bar' => 'something else',
	), $atts );

	return $html;
}
add_shortcode( 'cydia', 'cydia_func' );

function cydia_css() {
	
	$css_style = "
	<style type='text/css'>
	.row-cydia{margin: 20px 0;}
	h3.tweak_name{line-height: 20px;}
	h4.cydia{color: #b17457;margin-left: 10px;}
	.btn-cydia {
		border-radius: 20px;
		background: transparent;
		border: 1px solid #b17457;
		color: #b17457;
		text-align:right;
	}
	.btn-cydia:hover{color:#fff;background-color:#b17457;text-align:right;}
	</style>
	";

	return $css_style;
}
?>
