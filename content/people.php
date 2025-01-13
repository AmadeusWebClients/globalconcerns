<?php
$page = am_var('node');
$sheet = get_sheet($page, false);

$cols = $sheet->columns;
$started = false;
$lastGroup = false;

$urlBase = am_var('url') . 'assets/' . $page . '/';
$folBase = SITEPATH . '/assets/' . $page . '/';
$aboutBase = SITEPATH . '/content/' . $page . '/';

foreach ($sheet->rows as $item) {
	$name = $item[$cols['name']];
	if (!$name) continue;

	$group = $item[$cols['group']];
	if ($lastGroup != $group) {
		$safeGroup = urlize($group);
		sectionId($safeGroup);
		echo '<a name="' . $safeGroup . '"></a>';
		echo '<h1 style="text-align: center;">' . $group . '</h1>';
		section('end');
	}
	$lastGroup = $group;

	sectionId($safeName = urlize($name));
	echo '<a name="' . $safeName . '"></a>';
	echo '<h2>' . $name . '</h2>';
	echo '<div>';

	if (disk_file_exists($folBase . $safeName . '.jpg'))
		echo replaceItems('<img class="bordered-image img-right img-max-300" src="%src%?fver=3" alt="%name" />', [
			'src' => $urlBase . $safeName . '.jpg',
			'name' => $name], '%') . am_var('2nl');
	//else if (am_var('local')) echo $safeName;

	if ($item[$cols['role']])
		echo '	<h4><i>' . $item[$cols['role']] . '</i></h4>' . am_var('nl');

	$about = $aboutBase . $safeName . '.md';
	if (disk_file_exists($about))
		renderMarkdown($about);
	//else if (am_var('local')) echo $about;

	echo '</div>';
	section('end');
}

