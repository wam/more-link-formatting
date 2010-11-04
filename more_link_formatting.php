<?php
/*
Plugin Name: More Link Formatting
Plugin URI: http://freepizza.cc/
Description: Allows the author to use basic markdown/textile-ish formatting in <!-- more --> links.
Version: 0.1
Author: Will Atwood Mitchell
Author URI: http://freepizza.cc/

Currently supports _emphasized_ and _strongly emphasized_ text.

*/

function wam_more_link_formatting($more_link, $more_link_text)
{
	$substitutions = array(
		'/\*(.*?)\*/' => '<strong>$1</strong>',
		'/_(.*?)_/' => '<em>$1</em>',
	);
	
	$new_more_link_text = preg_replace(array_keys($substitutions), array_values($substitutions), $more_link_text);
	return str_replace($more_link_text, $new_more_link_text, $more_link);
}

add_filter('the_content_more_link', 'wam_more_link_formatting', 10, 2);

?>