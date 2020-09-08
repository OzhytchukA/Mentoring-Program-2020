<?php
use PHPUnit\Framework\TestCase;

class ReverseTextTest extends TestCase
{
	public function positiveDataProvider()
	{
		return [
			['The reversed text.', '.txet desrever ehT'],
			['Всім привіт!', '!тівирп місВ'],
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
		$result = reverseText($string);
		$this->assertEquals($expected, $result);
	}
}