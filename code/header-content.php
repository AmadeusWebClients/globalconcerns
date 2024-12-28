<?php
if (am_var('node') == 'index') {
	echo '<div class="banner banner-' . am_var('node') . '">' .am_var('nl');
	makePLImages('assets/globalconcernsindia-letterhead');
	echo '</div>' . am_var('2br') . am_var('2nl');
}

render_banner();

if (am_var('section') == 'articles') render_section_menu();
if (!am_var('no-assistant') && am_var('node') != 'index') assistant();

function render_banner() {
	$folSite = am_var('path') . '/assets/pages/';
	
	$prefixes = [
		'node' => $folSite . am_var('node'),
		'section' => $folSite . am_var('section'),
		'site' => $folSite . am_var('safeName'),
	];

	foreach($prefixes as $at => $prefix) {
		if (disk_file_exists(SITEPATH . '/' . ($prefix = str_replace(SITEPATH . '/', '', $prefix)) . '.jpg')) {
			//TODO: Add PH & move to framework and have blur_banners understood by it
			$blur = in_array(basename($prefix), am_var_or('blur_banners', []))
				? 'filter: blur(3px); -webkit-filter: blur(3px); ' : '';
			?>
			<div class="banner banner-<?php echo $at; ?> bg-image"
				style="background-image: url('<?php echo am_var('url') . $prefix;?>.jpg'); <?php echo $blur;?>background-position: center; height: 400px;">
				<?php echo '<!-- RENDERING banner images at: ' . $prefix . ' -->' . am_var('nl'); ?>
			</div>
		<?php
			break;
		}
	}
}

//TODO: MEDIUM: move to framework/menu.php
function render_section_menu() {
	$folRelative = am_var('section') . '/' . am_var('node') . '/';
	if (!am_var('section') || !disk_is_dir(am_var('path') . '/' . $folRelative)) return;

	echo '<section id="header-menu" class="amadeus-feature">';
	$collapsible = am_var('large-menu') || am_sub_var('node-vars', 'large-menu')
		? ' class="collapsible-ul"' : '';
	echo '<h1' . $collapsible . '><small>SITE:</small> <a href="' . am_var('url') . am_var('node') .'/">"<u>' . humanize(am_var('node')) . '</u>"</a></h1>';

	if ($byline = am_sub_var('node-vars', 'byline'))
		echo '<h3>' . renderMarkdown($byline, ['strip-paragraph-tag' => true]) . '</h3><hr />';

	am_var('folRelative', $folRelative);
	am_var('pathAbsolute', am_var('path') . '/' . $folRelative);
	am_var('collapsible', $collapsible);

	$files = get_menu_files(am_var('node'));
	if (!$files) $files = am_sub_var('node-vars', 'files');

	menu('/' . $folRelative, [
		'exclude-files' => ['home', 'assets', 'data', 'articles', 'images', 'engage', 'blurbs', 'code'],
		'blog-heading' => contains(am_var('section'), 'blog'),
		'parent-slug' => am_var('node') . '/',
		'files' => $files,
		'breaks' => am_sub_var('node-vars', 'menu-breaks'),
		'reorderItems' => function ($files) {
			if (!am_var('all-folders-are-subsites')) return $files;
			$opFiles = []; $opFols = [];
			foreach ($files as $file) {
				if ($file[0] == '.' || $file[0] == '_' || $file == 'home.md') continue;
				$isFol = disk_is_dir(am_var('pathAbsolute') . $file . '/');
				if ($isFol) $opFols[] = $file; else $opFiles[] = $file;
			}
			return array_merge($opFiles, $opFols);
		},
		'innerHtml' => function($file, $params) {
			$link = makeLink(humanize($file), $params['link'], false);

			$subSite = am_var('section-type') == 'folders-are-subsites';
			$isFol = disk_is_dir(am_var('pathAbsolute') . $file . '/');

			if (!$subSite || !$isFol) return $link;

			$folRelative = am_var('folRelative');
			$collapsible = am_var('collapsible');

			return '<h2' . $collapsible . '>' . $link .'</h2>'
			 . menu('/' . $folRelative . $file, [
				'parent-slug' => am_var('node') . '/' . $file . '/',
				'return' => true,
			]);
		}
	]);

	
	if (disk_is_dir(SITEPATH . '/' . $folRelative . 'articles')) {
		echo '<hr /><h2' . $collapsible . '>Articles</h2>';
		menu('/' . $folRelative . 'articles', [
			'parent-slug' => am_var('node') . '/articles/',
		]);
	}

	echo '</section>';
} //end render_section_menu
