<?php

function sea_sick(string $s) {
	return substr_count($s, '~_') + substr_count($s, '_~') > (strlen($s) / 100) * 20 ? "Throw Up" : "No Problem";
}
