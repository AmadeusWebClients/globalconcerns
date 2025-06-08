<?php
$name = 'Global Concerns India';

variables([
	'site-home-in-menu' => true,
	'home-link-to-section' => true,
	//TODO: resources - 'sections' => ['programs', 'articles'], //TODO: Later - 'events', 'resources', 'community',

	'autofix-encoding' => true,
	'sub-theme' => variable('node') == 'schooling' ? 'kindergarten' : 'nonprofit',

	/*
	'theme-color' => '22B9FE',
	*/
	'footer-variation' => 'two-headings',
	'footer-introduction' => 'GCI is a community-based organization dedicated to empowering vulnerable communities, especially urban and rural poor and other marginalized groups, across Bengaluru, Kolar, and Chikkaballapur.',

	'google-analytics' => 'G-8HS3SCXZL2',

	'email' => 'brinda@globalconcernsindia.org',
	'phone' => $phone = '+91.9845133354', $callee = 'Narayan',
	'phone2' => $phone2 = '+91.9845518138', //$callee = 'Brinda',
	'whatsapp' => $phone, 'whatsapp-info' => ' (' . $callee . ')',

	'address' => '<a>Registered office</a>: 17 Rhenius Street, 5A Sukhi Apartments, Richmond Town, Bengaluru-560 025',
	'address-url' => 'https://g.co/kgs/jRVUHEg',
	'address2' => '<a>Community Office</a>: No.25 & 26, 2nd Cross, LRNagar, opp. NGV, Koramangala, Bengaluru 560 047',
	'address2-url' => 'https://maps.app.goo.gl/XRg1XgStds1Rx3sX7', //TODO: set this in google maps

	'upi' => [ 'site' => [ 'id' => 'gcindia1@sbi', 'name' => str_replace(' ', '+', $name) ] ],
	'social' => [
		[ 'type' => 'linkedin', 'url' => 'https://www.linkedin.com/company/global-concerns-india/', 'name' => 'LinkedIn' ],
		[ 'type' => 'brinda-adige-icon png-icon', 'url' => 'https://www.linkedin.com/in/brinda-adige/', 'name' => 'Brinda on LI' ],
		[ 'type' => 'facebook', 'url' => 'https://www.facebook.com/GlobalConcernsIndia', 'name' => 'Facebook' ],
		[ 'type' => 'centre-icon png-icon', 'url' => 'https://www.facebook.com/GCI.CreativityCentre/', 'name' => 'Centre on FB' ],
		//[ 'type' => 'youtube', 'url' => 'https://www.youtube.com/@GlobalConcernsIndia', 'name' => 'youtube: Global Concerns India Channel' ],
		//TODO: Insta, Newsletter / groups.io
	],
]);

addStyle('site-forv8', SITEASSETS);

function enrichThemeVars($vars, $what) {
	if ($what == 'footer-widgets') {
		$vars['footer-logo'] = $vars['footer-logo'] . '<hr />' . variable('footer-introduction');
		$vars['footer-message'] = $vars['footer-message'] . '<hr />' . getCodeSnippet('random-quote');
	}

	if ($what == 'header' && variable('sub-theme') == 'kindergarten')
		if (!getPageParameterAt(1))
			$vars['optional-slider'] = getSnippet('kindergarten-hero');

	return $vars;
}

function site_before_file() {
	if (!in_array($at = variable('node'), am_var_or('default-banners-at', []))) return;
	echo '<div class="banner banner-' . $at . '">';
	makePLImages('assets/pages/' . variable('safeName'));
	echo '</div>' . variable('br');
}

function site_after_file() {
	return; //TODO: MED: revisit after changing the images asap!
	if (!in_array(variable('node'), ['index'])) return;
	section();
	renderSingleLineMarkdown('%appeal-snippet%');
	section('end');
}

function before_footer_assets() {
	echo getThemeSnippet('floating-button');
}
