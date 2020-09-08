<?php
use PHPUnit\Framework\TestCase;

class ReverseWordsTest extends TestCase
{
	public function positiveDataProvider()
	{
		return [
			['This is the text', 'text the is This'],
			['Це текст', 'текст Це']
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
		$result = reverseWords($string);
		$this->assertEquals($expected, $result);
	}
}