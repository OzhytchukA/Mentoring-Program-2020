<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

const ENG_TEXT = 'Lorem ipsum dolor stats sit deified amet. Malayalam consectetur';
const UKR_TEXT = 'Тут зараз може бути багато тексту але його не буде.';


class NumberOfPalindromeWordsTest extends TestCase
{
	public function positiveDataProvider()
	{
		return [
			[
				ENG_TEXT,
				3,
			],
			[
				UKR_TEXT,
				2,
			],
		];
	}

	/**
	 * @param $string
	 * @param $expected
	 *
	 * @dataProvider positiveDataProvider
	 */
	public function testPositive($string, $expected)
	{
		$result = numberOfPalindromeWords($string);
		$this->assertEquals($expected, $result);
	}
}