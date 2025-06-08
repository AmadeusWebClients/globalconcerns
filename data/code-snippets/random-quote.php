<?php
$sheet = getSheet('quotes', false);
shuffle($sheet->rows);
$item = $sheet->rows[0];
$op = '<h4 class="mb-2">Quote</h4><span class="text-light">' . NEWLINE;
$op .= $item[$sheet->columns['message']] . '<strong>' . BRNL;
$op .= $item[$sheet->columns['author']] . '</strong></span>';
return $op;
