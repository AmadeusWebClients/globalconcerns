<?php
//from: https://docs.google.com/document/d/1W_beNbvl3y1aLc0g_DGyQztkeT-NbcLWvfyhVdlaeuw/edit?usp=drive_link - 24/25th Jan
$sections = [
	'introduction',
	'schooling',
	'assisted-learning-program',
	'the-impact-of-resilience',
	'empowerment-of-women',
	'in-closing',
];

$fol = SITEPATH . '/content/' . am_var('node') . '/';
foreach ($sections as $name) {
	section();
	h2(humanize($name));

	echo replaceItems('<img class="float-md-right img-max-200"'
		. ' src="%url%content/invitation/%name%.jpg" alt="%alt%" />' . am_var('nl'),
			['url' => am_var('url'), 'name' => $name, 'alt' => humanize($name)], '%');

	renderAny($fol . $name . '.md');
	section('end');
}
