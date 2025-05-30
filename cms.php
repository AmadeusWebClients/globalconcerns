<?php
$name = 'Global Concerns India';

variables([
	'site-home-in-menu' => true,
	'home-link-to-section' => true,
	//TODO: resources - 'sections' => ['programs', 'articles'], //TODO: Later - 'events', 'resources', 'community',

	'autofix-encoding' => true,
	'sub-theme' => variable('node') == 'schooling' && false ? 'kindergarten' : 'nonprofit',
	'no-network-in-footer' => true,
	'no-page-menu' => true, //TODO: HIGH: Sansera & Sigma -> ASAP! along with SEO

	/*
	'theme-color' => '22B9FE',
	*/

	'google-analytics' => 'G-8HS3SCXZL2',

	'email' => 'brinda@globalconcernsindia.org',
	'phone' => $phone = '+91.9845133354',
	'phone2' => $phone2 = '+91.9845518138',

	'address' => 'Registered office: 17 Rhenius Street, 5A Sukhi Apartments, Richmond Town, Bengaluru-560 025',
	'address2' => 'Community Office: No.25 & 26, 2nd Cross, LRNagar, opp. NGV, Koramangala, Bengaluru 560 047',

	'upi' => [ 'site' => [ 'id' => 'gcindia1@sbi', 'name' => str_replace(' ', '+', $name) ] ],
	'social' => [
		[ 'type' => 'linkedin', 'url' => 'https://www.linkedin.com/company/global-concerns-india/', 'name' => 'GCI LinkedIn' ],
		[ 'type' => 'linkedin', 'url' => 'https://www.linkedin.com/in/brinda-adige/', 'name' => 'Brinda Adige, Founder GCI' ],
		[ 'type' => 'facebook', 'url' => 'https://www.facebook.com/GlobalConcernsIndia', 'name' => 'GCI Facebook' ],
		[ 'type' => 'facebook', 'url' => 'https://www.facebook.com/GCI.CreativityCentre/', 'name' => 'GCI\'s Children\'s Creativity Centre' ],
		//[ 'type' => 'youtube', 'url' => 'https://www.youtube.com/@GlobalConcernsIndia', 'name' => 'youtube: Global Concerns India Channel' ],
		//TODO: Insta, Newsletter / groups.io
	],
]);

addStyle('site-forv8', 'site-static');

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
