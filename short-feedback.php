<?php
/*
	Plugin Name: Short Feedback
	Description: Add a feedback section to your buddypress post/page
	Author: Prathik Rajendran M
	Version: 1.0
*/

function short_feedback($atts) {
	extract(shortcode_atts(array( 'file' => 'default.xml'), $atts));
	global $bp;
	if(!$bp->loggedin_user->id == 0) :
	$content	=	'<form action = "/wp-content/plugins/short-feedback/get-feedback.php?f='.$file.'" method = "POST">';
	$content	.=	'<input name = "name" type = "hidden" value = "'.$bp->loggedin_user->fullname.'" />';
	$content	.=	'<textarea name = "content"></textarea>';
	$content	.=	'<p>&nbsp;</p>';
	$content	.=	'<input style = "width: 40%" name = "url" type = "text" placeholder = "Url if required..." />';
	$content	.=	'<p>&nbsp;</p>';
	$content	.=	'<input type = "submit" value = "Send Feedback!"/>';
	$content	.=	'</form>';
	return $content;
	else:
		return "<h2>Please login to give a feedback.</h2>";
	endif;
}
add_shortcode('feedback', 'short_feedback');

function see_feedback() {
	$file	=	'default.xml';
	$path	=	ABSPATH."wp-content/plugins/short-feedback/".$file;
	if(!file_exists($path)) {
		echo "No feedback";
		return;
	}
	
	$feedback	=	simplexml_load_file($path);
	echo '<div class = "wrap">';
	echo '<div id="icon-tools" class="icon32"></div>';
	echo '<h2>Feedbacks</h2>';
	echo '<p>Super awesome way to track bugs and feedbacks</p>';
	echo '<br class = "clear" />';
	echo '<table class = "widefat fixed">';
	echo '<thead><tr><th>Name</th><th>Content</th><th>Url</th><th>Resolution Status</th><th>Mark the status</th></tr></thead>';
	echo '<tfoot><tr><th>Name</th><th>Content</th><th>Url</th><th>Resolution Status</th><th>Mark the status</th></tr></tfoot><tbody>';
	foreach($feedback->data as $data) {	
		echo '<tr>';
		echo '<td>'.$data->from.'</td>'.'<td>'.$data->content.'</td>';
		echo '<td>'.$data->url.'</td>';
		echo '<td>Under Construction</td>';
		echo '<td>Under Construction</td>';
		echo '</tr>';
	}
	echo '</tbody></table>';
	echo '</div>';
}

add_filter('admin_menu', 'feedback_display');

function feedback_display() {
	add_menu_page('Feedbacks', 'Feedbacks', 'edit_plugins', 'feedback', 'see_feedback',plugin_dir_url(__FILE__)."icon.png",'21.1');
}
?>
