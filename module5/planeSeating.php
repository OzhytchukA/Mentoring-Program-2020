<?php

function planeSeat($a)
{
	$result = '';
	$number = intval($a);
	$letter = substr($a, -1);

	$seats = [
		'A' => 'Left', 'B' => 'Left', 'C' => 'Left',
		'D' => 'Middle', 'E' => 'Middle', 'F' => 'Middle',
		'G' => 'Right', 'H' => 'Right', 'K' => 'Right'
	];

	if ($number <= 60 && array_key_exists($letter, $seats)) {
		switch ($number) {
			case $number <= 20 :
				$result .= 'Front';
				break;
			case $number > 20 && $number <= 40 :
				$result .= 'Middle';
				break;
			case $number > 40 && $number <= 60 :
				$result .= 'Back';
				break;
		}
		$result .= '-' . $seats[$letter];
	}

	return $result ? $result : 'No Seat!!';
}
