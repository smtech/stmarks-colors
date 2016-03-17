<?php

require_once('common.inc.php');
use smtech\StMarksColors as col;

$ui = StMarksSmarty::getSmarty();

$content = '<h1>St. Mark&rsquo;s Colors</h1><table><style>td { border-radius: 1em; padding: 0.25em 1em;  margin: 0.25em 0;}</style>';

foreach (col::all() as $color) {
	$content .= '<tr>' .
		'<td style="background: ' . col::get($color) . '; color: ' . col::get($color)->text() . '; border: solid 1px ' . col::get($color)->light() . '">' . $color . '</td>' .
		'<td style="background: ' . col::get($color)->light() . '; color: ' . col::get($color)->dark() . '; border: solid 1px ' . col::get($color)->dark() . '">light</td>' .
		'<td style="background: ' . col::get($color)->dark() . '; color: ' . col::get($color)->light() . '; border: solid 1px ' . col::get($color)->light() . '">dark</td>' .
		'<td style="background: ' . col::get($color)->inverted() . '; color: ' . col::get($color)->inverted()->text() . '; border: solid 1px ' . col::get($color)->inverted()->light() . '">inverted</td>' .
		'</tr>';
}

$content .= '</table>';

$ui->assign('content', $content);
$ui->display();
	
?>