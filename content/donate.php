<section>
<?php
$sheet = get_sheet('donate', false);
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

		$items[] = 'Rs ' . ($amount == '0' ? '_' : $amount) . ' for <b>'
			. item_r('what', $item, true) . '</b> &mdash; '
			. implode(' / ', $itemLinks);
	}
}

$amounts = '<ol><li>' . implode('</li><li>', $items) . '</li></ol>';

renderMarkdown(__DIR__ . '/_donate.md', ['replaces' => [
	'razorpay-links' => 'Make a payment with one of these:' . $amounts,
	]
]);
?>
</section>
