<?php
use PHPUnit\Framework\TestCase;

class AverageWordLengthTest extends TestCase
{
	public function positiveDataProvider()
	{
		return [
			['Hey my name is Andrii', 3],
			['sort several arrays at once', 4],
			['Flush system output buffer', 5],
			['Flush system output buffer', 5],
			['The manual is a little shy on explaining that output buffers are nested', 4],
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
		$result = averageWordLength($string);
		$this->assertEquals($expected, $result);
	}
}