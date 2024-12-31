<?php
DEFINE('DONATEPATH', SITEPATH . '/data/donate/');

echo getSnippet('callout', DONATEPATH);
section();

$sheet = get_sheet(DONATEPATH . 'amounts.tsv', false);
$items = [];
$broken = false;
$links = [];

foreach ($sheet->rows as $item) {
	if (item_r('what', $item, true) == '----') {
		$broken = true;
	} else if (!$broken) {
		$links[] = makeLink(item_r('what', $item, true), item_r('link', $item, true), false);
	} else {
		$itemLinks = [];
		$amount = item_r('amount', $item, true);

		foreach ($links as $option)
			$itemLinks[] = str_replace('%amount%', $amount, $option);

		$for = item_r('what', $item, true);
		$for = $for[0] == '*' ? ' ' . substr($for, 1) : ' to ' . $for;
		if ($amount == '0') $amount = 'X';
		$items[] = 'Pay Rs ' . $amount . ' ' . implode(' / ', $itemLinks) . $for . '.';
	}
}

$amounts = '<ol>' . am_var('nl') . '	<li>' . implode('</li>' . am_var('nl') . '	<li>', $items) . '</li>' . am_var('nl') . '</ol>';
$amounts = replaceItems($amounts, ['##upi-id' => am_sub_var('upi', 'site')['id']]);

$details = renderMarkdown(DONATEPATH . 'details.md', ['echo' => false]);
$content = renderMarkdown(DONATEPATH . 'content.md', ['echo' => false]);
echo replaceItems($content, [
	'donation-form' => $details,
	'razorpay-links' => $amounts,
], '%');

section('end');

