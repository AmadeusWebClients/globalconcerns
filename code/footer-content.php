<?php
$homeUrl = homeUrl();
$logoUrl =  logoUrl();
$logoRel =  logoRel();
?>
<div id="footer-content" class="footer-bgd" style="margin-top: 30px;">
	<div class="container">
		<?php if (!am_var('no-engage')) runCode('engage'); ?>
		<section id="footer-message">
			<h1><?php echo makeLink(am_var('name'), $homeUrl, false); ?></h1>
			<?php renderMarkdown(am_var_or('footer-message', ''), ['strip-paragraph-tag' => true]); ?>
			<hr />
			<p>Contact Us:
			<?php echo implode(am_var('brnl'), [ '',
				makeSpecialLink(am_var('phone'), 'tel, whatsapp', $txt = 'I would like to...'),
				makeSpecialLink(am_var('phone2'), 'tel, whatsapp', $txt),
				makeSpecialLink(am_var('email'), 'email', 'enquiry about ' . am_var('name') . ' - ' . am_var('node')),
				]);
			?>
			<p><?php echo am_var('address'); ?></p>
			<p><?php echo am_var('address2'); ?></p>
			<div class="social-links"><?php foreach(am_var('social') as $item) { ?>
				<a target="_blank" href="<?php echo $item['link']; ?>" title="<?php echo isset($item['name']) ? $item['name'] : $item['type']; ?>" class="<?php echo $item['type']; ?>"><i class="icofont-<?php echo $item['type']; ?>"></i></a><?php } ?>
			</div>
			<hr />
			<a href="<?php echo $homeUrl;?>"><img src="<?php echo am_var('url') . 'assets/globalconcernsindia-header-logo.png?fver=2'; ?>" class="img-fluid img-max-500" alt="<?php echo am_var('name'); ?>" /></a><br />
		</section>
		<?php if (!am_var('no-assistant')) assistant('load'); ?>
		<?php load_amadeus_module('share'); ?>
	</div>
</div>

