<?php
use PHPUnit\Framework\TestCase;

class NumberOfCharactersTest extends TestCase
{
	public function positiveDataProvider()
	{
		return [
			['Turn on output buffering.', 25],
			['The value can be of any type. The key can either be an integer a string.', 72],
			['Привіт всім', 11]
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
		$result = mb_strlen($string);
		$this->assertEquals($expected, $result);
	}
}