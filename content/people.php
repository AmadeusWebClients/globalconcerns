<section>
	<?php renderMarkdown(__DIR__ . '/_people.md'); ?>
</section>

<section>
<?php
$sheet = get_sheet('people', false);
$cols = $sheet->columns;
$started = false;
$lastGroup = false;
foreach ($sheet->rows as $item) {
	$group = $item[$cols['group']];
	if ($lastGroup != $group) {
		//if ($lastGroup === false) section('end');
		$safeGroup = urlize($group);
		if ($lastGroup !== false) sectionId($safeGroup);
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
	renderMarkdown(simplify_encoding($item[$cols['about']]));
	echo '</div>';
	section('end');
}
?>
