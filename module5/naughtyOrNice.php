<?php

function what_list_am_i_on(array $actions)
{
	$naughty = 0;
	$nice = 0;

	foreach ($actions as $action) {
		if (strpos('bfk', $action[0]) !== false) {
			$naughty++;
		} else if (strpos('gsn', $action[0]) !== false) {
			$nice++;
		}
	}

	return $naughty >= $nice ? 'naughty' : 'nice';
}
