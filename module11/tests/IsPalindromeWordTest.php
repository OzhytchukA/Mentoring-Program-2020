<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class IsPalindromeWordTest extends TestCase
{
	public function positiveDataProvider()
	{
		return [
			['Red rum, sir, is murder'],
			['Eva, can I see bees in a cave?'],
			['Янукович вивчив окуня.'],
			['кит на морі романтик'],
		];
	}

	/**
	 * @param $string
	 *
	 * @dataProvider positiveDataProvider
	 */
	public function testPositive($string)
	{
		$result = isPalindromeWord($string);
		$this->assertTrue($result);
	}
}