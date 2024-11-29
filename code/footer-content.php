<?php
$homeUrl = homeUrl();
$logoUrl =  logoUrl();
$logoRel =  logoRel();
?>
<div id="footer-content" class="footer-bgd" style="margin-top: 30px;">
	<div class="container">
		<?php if (!am_var('no-engage')) runCode('engage'); ?>
		<section id="footer-message">
			<a href="<?php echo $homeUrl;?>"><img src="<?php echo am_var('url') . 'assets/globalconcernsindia-header-logo.png'; ?>" class="img-fluid img-max-500" alt="<?php echo am_var('name'); ?>" /></a><br />
			<u><?php echo am_var('name'); ?></u> &mdash;
			<?php renderMarkdown(am_var_or('footer-message', ''), ['strip-paragraph-tag' => true]); ?>
			<hr />
			<div class="social-links"><?php foreach(am_var('social') as $item) { ?>
				<a target="_blank" href="<?php echo $item['link']; ?>" title="<?php echo isset($item['name']) ? $item['name'] : $item['type']; ?>" class="<?php echo $item['type']; ?>"><i class="icofont-<?php echo $item['type']; ?>"></i></a><?php } ?>
			</div>
		</section>
		<?php load_amadeus_module('share'); ?>
	</div>
</div>
