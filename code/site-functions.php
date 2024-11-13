<?php
function site_after_file() {
	if (am_var('local')) seo_info();
	if (!in_array(am_var('node'), ['index'])) return;
	section();
	renderSingleLineMarkdown('%appeal-snippet%');
	section('end');
}
