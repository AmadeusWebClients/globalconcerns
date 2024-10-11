<?php
am_var('local', $local = startsWith($_SERVER['HTTP_HOST'], 'localhost'));
//runCode('network');

bootstrap([
	'name' => 'GlobalConcernsIndia.org',
	'byline' => '[byline]',
	'footer-message' => '<marquee>[footer-message]</marquee>',
	'safeName' => 'globalconcernsindia',
	
	'support_page_parameters' => true,
	'version' => [ 'id' => '1', 'date' => '11 Oct 2024', ],

	'use-parent-slugs' => true,
	//'home-link-to-section' => true,
	//'list-only-folders' => true,
	'sections-have-files' => true,

	'folder' => '/content/',
	'support_page_parameters' => true,
	'page_parameter1_in_title' => true,

	'siteMenuName' => 'GCI Main',
	'sections' => ['initiatives'],
	'no-promotions' => true,

	'theme' => 'cv-nonprofit',
	'theme-color' => '22B9FE',
	'image-in-logo' => '-rectangle.jpg',

	'start_year' => '1999',
	'email' => 'contact@globalconcernsindia.org',
	'phone' => '+91.9841223313',
	'address' => '[address]<br />Bangalore, Tamilnadu',
	'social' => [
		[ 'type' => 'facebook', 'link' => 'https://www.facebook.com/pages/GlobalConcernsIndia', 'name' => 'facebook: Anbagam Page' ],
		[ 'type' => 'youtube', 'link' => 'https://www.youtube.com/@GlobalConcernsIndia', 'name' => 'youtube: GlobalConcernsIndia Channel' ],
	],

	'url' => $local ? replace_vars('http://localhost%port%/symphony/globalconcerns/', 'port') : 'https://globalconcerns.yieldmore.org/',
	'path' => SITEPATH,
]);
?>
