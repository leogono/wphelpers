<?php

//adding shortcode
function font_bold( $attr, $content = null ) {
  return '<span style="font-weight: bold">' . do_shortcode($content) . '</span>';
}
add_shortcode('bold', 'font_bold');

//add shortcode with attribs
function button_s($atts, $content = null) {
	extract(shortcode_atts(array(
        "color" => 'blue',
		"size" => 'large',
		"url" => '#'
	), $atts));
	return '<span class="button"><a class="'.$color.'" href="'.$url.'">' . do_shortcode($content) . '</a></span>';
}
add_shortcode('button', 'button_s');

//add shortcode in a template
echo do_shortcode('[shortcode option1="value1" option2="value2"]');