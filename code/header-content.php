<?php
render_banner();
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
			$blur = in_array(basename($prefix), am_var_or('blur_banners', []))
				? 'filter: blur(5px); -webkit-filter: blur(3px); ' : '';
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
?>
