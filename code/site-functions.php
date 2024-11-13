<?php
function site_after_file() {
	if (!in_array(am_var('node'), ['index'])) return;
	section();
	renderSingleLineMarkdown('%appeal-snippet%');
	section('end');
}
