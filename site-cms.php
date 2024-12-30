<?php
am_var('local', $local = startsWith($_SERVER['HTTP_HOST'], 'localhost'));

disk_include_once(SITEPATH . '/code/site-functions.php');

bootstrap([
	'name' => $name = 'Global Concerns India',
	'byline' => 'Transforming every sphere of life, with values',
	'footer-message' => '<marquee><a href="%url%about-us/">&hellip;connecting people to make mindful choices, strengthening relationships in harmony with nature.</a></marquee>',
	'safeName' => 'globalconcernsindia',
	
	'support_page_parameters' => true,
	'version' => [ 'id' => '1.1.3', 'date' => '10 Dec 2024', ],

	'use-parent-slugs' => true,
	'site-home-in-menu' => true,
	'home-link-to-section' => true,
	'use-menu-files' => true,
	//'list-only-folders' => true,
	'sections' => array_merge(['programs', 'articles', 'events', 'resources'], $local || isset($_GET['preview-mode']) ? ['community'] : []),
	'section-groups' => [
		'programs',
		//TODO: MEDIUM: Reg the policy pdfs, lets reacreate them as pages with download as an option
		'our world' => ['articles', 'events'/*, 'resources'*/],
	],
	'scaffold' => $local ? ['updates', 'sitemap'] : ['sitemap'],

	'no-assistant' => false,
	'no-voice-in-assistant' => true,
	'ul-not-ol-in-assistant' => true,
	'autofix-encoding' => true,

	'blur_banners' => ['schooling', 'index', 'christmas-and-new-year'],
	'siteHumanizeReplaces' => [
		'schooling' => 'The Schooling Project',
		'trafficking' => 'Combatting Human Trafficking',
		'creativity centre' => 'Children\'s Creativity Centre',
		'digital literacy' => 'BASIS Ethical Digital Literacy',
		'women' => 'Adaikalam for Women',
		'lifelong learning' => 'Assisted and Lifelong Learning Program',
		'world' => 'GCI World',
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
	'no-updates' => !$local,

	'start_year' => '2005', //NB: confirmed - it's Jan 2005
	'google-analytics' => 'G-8HS3SCXZL2',

	'email' => 'brinda@globalconcernsindia.org',
	'phone' => $phone = '+91.9845133354',
	'phone2' => $phone2 = '+91.9845518138',

	'address' => 'Registered office: 17 Rhenius Street, 5A Sukhi Apartments, Richmond Town, Bengaluru-560 025',
	'address2' => 'Community Office: No.25 & 26, 2nd Cross, LRNagar, opp. NGV, Koramangala, Bengaluru 560 047',

	'upi' => [ 'site' => [ 'id' => 'gcindia1@sbi', 'name' => $name ] ],
	'social' => [
		[ 'type' => 'linkedin', 'link' => 'https://www.linkedin.com/company/global-concerns-india/', 'name' => 'LinkedIn: Global Concerns India Company' ],
		[ 'type' => 'linkedin', 'link' => 'https://www.linkedin.com/in/brinda-adige/', 'name' => 'LinkedIn: Brinda Adige (Founder) @ Global Concerns India' ],
		[ 'type' => 'facebook', 'link' => 'https://www.facebook.com/GlobalConcernsIndia', 'name' => 'facebook: Global Concerns India Page' ],
		[ 'type' => 'facebook', 'link' => 'https://www.facebook.com/GCI.CreativityCentre/', 'name' => 'facebook: GCI\'s Children\'s Creativity Centre Page' ],
		//[ 'type' => 'youtube', 'link' => 'https://www.youtube.com/@GlobalConcernsIndia', 'name' => 'youtube: Global Concerns India Channel' ],
		//TODO: Insta, Newsletter / groups.io
	],

	'url' => $local ? replace_vars('http://localhost%port%/symphony/globalconcerns/', 'port') : 'https://globalconcernsindia.org/',
	'path' => SITEPATH,
]);
