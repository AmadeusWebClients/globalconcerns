<?php
function site_after_file() {
	return; //TODO: MED: revisit after changing the images asap!
	if (!in_array(am_var('node'), ['index'])) return;
	section();
	renderSingleLineMarkdown('%appeal-snippet%');
	section('end');
}
