<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class AverageNumberOfWordsInSentenceTest extends TestCase
{
	public function positiveDataProvider()
	{
		return [
			['Turn on output buffering. Turn implicit flush on/off.', 4],
			['The value can be of any type. The key can either be an integer a string. Indexed arrays without key', 6],
			['Всім привіт. Мене звати Андрій', 2],
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
		$result = averageNumberOfWordsInSentence($string);
		$this->assertEquals($expected, $result);
	}
}