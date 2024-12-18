<section>
	<?php renderMarkdown(__DIR__ . '/_people.md'); ?>
</section>

<?php
$sheet = get_sheet('people', false);

$cols = $sheet->columns;
$started = false;
$lastGroup = false;

$urlBase = am_var('url') . 'assets/people/';
$folBase = SITEPATH . '/assets/people/';

foreach ($sheet->rows as $item) {
	$group = $item[$cols['group']];
	if ($lastGroup != $group) {
		$safeGroup = urlize($group);
		sectionId($safeGroup);
		echo '<a name="' . $safeGroup . '"></a>';
		echo '<h1>' . $group . '</h1>';
		section('end');
	}
	$lastGroup = $group;

	$name = $item[$cols['name']];
	sectionId($safeName = urlize($name));
	echo '<a name="' . $safeName . '"></a>';
	echo '<h2>' . $name . '</h2>';
	echo '<div>';

	if (disk_file_exists($folBase . $safeName . '.jpg'))
		echo replaceItems('<img class="bordered-image img-right img-max-300" src="%src%" alt="%name" />', ['src' => $urlBase . $safeName . '.jpg', 'name' => $name], '%') . am_var('2nl');

	$about = simplify_encoding($item[$cols['about']]);
	$about = str_replace('|', '<br />', $about);
	renderMarkdown($about);
	echo '</div>';
	section('end');
}
