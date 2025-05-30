<?php
$homeUrl = homeUrl();
$logoUrl =  logoUrl();
$logoRel =  logoRel();
?>
<div id="footer-content" class="footer-bgd" style="margin-top: 30px;">
	<div class="container">
		<section id="footer-message">
			<h1><?php echo makeLink(variable('name'), $homeUrl, false); ?></h1>
			<?php renderMarkdown(am_var_or('footer-message', ''), ['strip-paragraph-tag' => true]); ?>
			<hr />
			<p>Contact Us:
			<?php echo implode(variable('brnl'), [ '',
				makeSpecialLink(variable('phone'), 'tel, whatsapp', $txt = 'I would like to...'),
				makeSpecialLink(variable('phone2'), 'tel, whatsapp', $txt),
				makeSpecialLink(variable('email'), 'email', 'enquiry about ' . variable('name') . ' - ' . variable('node')),
				]);
			?>
			<p><?php echo variable('address'); ?></p>
			<p><?php echo variable('address2'); ?></p>
			<div class="social-links"><?php foreach(variable('social') as $item) { ?>
				<a target="_blank" href="<?php echo $item['link']; ?>" title="<?php echo isset($item['name']) ? $item['name'] : $item['type']; ?>" class="<?php echo $item['type']; ?>"><i class="icofont-<?php echo $item['type']; ?>"></i></a><?php } ?>
			</div>
			<hr />
			<a href="<?php echo $homeUrl;?>"><img src="<?php echo variable('url') . 'assets/globalconcernsindia-header-logo.png?fver=2'; ?>" class="img-fluid img-max-500" alt="<?php echo variable('name'); ?>" /></a><br />
		</section>
	</div>
</div>
