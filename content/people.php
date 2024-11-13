<section>
	<h2>People</h2>
	No goal can be achieved without the right people... <!--TODO: review-->
	<?php render_subsites_menu(['people'], false); ?>
</section>

<section>
<?php
$page = am_var('page_parameter1') ? am_var('page_parameter1') : '_home';
renderAny(SITEPATH . '/content/people/' . $page . '.md');
?>
</section>

