<?php
function site_before_file() {
	if (!in_array($at = am_var('node'), am_var_or('default-banners-at', []))) return;
	echo '<div class="banner banner-' . $at . '">';
	makePLImages('assets/pages/' . am_var('safeName'));
	echo '</div>' . am_var('br');
}

function site_after_file() {
	return; //TODO: MED: revisit after changing the images asap!
	if (!in_array(am_var('node'), ['index'])) return;
	section();
	renderSingleLineMarkdown('%appeal-snippet%');
	section('end');
}
