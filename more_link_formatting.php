<?php
/*
Plugin Name: More Link Formatting
Plugin URI: https://github.com/wam/more-link-formatting
Description: Allows the author to use basic textile-ish formatting in <!-- more --> links.
Version: 0.1
Author: Will Atwood Mitchell
Author URI: http://freepizza.cc/

Currently supports _emphasized_ and _strongly emphasized_ text.

  	Copyright 2010	Will Atwood Mitchell

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	
?>

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