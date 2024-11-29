<?php
am_var('local', $local = startsWith($_SERVER['HTTP_HOST'], 'localhost'));

disk_include_once(SITEPATH . '/code/site-functions.php');

bootstrap([
	'name' => $name = 'Global Concerns India',
	'byline' => 'Transforming every sphere of life',
	'footer-message' => '<marquee><a href="%url%about-us/">Systematically addressing inequality and injustice, and to connect them to making conscious decisions to be in harmony.</a></marquee>',
	'safeName' => 'globalconcernsindia',
	
	'support_page_parameters' => true,
	'version' => [ 'id' => '1.1.3.3', 'date' => '29 Nov 2024', ],

	'use-parent-slugs' => true,
	'home-link-to-section' => true,
	'use-menu-files' => true,
	//'list-only-folders' => true,
	'sections' => ['programs', /*'community',*/ 'resources'],
	'sections-have-files' => true,
	'scaffold' => $local ? ['updates', 'sitemap'] : ['sitemap'],

	'use-menu-files' => true,
	'blur_banners' => ['schooling'],
	'siteHumanizeReplaces' => [
		'schooling' => 'The Schooling Project',
		'trafficking' => 'Combatting Human Trafficking',
		'creativity centre' => 'Children\'s Creativity Centre',
		'digital literacy' => 'BASIS Ethical Digital Literacy',
		'women' => 'Adaikalam for Women',
		'lifelong learning' => 'Assisted and Lifelong Learning Program',
	],

	'folder' => '/content/',
	'page_parameter1_in_title' => true,

	'siteMenuName' => 'GCI Main',
	'abbr' => 'GCI',
	'no-promotions' => true,

	'theme' => 'biz-land',
	'theme-color' => '22B9FE',
	'needs-container' => true,
	'image-in-logo' => '-logo.png',

	//TODO: Use when ready
	'no-engage' => true,
	'no-updates' => true,

	'start_year' => '2005',
	'email' => 'contact@globalconcernsindia.org',
	'phone' => '+91.9845518138',
	'address' => '[address]<br />Bangalore, Tamilnadu',
	'upi' => [ 'site' => [ 'id' => 'gcindia1@sbi', 'name' => $name ] ],
	'social' => [
		[ 'type' => 'linkedin', 'link' => 'https://www.linkedin.com/company/global-concerns-india/', 'name' => 'LinkedIn: Global Concerns India Company' ],
		[ 'type' => 'linkedin', 'link' => 'https://www.linkedin.com/in/brinda-adige/', 'name' => 'LinkedIn: Brinda Adige (Founder) @ Global Concerns India' ],
		[ 'type' => 'facebook', 'link' => 'https://www.facebook.com/pages/GlobalConcernsIndia', 'name' => 'facebook: Global Concerns India Page' ],
		[ 'type' => 'youtube', 'link' => 'https://www.youtube.com/@GlobalConcernsIndia', 'name' => 'youtube: Global Concerns India Channel' ],
		//TODO: Insta, Newsletter / groups.io
	],

	'url' => $local ? replace_vars('http://localhost%port%/symphony/globalconcerns/', 'port') : 'https://globalconcerns.yieldmore.org/',
	'path' => SITEPATH,
]);
