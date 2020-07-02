<?php

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $nd_temp);
$nd = explode(' ', $nd_temp);

$n = intval($nd[0]);

$d = intval($nd[1]);

fscanf($stdin, "%[^\n]", $a_temp);

$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));

/* PLEASE COPY THE CODE FRAGMENT AND ADD IT TO THE SITE */
for ($i = 0; $i < $d; $i++) {
	$firstElement = $a[$i];
	unset($a[$i]);

	$a[] = $firstElement;
}

echo implode(' ', $a);
/* PLEASE COPY THE CODE FRAGMENT AND ADD IT TO THE SITE */

fclose($stdin);
